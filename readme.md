# Hacktoberfest Status Checker

This little tool helps you to track your Hacktoberfest status. 

*Hacktoberfest Status Checker* is no longer available online.

## Build
We're using Travis CI to automatically run tests. Feel free to add some more. 

[![Build Status](https://travis-ci.org/niclasleonbock/hacktoberfest-status.svg?branch=develop)](https://travis-ci.org/niclasleonbock/hacktoberfest-status)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/niclasleonbock/hacktoberfest-status/badges/quality-score.png?b=develop)](https://scrutinizer-ci.com/g/niclasleonbock/hacktoberfest-status/?branch=develop) (on develop)

## Installation

1. Clone the repository 

        git clone https://github.com/niclasleonbock/hacktoberfest-status.git
2. Run `composer install` to install composer packages/dependencies 
3. (Optionally) Run `npm install` to install node packages/dependencies
4. Create your `.env` file by copying the example provided in the repository 
        
        cp .env.example .env
5. Run `php artisan key:generate` to generate and set an application key
6. Run `php artisan migrate` to run the migrations
7. By running `php artisan serve` you will start the web server, this can be visited from the outputted URL.
8. Opening your .env file, set the `GITHUB_CALLBACK_URL` variable to point to the `/auth/callback` route for your instance e.g. `http://localhost:8000/auth/callback`
9. Register a new OAuth application with [GitHub](https://github.com/settings/applications/new), ensuring to fill in the same callback URL specified in your `.env` previously.
10. Once your application is created, you will be given both a client ID and secret.  These can then be placed into the relative `GITHUB_CLIENT_ID` and `GITHUB_CLIENT_SECRET` variables in your `.env` file.
11. You must have the curl certificate set in your php.ini for this to function locally
    1. Verify the location of the php.ini you are using `php --ini`
    2. Ensure the setting `curl.cainfo` under the `[curl]` section has been set to the location of the [cacert.pem](https://curl.haxx.se/ca/cacert.pem) that can be aquired from [Curl](https://curl.haxx.se/).


