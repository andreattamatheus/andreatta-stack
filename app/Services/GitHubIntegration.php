<?php
namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;

class GitHubIntegration
{
    public function getUser(): object
    {
        try {
            $getUserFromGithub = Http::withToken(config('auth.github_token'))
                    ->get('https://api.github.com/users/' . config('auth.github_username'));
            if ($getUserFromGithub->status() == 200) {
                return json_decode($getUserFromGithub);
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }

    }

}
