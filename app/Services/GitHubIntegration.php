<?php
namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class GitHubIntegration
{
    public function getUser()
    {

        $res = Http::withToken(config('auth.github_token'))
                ->get('https://api.github.com/users/' . config('auth.github_username'));

        if ($res->status() == 200) {
            return json_decode($res->body());
        }

    }

}
