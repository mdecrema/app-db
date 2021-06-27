@extends('layouts.app')


@section('page-title')
@endsection


@section('content')

<h4>PRODOTTI</h4>

<div class="row">
<div class="col-lg-10 offset-lg-1">

@foreach($products as $product)

<a href="products/{{$product['id']}}">
    <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4" style="height: 400px; padding: 10px; overflow: hidden; position: relative">
        <img class="active" src="{{'https://img-space.fra1.digitaloceanspaces.com/img-space/uploads/images/'.$product->photo1}}" alt="" style="width: 320px; height: 320px">
        <div style="width: 100%; height: 80px; position: absolute; bottom: 0; left: 0; padding: 25px 10px">
        <h5 style="color: #000; font-weight: bold">{{ $product->nome }}</h5>
        <span style="color: #000;">{{ $product->amount }} €</span>
        </div>
        {{-- expand icon --}}
        <div style="width: 30px; height: 30px; position: absolute; top: 0; right: 0; text-align: center; padding: 5px">
            <i class="fas fa-expand-alt" style="color: darkgrey; font-size: 20px"></i>
        </div>
    </div>
</a>
@endforeach
</div>
</div>

@endsection