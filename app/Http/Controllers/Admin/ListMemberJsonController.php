<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ListMemberJsonController extends Controller
{
    public function index() : View
    {
        return view('admin.list-member.index', ['member' => json_decode(User::get(), true)]);
    }
}
