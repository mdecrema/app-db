@extends('layouts.app')


@section('page-title')
@endsection


@section('content')

<h4>PRODOTTI</h4>

<div class="row">
<div class="col-lg-10 offset-lg-1">

@foreach($products as $product)

<a href="products/{{$product['id']}}">
    <div class="col-lg-4" style="height: 200px; padding: 10px; overflow: hidden; border: 1px solid blue">
        <img src="{{ asset('storage/'.$product->photo1) }}" alt="" style="width: 100%; height: 100%">
    </div>
</a>
@endforeach
</div>
</div>

@endsection