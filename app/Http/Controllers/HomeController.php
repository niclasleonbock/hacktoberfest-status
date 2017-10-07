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
     * @return Illuminate\View\View
     */
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();

            $prs = $this->checker->getQualifiedPullRequests($user);

            return view('status', [
                'user' => $user,
                'prs' => $prs
            ]);
        }

        return view('index');
    }
}
