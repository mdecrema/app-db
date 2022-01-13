@extends('layouts.app')

@section('page-title')
    Rent Details
@endsection

@section('content')
    <div class="row">
    <!-- Rent Details -->

    <ul>
      <li>{{ $rent->name }}</li>
      <li>{{ $rent->packType }}</li>
      <li>{{ $rent->level }}</li>
      <li>Altezza: {{ $rent->height }} cm</li>
      <li>Peso: {{ $rent->weight }} Kg</li>
      <li>Piede: {{ $rent->footLength }} EU</li>
      <li>Sci: {{ $rent->ski }}</li>
      <li>Scarponi: {{ $rent->boots }}</li>
      <li>Casco: {{ $rent->helmet }}</li>
    </ul>
    <ul>
      <li>Sci ID: <strong>{{ $rent->ski_id }}</strong></li>
      
    </ul>

    <!-- /Rent Details -->

<!-- Errore chiamata  -->
<div>
    <h4>ERRORE CHIAMATA:</h4>
    <strong id="error" style="font-size: 20px">ff</strong>
    <strong id="error2" style="font-size: 20px">ff</strong>
</div>
<!-- /Errore chiamata -->


<div style="width: 500px" id="reader"></div>
<div>
    <span id="codeResp"></span>
</div>


  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Vuoi associare questo sci?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <form action="{{ route('admin.skiRent.statusChange', 1) }}" method="post">
            -@csrf
            @method("POST")
            <button onclick="associa($rent->id)">SALVA</button>
        </form>
        </div>
      </div>
    </div>
  </div>
    </div>

  <script>

    var ski_id = 0;

    function associa(rent_id) {  
      // change ski status  
       /* $.ajax({
          url: 'admin/dashboard/skiRent/allRent/scancode',
          method: 'POST',
          data: {
            id: ski_id,
          },
          success: function(result){
            console.log(result);
          },
          error: function(request,error){
            console.log(request);
            document.getElementById('error').innerHTML=JSON.stringify(error);
          }
        }); */

        // associate ski to rent
        $.ajax({
          url: 'admin/dashboard/rent/addSki',
          method: 'POST',
          data: {
            id: rent_id,
            ski: ski_id,
          },
          success: function(result){
            console.log(result);
          },
          error: function(request,error){
            console.log(request);
            document.getElementById('error2').innerHTML=JSON.stringify(error);
          }
        });
    }
    
    /*var html5QrcodeScanner = new Html5QrcodeScanner("reader");
    const config = { fps: 10, qrbox: { width: 250, height: 250 } };
    html5QrCode.start({ facingMode: { exact: "environment"} }, config, onScanSuccess);*/
    let html5QrcodeScanner = new Html5QrcodeScanner("reader",
    { fps: 10, qrbox: {width: 400, height: 150}, facingMode: { exact: "environment"} },
    /* verbose= */ false);
    
            
    function onScanSuccess(decodedText, decodedResult) {
        // Handle on success condition with the decoded text or result.
        var resp = (`Scan result: ${decodedText}`);
        ski_id = decodedText;
        document.getElementById('codeResp').innerHTML=resp;
        // 
        html5QrcodeScanner.clear();
        // ^ this will stop the scanner (video feed) and clear the scan area.
        //
        $('#exampleModalCenter').modal('show');
    }
    
    html5QrcodeScanner.render(onScanSuccess);
    </script>


@endsection