<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserService
{
    public function update(Request $request)
    {
        $imageWithExt = $request->file('image')->getClientOriginalName();
        $getFilename = pathinfo($imageWithExt, PATHINFO_FILENAME);
        $getExtension = $request->file('image')->getClientOriginalExtension();
        $fileNameToStore = $getFilename . '_' . time() . '.' . $getExtension;
        $path = $request->file('image')->move('assets/img/posts', $fileNameToStore);
        $user = $this->updateUser($request, $path);
        return $user;
    }

    private function updateUser($request, $path)
    {
        $user = User::find($request->id)->get();
        $user = new User();

        dd($user);
        dd($user->getName());

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'img_url' => $path
        ]);
        return $this;
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return true;
    }
}
