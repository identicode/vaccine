<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Brgy;
use App\Purok;
use App\Dog;

class PurokController extends Controller
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
        $brgys = Brgy::all();
        $puroks = Purok::all();
        return view('settings.purok')
                ->with('puroks', $puroks)
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
        Purok::create([
            'name' => $request->name,
            'brgy_id' => $request->brgy
        ]);

        return redirect()->back()->with('success', 'Purok has been added.');
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
        $purok = Purok::find($request->pid);
        $purok->name = $request->name;
        $purok->save();

        return redirect()->back()->with('success', 'Purok has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Purok::find($id)->delete();
        Dog::where('purok_id', $id)->delete();

        return redirect()->back()->with('success', 'Purok has been deleted.');
    }
}
