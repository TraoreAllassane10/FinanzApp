<?php

namespace App\Http\Controllers\Auth;

use App\Models\Plan;
use App\Models\User;
use Illuminate\View\View;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => User::USER_ROLE
        ]);

        $freePlan = Plan::where('duration', Plan::FREE_ACCESS)->first();
        $start_date = now();
        $end_date = $start_date->copy()->addYear();

        Subscription::create([
            "user_id" => $user->id,
            "plan_id" => $freePlan->id,
            "period" => Plan::YEARLY_DURATION,
            "start_date" => $start_date,
            "end_date" => $end_date,
            "amount" => $freePlan->price,
            "payment_status" => Subscription::PAYEMENT_STATUS_NO_PAYEMENT_REQUIRED,
            "status" => Subscription::STATUS_ACTIF,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('/home', absolute: false));
    }
}
