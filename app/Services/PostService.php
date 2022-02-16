<?php
namespace App\Services;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostService
{
    public function create($request)
    {
        // $imageWithExt = $request->file('image')->getClientOriginalName();
        // // Get Filename
        // $filename = pathinfo($imageWithExt, PATHINFO_FILENAME);
        // // Get just Extension
        // $extension = $request->file('image')->getClientOriginalExtension();
        // // Filename To store
        // $fileNameToStore = $filename. '_'. time().'.'.$extension;
        // // Upload Image
        // $path = $request->file('image')->storeAs('public/image', $fileNameToStore);

        $post = Post::create([
            'title' => $request->title,
            'user_id' => Auth::id(),
            'img_url' => 'https://v1.tailwindcss.com/_next/static/media/tailwind-ui-sidebar.2ccd3a8ec5f31f428204b5c3c4d9a485.png',
            'content' => $request->content
        ]);
        return $post;
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return true;
    }

}
