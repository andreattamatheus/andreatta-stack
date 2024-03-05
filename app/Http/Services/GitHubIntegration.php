<?php

namespace App\Http\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;

class GitHubIntegration
{
    /**
     * Create a new GitHubIntegration instance.
     *
     * @return void
     */
    public function __construct(public Client $client)
    {
        $this->client = new Client([
            'headers' => [
//                'Authorization' => 'token '.config('auth.github_token'),
                'Accept' => 'application/vnd.github.v3+json',
            ],
        ]);
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
            $userName = $userName ?? auth()->user()->login;
            if (!$repositories) {
                $response = $this->client->request(
                    'GET',
                    'https://api.github.com/users/'.$userName.'/repos'
                );
                if ($response->getStatusCode() === 200) {
                    $repositoriesData = json_decode($response->getBody()->getContents(), false, 512, JSON_THROW_ON_ERROR);
                    foreach ($repositoriesData as $key => $repo) {
                        Cache::put('user:admin:repository'.$key, $repo);
                    }
                    $repositories = $repositoriesData;
                }
            }

            return (object) $repositories;
        } catch (\Throwable $th) {
            \Log::error($th->getMessage());
            
            return (object) [];
        }
    }
}
