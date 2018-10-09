# Hacktoberfest Status Checker

This little tool helps you to track your Hacktoberfest status.

*Hacktoberfest Status Checker* is available online at [hacktoberfest.bock.rocks](https://hacktoberfest.bock.rocks/).

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
6. Run `touch database/database.sqlite` to create an empty database. Note that depending on your system, you may need to install the required PHP SQLite drivers.
7. Run `php artisan migrate` to run the migrations
8. By running `php artisan serve` you will start the web server, this can be visited from the outputted URL. An alternate server port/host can be set using the options `--port=PORT_NUMBER` and `--host=HOST_URL_OR_IP`.
9. Opening your .env file, set the `GITHUB_CALLBACK_URL` variable to point to the `/auth/callback` route for your instance e.g. `http://localhost:8000/auth/callback`
10. Register a new OAuth application with [GitHub](https://github.com/settings/applications/new), ensuring to fill in the same callback URL specified in your `.env` previously.
11. Once your application is created, you will be given both a client ID and secret.  These can then be placed into the relative `GITHUB_CLIENT_ID` and `GITHUB_CLIENT_SECRET` variables in your `.env` file.


