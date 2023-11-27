<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class portfolioController extends Controller
{
    public function index()
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://api.github.com/users/'.config('auth.github_username').'/repos');
        $repositories = json_decode($response->getBody()->getContents());
        return view('pages.portfolio.index', compact('repositories'));
    }

    public function show()
    {
        return view('portfolio.index');
    }
}
