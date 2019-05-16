<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Brgy;
use App\Purok;

use App\Dog;
use App\Owner;

class SiteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        if($id == 0){

            $puroks = Purok::all();
            $brgys = Brgy::all();
            $owners = Owner::all();
            $dogs = Dog::with('purok', 'brgy')->where('status', 1)->get();

            return view('site.vacc.index')
                    ->with('dogs', $dogs)
                    ->with('owners', $owners)
                    ->with('brgys', $brgys)
                    ->with('puroks', $puroks);

        }else{
            
            $puroks = Purok::where('brgy_id', $id)->get();
            $brgy = Brgy::with('purok')->where('id', $id)->get()->first();
            $dogs = Dog::with('purok', 'brgy')->where('brgy_id', $id)->where('status', 1)->get();
            $owners = Owner::with('purok', 'brgy')->where('brgy_id', $id)->get();
            $brgys = Brgy::all();
            return view('site.vacc.brgy')
                    ->with('bid', $id)
                    ->with('dogs', $dogs)
                    ->with('brgys', $brgys)
                    ->with('owners', $owners)
                    ->with('puroks', $puroks)
                    ->with('brgy', $brgy);
        }
    	
    }

    public function brgy($id)
    {
        $puroks = Purok::where('brgy_id', $id)->get();
        $brgy = Brgy::with('purok')->where('id', $id)->get()->first();
        $dogs = Dog::with('purok', 'brgy')
                    ->withCount(['lost' => function($query){
                        $query->where('date_found', null);
                    }])
                    ->where('brgy_id', $id)
                    ->get();
        $owners = Owner::with('purok', 'brgy')->where('brgy_id', $id)->get();
        $brgys = Brgy::all();
        return view('site.brgy')
                ->with('bid', $id)
                ->with('dogs', $dogs)
                ->with('brgys', $brgys)
                ->with('owners', $owners)
                ->with('puroks', $puroks)
                ->with('brgy', $brgy);
    }

    public function non($id)
    {
        if($id == 0){

            $puroks = Purok::all();
            $brgys = Brgy::all();
            $owners = Owner::all();
            $dogs = Dog::with('purok', 'brgy')->where('status', 2)->get();

            return view('site.nvacc.index')
                    ->with('dogs', $dogs)
                    ->with('owners', $owners)
                    ->with('brgys', $brgys)
                    ->with('puroks', $puroks);

        }else{
            
            $puroks = Purok::where('brgy_id', $id)->get();
            $brgy = Brgy::with('purok')->where('id', $id)->get()->first();
            $dogs = Dog::with('purok', 'brgy')->where('brgy_id', $id)->where('status', 2)->get();
            $owners = Owner::with('purok', 'brgy')->where('brgy_id', $id)->get();
            $brgys = Brgy::all();
            return view('site.nvacc.brgy')
                    ->with('bid', $id)
                    ->with('dogs', $dogs)
                    ->with('brgys', $brgys)
                    ->with('owners', $owners)
                    ->with('puroks', $puroks)
                    ->with('brgy', $brgy);
        }
    }

    public function store(Request $request)
    {
        if($request->image != ''){
            //Image Decoding
            $image = $request->image;
            $image = str_replace('data:image/jpeg;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageName = time().mt_rand().".jpg";
            $destination = public_path()."/img/dogs/".$imageName;
            $actualImage = base64_decode($image);
            $move = file_put_contents($destination, $actualImage);
        }else{
            $imageName = 'default.png';
        }

        $owner = Owner::find($request->owner);

    	Dog::create([
    		'name' => $request->name,
    		'breed' => $request->breed,
    		'age' => $request->age,
    		'gender' => $request->gender,
            'status' => $request->status,
    		'vaccinated_by' => $request->vaccby,
            'owner_id' => $owner->id,
            'purok_id' => $owner->purok_id,
            'brgy_id' => $owner->brgy_id,
            'color' => $request->color,
            'img' => $imageName
    	]);

    	return redirect()->back()->with('success', 'Profile has been added.');
    }

    public function destroy($id)
    {
        Dog::find($id)->delete();

        return redirect()->back()->with('success', 'Dog profile has been deleted.');
    }

    public function edit($id)
    {
        $dog = Dog::find($id);

        $owners = Owner::all();


        return view('site.edit')
                ->with('dog', $dog)
                ->with('owners', $owners);
    }

    public function update(Request $request)
    {
        $dog = Dog::find($request->did);

        $owner = Owner::find($request->owner);


        if($request->image != ''){

            //Image Decoding
            $image = $request->image;
            $image = str_replace('data:image/jpeg;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageName = time().mt_rand().".jpg";
            $destination = public_path()."/img/dogs/".$imageName;
            $actualImage = base64_decode($image);
            $move = file_put_contents($destination, $actualImage);

            $dog->img = $imageName;
        }

        $dog->name = $request->name;
        $dog->breed = $request->breed;
        $dog->age = $request->age;
        $dog->color = $request->color;
        $dog->vaccinated_by = $request->vaccby;
        $dog->status = $request->status;
        $dog->owner_id = $owner->id;
        $dog->purok_id = $owner->purok_id;
        $dog->brgy_id = $owner->brgy_id;
        $dog->save();

        return redirect('/site/brgy/'.$dog->brgy_id)->with('success', 'Dog profile has been updated.');
        
    }
}
