<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\LinkedSocialAccount;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Exception;

class SocialLoginController extends Controller
{
    public function callback($request): RedirectResponse
    {
        try {
            $accessToken = $request->get('access_token');
            $provider = $request->get('provider');
            $providerUser = Socialite::driver($provider)->userFromToken($accessToken);
        } catch (Exception $exception) {
            return back()->withErrors($exception->getMessage());
        }

        if (filled($providerUser)) {
            $user = $providerUser;
        } else {
            $linkedSocialAccount = LinkedSocialAccount::where(['provider_name' => $provider, 'provider_id' => $provider])->first();

            if ($linkedSocialAccount) {
                return $linkedSocialAccount->user;
            }

            $user = User::where(['email' => $providerUser->getEmail(), 'name' => $providerUser->getName()])->firstOrNew();

            if (!$user->id) {
                $user->markEmailAsVerified();
            }

            $user->linkedSocialAccounts()->create([
                'provider_id' => $providerUser->getId(),
                'provider_name' => $provider,
            ]);
        }

        Auth::login($user);

        if (!Auth::check()) {
            return back()->withErrors(
                'Failed to Login. Try again.',
            );
        }

        return to_route('dashboard');
    }

    public function redirect($request): RedirectResponse
    {
        return Socialite::driver($request->get('provider'))->redirect();
    }
}
