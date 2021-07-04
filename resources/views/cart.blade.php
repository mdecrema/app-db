@extends('layouts.app')

@section('content')
<?php $total = 0 ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>Carrello</h3>
                    @if (session()->has('success_message'))
                        <div class="alert alert-success">
                            {{ session()->get('success_message') }}
                        </div>
                    @endif
            </div>

            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (Cart::count() > 0)

            <h6>Hai {{ Cart::count() }} prodotto(i) nel tuo carrello</h6>

            <div class="cart-details col-lg-12">

                @foreach( Cart::content() as $item )

                    <div class="col-lg-12">

                        {{-- Elimina dal carrello --}}
                        <form style="position: absolute; top: 0; right: 0" action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="cart-option" style="border: none; background-color: transparent;"><i class="fas fa-times"></i></button>
                        </form>
                        <div class="row">

                        <div class=" cart-img">
                            <img class="active" id="" src="{{'https://img-space.fra1.digitaloceanspaces.com/img-space/uploads/images/'.$item->model->photo1}}" alt="item-pitcure" />
                        </div>
                        <div class=" cart-text">
                            <h5><strong>{{$item->model->nome}}</strong></h5>
                            <span>Taglia: {{$item->model->taglia}}</span>
                            <select class="form-select" name="" id="" style="width: 50px; font-size: 12px; background-color: #000; color: #fff; padding: 5px 10px; border-radius: 3px">
                                <option selected="">1</option>
                                <option>2</option>
                                <option>3</option> 
                                <option>4</option>
                                <option>5</option>
                            </select>
                            <span>€ {{$item->model->amount}}</span>
                        </div> 

                        </div>
                       
                    </div>
                <?php $total += $item->model->amount * $item->model->quantity ?>

                @endforeach
                
        </div>
        <div class="total">
                    <h4 style="text-align: right; padding: 0 10px">Totale: € {{Cart::total()}}</h4>
                    <div class="col-lg-3 checkout-button">
                        <a href="{{ route('checkout.index') }}" class="" style="text-decoration: none; color: #fff">Completa Il Tuo Ordine <i class="fas fa-shopping-bag"></i></a>
                    </div>
                </div>
                <div class="" style="margin: 10px 0; height: 35px; padding: 5px 10px; background-color: #045871; border-radius: 3px; margin-top: 20px;">
                    <a href="{{ url('/') }}" style="text-decoration: none; color: #000">Continua lo shopping <i class="fas fa-chevron-right" style="font-size: 10px; margin: 0 5px"></i></a>
                </div>

            @else

                <h5>Nessun prodotto nel carrello!</h5>
            
            @endif
    </div>
@endsection