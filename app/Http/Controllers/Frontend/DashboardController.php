<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    /**
     * Display the profile index page.
     *
     * @return View
     */
    public function index()
    {
        $user = auth()->user();
        return view('pages.dashboard.index', compact('user'));
    }
}
