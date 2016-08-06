<?php

namespace App\Repositories;

use App\User;
use App\Message;

class MessageRepository
{
	public function __construct()
	{

	}

	public function incoming_messages(User $user)
	{
		return Message::where('rec_id', $user->id)->get();
	}

	public function outcoming_messages(User $user)
	{
		return Message::where('user_id', $user->id)->get();
	}
}