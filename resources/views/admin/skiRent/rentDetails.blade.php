@extends('layouts.app')

@section('page-title')
    Rent Details
@endsection

@section('content')
    <div class="row">
    <!-- Rent Details -->
      <div class="col-12" style="background-color: teal; color: #fff; padding: 10px">
        <h3>Noleggio N°. 00{{ $rent->id }}</h3>
      </div>
      <div class="col-12" style="margin: 20px 0">
        <h4>{{ $rent->name }}</h4>
        <div><i class="fal fa-ruler-vertical"></i>  Altezza: <strong>{{ $rent->height }} cm</strong></div>
        <div><i class="fal fa-weight"></i>  Peso: <strong>{{ $rent->weight }} Kg</strong></div>
        <div><i class="fal fa-boot"></i> Piede: <strong>{{ $rent->footLength }} EU</strong></div>
      </div>
      <div class="col-12" style="margin: 20px 0 0 0; background-color: grey; color: #fff">
        <span>Dettagli prenotazione</span>
      </div>
      <div class="col-12" style="margin: 0 0 20px 0; background-color: lightgrey; color: #000; padding: 20px 15px">
        <strong style="font-size: 20px; text-transform: uppercase">{{ $rent->packType }}</strong>
        <div style="list-style: none; margin: 20px 0; font-size: 18px">
          <div style="padding: 5px 0">
            @if( $rent->ski===1 )<strong><i style="color: green" class="fad fa-check-circle"></i></strong>@else <span><i style="color:red" class="fad fa-times-circle"></i></span>@endif Sci 
            @if( $rent->ski_id===NULL )
            <div style="display: inline-block; margin-left: 10px; width: 100px; height: 30px; padding: 0 5px; background-color: #15AABF; border-radius: 30px; line-height: 30px; cursor: pointer; color: #fff; font-size: 12px">
              <div style="width: 20px; height: 20px; border-radius: 100%; text-align: center; background-color: #fff; line-height: 20px; display: inline-block; color: #15AABF">
                <i class="fas fa-mobile-alt"></i>
              </div>
              <span style="color: #fff; padding: 0 2px; display: inline-block">ASSOCIA</span>
            </div>
            @else
              <span>Identificativo sci: ## <strong>{{ $rent->ski_id }}</strong> ##</span>
            @endif
          </div>
          <div style="padding: 5px 0" >
            @if( $rent->boots===1 )<strong><i style="color:green" class="fad fa-check-circle"></i></strong>@else <span><i style="color:red" class="fad fa-times-circle"></i></span>@endif Scarponi
            @if( $rent->boots_id===NULL )
            <div style="display: inline-block; margin-left: 10px; width: 100px; height: 30px; padding: 0 5px; background-color: #15AABF; border-radius: 30px; line-height: 30px; cursor: pointer; color: #fff; font-size: 12px">
              <div style="width: 20px; height: 20px; border-radius: 100%; text-align: center; background-color: #fff; line-height: 20px; display: inline-block; color: #15AABF">
                  <i class="fas fa-mobile-alt"></i>
              </div>
              <span style="color: #fff; padding: 0 2px; display: inline-block">ASSOCIA</span>
            </div>
            @else
              <span>Identificativo sci: #00-<strong>{{ $rent->boots_id }}</strong></span>
            @endif
          </div>
          <div style="padding: 5px 0">
            @if( $rent->helmet===1 )<strong><i style="color:green" class="fad fa-check-circle"></i></strong>@else <span><i style="color:red" class="fad fa-times-circle"></i></span>@endif Casco
          </div>
        </div>
      </div>
      <div class="row" style="width: 100%; background-color: teal; padding: 10px; color: #fff; margin-bottom: 20px">
        <div class="col-4" style="border: 1px solid darkgrey; text-align: center">
          <h6>Totale: </h6><br/>
          <strong>{{ $rent->amount }} €</strong>
        </div>
        <div class="col-4" style="border: 1px solid darkgrey; text-align: center">
          <h6>Dovuto: </h5><br/>
          <strong>--</strong>
        </div>
        <div class="col-4" style="border: 1px solid darkgrey; text-align: center">
          <h6>Pagato: </h5><br/>
          <strong>--</strong>
        </div>
      </div>
    <!-- /Rent Details -->


<div style="width: 500px" id="reader"></div>
<div>
    <span id="codeResp"></span>
</div>

  <!-- Modal Conferma -->
  <div class="modal fade" id="modalConferma" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">BAR CODE RICONOSCIUTO</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>
            Stai associando materiale con ID: ###<br>
            Sei sicuro di voler procedere?
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <form action="{{ route('admin.skiRent.rentAddSki') }}" method="post">
            @csrf
            @method("POST")
            <input style="display: none; position: absolute;" type="number" name="rent_id" id="rent_id" value="{{ $rent->id }}">
            <input style="display: none; position: absolute;" type="number" name="ski_id" id="ski_id" value="">
            <button type="submit">SALVA</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- /Modal Conferma -->

  <!-- Modal Errore -->
  <div class="modal fade" id="modalErrore" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle" style="color: red; font-weight: bold">ERRORE!</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>
            Questo materiale è gia associato ad un'altro noleggio,<br>
            Per poter continuare è necessario prima svincolarlo.
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- /Modal Errore -->


    </div>

  <script>

    var ski_id = 0;
    
    let html5QrcodeScanner = new Html5QrcodeScanner("reader",
    { fps: 10, qrbox: {width: 250, height: 250}, facingMode: { exact: "environment"} });
    
            
    function onScanSuccess(decodedText, decodedResult) {
        // Handle on success condition with the decoded text or result.
        var resp = (`Scan result: ${decodedText}`);
        var ski_id = parseInt(decodedText);
        var allSki = @json($skis);
        console.log(allSki);
        console.log(ski_id);
        console.log(typeof(ski_id));
        document.getElementById('ski_id').value=ski_id;
        document.getElementById('codeResp').innerHTML=resp;
        // Check ski status
        var error=false;
        var skiRented = [];
        for(let i=0; i<allSki.length; i++) {
          if (allSki[i].id===ski_id && allSki[i].status===1) {
            error=true;
            skiRented.push(allSki[i]);  
          }
        }
        if(error===true) {
          $('#modalConferma').modal('show');
        } else {
          $('#modalErrore').modal('show');
        }
        // 
        html5QrcodeScanner.clear();
        // ^ this will stop the scanner (video feed) and clear the scan area.
    }
    
    html5QrcodeScanner.render(onScanSuccess);
    </script>


@endsection