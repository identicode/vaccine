<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Brgy;
use App\Dog;
use App\Purok;

class BrgyController extends Controller
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
        $brgys = Brgy::with('purok')->get();
        return view('settings.brgy')
                ->with('brgys', $brgys);
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
        Brgy::create([
            'name' => $request->name
        ]);

        return redirect()->back()->with('success', 'Baranggay has been added.');
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
        $brgy = Brgy::find($request->bid);
        $brgy->name = $request->name;
        $brgy->save();

        return redirect()->back()->with('success', 'Baranggay has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Brgy::find($id)->delete();
        Dog::where('brgy_id', $id)->delete();
        Purok::where('brgy_id', $id)->delete();

        return redirect()->back()->with('success', 'Baranggay has been deleted.');
    }
}
