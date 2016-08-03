<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class UsersController extends Controller
{
    public function update(Request $request)
    {
        $fileName = '';
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');

            $fileName = 'images/' . 'qwerty' . $file->getClientOriginalExtension();

            $file->move('images/', 'qwerty' . '.' . $file->getClientOriginalExtension());
            $result = \Cloudder::upload('images/' . 'qwerty' . '.' . $file->getClientOriginalExtension(), [], [], []);

            unlink('images/' . 'qwerty' . '.' . $file->getClientOriginalExtension());

            $res = \Cloudder::getResult();

            $request->user()->update([
                    'photo' => $res['url'],
                ]);
        }

        $request->user()->update([
        		'name' => $request->name,
        	]);

        return redirect('/home');
    }
}
