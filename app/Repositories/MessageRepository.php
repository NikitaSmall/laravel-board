<?php

namespace App\Repositories;

use App\User;
use DB;
use App\Message;

class MessageRepository
{
	public function __construct()
	{

	}

	public function incoming_messages(User $user)
	{
		return Message::join('users', 'messages.rec_id', '=', 'users.id')
							->select('messages.id','messages.title', 'messages.new','messages.created_at','users.id as user_id','users.name')
							->orderBy('created_at','decs')
							->where('rec_id', $user->id)
							->get();
	}

	public function outcoming_messages(User $user)
	{
		return Message::join('users', 'messages.rec_id', '=', 'users.id')
							->select('messages.id','messages.title', 'messages.new','messages.created_at','users.id as user_id','users.name')
							->orderBy('created_at','decs')
							->where('user_id', $user->id)
							->get();
	}
}
