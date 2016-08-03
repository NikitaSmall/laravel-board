<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['title', 'body', 'user_id', 'rec_id'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function rec()
    {
    	return User::find($this->rec_id);
    }

    public function read()
    {
    	$this->new = 0;
    	$this->save();
    }
}
