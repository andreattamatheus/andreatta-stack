<?php

namespace App\Http\Controllers\Frontend\AppIdeias;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UrlShortenerController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.url-shortener.index');
    }
}
