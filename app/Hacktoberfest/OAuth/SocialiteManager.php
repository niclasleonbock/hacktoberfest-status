<?php

namespace App\Hacktoberfest\OAuth;

use Laravel\Socialite\SocialiteManager as BaseSocialiteManager;

class SocialiteManager extends BaseSocialiteManager
{
    /**
     * Create the instance of our own Github provider.
     *
     * @return \Laravel\Socialite\Two\AbstractProvider
     */
    protected function createGithubDriver()
    {
        $config = $this->app['config']['services.github'];

        return $this->buildProvider(
            'App\Hacktoberfest\OAuth\Providers\ScopelessGithubProvider',
            $config
        );
    }
}
