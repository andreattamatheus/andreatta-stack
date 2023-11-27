<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\GitHubIntegration;

class portfolioController extends Controller
{
    private $github;

    public function __construct(GitHubIntegration $github)
    {
        $this->github  = $github;
    }

    public function index()
    {
        $repositories = $this->github->getRepositories();
        return view('pages.portfolio.index', compact('repositories'));
    }

    public function show()
    {
        return view('portfolio.index');
    }
}
