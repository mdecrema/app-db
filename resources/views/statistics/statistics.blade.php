@extends('layouts.app')

@section('page-title')

@endsection

@section('content')
<div class="container">
    <div class="row">
        <div style="margin-bottom: 20px">
            <a href="/admin/dashboard">
                <div class="back_btn" style="display: inline-block;">
                    <i class="fa fad fa-arrow-left"></i>
                </div>
            </a>
            <div style="display: inline-block; margin-left: 10px">
                <h4> Statistiche </h4>
            </div>
        </div>

        {{-- <div class="col-12">
            @foreach($users as $user)
            <div class="col-lg-6 col-xl-6 col-md-6 col-sm-12 col-xs-12 card">
                {{ $user->name }}
            </div>
            @endforeach
        </div> --}}
        <div class="col-12 p-2" style="background-color: rgb(227, 227, 227); border-radius: 5px">
            <div class="mt-3 mb-5 pl-3">
                <span style="font-size: 20px">Visualizzazioni pagine</span>
            </div>
            <div class="d-flex justify-content-around" style="height: 300px;">
                @foreach($viewStatsArr as $stat)
                <div style="width: 70px; height: 300px; background-color: lightgrey; box-shadow: 2px 2px 5px grey; position: relative; border-radius: 5px">
                    <div class="d-flex justify-content-center align-items-center" style="position: absolute; bottom: 0; left: 0; width: 100%; height: {{ $stat->viewPercentage }}%; background-color: #0AA09D">
                        <div class="center">
                            <span style="font-size: 20px; color: #fff">{{ $stat->viewCount }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="mt-3 d-flex justify-content-around">
                @foreach($viewStatsArr as $stat)
                <div class="">
                    {{ $stat->name }}
                </div>
                @endforeach
            </div>
        </div>


        <!-- products stats -->
        {{-- @foreach($productStats as $prodStat)
            <div class="d-flex justify-content-around" style="border: 1px solid blue">
                <div>
                    <span>{{ $prodStat->product_id }}</span>
                </div>
                <div>
                    <span>{{ $prodStat->productCount }}</span>
                </div>
            </div>
        @endforeach --}}
        

        <!-- Charts -->
        {{-- <input id="productStatArrJSON" value="{{ $productStatArr }}" class="d-none"> --}}
        <div class="col-12">
            <div class="mt-3 mb-5 pl-3">
                <span style="font-size: 20px">Articoli più visitati</span>
            </div>
            <div class="chart-container" style="position: relative; height: 300px; width: 300px; margin: auto">
                <canvas id="myChart" width="200px" height="200px"></canvas>
            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>

    const productStatArr = <?php echo json_encode($productStatArr); ?>;

    let datas = [];
    let labels = [];

    for(let i = 0; i < productStatArr.length; i++) {
        labels.push(productStatArr[i].id);
        datas.push(productStatArr[i].productCount);
    }

    console.log(productStatArr);
  
    const data = {
  labels: labels,
  datasets: [{
    label: 'My First Dataset',
    data: datas,
    backgroundColor: [
      '#183153',
      '#0a182a',
      '#0061EB'
    ],
    hoverOffset: 4
  }]
};
  
    const config = {
      type: 'pie',
      data: data,
      options: {}
    };

    const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
  </script>
@endsection

