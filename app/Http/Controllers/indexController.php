<?php

namespace App\Http\Controllers;

use App\Models\Index;
use App\Models\User;
use App\Services\GitHubIntegration;
use Illuminate\Http\Client\Request;

class indexController extends Controller
{
    private $index;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(Index $index)
    {
        $this->index = $index;
    }

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        try {
            $github = new GitHubIntegration();
            $user = $github->getUser();
            return view('home', compact('user'));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * update
     *
     * @param  mixed $request
     * @return void
     */
    public function update(Request $request)
    {
        try {
            $this->user->setUser(
                $request->name,
                $request->email
            );
            $this->user->save();
            return true;
        } catch (\Throwable $th) {
            return false;
        };

    }
}
