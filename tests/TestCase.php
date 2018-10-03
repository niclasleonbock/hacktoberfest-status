<?php

use Carbon\Carbon;
use Illuminate\Support\Collection;

abstract class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';


    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__ . '/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

    /**
     * Mock a collection with first() returning the given result.
     *
     * @param mixed $result
     *
     * @return Collection
     */
    protected function createCollectionMockWithFirst($result)
    {
        $collection = Mockery::mock(Collection::class);
        $collection->shouldReceive('first')
            ->andReturn($result);

        return $collection;
    }

    /**
     * Creates fake pull request data matching the format returned by the Github
     * API.
     *
     * @param integer $count The amount of pull requests to generate.
     *
     * @return object
     */
    protected function buildFakePullRequestData($count)
    {
        $now = new Carbon();

        $fakeRepo = new stdClass();
        $fakeRepo->html_url = 'https://github.com/NotARealRepo';
        $fakeRepo->full_name = 'NotARealRepo';
        $fakeRepo->name = 'NotARealRepo';

        $pullRequests = new stdClass();
        $pullRequests->total_count = $count;
        $pullRequests->incomplete_results = false;
        $pullRequests->items = [];

        for ($i = 0; $i < $count; $i++) {
            $fakePr = new stdClass();
            $fakePr->html_url = 'https://github.com/NotARealRepo';
            $fakePr->title = 'Test PR';
            $fakePr->repo = $fakeRepo;
            $fakePr->created_at = $now->toDateTimeString();
            $fakePr->body = '';

            $pullRequests->items[] = $fakePr;
        }

        return $pullRequests;
    }
}
