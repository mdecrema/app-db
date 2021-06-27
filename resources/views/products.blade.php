@extends('layouts.app')


@section('page-title')
@endsection


@section('content')

<div class="row">
    <div class="col-lg-12" style="padding: 0 35px">
        <h4>PRODOTTI</h4>
    </div>
    
    @foreach($products as $product)
    <a href="products/{{$product['id']}}">
        <div class="col-lg-4 col-xs-10 offset-xs-1 col-sm-10 offset-sm-1 col-md-4" style="height: 430px; padding: 10px; overflow: hidden; position: relative; margin-bottom: 30px; margin: auto">
            <img class="active" src="{{'https://img-space.fra1.digitaloceanspaces.com/img-space/uploads/images/'.$product->photo1}}" alt="" style="width: 320px; height: 320px;">
            <div style="width: 100%; height: 100px; position: absolute; bottom: 0; left: 0; padding: 15px 25px;">
                <span style="color: #000; font-size: 18px; font-weight: bold">{{ $product->nome }}</span><br>
                <span style="color: grey;">{{ $product->categoria }} - {{ $product->genere }}</span><br>
                <span style="color: #000;  font-weight: bold">{{ $product->amount }} €</span>
            </div>
        </div>
    </a>
    @endforeach
    
</div>


@endsection