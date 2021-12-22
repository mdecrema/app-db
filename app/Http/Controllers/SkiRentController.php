<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rent;
use App\Ski;

class SkiRentController extends Controller
{
    public function index() 
    {
        return view('skiRent/skiRent');
    }

    public function skiBooking(Request $request)
    {
        $data = $request->all();

        $daysRange = $data['daysRange'];

        $request->validate([
            "dataInizio" => "required",
            "dataFine" => "required",
            "daysRange"=> "required",
            "type" => "nullable",
            "level" => "required",
        ]);

        $array = array();

        $begin = new \DateTime( $data['dataInizio'] );
        $end = new \DateTime( $data['dataFine'] );
        $end = $end->modify( '+1 day' );

        $interval = new \DateInterval('P1D');
        $daterange = new \DatePeriod($begin, $interval ,$end); 
        
        foreach($daterange as $date) {                 
            $array[] = $date->format('Y-m-d'); 
        }

        for ($i = 0; $i < $daysRange; $i++) {
            $newRent = new Rent;
            $newRent->user_id=1;
            $newRent->ski_id=2;
            
            $newRent->date=strtotime($array[$i]) * 1000;
            
            $newRent->save();
        }
        
        
        return view('skiRent/searchResults', compact('array'));
        
    }

    public function searchResults() {
        return view('skiRent/searchResults');
    }

    public function formSubmit(Request $request)
    {
        $allRents = Rent::all();
        $allSki = Ski::all();

        $data = $request->all();

        $daysRange = $data['daysRange'];

        $request->validate([
            "dataInizio" => "required",
            "dataFine" => "required",
            "daysRange"=> "required",
            "type" => "nullable",
            "level" => "required",
        ]);

        $datesArray = array();

        $begin = new \DateTime( $data['dataInizio'] );
        $end = new \DateTime( $data['dataFine'] );
        $end = $end->modify( '+1 day' );

        $interval = new \DateInterval('P1D');
        $daterange = new \DatePeriod($begin, $interval ,$end); 
        
        foreach($daterange as $date) {                 
            $datesArray[] = strtotime($date->format('Y-m-d')) * 1000; 
        }

        $skiNotAvailable = array();

        for ($i = 0; $i < count($datesArray); $i++) {
           for ($k = 0; $k < count($allRents); $k++) {
               if ($allRents[$k]->date === $datesArray[$i]) {
                array_push($skiNotAvailable, $allRents[$k]->ski_id);
               }
           }
        }

        $skiArray = array();

        if (count($skiNotAvailable)===0) {
            $skiArray = $allSki;
        } else {
            for ($i = 0; $i < count($allSki); $i++) {
                for ($k = 0; $k < count($skiNotAvailable); $k++) {
                    
                    if ($allSki[$i]->id!==$skiNotAvailable[$k]) {
                        if (!in_array($allSki[$i], $skiArray)) {
                            array_push($skiArray, $allSki[$i]);
                        }
                    }
                }
            }
        }

        return view('skiRent/searchResults', compact('skiArray'));

    }
}
