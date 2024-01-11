<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard for member.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() : View
    {
        return view('home');
    }

    /**
     * Show the application dashborad for admin
     *
     * @return View
     */
    public function adminHome() : View
    {
        return view('home');
    }
}
