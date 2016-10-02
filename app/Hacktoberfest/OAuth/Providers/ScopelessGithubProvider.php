<?php

namespace App\Hacktoberfest\OAuth\Providers;

use Laravel\Socialite\Two\GithubProvider;

class ScopelessGithubProvider extends GithubProvider
{

    /**
     * The scopes being requested.
     * Set to empty because we do not need any person information.
     *
     * @var array
     */
    protected $scopes = [];

}
