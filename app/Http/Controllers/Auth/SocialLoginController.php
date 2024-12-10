<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\LinkedSocialAccount;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Exception;

class SocialLoginController extends Controller
{
    public function callback(string $provider): RedirectResponse
    {
        try {
            $providerUser = Socialite::driver($provider)->user();
        } catch (Exception $exception) {
            return back()->withErrors($exception->getMessage());
        }

        $linkedSocialAccount = LinkedSocialAccount::where(['provider_name' => $provider, 'provider_id' => $providerUser->getId()])->first();

        if ($linkedSocialAccount) {
            Auth::login($linkedSocialAccount->user);

            if (!Auth::check()) {
                return to_route('/')->withErrors(
                    'Failed to Login. Try again.',
                );
            }

            return to_route('dashboard');
        }

        $user = User::firstOrNew(['email' => $providerUser->getEmail()]);

        if (!$user->id) {
            $user->name = $providerUser->getName();
            $user->password = Hash::make(Str::random(32));
            $user->save();
            $user->markEmailAsVerified();
        }

        $user->linkedSocialAccounts()->create([
            'provider_id' => $providerUser->getId(),
            'provider_name' => $provider,
            'provider_token' => $providerUser->token,
        ]);

        Auth::login($user);

        if (!Auth::check()) {
            return to_route('/')->withErrors(
                'Failed to Login. Try again.',
            );
        }

        return to_route('dashboard');
    }

    public function redirect(string $provider): RedirectResponse
    {
        return Socialite::driver($provider)->redirect();
    }
}
