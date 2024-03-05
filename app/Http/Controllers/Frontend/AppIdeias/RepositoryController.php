<?php

namespace App\Http\Controllers\Frontend\AppIdeias;

use App\Http\Controllers\Controller;
use App\Http\Services\GitHubIntegration;
use Illuminate\Http\Request;

class RepositoryController extends Controller
{

    /**
     * Constructor method for the RepositoryController class.
     *
     * @param  GitHubIntegration  $github  The GitHubIntegration instance.
     * @return void
     */
    public function __construct(
        private GitHubIntegration $github
    )
    {
    }

    /**
     * Display a listing of repositories for a given user.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $userName = $request->input('username');
        $repositories = $this->github->getRepositories($userName);

        return view('pages.dashboard.repository.index', compact('repositories'));
    }
}
