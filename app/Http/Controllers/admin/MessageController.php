<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Message;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::all();
        return view('admin.message', compact('messages'));
    }
    public function destroy(Message $message){
        $message->delete();
        return redirect()->route('message.index')->with('message', 'Deleted successfully 🥳');
    }
}
