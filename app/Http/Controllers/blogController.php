<?php

namespace App\Http\Controllers;

use App\Models\Post;

class blogController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __invoke()
    {
        $posts = Post::all();
        return view('blog.index', compact('posts'));
    }


    //
}
