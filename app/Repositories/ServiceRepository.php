<?php

namespace App\Repositories;

use App\Service;

class ServiceRepository
{

	public function __construct(){

	}

  /*
     	Rerurn list of n or all last services
  */

  public function getLastServices($countServices = NULL){
      return ($countServices) ? Service::orderBy('created_at','decs')->take($countServices)->get() : Service::orderBy('created_at','decs')->get();
  }

  /*
      Return list of services by user
   */

   public function getServicesByUser($id){
 	 		return Service::where('user_id', $id)->get();
   }
	 
}
