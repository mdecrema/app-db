@extends('layouts.app')

@section('page-title')
    Ski Rent
@endsection

@section('content')
<div class="container">
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
            <h5 style="font-weight: bold; font-family: 'Bakbak One', cursive; margin: 10px 0 5px">Disponibilità in base alla tua ricerca</h5>
            <div class="col-12" style="font-size: 10px; margin-bottom: 10px">
                <span style="color: grey">Durata noleggio: </span><strong class="days-num"> {{ $daysRange }} @if ($daysRange==1) giorno @else giorni @endif </strong>,
                dal <strong>{{ $dataInizio }}</strong>
                al <strong>{{ $dataFine }}</strong>
                <br />
                <span style="color: grey">La tua altezza: </span><strong style="padding: 5px">{{ $height }}</strong><strong>cm</strong>
            </div>
        </div>
        <div>
            @if($pack_beginner===false && $pack_intermediate===false && $pack_advanced===false)
            <div style="margin: 10px 0">
                <em style="color: lightgrey">Spiacenti, non ci sono attrezzature disponibili</em>
            </div>
            @endif

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
                    <img src="{{ asset('img/volkl-racetiger.jpg') }}" alt="sci">
                </div>
                <div class="col-8 ski-card-price">
                    <div onclick="selectScarponi('principiante')" class="col-12" style="width: 100%; height: 50%; overflow: hidden">
                        <img id="scarpone-img-p" style="width: 60%; height: 60%; margin-bottom: 0" src="{{ asset('img/scarpone-beginner.jpg') }}" alt="scarpone"><br>
                        <i id="check-icon-p" class="fad fa-check-square" style="font-size: 20px; color: lime"></i>
                        <span style="font-size: 12px; margin-left: 5px">Scarponi</span>
                        <span id="scarpone-price-p" style="font-size: 12px">(incluso)</span>
                    </div>
                    <div class="col-12" style="width: 100%; height: 50%;">
                        <span id="full-amount-p" style="text-decoration: line-through;">
                            24,00
                        </span><br />
                        <strong id="total-p" style="font-size: 28px">
                           21,60 €
                        </strong>
                        /giorno
                    </div>
                </div>
                 {{--<form action="{{ route('rentEquipment') }}" class="ski-card-form">
                    <input style="visibility: hidden" type="text" name="ski_id" value="">
                    <input style="visibility: hidden" type="text" name="dataInizio" value="">
                    <input style="visibility: hidden" type="text" name="dataFine" value="">
                    <input style="visibility: hidden" type="text" name="daysRange" value="">
                    <button type="submit" class="btn-seleziona"
                    >Seleziona</button>
                </form>--}}
                <!-- #179BD7 -->
                <div class="ski-card-form">
                    <button onclick="selectPack('principiante')" class="btn-seleziona" data-toggle="modal" data-target="#exampleModalCenter">Seleziona</button>
                </div>
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
                    <div onclick="selectScarponi('intermedio')" class="col-12" style="width: 100%; height: 50%; overflow: hidden">
                        <img id="scarpone-img-i" style="width: 60%; height: 60%; margin-bottom: 0" src="{{ asset('img/scarpone-beginner.jpg') }}" alt="scarpone"><br>
                        <i id="check-icon-i" class="fad fa-check-square" style="font-size: 20px; color: lime"></i>
                        <span style="font-size: 12px; margin-left: 5px">Scarponi</span>
                        <span id="scarpone-price-i" style="font-size: 12px">(incluso)</span>
                    </div>
                    <div class="col-12" style="width: 100%; height: 50%;">
                        <span id="full-amount-i" style="text-decoration: line-through;">
                            24,00
                        </span><br />
                        <strong id="total-i" style="font-size: 28px">
                           21,60 €
                        </strong>
                        /giorno
                    </div>
                </div>
                 {{--<form action="{{ route('rentEquipment') }}" class="ski-card-form">
                    <input style="visibility: hidden" type="text" name="ski_id" value="">
                    <input style="visibility: hidden" type="text" name="dataInizio" value="">
                    <input style="visibility: hidden" type="text" name="dataFine" value="">
                    <input style="visibility: hidden" type="text" name="daysRange" value="">
                    <button type="submit" class="btn-seleziona"
                    >Seleziona</button>
                </form>--}}
                <!-- #179BD7 -->
                <div class="ski-card-form">
                    <button onclick="selectPack('intermedio')" class="btn-seleziona" data-toggle="modal" data-target="#exampleModalCenter">Seleziona</button>
                </div>
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
                    <div onclick="selectScarponi('esperto')" class="col-12" style="width: 100%; height: 50%; overflow: hidden">
                        <img id="scarpone-img-e" style="width: 60%; height: 60%; margin-bottom: 0" src="{{ asset('img/scarpone-beginner.jpg') }}" alt="scarpone"><br>
                        <i id="check-icon-e" class="fad fa-check-square" style="font-size: 20px; color: lime"></i>
                        <span style="font-size: 12px; margin-left: 5px">Scarponi</span>
                        <span id="scarpone-price-e" style="font-size: 12px">(incluso)</span>
                    </div>
                    <div class="col-12" style="width: 100%; height: 50%;">
                        <span style="text-decoration: line-through;">
                            
                        </span><br />
                        <strong id="total-e" style="font-size: 28px">
                            29,00 €
                        </strong>
                        /giorno
                    </div>
                </div>
                {{--<form action="{{ route('rentEquipment') }}" class="ski-card-form">
                    <input style="visibility: hidden" type="text" name="ski_id" value="">
                    <input style="visibility: hidden" type="text" name="dataInizio" value="">
                    <input style="visibility: hidden" type="text" name="dataFine" value="">
                    <input style="visibility: hidden" type="text" name="daysRange" value="">
                    <button type="submit" class="btn-seleziona"
                    >Seleziona</button>
                </form>--}}
                <!-- #179BD7 -->
                <div class="ski-card-form">
                    <button onclick="selectPack('esperto')" class="btn-seleziona" data-toggle="modal" data-target="#exampleModalCenter">Seleziona</button>
                </div>
            </div>
        </div>
        @endif
    
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="packTypeTitle">Pack Beginner</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <h5 style="font-weight: bold">Sciatore: </h5 style="font-weight: bold">
                    <form action="{{ route('rentEquipment') }}" method="get">
                        @csrf
                        @method("GET")
                        <div class="form-row col-xl-6 col-lg-6 col-md-12 col-xs-12 col-sm-12">
                            <strong style="margin-right: 10px">Altezza</strong> {{ $height }} cm
                            <input name="height" class="form-control" style="border: none; display: none" value="{{ $height }}">
                        </div>
                        <!--<input style="visibility: hidden" type="text" name="ski_id" value="">-->
                        <div style="position: absolute">
                            <input style="visibility: hidden" type="text" name="packType" id="packType">
                            <input style="visibility: hidden" type="text" name="level" id="level">
                            <input style="visibility: hidden" type="text" name="dataInizio" value="{{ $dataInizio }}">
                            <input style="visibility: hidden" type="text" name="dataFine" value="{{ $dataFine }}">
                            <input style="visibility: hidden" type="text" name="daysRange" value="{{ $daysRange }}">
                            <input style="visibility: hidden" type="number" name="ski" id="ski" value="1">
                            <input style="visibility: hidden" type="number" name="boots" id="boots" value="1">
                            <input style="visibility: hidden" type="number" name="helmet" id="helmet" value="0">
                        </div>
                        <br>
                        <div class="form-row col-xl-6 col-lg-6 col-md-12 col-xs-12 col-sm-12">
                            <label for="name" style="font-weight: bold">Nome</label>
                            <input type="text" name="name" type='text' id="name" class="form-control" placeholder="Nome completo">
                        </div>
                        <br>
                        <div class="form-row col-xl-6 col-lg-6 col-md-12 col-xs-12 col-sm-12">
                            <label for="weight" style="font-weight: bold">Peso</label>
                            <select class="form-control" name="weight" id="weight" style="display: inline-block; cursor: pointer;">
                                <option value="" disabled selected>Kg</option>
                                @for($i=10; $i<=150; $i++)
                                <option value="{{$i}}">{{$i}} Kg</option>
                                @endfor
                            </select>
                        </div>
                        <br>
                        <div class="form-row col-xl-6 col-lg-6 col-md-12 col-xs-12 col-sm-12">
                            <label for="footLength" style="font-weight: bold">Piede</label>
                            <select class="form-control" name="footLength" id="footLength" style="display: inline-block; cursor: pointer;">
                                <option value="" disabled selected>Numero</option>
                                @for($i=20; $i<=46; $i++)
                                <option value="{{$i}}">{{$i}} cm</option>
                                @endfor
                            </select>
                        </div>
                        <br>
                        <div class="form-row col-xl-6 col-lg-6 col-md-12 col-xs-12 col-sm-12">
                        <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
                            <button type="submit" class="btn btn-primary">Aggiungi al carello</button>
                        </div>
                    </form>
                </div>
                <!--<div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>-->
              </div>
            </div>
          </div>

    <script>
        var activeHeight = 0;
        /*document.getElementById('level-bar-value').innerHTML=document.getElementById('level-bar').value;
        document.getElementById('level-bar').addEventListener('change', getLevelBarValue);*/
        
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


        //SCARPONI
        var scarponi = true;
        function selectScarponi(levelType) {
            if (levelType==='principiante') {
                if (scarponi === true) {
                document.getElementById('scarpone-img-p').style.opacity='0.4';
                document.getElementById('check-icon-p').classList.remove("fa-check-square");
                document.getElementById('check-icon-p').classList.add("fa-square");
                document.getElementById('check-icon-p').style.color="darkgrey";
                document.getElementById('scarpone-price-p').innerHTML="(+ 10,00 €)";
                document.getElementById('full-amount-p').innerHTML="14,00";
                document.getElementById('total-p').innerHTML="12,60";

                document.getElementById('boots').value="0";
                scarponi = false;
            } else if (scarponi === false) {
                document.getElementById('scarpone-img-p').style.opacity='1';
                document.getElementById('check-icon-p').classList.remove("fa-square");
                document.getElementById('check-icon-p').classList.add("fa-check-square");
                document.getElementById('check-icon-p').style.color="lime";
                document.getElementById('scarpone-price-p').innerHTML="(incluso)";
                document.getElementById('full-amount-p').innerHTML="24,00";
                document.getElementById('total-p').innerHTML="21,60";

                document.getElementById('boots').value="1";
                scarponi = true;
            }
            } else if (levelType==='intermedio') {
                if (scarponi === true) {
                document.getElementById('scarpone-img-i').style.opacity='0.4';
                document.getElementById('check-icon-i').classList.remove("fa-check-square");
                document.getElementById('check-icon-i').classList.add("fa-square");
                document.getElementById('check-icon-i').style.color="darkgrey";
                document.getElementById('scarpone-price-i').innerHTML="(+ 10,00 €)";
                document.getElementById('full-amount-i').innerHTML="14,00";
                document.getElementById('total-i').innerHTML="12,60";

                document.getElementById('boots').value="0";
                scarponi = false;
            } else if (scarponi === false) {
                document.getElementById('scarpone-img-i').style.opacity='1';
                document.getElementById('check-icon-i').classList.remove("fa-square");
                document.getElementById('check-icon-i').classList.add("fa-check-square");
                document.getElementById('check-icon-i').style.color="lime";
                document.getElementById('scarpone-price-i').innerHTML="(incluso)";
                document.getElementById('full-amount-i').innerHTML="24,00";
                document.getElementById('total-i').innerHTML="21,60";

                document.getElementById('boots').value="1";
                scarponi = true;
            }
            } else if (levelType==='esperto') {
                if (scarponi === true) {
                document.getElementById('scarpone-img-e').style.opacity='0.4';
                document.getElementById('check-icon-e').classList.remove("fa-check-square");
                document.getElementById('check-icon-e').classList.add("fa-square");
                document.getElementById('check-icon-e').style.color="darkgrey";
                document.getElementById('scarpone-price-e').innerHTML="(+ 15,10 €)";
                //document.getElementById('full-amount-e').innerHTML="14,00";
                document.getElementById('total-e').innerHTML="19,90";

                document.getElementById('boots').value="0";
                scarponi = false;
            } else if (scarponi === false) {
                document.getElementById('scarpone-img-e').style.opacity='1';
                document.getElementById('check-icon-e').classList.remove("fa-square");
                document.getElementById('check-icon-e').classList.add("fa-check-square");
                document.getElementById('check-icon-e').style.color="lime";
                document.getElementById('scarpone-price-e').innerHTML="(incluso)";
                //document.getElementById('full-amount-e').innerHTML="24,00";
                document.getElementById('total-e').innerHTML="34,00";

                document.getElementById('boots').value="1";
                scarponi = true;
            }
            }
            
        }

        // SELEZIONA PACCHETTO
        function selectPack(packType) {
            console.log(packType);
            if (packType==='principiante') {
                document.getElementById('packType').value='Pack Beginner';
                document.getElementById('level').value='Principiante';
            } else if (packType==='intermedio') {
                document.getElementById('packType').value='Pack Intermediate';
                document.getElementById('level').value='Intermedio';
            } else if (packType==='esperto') {
                document.getElementById('packType').value='Pack Advanced';
                document.getElementById('level').value='Esperto';
            }
        }
    </script>
</div>

@endsection