<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
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
        $github = new GitHubIntegration();
        $user = $github->getUser();
        return view('home', compact('user'));
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
