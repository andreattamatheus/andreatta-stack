<?php
namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class GitHubIntegration
{
    public function getUser()
    {
        $res = Http::withToken(env('GITHUB_TOKEN'))
                ->get('https://api.github.com/users/' . env('GITHUB_USERNAME'));

        if ($res->status() == 200) {
            return json_decode($res->body(),true);
        }

    }

}
