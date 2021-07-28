<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Message;

class ContactController extends Controller
{
    public function index(){
        return view('userLayouts.contactLayouts.index');
    }

    public function store(Request $request){
        $message = new Message;
        $message->name = $request->input('name');
        $message->email = $request->input('email');
        $message->message = $request->input('message');
        $message->save();
        return redirect()->route('contact');
    }
}
