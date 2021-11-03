<?php

namespace App\Http\Controllers;

class blogController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __invoke()
    {
        return view('blog.index');
    }


    //
}
