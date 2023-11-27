<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redis;

class GitHubIntegration
{
    private $client;

    public function __construct()
    {
        $this->client = new Client([
            'headers' => [
                'Authorization' => 'token ' . config('auth.github_token'),
                'Accept' => 'application/vnd.github.v3+json',
            ],
        ]);
    }

    public function getUser(): object
    {
        try {

            $user = Cache::get('user:admin:profile');
            if (!$user) {
                $getUserFromGithub = $this->client->request(
                    'GET',
                    'https://api.github.com/users/' . config('auth.github_username')
                );

                if ($getUserFromGithub->getStatusCode() == 200) {
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
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    public function getRepositories(): object
    {
        try {
            $repositories = Cache::get('user:admin:portfolio');
            if (!$repositories) {
                $response = $this->client->request(
                    'GET',
                    'https://api.github.com/users/' . config('auth.github_username') . '/repos'
                );
                if ($response->getStatusCode() == 200) {
                    $repositoriesData = json_decode($response->getBody()->getContents());
                    foreach ($repositoriesData as $key => $repo) {
                        Cache::put('user:admin:portfolio'. $key, $repo);
                    }
                    $repositories =  $repositoriesData;
                }
            }
            return (object) $repositories;
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    // public function getUser(): object
    // {
    //     try {

    //         $user = Redis::hgetall('user:admin:profile');
    //         if (!$user) {
    //             $getUserFromGithub = $this->client->request(
    //                 'GET',
    //                 'https://api.github.com/users/' . config('auth.github_username')
    //             );

    //             if ($getUserFromGithub->getStatusCode() == 200) {
    //                 $user = json_decode($getUserFromGithub->getBody()->getContents());
    //                 Redis::hmset('user:admin:profile', [
    //                     'name' => $user->name,
    //                     'followers' => (string) $user->followers,
    //                     'following' => (string) $user->following,
    //                     'avatar_url' => $user->avatar_url,
    //                     'html_url' => $user->html_url,
    //                     'location' => $user->location,
    //                     'company' => $user->company,
    //                     'bio' => $user->bio,
    //                 ]);
    //             }
    //         }
    //         return (object) $user;
    //     } catch (\Throwable $th) {
    //         return response()->json(['error' => $th->getMessage()], 500);
    //     }
    // }

    // public function getRepositories(): object
    // {
    //     try {
    //         $repositories = Redis::hgetall('user:admin:portfolio');
    //         if (!$repositories) {
    //             $response = $this->client->request(
    //                 'GET',
    //                 'https://api.github.com/users/' . config('auth.github_username') . '/repos'
    //             );
    //             if ($response->getStatusCode() == 200) {
    //                 $repositoriesData = json_decode($response->getBody()->getContents());
    //                 foreach ($repositoriesData as $key => $repo) {
    //                     Redis::hmset('user:admin:portfolio:'. $key, [
    //                         'name' => $repo->name,
    //                         'description' => $repo->description,
    //                         'html_url' => $repo->html_url,
    //                         'topics' => implode(", ", $repo->topics)
    //                     ]);
    //                 }
    //                 $repositories =  $repositoriesData;
    //             }
    //         }
    //         return (object) $repositories;
    //     } catch (\Throwable $th) {
    //         return response()->json(['error' => $th->getMessage()], 500);
    //     }
    // }
}
