<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Models\User;
use Illuminate\Support\Str;
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

            Auth::login($newUser);
        }

        return redirect('/dashboard');
    }
}
