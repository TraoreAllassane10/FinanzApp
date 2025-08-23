<?php

namespace App\Http\Controllers\User;

use App\Models\Plan;
use Stripe\StripeClient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Exception;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function __construct(private StripeClient $stripeClient)
    {
        $this->stripeClient = new StripeClient(env('STRIPE_SECRET_KEY'));
    }

    public function checkout(Plan $plan, Request $request)
    {
        $request->validate(["period" => ["required", "string", "in:" . implode(',', [Plan::MONTHLY_DURATION, Plan::YEARLY_DURATION])]]);
       
        $period = $request->query('period');

        $user = Auth::user();

        #Calcule la somme total
        $totalAmount = $this->calculateTotalAmount($plan, $period);

        # Date de debut et date de fin
        $start_date = now();

        $end_date = Plan::MONTHLY_DURATION ? $start_date->copy()->addMonth() : $start_date->copy()->addYear();
         
        try {
            $checkout_session = $this->stripeClient->checkout->sessions->create([
                'payment_method_types' => ['card'],
                'customer_email' => $user->email,
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => $plan->name,
                        ],
                        'unit_amount' => $totalAmount,
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => route("plan.checkout.success") . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route("plan.checkout.cancel"),
            ]);

            Subscription::create([
                "user_id" => $user->id,
                "plan_id" => $plan->id,
                "period" => $period,
                "start_date" => $start_date,
                "end_date" => $end_date,
                "amount" => ($totalAmount / 100),
                "payment_status" => Subscription::STATUS_PANDING,
                "status" => Subscription::STATUS_PANDING,
                "session_id" => $checkout_session->id,
            ]);
        } catch (Exception $e) {
            return redirect('/')->with("error", "Une erreur stripe est survenue " . $e->getMessage());
        }

        return redirect($checkout_session->url);
    }

    public function calculateTotalAmount($plan, $period)
    {
        return $period === Plan::MONTHLY_DURATION ? $plan->price * 100 : $plan->price * 100 * 12;
    }

    public function success(Request $request)
    {
        $session_id = $request->query('session_id');
        $checkout_session = $this->stripeClient->checkout->sessions->retrieve($session_id);

        if ($checkout_session->payment_status === "paid")
        {
            //L'abonnement qui vient d'etre ajouter
            $subscription = Subscription::where('session_id', $session_id)->first();

            //L'ancien abonnement de l'utilisayteur
            $activeSubscription = Subscription::where('user_id', $subscription->user_id)
                ->where('status', Subscription::STATUS_ACTIF)->first();

            // Desactivation de son ancien abonnement
            if ($activeSubscription)
            {
                $activeSubscription->update([
                    "status" => Subscription::STATUS_DISABLED,
                    "end_date" => now()
                ]);
            }

            $subscription->update([
                "payment_status" => Subscription::PAYEMENT_STATUS_PAID,
                "status" => Subscription::STATUS_ACTIF,
            ]);
        }

        return view("pages.checkout.success");
    }

    public function cancel()
    {
        return view("pages.checkout.cancel");
    }
}
