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
    <div class="accordion" id="accordionExample" style="margin: 15px 0">
    <div class="card">
        <div class="" id="headingOne">
          <h2 class="mb-0">
            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
              Filtra risultati <i class="fas fa-chevron-down"></i>
            </button>
          </h2>
        </div>
    
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
          <div class="card-body">
            La tua altezza: <span id="level-bar-value"></span> cm
            <input id="level-bar" type="range" min="100" max="200" value="150" class="level-bar">
          </div>
        </div>
      </div>
    </div>
    <div class="row" style="">
        <div>
            <h5>Sci disponibili</h5>
            <div id="sci" style="width: 10px; height: 10px; background-color: #BC0033; border-radius: 5px; display: inline-block"></div><h6 style="display: inline-block; margin-left: 5px">Applica filtri</h6>
            @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
            @endif
        </div>

        @foreach($skiArray as $ski)
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-10 offset-sm-1 col-xs-10 offset-xs-1 ski-card">
            <div class="ski-card-model">
                <span style="font-size: 22px">{{ $ski['brand'] }}</span>
                <span>{{ $ski['model'] }}</span>
            </div>
            <div class="ski-card-content" style="position: relative">
                <div class="discount">
                    <h4>-10%</h4>
                </div>
                <div class="col-12 ski-card-level">
                    <strong>Livello {{ $ski['level'] }}</strong>
                    @if( $ski['level'] == 'Principiante' || $ski['level'] == 'principiante' )
                    <i style="color: green; margin-left: 5px" class="fas fa-skiing"></i>
                    @elseif ( $ski['level'] == 'Intermedio' || $ski['level'] == 'intermedio' )
                    <i style="color: orange; margin-left: 5px" class="fas fa-skiing"></i>
                    @elseif ( $ski['level'] == 'Esperto' || $ski['level'] == 'esperto' )
                    <i style="color: red; margin-left: 5px" class="fas fa-skiing"></i>
                    @endif
                </div>
                <div class="col-4 ski-card-img">
                    <img src="{{ asset('img/volkl-racetiger.jpg') }}" alt="">
                </div>
                <div class="col-8 ski-card-price">
                    <div class="col-12" style="width: 100%; height: 50%;">

                    </div>
                    <div class="col-12" style="width: 100%; height: 50%;">
                        <span style="text-decoration: line-through;">
                            @if(strlen((string)$ski['rentCost'])>0 && strlen((string)$ski['rentCost'])<=2){{ $ski['rentCost'] }},00 €
                            @elseif(strlen((string)$ski['rentCost'])>0 && strlen((string)$ski['rentCost'])>2) {{ $ski['rentCost'] }}0 €
                            @endif
                        </span><br />
                        <strong style="font-size: 28px">
                            @php
                                $rate = 10;
                                $full_amount = $ski['rentCost']-($ski['rentCost']*$rate/100);
                            @endphp
                            @if(strlen((string)$full_amount>0 && strlen((string)$full_amount)<=2)){{ $full_amount }},00 €
                            @elseif(strlen((string)$full_amount>0 && strlen((string)$full_amount)>2)) {{ $full_amount }}0 €
                            @endif
                        </strong>
                        @if(strlen((string)$ski['rentCost'])>0)
                        <span>/giorno</span>
                        @endif
                    </div>
                </div>
                <form action="{{ route('rentEquipment') }}" class="ski-card-form">
                    <input style="visibility: hidden" type="text" name="ski_id" value="{{ $ski['id'] }}">
                    <input style="visibility: hidden" type="text" name="dataInizio" value="{{ $dataInizio }}">
                    <input style="visibility: hidden" type="text" name="dataFine" value="{{ $dataFine }}">
                    <input style="visibility: hidden" type="text" name="daysRange" value="{{ $daysRange }}">
                    <button type="submit" class="btn-seleziona"
                    >Seleziona</button> <!-- #179BD7 -->
                </form>
            </div>
        </div>
        @endforeach
    
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
        document.getElementById('level-bar-value').innerHTML=document.getElementById('level-bar').value;
        document.getElementById('level-bar').addEventListener('change', getLevelBarValue);

        function getLevelBarValue() {
            var value = document.getElementById('level-bar').value;
            document.getElementById('level-bar-value').innerHTML=value;
        }
    </script>
</div>

@endsection