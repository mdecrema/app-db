@extends('layouts.app')

@section('page-title')
    Ski Rent
@endsection

@section('content')

<div class="row search-content" style="width: 100vw; height: 100vh;">
<div class="bg-image-desktop d-lg-block d-xl-block d-md-none d-sm-none" style="width: 100%; height: 100%; position: absolute; top: 0; left: 0; background-image: url( {{ asset('img/templ3.png') }} ); background-size: cover"></div>
<div class="bg-image-tablet d-lg-none d-xl-none d-md-block d-sm-none" style="width: 100%; height: 100%; position: absolute; top: 0; left: 0; background-image: url( {{ asset('img/templ4.png') }} ); background-size: cover"></div>
<div class="bg-image-mobile d-lg-none d-xl-none d-md-none d-sm-block" style="width: 100%; height: 100%; position: absolute; top: 0; left: 0; background-image: url( {{ asset('img/templMobile.png') }} ); background-size: cover"></div>
    <div class="titolo-ski-rent">
        <h2 style="text-shadow: 2px 2px 2px grey">SKI RENT</h2>
        <p style="color: #fff; text-shadow: 2px 2px 2px grey">
            Consegna e ritiro a domicilio in meno di 24h del materiale che decidi di noleggiare
        </p>
    </div>

    <div>
        <form action="{{ route('skiRentForm') }}" method="post" class="form-noleggio" >
            @csrf
            @method("POST")
            <!--<div class="col-12 bg-opacity" style="background-image: url('{{ asset('img/sfocatura.png') }}'); background-size: cover; ">

            </div>-->

            <div class="form-row col-xl-6 col-lg-6 col-md-12 col-xs-12 col-sm-12" style="margin-bottom: 10px">
                <div class="col-12">
                    <h3 class="qvs-title" style="font-weight: bold">Quando vai a <span style="color: #BC0033; text-shadow: 2px 2px 2px #000 font-weight: bold">sciare</span>?</h3>
                </div>
            </div>
            <div class="form-row col-xl-6 col-lg-6 col-md-12 col-xs-12 col-sm-12">
                <div class='input-group date' id='datetimepicker1' style="position: relative">
                    <input id="dataInizio" name="dataInizio" type='date' class="form-control" value="" style="position: absolute; visibility: hidden;" />
                    <!--<div id="errore" style="position: absolute; bottom: -20px; left: 0; display: none">
                        <span style="color: #BC0033">*Seleziona una data prima di procedere</span>
                    </div>-->
                    <input id="dataFine" name="dataFine" type='date' min="" class="form-control" value="" style="position: absolute; visibility: hidden" />
                    <!-- Range DataPicker -->
                    <input type="" name="daterange" value="" class="form-control" onfocus="blur()" style="font-weight: bold; " />
                </div>
            </div>

            <div class="form-row" id="range" style="visibility: hidden; position: absolute">
                <input id="daysRange" name='daysRange' type='number' value="">
            </div>

            <div class="form-row col-xl-6 col-lg-6 col-md-12 col-xs-12 col-sm-12">
                <div class="col-12" style="margin: 20px 0">
                    <div onclick="setItemAsActive('sci')" class="" style="padding-right: 50px; display: inline-block; cursor: pointer; margin: 5px 0">
                        <div id="sci" style="width: 15px; height: 15px; background-color: #BC0033; ; border-radius: 2px; display: inline-block"></div>
                        <div style="display: inline-block; font-weight: bold; margin-left: 5px">
                            Sci
                        </div>
                    </div>
                    <div onclick="setItemAsActive('snowboard')" class="" style="padding-right: 50px; display: inline-block; cursor: pointer; margin: 5px 0">
                        <div id="snowboard" style="width: 15px; height: 15px; background-color: #fff; ; border-radius: 2px; display: inline-block"></div>
                        <div style="display: inline-block; font-weight: bold; margin-left: 5px">
                            Snowboard
                        </div>
                    </div>
                    <div onclick="setItemAsActive('ciaspole')" class="" style="padding-right: 50px; display: inline-block; cursor: pointer; margin: 5px 0">
                        <div id="ciaspole" style="width: 15px; height: 15px; background-color: #fff; ; border-radius: 2px; display: inline-block"></div>
                        <div style="display: inline-block; font-weight: bold; margin-left: 5px">
                            Ciaspole
                        </div>
                    </div>
                 </div>
            </div>

            <div class="form-row col-xl-6 col-lg-6 col-md-12 col-xs-12 col-sm-12" style="margin-bottom: 10px">
                <!-- altezza -->
                
                <div>
                    <div style="float: left">
                        La tua altezza: <strong id="level-bar-value"></strong> <strong>cm</strong>
                    </div>
                    <button type="button" onclick="oneLess()" style="width: 20px; height: 20px; border-radius: 100%; background-color: #fff; position: relative; float: left; margin-left: 10px">
                        <i class="far fa-minus-circle centra" style="color: #BC0033"></i>
                    </button>
                    <button type="button" onclick="oneMore()" style="width: 20px; height: 20px; border-radius: 100%; background-color: #fff; position: relative; float: left; margin-left: 5px">
                        <i class="far fa-plus-circle centra" style="color: #BC0033"></i>
                    </button>
                </div>
                <div class="form-control" style="height: 50px; ">
                    <input id="level-bar" type="range" min="100" max="200" value="175" name="height" class="level-bar">
                    <div style="width: 100%; height: 10px;">
                        @for($i=100; $i<=200; $i+=5)
                        <div style="width: calc(100%/21); height: 100%; float: left; font-size: 5px">
                            {{ $i }}
                        </div>
                        @endfor
                    </div>
                </div>
                
                <!--<div class="form-control">
                    <select id="level-bar" value="175" name="height" class="form-control">
                    
                    {{--@for($i=100; $i<=200; $i+=5)
                        <option value="{{ $i }}">
                            {{ $i }}
                        </option>
                    @endfor--}}
                    </select>
                </div>-->
                <!--<input type="number" name="height" value="175">
                <div class="col-12" style="height: 30px; border: 2px solid green; overflow-x: scroll;  white-space: nowrap;">
                    @for($i=100; $i<=200; $i+=5)
                    <div style="width: 30px; height: 100%; border: 1px solid blue; display: inline-block">
                        
                    </div>
                    @endfor
                </div>-->
            </div>
            
            <div class="form-row col-xl-6 col-lg-6 col-md-12 col-xs-12 col-sm-12">
                <!-- livello -->
                <div>
                    Livello:
                </div>
                <select class="form-control" name="level" id="" style="display: inline-block; cursor: pointer; font-weight: bold; ">
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
                    <li>{{ 'Compila i campi e riprova' }}</li>
                @endforeach
                </ul>
            </div>
        @endif
    </div>

   
</div>



<script>
   
    var active='sci'; 
    var dataInizio=document.getElementById('dataInizio');
    var dataFine=document.getElementById('dataFine');
    
        let gg = fixDate(new Date().getDate());
        let mm = fixDate(new Date().getMonth()+1);
        let aaaa = new Date().getFullYear();
    
        console.log(aaaa+'-'+mm+'-'+gg);
        document.getElementById('dataInizio').value=aaaa+'-'+mm+'-'+gg;
        document.getElementById('dataFine').value=aaaa+'-'+mm+'-'+gg;
        document.getElementById('daysRange').value=1;
        console.log(new Date());
    
    function fixDate(num) {
        if (num<10) {
            return '0'+num;
        } else {
            return num;
        }
    }
    
    //dataInizio.addEventListener('change', getDate);
    //dataFine.addEventListener('change', getDateFine);
    //
    document.getElementById('level-bar-value').innerHTML=document.getElementById('level-bar').value;
    document.getElementById('level-bar').addEventListener('change', getLevelBarValue);

    // Altezza persona
    function getLevelBarValue() {
        var value = document.getElementById('level-bar').value;
        document.getElementById('level-bar-value').innerHTML=value;
        activeHeight = 1;
        document.getElementById('filtroAltezza').style.backgroundColor='#0077F7';
    }

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

    function oneMore() {
        var value = parseInt(document.getElementById('level-bar').value);
        if (value<200) {
            value = value + 1;
            document.getElementById('level-bar').value = value;
            document.getElementById('level-bar-value').innerHTML=value;   
        }
    }

    function oneLess() {
        var value = parseInt(document.getElementById('level-bar').value);
        if (value>100) {
            value = value - 1;
            document.getElementById('level-bar').value = value;
            document.getElementById('level-bar-value').innerHTML=value;
        }
    }

    // Prova range datapicker

  $('input[name="daterange"]').daterangepicker({
    opens: 'left',
  //  displayMonths : 1,
    minDate: new Date(),
    locale: {
        format: 'DD-MM-YYYY'
    }
  }, function(start, end, label) {
    dataInizio=start.format('YYYY-MM-DD');
    console.log(dataInizio);
    dataFine=end.format('YYYY-MM-DD');
    rangeOfDays(start, end);
    document.getElementById('dataInizio').value=dataInizio;
    document.getElementById('dataFine').value=dataFine;
  });

</script>


@endsection