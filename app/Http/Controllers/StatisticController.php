<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Statistic;

class ViewStats {
    public $name;
    public $viewCount;
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
        $stats = Statistic::all()->where('view', true);

        $viewStatsArr = [];

        $teesView = Statistic::all()->where('view', true)->where('view_name', 't-shirt');
        $hoodiesView = Statistic::all()->where('view', true)->where('view_name', 'hoodies');
        $pantsView = Statistic::all()->where('view', true)->where('view_name', 'pants');
        $shoesView = Statistic::all()->where('view', true)->where('view_name', 'shoes');

        $teesViewCount = count($teesView);
        $hoodiesViewCount = count($hoodiesView);
        $pantsViewCount = count($pantsView);
        $shoesViewCount = count($shoesView);

        $totalViewCount = $teesViewCount + $hoodiesViewCount + $pantsViewCount + $shoesViewCount;

        $tee = new ViewStats();
        $tee->name = 't-shirt';
        $tee->viewCount = $teesViewCount;
        $tee->viewPercentage = ($teesViewCount / $totalViewCount) * 100;
        array_push($viewStatsArr, $tee);

        $hoodie = new ViewStats();
        $hoodie->name = 'hoodies';
        $hoodie->viewCount = $hoodiesViewCount;
        $hoodie->viewPercentage = ($hoodiesViewCount / $totalViewCount) * 100;
        array_push($viewStatsArr, $hoodie);

        $pant = new ViewStats();
        $pant->name = 'pants';
        $pant->viewCount = $pantsViewCount;
        $pant->viewPercentage = ($pantsViewCount / $totalViewCount) * 100;
        array_push($viewStatsArr, $pant);

        $shoe = new ViewStats();
        $shoe->name = 'shoes';
        $shoe->viewCount = $shoesViewCount;
        $shoe->viewPercentage = ($shoesViewCount / $totalViewCount) * 100;
        array_push($viewStatsArr, $shoe);

        return view('statistics/statistics', compact(
            'stats',
            'viewStatsArr',
            'teesView',
            'hoodiesView',
            'pantsView',
            'shoesView',
            'teesViewCount',
            'hoodiesViewCount',
            'pantsViewCount',
            'shoesViewCount'
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
