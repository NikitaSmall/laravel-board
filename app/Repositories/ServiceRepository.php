<?php

namespace App\Repositories;

use DB;
use App\Service;

class ServiceRepository
{

	public function __construct()
	{

	}

  /*
     	Rerurn list of n or all last services
  */

 	public function getLastServices($countServices = NULL)
 	{
 		if($countServices){
 			return DB::table('services')
 			->join('users', 'services.user_id', '=', 'users.id')
 			->select('services.id', 'services.title', 'services.created_at', 'users.id as user_id', 'users.name')
 			->take($countServices)
 			->orderBy('created_at','decs')
 			->where('status', '1')
 			->get();
 		}
 		else{
 			return DB::table('services')
 			->join('users', 'services.user_id', '=', 'users.id')
 			->select('services.id', 'services.title', 'services.created_at', 'users.id as user_id', 'users.name')
 			->orderBy('created_at','decs')
 			->where('status', '1')
 			->get();
 		}
  //return ($countServices) ? Service::orderBy('created_at','decs')->take($countServices)->get() : Service::orderBy('created_at','decs')->get();
 	}

	/*
				Return 10 top services
	*/

	public function getTopServices($countServices = NULL)
	{
		if($countServices) {
			return Service::take($countServices)->orderBy('views', 'desc')->get();
		} else {
			return Service::orderBy('views', 'desc')->get();
		}
	}

  /*
      Return list of services by user
   */

    public function getServicesByUser($id)
    {
    	return Service::where('user_id', $id)->get();
    }

    public function search($title, $deep)
    {
        if ($deep) {
            return Service::where('title', 'LIKE', '%' . $title . '%')->orWhere('description', 'LIKE', '%' . $title . '%')->get();
        }

        return Service::where('title', 'LIKE', '%' . $title . '%')->get();
    }
  }
