<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class AboutController extends Controller
{
    public function index(){
        return view('userLayouts.about');
    }
}
