<?php
namespace App\Services;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;

class PostService
{
    public function create(StorePostRequest $request)
    {
        $imageWithExt = $request->file('image')->getClientOriginalName();
        // Get Filename
        $filename = pathinfo($imageWithExt, PATHINFO_FILENAME);
        // Get just Extension
        $extension = $request->file('image')->getClientOriginalExtension();
        // Filename To store
        $fileNameToStore = $filename. '_'. time().'.'.$extension;
        // Upload Image
        $path = $request->file('image')->storeAs('public/image', $fileNameToStore);

        dd($path);

        $post = Post::create([
            'title' => $request->title,
            'img_url' => $request->file('image')->getClientOriginalName(),
            'content' => $request->content
        ]);
        return $post;
    }

}
