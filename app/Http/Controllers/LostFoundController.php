<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Laf;

class LostFoundController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $lafs = Laf::all();
    	return view('laf.index')->with('lafs', $lafs);
    }

    public function store(Request $request)
    {
    	


        //Image Decoding
        $image = $request->image;
        $image = str_replace('data:image/jpeg;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageName = time().mt_rand().".jpg";
        $destination = public_path()."/img/losts/".$imageName;
        $actualImage = base64_decode($image);
        $move = file_put_contents($destination, $actualImage);



    	Laf::create([
    		'owner' => $request->owner,
    		'cp' => $request->cp,
    		'dog' => $request->dog,
    		'breed' => $request->breed,
    		'lost' => $request->lost,
    		'image' => $imageName
    	]);

    	return redirect()->back()->with('success', 'Lost profile has been added.');
    }
}
