<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone',
        'contacts', 'birthday', 'address', 'photo', 'social_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function incoming_messages()
    {
        return Message::where('rec_id', $this->id)->get();
    }
}
