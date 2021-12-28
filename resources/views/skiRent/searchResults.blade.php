@extends('layouts.app')

@section('page-title')
    Ski Rent
@endsection

@section('content')
<div class="container">
    <div class="col-12" style="font-size: 16px">
        Dal: <strong style="padding: 5px 10px;">{{ $dataInizio }}</strong>
        Al: <strong style="padding: 5px 10px;">{{ $dataFine }}</strong>
        <em class="days-num">- {{ $daysRange }} @if ($daysRange==1) giorno @else giorni @endif -</em>
    </div>
    <!--<div class="accordion" id="accordionExample" style="margin: 15px 0">
    <div class="card">
        <div class="" id="headingOne">
            <div>
                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    Filtra risultati <i class="fas fa-chevron-down"></i>
                </button>
            </div>
            <!--<div style="width: 50%; float: left;">
                <div style="float: right">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        <i class="fas fa-ban"></i> Reset
                    </button>
                </div>
            </div>-->
        <!--</div>
    
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
          <div class="card-body">
            
            <div style="margin-bottom: 15px">
                <div onclick="setAltezzaAsActive() ">
                    <div id="filtroAltezza" style="width: 10px; height: 10px; background-color: #fff; border: 1px solid #0077F7; border-radius: 2px; display: inline-block"></div>
                    La tua altezza: <strong id="level-bar-value"></strong> <strong>cm</strong>
                </div>
                <input id="level-bar" type="range" min="100" max="200" value="175" class="level-bar">
                <div style="width: 100%; height: 10px;">
                   
                </div>
            </div>
            
          
            <div style="margin-bottom: 30px">
                <div onclick="setLevelAsActive()">
                    <div id="filtroLivello" style="width: 10px; height: 10px; background-color: #0077F7; border: 1px solid #0077F7; border-radius: 2px; display: inline-block"></div>
                    Livello:
                </div>
                <select class="form-control" name="level" id="" style="border-radius: none; border-top: none; border-left: none; border-right: none; display: inline-block; cursor: pointer">
                    <option value="principiante">Principiante</option> 
                    <option value="intermedio" selected>Intermedio</option>
                    <option value="avanzato">Avanzato</option>
                </select>
            </div>

            <div style="width: 100%; height: 40px">
                <div style=" float: right">
                    Reset
                    <button class="btn btn-primary" style="margin-left: 5px">Applica</button>
                </div>
            </div>

          </div>
        </div>
      </div>
    </div>-->
    <div class="row" style="">
        <div>
            <!--<h5>Sci disponibili</h5>-->
            
            <h5 style="font-weight: bold">Disponibilità in base alla tua ricerca</h5>
            <!--<div class="col-12" style="border-radius: 5px; padding: 5px 10px; background-color: lightgray">
                <h6>Livello: <span></span></h6> - <h6>Altezza: <span></span></h6>
                <div style="color: #BC0033">
                    <i class="fas fa-ban"></i> Rimuovi filtri
                </div>
            </div>-->
            
            @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
            @endif
        </div>

        <!-- Pacchetto principiante -->
        @if($pack_beginner===true)
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-10 offset-sm-1 col-xs-10 offset-xs-1 ski-card">
            <div class="ski-card-model" style="background-color: #1FC7DE">
                <span style="font-size: 22px">Pack Beginner</span>
                <span></span>
            </div>
            <div class="ski-card-content" style="position: relative">
                <div class="discount">
                    <h4>-10%</h4>
                </div>
                <div class="col-12 ski-card-level">
                    <strong>Livello principiante</strong>
                    <i style="color: green; margin-left: 5px" class="fas fa-skiing"></i>
                </div>
                <div class="col-4 ski-card-img">
                    <img src="{{ asset('img/volkl-racetiger.jpg') }}" alt="">
                </div>
                <div class="col-8 ski-card-price">
                    <div class="col-12" style="width: 100%; height: 50%;">

                    </div>
                    <div class="col-12" style="width: 100%; height: 50%;">
                        <span style="text-decoration: line-through;">
                            14,00
                        </span><br />
                        <strong style="font-size: 28px">
                           13,60 €
                        </strong>
                        /giorno
                    </div>
                </div>
                <form action="{{ route('rentEquipment') }}" class="ski-card-form">
                    <input style="visibility: hidden" type="text" name="ski_id" value="">
                    <input style="visibility: hidden" type="text" name="dataInizio" value="">
                    <input style="visibility: hidden" type="text" name="dataFine" value="">
                    <input style="visibility: hidden" type="text" name="daysRange" value="">
                    <button type="submit" class="btn-seleziona"
                    >Seleziona</button> <!-- #179BD7 -->
                </form>
            </div>
        </div>
        @endif


        <!-- Pacchetto intermedio -->
        @if($pack_intermediate===true)
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-10 offset-sm-1 col-xs-10 offset-xs-1 ski-card">
            <div class="ski-card-model" style="background-color: #637EE8;">
                <span style="font-size: 22px">Pack Intermediate</span>
                <span></span>
            </div>
            <div class="ski-card-content" style="position: relative">
                <div class="discount">
                    <h4>-10%</h4>
                </div>
                <div class="col-12 ski-card-level">
                    <strong>Livello intermedio</strong>
                    <i style="color: orange; margin-left: 5px" class="fas fa-skiing"></i>
                </div>
                <div class="col-4 ski-card-img">
                    <img src="{{ asset('img/volkl-racetiger.jpg') }}" alt="">
                </div>
                <div class="col-8 ski-card-price">
                    <div class="col-12" style="width: 100%; height: 50%;">

                    </div>
                    <div class="col-12" style="width: 100%; height: 50%;">
                        <span style="text-decoration: line-through;">
                            15,00
                        </span><br />
                        <strong style="font-size: 28px">
                           14,50 €
                        </strong>
                        /giorno
                    </div>
                </div>
                <form action="{{ route('rentEquipment') }}" class="ski-card-form">
                    <input style="visibility: hidden" type="text" name="ski_id" value="">
                    <input style="visibility: hidden" type="text" name="dataInizio" value="">
                    <input style="visibility: hidden" type="text" name="dataFine" value="">
                    <input style="visibility: hidden" type="text" name="daysRange" value="">
                    <button type="submit" class="btn-seleziona"
                    >Seleziona</button> <!-- #179BD7 -->
                </form>
            </div>
        </div>
        @endif

        <!-- Pacchetto Esperto -->
        @if($pack_advanced===true)
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-10 offset-sm-1 col-xs-10 offset-xs-1 ski-card">
            <div class="ski-card-model" style="background-color: #9E54ED">
                <span style="font-size: 22px">Pack Advanced</span>
                <span></span>
            </div>
            <div class="ski-card-content" style="position: relative">
                <!--<div class="discount">
                    <h4>-10%</h4>
                </div>-->
                <div class="col-12 ski-card-level">
                    <strong>Livello esperto</strong>
                    <i style="color: red; margin-left: 5px" class="fas fa-skiing"></i>
                </div>
                <div class="col-4 ski-card-img">
                    <img src="{{ asset('img/volkl-racetiger.jpg') }}" alt="">
                </div>
                <div class="col-8 ski-card-price">
                    <div class="col-12" style="width: 100%; height: 50%;">

                    </div>
                    <div class="col-12" style="width: 100%; height: 50%;">
                        <span style="text-decoration: line-through;">
                            
                        </span><br />
                        <strong style="font-size: 28px">
                            19,80 €
                        </strong>
                        /giorno
                    </div>
                </div>
                <form action="{{ route('rentEquipment') }}" class="ski-card-form">
                    <input style="visibility: hidden" type="text" name="ski_id" value="">
                    <input style="visibility: hidden" type="text" name="dataInizio" value="">
                    <input style="visibility: hidden" type="text" name="dataFine" value="">
                    <input style="visibility: hidden" type="text" name="daysRange" value="">
                    <button type="submit" class="btn-seleziona"
                    >Seleziona</button> <!-- #179BD7 -->
                </form>
            </div>
        </div>
        @endif
    
            <!--<div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="smallBody">
                        <div>
                            <!-- the result to be displayed apply here -->
                   <!--     </div>
                    </div>
                </div>
            </div>
        </div>
    
        <a data-toggle="modal" id="smallButton" data-target="#smallModal"
                                    data-attr="" title="show">
                                    <i class="fas fa-eye text-success  fa-lg"></i>
                                </a>
    
    </div>
    
    <script>
         $(document).on('click', '#smallButton', function(event) {
                event.preventDefault();
                let href = $(this).attr('data-attr');
                $.ajax({
                    url: href,
                    beforeSend: function() {
                        $('#loader').show();
                    },
                    // return the result
                    success: function(result) {
                        $('#smallModal').modal("show");
                        $('#smallBody').html(result).show();
                    },
                    complete: function() {
                        $('#loader').hide();
                    },
                    error: function(jqXHR, testStatus, error) {
                        console.log(error);
                        alert("Page " + href + " cannot open. Error:" + error);
                        $('#loader').hide();
                    },
                    timeout: 8000
                })
            });
    </script>-->

    <script>
        var activeHeight = 0;
        document.getElementById('level-bar-value').innerHTML=document.getElementById('level-bar').value;
        document.getElementById('level-bar').addEventListener('change', getLevelBarValue);
        
        // Altezza persona
        function getLevelBarValue() {
            var value = document.getElementById('level-bar').value;
            document.getElementById('level-bar-value').innerHTML=value;
            activeHeight = 1;
            document.getElementById('filtroAltezza').style.backgroundColor='#0077F7';
        }

        //Filtri attivati
        function setAltezzaAsActive() {
            if (activeHeight===0) {
                activeHeight = 1;
                document.getElementById('filtroAltezza').style.backgroundColor='#0077F7';
            } else if (activeHeight===1) {
                activeHeight = 0;
                document.getElementById('filtroAltezza').style.backgroundColor='#fff';
            }
        }

        

        function getHeight() {
            var height = document.getElementById('level-bar-value').value;
            console.log(height);
        }

        function getLevel() {
            var level = document.getElementById('level').value;
            console.log(level);
        }

        var skis = @json($skiArray);
        console.log(skis);
    </script>
</div>

@endsection