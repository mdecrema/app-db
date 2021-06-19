@extends('layouts.app')


@section('page-title')
@endsection


@section('content')

<h4>PRODOTTI</h4>

<div class="row">
<div class="col-lg-10 offset-lg-1">

@foreach($products as $product)

<a href="products/{{$product['id']}}">
    <div class="col-lg-4" style="height: 350px; padding: 10px; overflow: hidden;">
       
        <img class="active" src="{{'https://img-space.fra1.digitaloceanspaces.com/img-space/uploads/images/'.$product->photo1}}" alt="" style="width: 100%; height: 100%">
    </div>
</a>
@endforeach
</div>
</div>

@endsection