<?php

namespace App\Http\Controllers;

use App\Hacktoberfest\GitHub\PullRequestChecker;
use App\User;

class ShareController extends Controller
{
    /**
     * Instance of the 'pull request checker'.
     *
     * @var PullRequestChecker
     */
    protected $checker;

    /**
     * Instance of user model.
     *
     * @var User
     */
    protected $user;


    /**
     * Create a new controller instance.
     *
     * @param PullRequestChecker $checker
     */
    public function __construct(PullRequestChecker $checker, User $user)
    {
        $this->checker     = $checker;
        $this->user        = $user;
        $this->sharingMode = true;

        parent::__construct();
    }

    /**
     * Display a user's PR status if user already authorized this app,
     * otherwise redirect to home page.
     *
     * @param string $github_username
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function index($github_username)
    {
        $user = $this->user->where('github_username', '=', $github_username)->first();

        if (!$user) {
            return redirect('/');
        }

        $prs = $this->checker->getQualifiedPullRequests($user);

        $encouragement_message = $this->getEncouragementText($prs->total_count);

        $viewData = compact('user', 'prs', 'encouragement_message');
        $viewData['sharingMode'] = $this->sharingMode;

        return view('status', $viewData);
    }
}
