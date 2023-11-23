<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class portfolioController extends Controller
{
    public function index()
    {
        return view('portfolio.index');
    }

    public function show()
    {
        return view('portfolio.index');
    }
}
