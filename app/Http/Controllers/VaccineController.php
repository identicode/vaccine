<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Dog;
use App\Brgy;

class VaccineController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
        
    }

    public function non()
    {
    // 	return $dogs = Brgy::with(['dog' => function ($query) {
    // 				$query->orderBy('status', '2');
				// }])->get();

        return view('vaccine.non');


    }
}
