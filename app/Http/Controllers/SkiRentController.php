<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SkiRentController extends Controller
{
    public function index() 
    {
        return view('skiRent/skiRent');
    }

    public function formSubmit(Request $request)
    {
        $data = $request->all();

        $request->validate([
            "date" => "required",
            "type" => "nullable",
            "level" => "required",
        ]);
        
        
        return redirect()->route("skiRentForm");
        
    }
}
