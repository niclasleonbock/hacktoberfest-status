<?php

namespace App\Hacktoberfest\GitHub;

use Illuminate\Support\ServiceProvider;

class GitHubServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('App\Hacktoberfest\GitHub\PullRequestChecker', function ($app) {
            return new PullRequestChecker($app->make('cache'));
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [PullRequestChecker::class];
    }
}
