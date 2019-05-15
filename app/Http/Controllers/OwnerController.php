<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Owner;
use App\Dog;
use App\Purok;

class OwnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $puroks = Purok::all();
        $owners = Owner::all();
        return view('owner.index')
                ->with('puroks', $puroks)
                ->with('owners', $owners);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $address = explode('___', $request->address);

        Owner::create([
            'name' => $request->name,
            'cp' => $request->cp,
            'bday' => $request->bday,
            'purok_id' => $address[0],
            'brgy_id' => $address[1]
        ]);

        return redirect()->back()->with('success', 'Owner has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request)
    {
        $owner = Owner::find($request->edit_id);

        $address = explode('___', $request->edit_address);

        $owner->name = $request->edit_name;
        $owner->cp = $request->edit_cp;
        $owner->bday = $request->edit_bday;
        $owner->purok_id = $address[0];
        $owner->brgy_id = $address[1];
        $owner->save();

        return redirect()->back()->with('success', 'Owner information has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Owner::find($id)->delete();
        Dog::where('owner_id', $id)->delete();

        return redirect()->back()->with('success', 'Owner has been deleted.');
    }
}
