<?php

namespace App\Http\Controllers;

use Auth;
use App\Hacktoberfest\GitHub\PullRequestChecker;

class HomeController extends Controller
{
    /**
     * Instance of the 'pull request checker'.
     */
    protected $checker;

    /**
     * Create a new controller instance.
     *
     * @param PullRequestChecker $checker
     * @internal param PullRequestChecker $prChecker
     */
    public function __construct(PullRequestChecker $checker)
    {
        $this->checker = $checker;
    }

    /**
     * Display the current status if the user already signed in via GitHubs' OAuth API.
     * Display some infotext and the sign in button otherwise.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();

            $prs = $this->checker->getQualifiedPullRequests($user);

            $message = "I'm about to start hacking for Hacktoberfest!";
            if ($prs->total_count > 0) {
                $message = "I've completed $prs->total_count pull requests for Hacktoberfest!";
            }

            return view('status', compact('user', 'prs', 'message'));
        }

        return view('index');
    }
}
