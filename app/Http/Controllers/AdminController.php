<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function admin() {
        return redirect()->route('admin.login');
    }

    public function login() {
        return view('adminLayouts.login');
    }

    public function dashboard() {
        return view('adminLayouts.dashboard');
    }
}
