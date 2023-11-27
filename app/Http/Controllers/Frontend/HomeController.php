<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Index;
use App\Models\User;
use App\Services\GitHubIntegration;
use Illuminate\Http\Client\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

}