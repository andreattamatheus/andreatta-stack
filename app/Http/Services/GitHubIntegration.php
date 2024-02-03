<?php

namespace App\Http\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;

class GitHubIntegration
{
    /**
     * The HTTP client for making requests to the GitHub API.
     *
     * @var Client
     */
    private $client;

    /**
     * Create a new GitHubIntegration instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->client = new Client([
            'headers' => [
                'Authorization' => 'token '.config('auth.github_token'),
                'Accept' => 'application/vnd.github.v3+json',
            ],
        ]);
    }

    /**
     * Retrieves the user profile from GitHub.
     *
     * @return object The user profile object.
     */
    public function getUser(): object
    {
        try {
            // Check if the user profile is cached
            $user = Cache::get('user:admin:profile');
            if (! $user) {
                // Fetch the user profile from GitHub API
                $getUserFromGithub = $this->client->request(
                    'GET',
                    'https://api.github.com/user'
                );

                if ($getUserFromGithub->getStatusCode() == 200) {
                    // Parse the response and cache the user profile
                    $user = json_decode($getUserFromGithub->getBody()->getContents());
                    Cache::put('user:admin:profile', [
                        'name' => $user->name,
                        'followers' => (string) $user->followers,
                        'following' => (string) $user->following,
                        'avatar_url' => $user->avatar_url,
                        'html_url' => $user->html_url,
                        'location' => $user->location,
                        'company' => $user->company,
                        'bio' => $user->bio,
                    ], 60 * 60 * 24);
                }
            }

            return (object) $user;
        } catch (\Throwable $th) {
            // Return error response if an exception occurs
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    /**
     * Retrieves the repositories for a given user from the GitHub API.
     *
     * @param  string|null  $userName  The username of the user. If not provided,
     *                                 the default username from the configuration will be used.
     * @return object The repositories data as an object.
     */
    public function getRepositories(?string $userName = null): object
    {
        try {
            $repositories = Cache::get('user:admin:repository');
            $userName = $userName ?? config('auth.github_username');
            if (! $repositories) {
                $response = $this->client->request(
                    'GET',
                    'https://api.github.com/users/'.$userName.'/repos'
                );
                if ($response->getStatusCode() == 200) {
                    $repositoriesData = json_decode($response->getBody()->getContents());
                    foreach ($repositoriesData as $key => $repo) {
                        Cache::put('user:admin:repository'.$key, $repo);
                    }
                    $repositories = $repositoriesData;
                }
            }

            return (object) $repositories;
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }
}
