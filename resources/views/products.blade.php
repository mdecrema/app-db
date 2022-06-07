@extends('layouts.app')


@section('page-title')
@endsection


@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12" style="padding: 0 35px">
            <h4>PRODOTTI</h4>
        </div>
        
        @foreach($products as $product)
            <div class="col-lg-4 col-xs-6 col-sm-6" style="width: 46%; height: 300px; margin: 0 2%; padding: 10px; overflow: hidden; position: relative; margin-bottom: 30px; margin: auto; display: inline-block; text-align: center;">
            <a href="products/{{$product['id']}}">
                <div style="display: flex; justify-content: flex-around">
                    <img class="active" src="{{'https://img-space.fra1.digitaloceanspaces.com/img-space/uploads/images/'.$product->photo1}}" alt="" style="width: 100%; height: 250px;">
                </div>
                <div style="width: 100%; height: 100px; position: absolute; bottom: 0; left: 0; padding: 15px 25px;">
                    <span style="color: #000; font-size: 14px; font-weight: bold" class="text-truncate">{{ $product->nome }}</span><br>
                    <span style="color: grey; font-size: 11px;">{{ $product->categoria }} - {{ $product->genere }}</span><br>
                    <span style="color: #000; font-size: 12px; font-weight: bold">{{ number_format($product->amount, 2, '.', ',') }} €</span>
                </div>
                </a>
            </div>
        @endforeach
        
    </div>
</div>

@endsection