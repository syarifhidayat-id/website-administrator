<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Autentication
     */
    // public function __construct()
    // {
    //     $this->middleware('user-access');
    // }

    function dashUser() : View
    {
        return view('admin.dashboard.user', ['member' => User::get()->count()]);
    }

    /**
     * Return view dashboard admin
     *
     * @return View
     */
    public function dashAdmin() : View
    {
        return view('admin.dashboard.admin', ['member' => User::get()->count()]);
    }
}
