<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\GitHubIntegration;


class RepositoryController extends Controller
{
    private $github;

    /**
     * Constructor method for the RepositoryController class.
     *
     * @param GitHubIntegration $github The GitHubIntegration instance.
     * @return void
     */
    public function __construct(GitHubIntegration $github)
    {
        $this->github  = $github;
    }

    /**
     * Display a listing of repositories for a given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $userName = $request->input('username');
        $repositories = $this->github->getRepositories($userName);
        return view('pages.dashboard.repository.index', compact('repositories'));
    }

}
