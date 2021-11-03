<?php

namespace App\Http\Controllers;

use App\Models\Index;

class indexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {
        $user = Index::first();
        return view('home', compact('user'));
    }

    //
}
