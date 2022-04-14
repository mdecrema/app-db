@extends('layouts.app')

@section('page-title')

@endsection

@section('content')
<div class="row">
    <div class="col-lg-12" style="padding: 0 35px">
        <h4>TEES</h4>
    </div>
    
    @foreach($tees as $tee)
        <div class="col-lg-4 col-xs-6 col-sm-6" style="width: 46%; height: 250px; margin: 0 2%; padding: 10px; overflow: hidden; position: relative; margin-bottom: 30px; margin: auto; display: inline-block;">
        <a href="products/{{$tee['id']}}" style="float: left;">
            <img  class="active" src="{{'https://img-space.fra1.digitaloceanspaces.com/img-space/uploads/images/'.$tee->photo1}}" alt="" style="width: 100%; height: 150px;">
            <div style="width: 100%; height: 100px; position: absolute; bottom: 0; left: 0; padding: 15px 25px;">
                <span style="color: #000; font-size: 14px; font-weight: bold">{{ $tee->nome }}</span><br>
                <span style="color: grey; font-size: 11px;">{{ $tee->categoria }} - {{ $tee->genere }}</span><br>
                <span style="color: #000; font-size: 12px;; font-weight: bold">{{ number_format($tee->amount, 2, '.', ',') }} €</span>
            </div>
            </a>
        </div>
    @endforeach
    
</div>

@endsection