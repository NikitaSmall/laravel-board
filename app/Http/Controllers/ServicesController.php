<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Service;
use App\Category;

class ServicesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'searchService', 'ajax']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return view('services.index', [
                'services' => $services,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('services.create', [
                'categories' => $categories,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        Validation
        */ 

        $fileName = '';
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');

            $fileName = 'images/' . 'qwertbd' . $file->getClientOriginalExtension();

            $file->move('images/', 'qwertbd' . '.' . $file->getClientOriginalExtension());
        }

        Service::create([
                'title' => $request->title,
                'user_id' => $request->user()->id,
                'description' => $request->description,
                'category_id' => $request->category_id,
                'photo' => $fileName
            ]);

        return redirect('/services');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Service::find($id);
        return view('services.show', [
                'service' => $service,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function searchService(Request $request)
    {
        $title = $request->title;
        $deep = $request->deep;

        $services = Service::search($title, $deep);        

        return $services;
    }

    public function ajax(Request $request)
    {
        $services = Service::all();
        return $services;
    }
}
