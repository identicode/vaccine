<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Auth;
use Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	return view('settings.profile');
    }

    public function profile(Request $request)
    {
    	$name = $request->fname.'___'.$request->lname.'___'.$request->mname;

    	$update = User::find(Auth::user()->id);
    	$update->name = $name;
    	$update->save();

    	return redirect()->back()->with('success', 'Profile has bee updated.');
    }

    public function username(Request $request)
    {
    	// checking the username if exists
    	if(User::where('username', $request->username)->get()->count() != 0){
    		return redirect()->back()->with('error', 'Username is taken.');
    	}


    	$update = User::find(Auth::user()->id);
    	$update->username = $request->username;
    	$update->save();


    	return redirect()->back()->with('success', 'Username has bee updated.');
    }

    public function password(Request $request)
    {
    	// check if password match
    	if($request->newpass != $request->conpass){
    		return redirect()->back()->with('error', 'Password mismatch.');
    	}

    	// check if password is correct
    	if(Hash::check($request->oldpass, Auth::user()->password) == false){
    		return redirect()->back()->with('error', 'Wrong password.');
    	}

    	$update = User::find(Auth::user()->id);
    	$update->password = Hash::make($request->newpass);
    	$update->save();

    	return redirect()->back()->with('success', 'Password has bee updated.');
    }
}
