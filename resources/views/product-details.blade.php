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
        <form action="{{ route('cart.store') }}" method="POST"> {{--  --}}
                @csrf
                @method('POST')
                <input type="hidden" name="id" value="{{ $product->id }}">
                <input type="hidden" name="nome" value="{{ $product->nome }}">
                <!--<input type="hidden" name="taglia" value="{{ $product->taglia }}">-->
                <input type="hidden" name="amount" value="{{ $product->amount }}">
                <button type="submit" class="btn btn-holder btn-warning">Add to Cart</button>
            </form>
        </div>
    </div>
</div>
@endsection