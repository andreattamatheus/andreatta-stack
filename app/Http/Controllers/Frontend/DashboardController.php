<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Services\GitHubIntegration;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    /**
     * ProfileController constructor.
     *
     * @param  GitHubIntegration  $github  The GitHubIntegration instance.
     */
    public function __construct(private GitHubIntegration $github)
    {
    }

    /**
     * Display the profile index page.
     *
     * @return View
     */
    public function index()
    {
        $user = $this->github->getUser();

        return view('pages.dashboard.index', compact('user'));
    }
}
