<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
    	'user_id', 'category_id', 'title',
    	'description', 'status', 'rank', 'views', 'photo'
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function incViews(){
        $this->increment('views', 1);
        $this->save();
    }

}
