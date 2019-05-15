<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Brgy;
use App\Dog;
use App\Owner;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
    }

    public function index()
    {
        $brgys = Brgy::with('dog')->get();
        $count['dog'] = Dog::get()->count();
        $count['vac'] = Dog::where('status', '1')->get()->count();
        $count['non'] = Dog::where('status', '2')->get()->count();
    	return view('reports.summary')
                ->with('count', $count)
                ->with('brgys', $brgys);
    }

    public function vacc($id)
    {
        if($id == 0){
            $brgys = Brgy::all();
            $owners = Owner::with(['dog' => function($query){
                $query->where('status', '1');
            }], 'brgy', 'purok')->get();
            return view('reports.vacc-all')
                    ->with('brgys', $brgys)
                    ->with('owners', $owners);
        }else{

            $brgys = Brgy::all();
            $brgyI = Brgy::find($id);

            $owners = Owner::with(['dog' => function($query){
                            $query->where('status', '1');
                            }], 'purok')
                        ->where('brgy_id', $id)
                        ->orderBy('purok_id', 'asc')
                        ->get();

            return view('reports.vacc-brgy')
                    ->with('brgyI', $brgyI)
                    ->with('brgys', $brgys)
                    ->with('owners', $owners);

        }
    }

    public function nvacc($id)
    {
        if($id == 0){
            $brgys = Brgy::all();
            $owners = Owner::with(['dog' => function($query){
                $query->where('status', '2');
            }], 'brgy', 'purok')->get();
            return view('reports.nvacc-all')
                    ->with('brgys', $brgys)
                    ->with('owners', $owners);
        }else{

            $brgys = Brgy::all();
            $brgyI = Brgy::find($id);

            $owners = Owner::with(['dog' => function($query){
                            $query->where('status', '2');
                            }], 'purok')
                        ->where('brgy_id', $id)
                        ->orderBy('purok_id', 'asc')
                        ->get();

            return view('reports.nvacc-brgy')
                    ->with('brgyI', $brgyI)
                    ->with('brgys', $brgys)
                    ->with('owners', $owners);

        }
    }

    public function form($id)
    {
        $brgy = Brgy::find($id);

        $dogs = Dog::with('owner')
                    ->where('status', 1)
                    ->where('brgy_id', $id)
                    ->orderBy('owner_id', 'asc')
                    ->get();

        return view('reports.form')
                ->with('brgy', $brgy)
                ->with('dogs', $dogs);
    }


    
}
