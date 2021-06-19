@extends('layouts.app')

@section('page-title')
    show 
@endsection

@section('content')

<div class="container">
    <div class="item-view row">
        
        <div class="item-picture" style="overflow: hidden; position: relative;">
            <img id="uno" src="{{'https://img-space.fra1.digitaloceanspaces.com/img-space/uploads/images/'.$product->photo1}}" class="active first" alt="item pictures" style="width: 100%; height: 350px" /> <!-- {{ asset('storage/'.$product->photo1) }} -->
            <img id="due" src="{{'https://img-space.fra1.digitaloceanspaces.com/img-space/uploads/images/'.$product->photo2}}" alt="item pictures" style="width: 100%; height: 350px" />
            <img id="tre" src="{{'https://img-space.fra1.digitaloceanspaces.com/img-space/uploads/images/'.$product->photo3}}" alt="item pictures" style="width: 100%; height: 350px" />
            <img id="quattro" src="{{'https://img-space.fra1.digitaloceanspaces.com/img-space/uploads/images/'.$product->photo4}}" class="last" alt="item pictures" style="width: 100%; height: 350px" />
            <!-- Arrows Left and Right -->
            <div style="width: 40px; height: 100%; position: absolute; top: 0; left: 0">
                <div id="arrowLeft" style="width: 40px; height: 40px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center">
                    <i class="fas fa-2x fa-chevron-left"></i>
                </div>
            </div>
            <div style="width: 40px; height: 100%; position: absolute; top: 0; right: 0">
                <div id="arrowRight" style="width: 40px; height: 40px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center">
                    <i class="fas fa-2x fa-chevron-right"></i>
                </div>
            </div>
        </div>
        <div class="item-details">
            <h3>{{$product->name}}</h3>
            <p>{{$product->description}}</p>
            <span></span>
        </div>
        <div class="item-amount col-lg-1">
            € {{$product->amount}}
        </div>
        <div class="col-lg-2">
        
        <form action="{{ route('admin.products.delete', $product['id']) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-holder btn-danger">Cancella  <i class="fas fa-times"></i></button>
        </form>
    </div>
</div>

@endsection