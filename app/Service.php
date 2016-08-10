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

    public static function search($title, $deep)
    {
        if ($deep) {
            return Service::where('title', 'LIKE', '%' . $title . '%')->orWhere('description', 'LIKE', '%' . $title . '%')->get();
        }

        if($user){

        }

        return Service::where('title', 'LIKE', '%' . $title . '%')->get();
    }

    public static function incViews($id){
        Service::where('id', $id)->increment('views', 1);
    }

}
