<?php

namespace App\Http\Controllers;

use App\Hacktoberfest\GitHub\PullRequestChecker;
use Auth;

class HomeController extends Controller
{
    /**
     * Instance of the 'pull request checker'.
     *
     * @var PullRequestChecker
     */
    protected $checker;


    /**
     * Create a new controller instance.
     *
     * @param PullRequestChecker $checker
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
        if (!Auth::check()) {
            return view('index');
        }

        $user = Auth::user();
        $prs = $this->checker->getQualifiedPullRequests($user);

        $message = "I'm about to start hacking for Hacktoberfest!";

        if ($prs->total_count > 0) {
            $message = "I've completed $prs->total_count pull requests for Hacktoberfest!";
        }

        $viewData = compact('user', 'prs', 'message');
        $viewData['sharingMode'] = $this->sharingMode;

        return view('status', $viewData);
    }
}
