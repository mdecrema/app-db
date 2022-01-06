@extends('layouts.app')

@section('page-title')
    All Equipment Rented
@endsection

@section('content')
<ul style="list-style: none">
    <li style="display: inline-block; padding: 0 5px"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li style="display: inline-block; padding: 0 5px"><a href="{{ route('admin.skiRent.allEquipment') }}">Tutto il materiale</a></li>
    <li style="display: inline-block; padding: 0 5px"><a href="{{ route('admin.skiRent.addEquipment') }}">Aggiungi materiale</a></li>
</ul>
<h2>Attrezzatura noleggiata</h2>
<!-- bar code-->
<div style="width: 150px; height: 30px; padding: 0 5px; background-color: #15AABF; border-radius: 30px; line-height: 30px; cursor: pointer">
    <div style="width: 20px; height: 20px; border-radius: 100%; text-align: center; background-color: #fff; line-height: 20px; display: inline-block">
        <i class="fas fa-mobile-alt" style="color: #15AABF"></i>
    </div>
    <span style="color: #fff; padding: 0 2px; display: inline-block">SCAN BAR CODE</span>
</div>

@if (session()->has('success_message'))
                        <div class="alert alert-success">
                            {{ session()->get('success_message') }}
                        </div>
                    @endif

<div class="row" style="margin: 30px 0">
    @foreach($allRent as $item)
        <div style="padding: 10px 20px; margin: 5px 0; border: 1px solid lightgrey; list-style: none; cursor: pointer; position: relative">
            <h4>{{ $item->ski_id }}</h4>
            <h5>{{ date("d-m-Y", ($item->date / 1000))  }}</h5>
            <a href="deleteRent/{{$item['id']}}" style="width: 30px; height: 50%; position: absolute; top: 0; right: 0; text-align: right; padding: 5px 10px;">
                <i class="far fa-times-circle"></i>
            </a>
        </div>
    @endforeach
    </ul>
</div>

<div style="width: 500px" id="reader">fff</div>
<div>
    <span id="codeResp"></span>
</div>




<script>
  function onScanSuccess(decodedText, decodedResult) {
    // Handle on success condition with the decoded text or result.
    console.log(`Scan result: ${decodedText}`, decodedResult);
    var resp = (`Scan result: ${decodedText}`, decodedResult);
    document.getElementById('codeResp').innerHTML=resp;
}

var html5QrcodeScanner = new Html5QrcodeScanner(
	"reader", { fps: 10, qrbox: 250 });
html5QrcodeScanner.render(onScanSuccess);

var html5QrcodeScanner = new Html5QrcodeScanner(
    "reader", { fps: 10, qrbox: 250 });
        
function onScanSuccess(decodedText, decodedResult) {
    // Handle on success condition with the decoded text or result.
    var resp = (`Scan result: ${decodedText}`, decodedResult);
    document.getElementById('codeResp').innerHTML=resp;
    // ...
    html5QrcodeScanner.clear();
    // ^ this will stop the scanner (video feed) and clear the scan area.
}

html5QrcodeScanner.render(onScanSuccess);
</script>

@endsection