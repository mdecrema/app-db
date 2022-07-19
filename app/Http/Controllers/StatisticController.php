<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Statistic;
use Illuminate\Support\Facades\DB;

class ViewStats {
    public $name;
    public $viewCount;
    public $viewPercentage;
}

class ProductStats {
    public $id;
    public $name;
    public $productCount;
    public $viewPercentage;
}

class StatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $viewStatsArr = [];

        $teesView = Statistic::all()->where('view', true)->where('view_name', 't-shirt');
        $hoodiesView = Statistic::all()->where('view', true)->where('view_name', 'hoodies');
        $pantsView = Statistic::all()->where('view', true)->where('view_name', 'pants');
        $shoesView = Statistic::all()->where('view', true)->where('view_name', 'shoes');

        // Products stats
        $productStats = Statistic::all()->where('product', true);        
        $productStatArr = [];
        $products_id_arr = [];

        //dd( count($productStats));

        for ($i = 0; $i < count($productStats); $i++) {
            // ${"productStatObj_" . $i} = new ProductStats();
            // ${"productStatObj_" . $i}->id = $productStat_ids[$i];
            if (isset($productStats[$i])) {
                array_push($products_id_arr, $productStats[$i]->product_id);
                array_unique($products_id_arr);
            }
        }

        for ($i = 0; $i < count($products_id_arr); $i++) {
            $query = 'SELECT COUNT(id) AS id FROM `statistics` WHERE product=1 AND product_id='.$products_id_arr[$i].'';
            $execute = DB::select($query);
            // ${"product_" . $i} = count(Statistic::all()->where('product', true)->where('product_id', $products_id_arr[$i]));
            // ${"productStatObj_" . $i} = new ProductStats();
            // ${"productStatObj_" . $i}->id = $productStat_ids[$i];
            //if (isset($productStats[$i])) {
                ${"product_" . $i} = new ProductStats();
                ${"product_" . $i}->id = $products_id_arr[$i];
                ${"product_" . $i}->productCount = $execute[0]->id;
                array_push($productStatArr, ${"product_" . $i} );
            //}
            //dd($productStatArr);
        }

        //dd($productStatArr);

    //    dd($productStats);
    //     dd(count($productStats));

        // for ($i = 0; $i < 200000; $i++) {
        //     if(isset($productStats[$i])) {
        //         array_push($productStat_ids, $productStats[$i]->product_id);
        //     }                
        // }

        // $productStat_ids = array_unique($productStat_ids);

        // for ($i = 0; $i < count($productStat_ids); $i++) {
        //     ${"productStatObj_" . $i} = new ProductStats();
        //     ${"productStatObj_" . $i}->id = $productStat_ids[$i];
        //     // dd($productStats);
        //     for ($k = 0; $k <= count($productStats); $k++) {
        //         if (isset($productStats[$k])) {
        //             ${"productStatObj_" . $i}->productCount += 1;

        //         }
        //     }
        //     array_push($productStatArr, ${"productStatObj_" . $i});
        // }

        // dd($productStatArr);
        // dd($productStat_ids);


        $teesViewCount = count($teesView);
        $hoodiesViewCount = count($hoodiesView);
        $pantsViewCount = count($pantsView);
        $shoesViewCount = count($shoesView);

        $totalViewCount = $teesViewCount + $hoodiesViewCount + $pantsViewCount + $shoesViewCount;

        $tee = new ViewStats();
        $tee->name = 't-shirt';
        $tee->viewCount = $teesViewCount;
        if ($teesViewCount > 0) {
            $tee->viewPercentage = ($teesViewCount / $totalViewCount) * 100;
        } else {
            $tee->viewPercentage = 0;
        }
        array_push($viewStatsArr, $tee);

        $hoodie = new ViewStats();
        $hoodie->name = 'hoodies';
        $hoodie->viewCount = $hoodiesViewCount;
        if ($hoodiesViewCount > 0) {
            $hoodie->viewPercentage = ($hoodiesViewCount / $totalViewCount) * 100;
        } else {
            $tee->viewPercentage = 0;
        }
        array_push($viewStatsArr, $hoodie);

        $pant = new ViewStats();
        $pant->name = 'pants';
        $pant->viewCount = $pantsViewCount;
        if ($pantsViewCount > 0) {
            $pant->viewPercentage = ($pantsViewCount / $totalViewCount) * 100;
        } else {
            $tee->viewPercentage = 0;
        }
        array_push($viewStatsArr, $pant);

        $shoe = new ViewStats();
        $shoe->name = 'shoes';
        $shoe->viewCount = $shoesViewCount;
        if ($shoesViewCount > 0) {
            $shoe->viewPercentage = ($shoesViewCount / $totalViewCount) * 100;
        } else {
            $tee->viewPercentage = 0;
        }
        array_push($viewStatsArr, $shoe);

        return view('statistics/statistics', compact(
            'viewStatsArr',
            'teesView',
            'hoodiesView',
            'pantsView',
            'shoesView',
            'teesViewCount',
            'hoodiesViewCount',
            'pantsViewCount',
            'shoesViewCount',
            'productStatArr'
            )
        );
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
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
