@extends('layouts.app')


@section('page-title')
@endsection


@section('content')

<h4>PRODOTTI</h4>

<div class="row">
<div class="col-lg-10 offset-lg-1">
@foreach($products as $product)
<div class="col-lg-4" style="border: 1px solid blue">
<img src="{{ $product->photo1 }}" alt="">
</div>
@endforeach
</div>
</div>

@endsection