<?php

namespace App\Hacktoberfest\OAuth;

use Laravel\Socialite\SocialiteServiceProvider as BaseSocialiteServiceProvider;

class SocialiteServiceProvider extends BaseSocialiteServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Laravel\Socialite\Contracts\Factory', function ($app) {
            return new SocialiteManager($app);
        });
    }

}
