@extends('layouts.app')

@section('page-title')
    Order details
@endsection

@section('content')
<div class="container" style="font-family: 'Roboto', sans-serif">
    <div class="row">
        <div class="col-12" style="margin: 15px 0;">
            <h2>Dettagli <em>ORDINE N°{{ $order->id }}</em></h2>
        </div>
    </div>
</div>

@endsection