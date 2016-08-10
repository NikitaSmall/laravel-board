<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Message;

use App\Repositories\MessageRepository;

class MessagesController extends Controller
{
    protected $messageRepository;

	public function __construct()
	{
		$this->middleware('auth');
    $this->messageRepository = new MessageRepository();
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
    	$messages = $this->messageRepository->incoming_messages($request->user());
    	return view('messages.incoming', [
    			'messages' => $messages,
    		]);
    }

    public function outcoming(Request $request)
    {
    	$messages = $this->messageRepository->outcoming_messages($request->user());
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

    public function ajax(Request $request)
    {
        $messages = $this->messageRepository->incoming_messages($request->user());
        return $messages;
    }
}
