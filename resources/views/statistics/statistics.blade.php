@extends('layouts.app')

@section('page-title')

@endsection

@section('content')
<div class="container">
    <div class="row">
        <div style="margin-bottom: 20px; position: sticky; top: 0;">
            <a href="/admin/dashboard">
                <div class="back_btn" style="display: inline-block;">
                    <i class="fa fad fa-arrow-left"></i>
                </div>
            </a>
            <div style="display: inline-block; margin-left: 10px">
                <h4> Statistiche </h4>
            </div>
        </div>

        <!-- VIEW CHART -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-2 mb-2 p-3 border_bottom" style="background-color: #dbe6f6">
            <!-- title and description -->
            <div class="mb-5" style="min-height: 80px">
                <span style="font-size: 20px">
                    Visualizzazioni pagine
                </span>
                <p style="font-size: 14px">
                    Numero totale di visite per singola pagina effettuate dagli utenti.
                    Il grafico mostra la percentuale di ogni pagina rispetto al totale delle visite.
                </p>
            </div>
            <!-- chart -->
            @if (count($categoryStatArr) > 0)
            <div class="chart-container mb-2" style="position: relative; min-height: 300px; width: 100%; margin: auto">
                <canvas id="category_chart" width="200px" height="200px"></canvas>
            </div>
            <!-- Data legend -->
            <div class="mt-2" style="min-height: 150px">
                <strong>Numero di visualizzazioni per pagina</strong>
                @foreach($categoryStatArr as $categoryStat)
                <div class="col-6 d-flex justify-content-between pt-1 pb-1">
                    <div class="text-uppercase">
                        {{ $categoryStat->categoryTitle }}
                    </div>
                    <div>
                        {{ $categoryStat->categoryCount }}
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div style="min-height: 450px">
                <el>- Nessun dato disponibile -</el>
            </div>
            @endif
        </div>

        <!-- PRODUCT CHART -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-2 mb-2 p-3 border_bottom" style="background-color: #e3ebeb"> <!-- deefef d1ecec -->
            <!-- title and description -->
            <div class="mb-5" style="min-height: 80px">
                <span style="font-size: 20px">
                    Articoli più visitati
                </span>
                <p style="font-size: 14px">
                    Numero totale di visite per singolo articolo effettuate dagli utenti
                </p>
            </div>
            <!-- chart -->
            @if (count($productStatArr) > 0)
            <div class="chart-container mb-2" style="position: relative; min-height: 300px; width: 100%; margin: auto">
                <canvas id="product_chart" width="200px" height="200px"></canvas>
            </div>
            <!-- Data legend -->
            <div class="product_data_legend_container mt-2" style="min-height: 150px">
                <strong>TOP 5 Articoli più visti</strong>
            </div>
            @else
            <div style="min-height: 450px">
                <em>- Nessun dato disponibile -</em>
            </div>
            @endif
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>

    const productStatArr = <?php echo json_encode($productStatArr); ?>;

    console.log(productStatArr);

    sortData(productStatArr, 'id', false);

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
            '#0AA09D',
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

    sortData(productStatArr, 'productCount', true);

    for(let i = 0; i < productStatArr.length; i++) {
        if (productStatArr.indexOf(productStatArr[i]) <= 5) {
            let productDataLegendRow = '<div class="col-6 d-flex justify-content-between pt-1 pb-1">';
            productDataLegendRow += '<div class="text-uppercase text-truncate">(' + productStatArr[i].id + ') - ' + productStatArr[i].productName + '</div>';
            productDataLegendRow += '<div>' + productStatArr[i].productCount + '</div>';
            productDataLegendRow += '</div>'
            $('.product_data_legend_container').append(productDataLegendRow);
        }
    }

    function sortData(dataArr, dataToSort, descending) {
        return dataArr.sort(function(a, b) {
            if (a.dataToSort == b.dataToSort) {
                return 0;
            } else if (descending) {
                return a.dataToSort < b.dataToSort ? 1 : -1;
            } else {
                return a.dataToSort < b.dataToSort ? -1 : 1;
            }
        });
    }

    // View Chart
    const categoryStatsArr = <?php echo json_encode($categoryStatArr); ?>;
  
    console.log(categoryStatsArr);

    let categoryData = [];
    let categoryLabel = [];

    for(let i = 0; i < categoryStatsArr.length; i++) {
        categoryData.push(categoryStatsArr[i].categoryTitle);
        categoryLabel.push(categoryStatsArr[i].categoryCount);
    }

    const categoryChartdata = {
        labels: categoryData,
        datasets: [{
        label: 'Visualizzazioni per singola pagina',
        data: categoryLabel,
        backgroundColor: [
            '#183153',
            '#13468f',
            '#446695',
            '#2a61af'
        ],
        hoverOffset: 4
        }]
    };
  
    const categoryChartConfig = {
      type: 'pie',
      data: categoryChartdata,
      options: {}
    };

    const category_chart = new Chart(
    document.getElementById('category_chart'),
    categoryChartConfig
  );

  </script>
@endsection

