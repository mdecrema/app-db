@extends('layouts.app')

@section('page-title')
Admin Products
@endsection

@section('content')
<h2>"Page in progress"</h2>
<form action="{{ route('admin.deleteAll') }}" method="POST">
@csrf
@method('DELETE')
<button type="submit" disabled class="btn btn-holder btn-secondary">Cancella Tutti i Prodotti <i class="fas fa-exclamation-circle"></i></button>
</form>

<h2> Tutti i Prodotti </h2>

@foreach($products as $product)

<a href="products/show/{{$product['id']}}">
    <div class="col-lg-4 " style="height: 350px; padding: 10px; overflow: hidden;">
       
        <img class="active" src="{{'https://img-space.fra1.digitaloceanspaces.com/img-space/uploads/images/'.$product->photo1}}" alt="" style="width: 100%; height: 100%">
    </div>
</a>
@endforeach

@endsection