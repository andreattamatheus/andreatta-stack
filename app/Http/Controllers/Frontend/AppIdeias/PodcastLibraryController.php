<?php

namespace App\Http\Controllers\Frontend\AppIdeias;

use App\Http\Controllers\Controller;

class PodcastLibraryController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.podcast-library.index');
    }
}
