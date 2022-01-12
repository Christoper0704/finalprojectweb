<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Database;

class InputController extends Controller
{

    public function _construct(Database $database)
    {
        $this->database = $database;
    }

    public function index(){
        return view('inputdata');
    }

    public function create(){
        return view('inputdata');
    }

    public function store(Request $request){
        $ref = app('firebase.firestore')->database()->collection('restaurant_data')->newDocument();
        $ref->set([
            'rid' => 2, 
            'restoimg' => 'A.png',
            'restoname' => $request->restaurant_name,
            'opday' => $request->operational_day,
            'optime' => $request->operational_time,
            'restotype' => $request->restaurant_type,
            'restolocation' => $request->restaurant_location,
        ]);
        if($ref)
        {
            return redirect('/profilerestaurant')->with('status','Data Added Successfully');
        }
        else{
            return redirect('/inputdata')->with('status','Data Not Added');
        }
    }
}
