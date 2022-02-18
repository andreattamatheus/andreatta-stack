<?php
namespace App\Services;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostService
{
    public function create(StorePostRequest $request)
    {
        $imageWithExt = $request->file('image')->getClientOriginalName();

        $getFilename = pathinfo($imageWithExt, PATHINFO_FILENAME);

        $getExtension = $request->file('image')->getClientOriginalExtension();

        $fileNameToStore = $getFilename. '_'. time().'.'.$getExtension;

        // Save the file locally in the storage/public/ folder under a new folder named /assets/img/posts
        $path = $request->file('image')->move('assets/img/posts', $fileNameToStore);

        $post = $this->createPost($request, $path);

        return $post;
    }

    private function createPost($request, $path)
    {
        Post::create([
            'title' => $request->title,
            'user_id' => Auth::id(),
            'img_url' => $path,
            'content' => $request->content
        ]);

        return $this;
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return true;
    }

}
