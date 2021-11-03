<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {


        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(!Auth::attempt($credentials)) {
            return redirect()->route('login')->withErrors('error', 'Credenciais incorretas.');
        }

        $request->session()->regenerate();

        return redirect()->route('posts.index');
    }

    //
}
