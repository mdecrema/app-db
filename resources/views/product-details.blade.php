@extends('layouts.app')

@section('page-title')
    Product Details
@endsection

@section('content')
<div class="container">
    <div class="item-view row">
        <div class="item-picture" style="overflow: hidden">
            <img id="" src="{{ $product->photo1 }}" alt="item pictures" /> <!-- {{ asset('storage/'.$product->photo1) }} -->
        </div>
        <div class="item-details">
            <h3>{{$product->name}}</h3>
            <p>{{$product->description}}</p>
            <span></span>
        </div>
        <div class="item-amount col-lg-1">
            € {{$product->amount}}
        </div>
        <div class="item-cart col-lg-2">
            <!-- FORM -->
        </div>
    </div>
</div>
@endsection