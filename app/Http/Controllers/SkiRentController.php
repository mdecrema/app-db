<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Rent;
use App\Ski;

class SkiRentController extends Controller
{
    public function index() 
    {
        return view('skiRent/skiRent');
    }

    public function rentEquipment(Request $request)
    {
        $data = $request->all();

        $daysRange = $data['daysRange'];

        $request->validate([
            "ski_id" => "required",
            "dataInizio" => "required",
            "dataFine" => "required",
            "daysRange"=> "required",
            "type" => "nullable",
            "level" => "nullable",
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
            $newRent->user_id=1; // da MODIFICARE CORRETTAMENTE
            $newRent->ski_id=$data['ski_id'];
            
            $newRent->date=strtotime($array[$i]) * 1000;
            
            $newRent->save();
        }
        
        $products = Product::all();
        return view('homePage', compact('products'));
        
    }

    public function searchResults() {
        return view('skiRent/searchResults');
    }

    public function formSubmit(Request $request)
    {
        $allRents = Rent::all();
        $allSkiUntouched = Ski::all();
        $allSki = Ski::all();
        $skiNotAvailable;

        $data = $request->all();

        $daysRange = $data['daysRange'];
        $dataInizio = $data['dataInizio'];
        $dataFine = $data['dataFine'];
        $height = $data['height'];

        $request->validate([
            "dataInizio" => "required",
            "dataFine" => "required",
            "daysRange"=> "required",
            "height" => "required",
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

        $allSki = json_decode(json_encode($allSki), true);

        for ($i = 0; $i < count($datesArray); $i++) {
            for ($k = 0; $k < count($allRents); $k++) {
                if ($allRents[$k]->date === $datesArray[$i]) {
                    if (!in_array($allRents[$k]->ski_id, $skiNotAvailable)) {
                        array_push($skiNotAvailable, $allRents[$k]->ski_id);
                    }
               }
           }
        }
        $skiNotAvailable = json_decode(json_encode($skiNotAvailable), true);

        $skiArray = array();
        //$skiArray = (object)$skiArray;
        //dd($skiNotAvailable);
        if (count($skiNotAvailable)!==0) {
            for ($k = 0; $k<= count($skiNotAvailable); $k++) {
                for ($y = 0; $y < count($allSkiUntouched)+1; $y++) {
                    if (!isset($allSkiUntouched[$y]['id']) || !isset($skiNotAvailable[$k])) {
                        // Per evitare di incappare in 'Undefined Offset' errors
                    } else if ($allSkiUntouched[$y]['id']===$skiNotAvailable[$k]) {
                        // Ogni volta che gli Id coincidono, rimuovo l'item dalla lista
                        unset($allSki[$y]);
                    }
                }
            }

            $allSki = json_decode(json_encode($allSki), true);

            $skiArray = $allSki;
                
        } else {
            $skiArray = $allSki;
        }

        // filtro per altezza
        for ($t = 0; $t< count($skiArray); $t++) {
            /*if (!isset($skiArray[$t])) {
                // Per evitare di incappare in 'Undefined Offset' errors
            }*/
          
            if ($skiArray[$t]['length'] > $data['height']-5 || $skiArray[$t]['length'] < $data['height']-20) {
                
                unset($skiArray[$t]);
            }
        }

        //dd($skiArray);

        $principiante = array();
        $pack_beginner = false;
        $intermedio = array();
        $pack_intermediate = false;
        $esperto = array();
        $pack_advanced = false;

        for($y = 0; $y< count($skiArray); $y++) {
            if (!isset($skiArray[$y])) {
                // Per evitare di incappare in 'Undefined Offset' errors
            }
            else if ($skiArray[$y]['level']==='Principiante') {
                array_push($principiante, $skiArray[$y]);
            } else if ($skiArray[$y]['level']==='Intermedio') {
                array_push($intermedio, $skiArray[$y]);
            } else if ($skiArray[$y]['level']==='Esperto') {
                array_push($esperto, $skiArray[$y]);
            }
        }

        if (count($principiante)!==0) {
            $pack_beginner = true;
        }

        if (count($intermedio)!==0) {
            $pack_intermediate = true;
        }

        if (count($esperto)!==0) {
            $pack_advanced = true;
        }


        $skiArray = array_unique($skiArray, SORT_REGULAR);

        //dd($skiArray);        

        return view('skiRent/searchResults', compact('skiArray', 'pack_beginner', 'pack_intermediate', 'pack_advanced', 'height', 'dataInizio', 'dataFine', 'daysRange'));

    }

    function compare_objects($obj_a, $obj_b) {
        return $obj_a->id - $obj_b->id;
      }
}
