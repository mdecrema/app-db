@extends('layouts.app')

@section('page-title')
    Rent Details
@endsection

@section('content')
    <div class="row">
        <!-- Prova bar code generato -->
<div style="margin: 20px 0">
    @foreach($skis as $ski)
    <div style="margin: 50px 0">
        <!--<img src="data:image/png;base64,{{DNS1D::getBarcodePNG($ski->id, 'C39')}}" alt="barcode" />-->
        {!!  DNS1D::getBarcodeHTML("$ski->id", "C39")!!}
    </div>
    <span>{{ $ski->brand }}</span><br />
    <span style="color: red">{{ $ski->status }}</span>
    @endforeach
</div>
<!-- /Prova bar code generato -->

<!-- Errore chiamata -->
<div>
    <form action="{{ route('admin.skiRent.statusChange', 1) }}" method="post">
        @csrf
        @method("POST")
        <button onclick="provaAjax()">click ajax</button>
    </form>
    <h4>ERRORE CHIAMATA:</h4>
    <strong id="error" style="font-size: 20px">ff</strong>
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
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
    </div>

  <script>

    function provaAjax() {
        let resp = 1;
    
        $.ajax({
            headers: {
                        'X-CSRF-Token': token 
                   },
                      url: 'allRent/scancode/'+resp,
                      method: 'POST',
                      data: {
                         id: 1,
                      },
                      success: function(result){
                            
                            console.log(result);
                      },
                      error: function(request,error){
                          console.log(request);
                          document.getElementById('error').innerHTML=JSON.stringify(error);
                      }
                     });
    }
    
    var html5QrcodeScanner = new Html5QrcodeScanner("reader");
    const config = { fps: 10, qrbox: { width: 250, height: 250 } };
    html5QrCode.start({ facingMode: { exact: "environment"} }, config, onScanSuccess);
    
            
    function onScanSuccess(decodedText, decodedResult) {
        // Handle on success condition with the decoded text or result.
        var resp = (`Scan result: ${decodedText}`);
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