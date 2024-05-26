<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use Auth;

class UsersController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('role:admin');
	}

     public function edit()
    {
        return view('profile.edit');
    }

    public function update(Request $request)
    {
    	$this->validate($request, [
    		'name'=>'alpha|max:20',
    		'email'=>'max:20',
    		'password'=>'max:20'
    	]);
    	
    	Auth::user()->update([
    		'name'=>$request->input('name'),
    		'email'=>$request->input('email'),
    		'password'=>$request->input('password'),
    	]);

         \Flash::success('Profile has been updated');
        return redirect()->route('profile.edit');
    }
}
