<?php

use App\Hacktoberfest\GitHub\PullRequestChecker;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

/**
 * Integration tests for the home page.
 */
class IndexPageTest extends TestCase
{
    /**
     * Tests that the index page contains the expected content when visited anonymously.
     */
    public function testIndexUnregistered()
    {
        Auth::shouldReceive('check')
            ->andReturn(false);

        $this->visit('/')
            ->see('Authenticate using GitHub')
            ->see('meta name="keywords"')
            ->see('meta name="description"')
            ->see('meta property="og:title"')
            ->see('meta property="og:description"')
            ->see('meta property="og:image"');
    }

    /**
     * Tests that index() returns the status view without meta og tags if visited by an authenticated user.
     */
    public function testIndexAuthenticated()
    {
        $user = new User([
            'name' => 'TestUser',
            'github_name' => 'test_user',
            'github_token' => 'foobar',
        ]);

        $pullRequestChecker = Mockery::mock(PullRequestChecker::class);
        $pullRequestChecker->shouldReceive('getQualifiedPullRequests')
            ->once()
            ->andReturn($this->buildFakePullRequestData(2));

        $this->app->instance(PullRequestChecker::class, $pullRequestChecker);

        Auth::shouldReceive('check')
            ->andReturn(true);

        Auth::shouldReceive('user')
            ->andReturn($user);

        $this->visit('/')
            ->dontSee('meta property="og:')
            ->see('Sign out');
    }
}
