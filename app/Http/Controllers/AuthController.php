<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function index()
    {
        return view('pages.auth.login');
    }

    public function login()
    {
        return Socialite::driver('github')->redirect();
    }

    public function gitHubCallback()
    {
        $githubUser = Socialite::driver('github')->user();
        $user = User::updateOrCreate([
            'github_id' => $githubUser->id,
        ], [
            'name' => $githubUser->name,
            'login' => $githubUser->nickname,
            'email' => $githubUser->email,
            'password' => bcrypt($githubUser->token),
            'github_token' => $githubUser->token
        ]);
        Auth::login($user);
        return redirect('/dashboard');
    }

}
