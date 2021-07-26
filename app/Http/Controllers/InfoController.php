<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function about(){
        return view('userLayouts.about');
    }

    public function contact(){
        return view('userLayouts.contact');
    }
}
