<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Socialite;

class AuthController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->scopes([])->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->user();
        $authUser = $this->findOrCreateUser($user);

        Auth::login($authUser, true);

        return redirect('/');
    }

    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $githubUser
     * @return User
     */
    private function findOrCreateUser($user)
    {
        $authUser = [
            'name' => $user->name ? $user->name : $user->nickname,
            'github_username' => $user->nickname,
            'github_id' => $user->id,
            'github_token' => $user->token,
            'github_avatar' => $user->avatar,
        ];

        $databaseUser = User::where('github_id', $user->id)->first();

        if ($databaseUser) {
            $databaseUser->fill($authUser);
            $databaseUser->save();

            return $databaseUser;
        }

        return User::create($authUser);
    }

    /**
     * Log the current user out.
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function signOut()
    {
        Auth::logout();

        return redirect('/');
    }
}
