<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Message;

class MessagesController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function new_message(Request $request)
	{
		$rec_id = $request->id;
		return view('messages.new_message', [
				'rec_id' => $rec_id,
			]);
	}

    public function send(Request $request)
    {
    	/*
    	 *
    	 */

    	Message::create([
    			'user_id' => $request->user()->id,
    			'rec_id' => $request->rec_id,
    			'title' => $request->title,
    			'body' => $request->body,
    		]);

    	return redirect('/outcoming');
    }

    public function incoming(Request $request)
    {
    	$messages = $request->user()->incoming_messages();
    	return view('messages.incoming', [
    			'messages' => $messages,
    		]);
    }

    public function outcoming(Request $request)
    {
    	$messages = $request->user()->messages;
    	return view('messages.outcoming', [
    			'messages' => $messages,
    		]);
    }

    public function details(Request $request)
    {
    	$message = Message::find($request->id);
    	$message->read();

    	return view('messages.show', [
    			'message' => $message,
    		]);
    }
}
