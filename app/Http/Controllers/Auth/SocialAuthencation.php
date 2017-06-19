<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthencation extends Controller
{
    /**
     * Redirect to the needed provider
     *
     * @param  string $provider The social authencation provider.
     * @return mixed
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Handle the callback for the needed provider.
     *
     * @param  string $provider The social authencation provider.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleProviderCallback($provider)
    {
        try {
            $user = Socialite::driver($provider)->user();
        } catch (Exception $exception) {
            return Redirect::to("auth/{$provider}");
        }

        Auth::login($this->findOrCreateUser($user, $provider), true);

        return back(302);
    }

    /**
     * Find the user or create a new login login with the given provider.
     *
     * @param $user
     * @param $provider
     * @param mixed
     */
    private function findOrCreateUser($user, $provider)
    {
        if ($authUser = User::where("{$provider}_id", $user->id)->orWhere('email', $user->email)->first()) {
            return $authUser;
        }

        return User::create([
            'name'              => $user->name,
            'email'             => $user->email,
            "{$provider}_id"    => $user->id,
            'avatar'            => $user->avatar
        ]);
    }
}