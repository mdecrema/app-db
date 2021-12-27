@extends('layouts.app')

@section('page-title')
    Ski Rent
@endsection

@section('content')

<div class="row search-content">
    <div class="titolo-ski-rent">
        <h2>SKI RENT</h2>
        <p>
            Consegna e ritiro a domicilio in meno di 24h del materiale che decidi di noleggiare
        </p>
    </div>

    <div>
        <form action="{{ route('skiRentForm') }}" method="post" class="form-noleggio" style="background-image: url('{{ asset('img/latemar.jpg') }}'); background-size: cover;">
            @csrf
            @method("POST")
            <div class="col-xl-6 col-lg-6 col-md-12 col-xs-12 col-sm-12 bg-opacity">

            </div>
            <div class="form-row col-xl-6 col-lg-6 col-md-12 col-xs-12 col-sm-12" style="margin-bottom: 10px">
                <div class="col-12">
                    <h3>Quando vai a <span style="color: #BC0033">sciare</span>?</h3>
                </div>
            </div>
            <div class="form-row col-xl-6 col-lg-6 col-md-12 col-xs-12 col-sm-12">
                <div class='input-group date' id='datetimepicker1' style="position: relative">
                    <input id="dataInizio" name="dataInizio" type='date' class="form-control" style="position: absolute; visibility: hidden" />
                    <!--<div id="errore" style="position: absolute; bottom: -20px; left: 0; display: none">
                        <span style="color: #BC0033">*Seleziona una data prima di procedere</span>
                    </div>-->
                    <input id="dataFine" name="dataFine" type='date' min="" class="form-control" style="position: absolute; visibility: hidden" />
                    <!-- Range DataPicker -->
                    <input type="" name="daterange" value="" class="form-control" onfocus="blur()" />
                </div>
            </div>

            <div class="form-row" id="range" style="visibility: hidden; position: absolute">
                <input id="daysRange" name='daysRange' type='number' value="">
            </div>

            <div class="form-row col-xl-6 col-lg-6 col-md-12 col-xs-12 col-sm-12">
                <div class="col-12" style="margin: 20px 0">
                    <div onclick="setItemAsActive('sci')" class="" style="padding-right: 50px; display: inline-block; cursor: pointer">
                        <div id="sci" style="width: 15px; height: 15px; background-color: #BC0033; border-radius: 5px; display: inline-block"></div>
                        <div style="display: inline-block">
                            Sci
                        </div>
                    </div>
                    <div onclick="setItemAsActive('snowboard')" class="" style="padding-right: 50px; display: inline-block; cursor: pointer">
                        <div id="snowboard" style="width: 15px; height: 15px; background-color: #fff; border-radius: 5px; display: inline-block"></div>
                        <div style="display: inline-block">
                            Snowboard
                        </div>
                    </div>
                    <div onclick="setItemAsActive('ciaspole')" class="" style="padding-right: 50px; display: inline-block; cursor: pointer">
                        <div id="ciaspole" style="width: 15px; height: 15px; background-color: #fff; border-radius: 5px; display: inline-block"></div>
                        <div style="display: inline-block">
                            Ciaspole
                        </div>
                    </div>
                 </div>
            </div>
            
            <div class="form-row col-xl-6 col-lg-6 col-md-12 col-xs-12 col-sm-12">
                <select class="form-control" name="level" id="" style="display: inline-block; cursor: pointer">
                    <option value="principiante">Principiante</option> 
                    <option value="intermedio" selected>Intermedio</option>
                    <option value="avanzato">Avanzato</option>
                </select>
            </div>  
            
            <div class="form-row col-xl-6 col-lg-6 col-md-12 col-xs-12 col-sm-12" style="margin: 20px 0">
                <button type="submit" class="btn btn-continua">Continua</button>
            </div>

          </form>

          @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ 'Seleziona una data prima di procedere' }}</li>
                @endforeach
                </ul>
            </div>
        @endif
    </div>

    <div class="ski-img" style="width: 20vw; height: 100vh; z-index: -1; position: absolute; top: 0; left: 50px; background-image: url('{{ asset('img/rossignol-hero.jpg') }}'); background-size: cover;">
        <!-- background-image: url('{{ asset('img/rossignol-hero.jpg') }}'); background-size: cover; -->
    </div>

    <div class="boots-img" style="width: 30vw; height: 100vh; z-index: -1; position: absolute; top: 50px; right: 0; background-image: url('{{ asset('img/booster.jpg') }}'); background-size: cover;">
        <!-- background-image: url('{{ asset('img/booster.jpg') }}'); background-size: cover; -->
    </div>
</div>

<script>
    var active='sci';
    var dataInizio=document.getElementById('dataInizio');
    var dataFine=document.getElementById('dataFine');
    //dataInizio.addEventListener('change', getDate);
    //dataFine.addEventListener('change', getDateFine);

    function setItemAsActive(tipologia) {
        console.log('here');
        var sci=document.getElementById('sci');
        var snowboard=document.getElementById('snowboard');
        var ciaspole=document.getElementById('ciaspole');

        if (tipologia==='sci') {
            sci.style.backgroundColor='#BC0033';
            snowboard.style.backgroundColor='#fff';
            ciaspole.style.backgroundColor='#fff';
        } else if (tipologia==='snowboard') {
            sci.style.backgroundColor='#fff';
            snowboard.style.backgroundColor='#BC0033';
            ciaspole.style.backgroundColor='#fff';
        } else if (tipologia==='ciaspole') {
            sci.style.backgroundColor='#fff';
            snowboard.style.backgroundColor='#fff';
            ciaspole.style.backgroundColor='#BC0033';
        }
    }

    function getDate() {
        dataInizio=document.getElementById('dataInizio').valueAsDate;
        dataFine=document.getElementById('dataFine').value=dataInizio;
        dataFine=dataInizio;
        console.log(new Date(dataInizio).getTime(), dataFine);
        // Set Min Date
        document.getElementById('dataFine').min=document.getElementById('dataInizio').value;

        rangeOfDays(dataInizio, dataFine);
    }

    function getDateFine() {
        dataInizio=document.getElementById('dataInizio').valueAsDate;
        dataFine=document.getElementById('dataFine').valueAsDate;
        rangeOfDays(dataInizio, dataFine);
        console.log(dataInizio, dataFine);
    }

    function rangeOfDays(date1, date2) {
        var Difference_In_Time = date2 - date1;
  
        // To calculate the no. of days between two dates
        var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);
  
        //To display the final no. of days (result)
        
        console.log("Total number of days between dates  <br>"
               + date1 + "<br> and <br>" 
               + date2 + " is: <br> " 
               + Difference_In_Days);
        
        Difference_In_Days+=0.000000011574074;

        var input = "<input name='daysRange' type='number' value="+ Difference_In_Days +">"
        console.log(input);
        
        document.getElementById('daysRange').value=Difference_In_Days;
    }

    function formError() {
        var data=document.getElementById('data');
        var errore=document.getElementById('errore');
        setTimeout(() => {
            data.style.border="2px solid #BC0033";
            errore.style.display="block";
        }, timeout);
    }

    // Prova range datapicker


  $('input[name="daterange"]').daterangepicker({
    opens: 'left',
    minDate: new Date(),
    locale: {
        format: 'DD-MM-YYYY'
    }
  }, function(start, end, label) {
    dataInizio=start.format('YYYY-MM-DD');
    dataFine=end.format('YYYY-MM-DD');
    rangeOfDays(start, end);
    document.getElementById('dataInizio').value=dataInizio;
    document.getElementById('dataFine').value=dataFine;
  });



</script>

@endsection