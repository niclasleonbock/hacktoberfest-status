<?php

namespace App\Http\Controllers;

use App\Hacktoberfest\GitHub\PullRequestChecker;
use App\User;

class ShareController extends Controller
{
    /**
     * Display a user's PR status if user already authorized this app,
     * otherwise redirect to home page.
     *
     * @param PullRequestChecker $checker
     * @param $github_username
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function index(PullRequestChecker $checker, $github_username)
    {
        $user = User::where('github_username', '=', $github_username)->first();

        if (!$user) {
            return redirect('/');
        }

        $prs = $checker->getQualifiedPullRequests($user);

        return view('status', compact('user', 'prs'));
    }
}
