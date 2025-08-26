<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (Exception $e) {
            return redirect('/')->with('error', 'Echec de connection avec Google');
        }

        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser) {
            Auth::login($existingUser);
        } else {
            $newUser = User::updateOrCreate(
                [
                    'email' => $user->getEmail(),
                ],
                [
                    'first_name' => $user->user['given_name'],
                    'last_name' => $user->user['family_name'],
                    'image' => $user->getAvatar(),
                    'role' => User::USER_ROLE,
                    'password' => bcrypt(Str::random(8)),
                    'email_verified_at' => now(),
                ]
            );

            $freePlan = Plan::where('duration', Plan::FREE_ACCESS)->first();
            $start_date = now();
            $end_date = $start_date->copy()->addYear();

            Subscription::create([
                "user_id" => $newUser->id,
                "plan_id" => $freePlan->id,
                "period" => Plan::YEARLY_DURATION,
                "start_date" => $start_date,
                "end_date" => $end_date,
                "amount" => $freePlan->price,
                "payment_status" => Subscription::PAYEMENT_STATUS_NO_PAYEMENT_REQUIRED,
                "status" => Subscription::STATUS_ACTIF,
            ]);

            Auth::login($newUser);
        }

        if (Auth::user()->role == User::ADMIN_ROLE) {
            return to_route('admin.home');
        }

        return redirect('/home');
    }
}
