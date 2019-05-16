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
        $count['lost'] = Laf::where('date_found', null)->distinct('dog_id')->get()->count();
        $count['found'] = Laf::where('date_found', '!=', null)->distinct('dog_id')->get()->count();
    	return view('laf.index')
                ->with('lafs', $lafs)
                ->with('count', $count);
    }

    public function store(Request $request)
    {
    	Laf::create([
            'dog_id' => $request->dog_lost_id,
            'date_lost' => $request->lost,
            'date_report' => date('Y-m-d', time())
        ]);

        return redirect('/lost-and-found')->with('success', 'Dog has been marked as lost');
    }

    public function found($id)
    {
        $update = Laf::find($id);
        $update->date_found = date('Y-m-d', time());
        $update->save();

        return redirect()->back()->with('success', 'Report has been marked as found.');
    }
}
