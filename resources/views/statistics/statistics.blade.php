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

        <div class="col-12 p-2">
            <div class="mt-3 mb-5">
                <span style="font-size: 20px">
                    Visualizzazioni pagine
                </span>
                <p style="font-size: 14px">
                    Numero totale di visite per singola pagina effettuate dagli utenti.
                    Il grafico mostra la percentuale di ogni pagina rispetto al totale delle visite.
                </p>
            </div>
            <!-- <div class="d-flex justify-content-around" style="height: 300px;">
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
            </div> -->
            <div class="chart-container" style="position: relative; min-height: 400px; width: 100%; margin: auto">
                <canvas id="view_chart" width="200px" height="200px"></canvas>
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
        <div class="col-12">
            <div class="mt-3 mb-5">
                <span style="font-size: 20px">
                    Articoli più visitati
                </span>
                <p style="font-size: 14px">
                    Numero totale di visite per singolo articolo effettuate dagli utenti
                </p>
            </div>
            <div class="chart-container" style="position: relative; min-height: 300px; width: 100%; margin: auto">
                <canvas id="product_chart" width="200px" height="200px"></canvas>
            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>

    const productStatArr = <?php echo json_encode($productStatArr); ?>;

    let productData = [];
    let productLabel = [];

    for(let i = 0; i < productStatArr.length; i++) {
        productLabel.push(productStatArr[i].id);
        productData.push(productStatArr[i].productCount);
    }

    console.log(productStatArr);
  
    const productChartData = {
        labels: productLabel,
        datasets: [{
        label: 'My First Dataset',
        data: productData,
        backgroundColor: [
            '#183153',
            '#13468f',
            '#446695',
            '#2a61af'
        ],
        hoverOffset: 4
        }]
    };
  
    const productChartConfig = {
      type: 'bar',
      data: productChartData,
      options: {}
    };

    const product_chart = new Chart(
    document.getElementById('product_chart'),
    productChartConfig
    );


    // View Chart
    const viewStatsArr = <?php echo json_encode($viewStatsArr); ?>;
  
    console.log(viewStatsArr);

    let viewData = [];
    let viewLabel = [];

    for(let i = 0; i < viewStatsArr.length; i++) {
        viewLabel.push(viewStatsArr[i].name);
        viewData.push(viewStatsArr[i].viewCount);
    }

    const viewChartdata = {
        labels: viewLabel,
        datasets: [{
        label: 'Visualizzazioni per singola pagina',
        data: viewData,
        backgroundColor: [
            '#0AA09D',
        ],
        hoverOffset: 4
        }]
    };
  
    const viewChartConfig = {
      type: 'pie',
      data: viewChartdata,
      options: {}
    };

    const view_chart = new Chart(
    document.getElementById('view_chart'),
    viewChartConfig
  );

  </script>
@endsection

