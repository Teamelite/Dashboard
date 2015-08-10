<?php

namespace App\Http\Controllers\Page;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{

    /**
     * Show the homepage.
     *
     * @return \Illuminate\View\View
     */
    public function showHome()
    {
        return view('pages.home');
    }

    /**
     * Show the about pages.
     *
     * @return \Illuminate\View\View
     */
    public function showAbout()
    {
        return view('pages.about');
    }

}
