@extends('layouts.app')

@section('page-title')
    Ski Rent
@endsection

@section('content')
<div class="container">
    <div class="col-12" style="font-size: 16px">
        Dal: <strong style="padding: 5px 10px;">{{ $dataInizio }}</strong>
        Al: <strong style="padding: 5px 10px;">{{ $dataFine }}</strong>
        <em>- {{ $daysRange }} @if ($daysRange==1) giorno @else giorni @endif -</em>
    </div>
    
    <div class="row" style="margin: 30px 0">
    
        <h5>Sci disponibili</h5>
        @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif
        @foreach($skiArray as $ski)
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-10 offset-sm-1 col-xs-10 offset-xs-1 ski-card">
            <div class="ski-card-model">
                <h4>{{ $ski['brand'] }}</h4>
                <span>{{ $ski['model'] }}</span>
            </div>
            <div class="ski-card-content" style="position: relative">
                <div class="discount">
                    <h4>-10%</h4>
                </div>
                <strong>Livello {{ $ski['level'] }}</strong>
                @if( $ski['level'] == 'Principiante' || $ski['level'] == 'principiante' )
                <i style="color: green; margin-left: 5px" class="fas fa-skiing"></i>
                @elseif ( $ski['level'] == 'Intermedio' || $ski['level'] == 'intermedio' )
                <i style="color: orange; margin-left: 5px" class="fas fa-skiing"></i>
                @elseif ( $ski['level'] == 'Esperto' || $ski['level'] == 'esperto' )
                <i style="color: red; margin-left: 5px" class="fas fa-skiing"></i>
                @endif
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
</div>

@endsection