<?php
use App\Hacktoberfest\GitHub\PullRequestChecker;
use App\Http\Controllers\HomeController;
use App\User;

/**
 * Test cases for the shared status page.
 */
class StatusPageTest extends TestCase
{
    /**
     * Tests that the shared status page redirects to the home page if the user name is unknown.
     */
    public function testRedirectIfUserUnknown()
    {
        $userModel = Mockery::mock(User::class);
        $pullRequestChecker = Mockery::mock(PullRequestChecker::class);

        $this->app->instance(PullRequestChecker::class, $pullRequestChecker);
        $this->app->instance(User::class, $userModel);

        $collection = $this->createCollectionMockWithFirst(null);

        $userModel->shouldReceive('where')
            ->once()
            ->with('github_username', '=', 'TestUser')
            ->andReturn($collection);

        $pullRequestChecker
            ->shouldNotReceive('getQualifiedPullRequests');

        $this->visit('/TestUser')
            ->seePageIs('/');
    }

    /**
     * Tests that the shared status page for an existing user contains the expected meta tags.
     */
    public function testSharedStatusPageForExistingUser()
    {
        $testUser = new User([
            'name'         => 'TestUser',
            'github_name'  => 'test_user',
            'github_token' => 'foobar',
        ]);

        $userModel = Mockery::mock(User::class);
        $pullRequestChecker = Mockery::mock(PullRequestChecker::class);

        $this->app->instance(PullRequestChecker::class, $pullRequestChecker);
        $this->app->instance(User::class, $userModel);

        $collection = $this->createCollectionMockWithFirst($testUser);

        $userModel->shouldReceive('where')
            ->once()
            ->with('github_username', '=', 'TestUser')
            ->andReturn($collection);

        $pullRequestChecker
            ->shouldReceive('getQualifiedPullRequests')
            ->once()
            ->andReturn($this->buildFakePullRequestData(3));

        $this->visit('/TestUser')
            ->see('meta property="og:title" content="Hacktoberfest Status of TestUser');
    }
}
