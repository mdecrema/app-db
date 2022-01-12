@extends('layouts.app')

@section('page-title')
    Bar Codes
@endsection

@section('content')
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
@endsection