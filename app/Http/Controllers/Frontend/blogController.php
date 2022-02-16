<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;

class blogController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {
        $posts = Post::orderBy('id','desc')->paginate(5);
        $postCounter = Post::all()->count();
        return view('blog.index', compact('posts', 'postCounter'));
    }

    public function showPost(Post $id)
    {
        $post = Post::find($id)->first();
        return view('blog.post', compact('post'));
    }


    //
}
