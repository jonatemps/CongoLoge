<?php

namespace App\Http\Controllers;

use App\Events\Messagesend;
use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    public function index(){
       return view('chat.index');
  }
}
