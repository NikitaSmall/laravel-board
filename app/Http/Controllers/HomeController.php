<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Api\OpenWeather;
use App\Service;
use App\Repositories\ServiceRepository;

class HomeController extends Controller
{
    protected $serviceRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        $this->serviceRepository = new serviceRepository();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lastServices = $this->serviceRepository->getLastServices('7');
        return view('welcome', [
                'services' => $lastServices,
            ]);
    }

    public function home(){
        $weatherClient = new OpenWeather('Odessa');
        return view('home', [
                'weather' => $weatherClient,
            ]);
    }
}
