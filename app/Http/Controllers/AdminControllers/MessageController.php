<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware("auth");
    }
    
    public function index()
    {
        $messages = Message::orderBy('id', 'desc')->get();
        return view('adminLayouts.messages', compact('messages'));
    }

    public function destroy($id){
        $message = Message::find($id);
        $messageCountBeforeDelete = Message::count();
        $message->delete();
        $messageCountAfterDelete = Message::count();
        if ($messageCountAfterDelete < $messageCountBeforeDelete) {
            return redirect()->back();
        }else {
            abort(404);
        }
        
    }
}
