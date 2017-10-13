<?php

use App\Hacktoberfest\GitHub\PullRequestChecker;
use App\Http\Controllers\HomeController;
use App\User;
use Auth;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class StatusPageTest extends TestCase
{
    /**
     * Verify that the shared status page has meta/og tags.
     */
    public function testSharedStatusPageHasMetaOg()
    {
        $this->visit('/Tardog')
            ->see('meta property="og:');
    }

    /**
     * Verify that the status page has no meta/og tags if visited by an authenticated user.
     */
    public function testNoMetaOgOnAuthenticatedStatusPage()
    {
        $user = new User([
            'name'         => 'TestUser',
            'github_name'  => 'test_user',
            'github_token' => 'foobar',
        ]);

        $this->be($user);

        $pullRequestCheckerMock = $this->createMock(PullRequestChecker::class);
        $pullRequestCheckerMock->expects($this->once())
            ->method('getQualifiedPullRequests')
            ->willReturn($this->buildFakePullRequestData(2));

        $controller = new HomeController($pullRequestCheckerMock);

        $view    = $controller->index();
        $content = $view->render();

        $this->assertNotContains('meta property="og:', $content);
    }

    /**
     * Create fake pull request data matching the format expected by the Github API.
     *
     * @param  integer $count
     * @return object
     */
    protected function buildFakePullRequestData($count)
    {
        $fakeRepo            = new stdClass();
        $fakeRepo->html_url  = 'https://github.com/NotARealRepo';
        $fakeRepo->full_name = 'NotARealRepo';
        $fakeRepo->name      = 'NotARealRepo';

        $pullRequests                     = new stdClass();
        $pullRequests->total_count        = $count;
        $pullRequests->incomplete_results = false;
        $pullRequests->items              = [];

        for ($i=0; $i < $count; $i++) { 
            $fakePr             = new stdClass();
            $fakePr->html_url   = 'https://github.com/NotARealRepo';
            $fakePr->title      = 'Test PR';
            $fakePr->repo       = $fakeRepo;
            $fakePr->created_at = '2017-10-01T00:00:00Z';
            $fakePr->body       = '';
            
            $pullRequests->items[] = $fakePr;
        }

        return $pullRequests;
    }
}
