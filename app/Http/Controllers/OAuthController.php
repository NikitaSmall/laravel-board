<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

class OAuthController extends Controller
{
    public function loginWithGoogle(Request $request)
	{
	    // get data from request
	    $code = $request->get('code');

	    // get google service
	    $googleService = \OAuth::consumer('Google');

	    // check if code is valid

	    // if code is provided get user data and sign in
	    if (!is_null($code))
	    {
	        // This was a callback request from google, get the token
	        $token = $googleService->requestAccessToken($code);

	        // Send a request with it
	        $result = json_decode($googleService->request('https://www.googleapis.com/oauth2/v1/userinfo'), true);

	        $this->loginUser($result);

	        return redirect('/home');
	    }
	    // if not ask for permission first
	    else
	    {
	        // get googleService authorization
	        $url = $googleService->getAuthorizationUri();

	        // return to google login url
	        return redirect((string)$url);
	    }
	}

	protected function loginUser($data)
	{
		if (User::where('social_id', $data['id'])->count() == 0) {
			User::create([
					'name' => $data['name'],
		            'email' => $data['email'],
		            'photo' => $data['picture'],
		            'password' => bcrypt($data['id']),
		            'social_id' => $data['id'],
				]);
		}

		\Auth::login(User::where('social_id', $data['id'])->first());
	}
}
