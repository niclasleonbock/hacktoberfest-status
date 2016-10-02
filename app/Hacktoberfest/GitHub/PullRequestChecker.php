<?php

namespace App\Hacktoberfest\GitHub;

use GuzzleHttp\Client;

class PullRequestChecker
{

    /**
     * API base URL consisting of scheme and hostname.
     */
    const API_BASE = 'https://api.github.com';

    /**
     * Search API endpoint URL.
     */
    const API_ENDPOINT_SEARCH = '/search/issues';

    /**
     * Repository info API endpoint URL.
     */
    const API_ENDPOINT_REPO = '/repos';

    /**
     * Instance of the Guzzle HTTP client.
     */
    protected $client;

    /**
     * Instance of the cache provider.
     */
    protected $cache;

    /**
     * Creates a new instance of the pull request checker.
     *
     * @param Cache $cache
     * @return void
     */
    function __construct($cache)
    {
        $this->client = new Client([
            'base_uri' => self::API_BASE,
            'timeout' => 2.0
        ]);

        $this->cache = $cache;
    }

    /**
     * Returns the start date of the hacktober month.
     *
     * @return date string
     */
    protected function getStartDate()
    {
        return date('Y') . '-09-30T00:00:00-12:00';
    }

    /**
     * Returns the start end of the hacktober month.
     *
     * @return date string
     */
    protected function getEndDate()
    {
        return date('Y') . '-10-31T23:59:59-12:00';
    }

    /**
     * Builds the query string for querying the GitHub API.
     *
     * @param string $username
     * @return query string
     */
    protected function getQuery($username)
    {
        return 'q=author:' . $username . '+type:pr+created:' .
            $this->getStartDate() . '..' . $this->getEndDate();
    }

    /**
     * Returns the instance of the Guttle HTTP client.
     *
     * @return Guzzle client
     */
    protected function getClient()
    {
        return $this->client;
    }

    /**
     * Fetches information about a repository from the GitHub API and caches it.
     *
     * @param string $repoName
     * @param string $token
     * @return repository information
     */
    protected function getRepositoryInfo($repoName, $token) {
        $cacheKey = 'repo_' . $repoName;

        if ($this->cache->has($cacheKey)) {
            return $this->cache->get($cacheKey);
        }

        $response = $this->getClient()->request('GET', self::API_ENDPOINT_REPO . $repoName, [
            'headers' => [
                'Authorization' => 'token ' . $token,
            ],
        ]);

        $repo = json_decode($response->getBody());

        $this->cache->put($cacheKey, $repo, 60 * 24);

        return $repo;
    }

    /**
     * Extracts the repo name from the repo URL.
     *
     * @param string $repoUrl
     * @return repo name
     */
    protected function getRepositoryName($repoUrl)
    {
        return str_ireplace(self::API_HOST . self::API_ENDPOINT_REPO, '', $repoUrl);
    }

    /**
     * Fetches all qualified pull requests from the GitHub API.
     * 
     * @param User $user
     * @return list of qualified pull requests
     */
    public function getQualifiedPullRequests($user)
    {
        $response = $this->getClient()->request('GET', self::API_ENDPOINT_SEARCH, [
            'query' => $this->getQuery($user->github_username),
            'headers' => [
                'Authorization' => 'token ' . $user->github_token,
            ],
        ]);

        $prs = json_decode($response->getBody());

        if ($prs->total_count > 0 && count($prs->items) > 0) {
            foreach ($prs->items as $pr) {
                $pr->repo = $this->getRepositoryInfo(
                    $this->getRepositoryName($pr->repository_url),
                    $user->github_token
                );
            }
        }

        return $prs;
    }

}

