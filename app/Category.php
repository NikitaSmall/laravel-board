<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title', 'description'];

    public function services()
    {
    	return $this->hasMany(Service::class);
    }
}
