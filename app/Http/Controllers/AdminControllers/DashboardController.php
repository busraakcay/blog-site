<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware("auth");
    }
    
    public function index() {
        return view('adminLayouts.dashboard');
    }
}
