<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\GitHubIntegration;
use Illuminate\Http\Client\Request;

class ProfileController extends Controller
{
    private $github;

    /**
     * ProfileController constructor.
     *
     * @param GitHubIntegration $github The GitHubIntegration instance.
     */
    public function __construct(GitHubIntegration $github)
    {
        $this->github = $github;
    }

    /**
     * Display the profile index page.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $user = $this->github->getUser();
        return view('pages.profile.index', compact('user'));
    }

    /**
     * Update the user profile.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    public function update(Request $request)
    {
        try {
            $this->user->setUser(
                $request->name,
                $request->email
            );
            $this->user->save();
            return true;
        } catch (\Throwable $th) {
            return false;
        };
    }
}
