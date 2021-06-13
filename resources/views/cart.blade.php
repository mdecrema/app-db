@extends('layouts.app')

@section('content')
<?php $total = 0 ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Carrello Prodotti</h1>
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
            <div class="cart-details col-lg-12">
                <h4>Hai {{ Cart::count() }} prodotto(i) nel tuo carrello</h4>

                @foreach( Cart::content() as $item )

                    <div class="col-lg-12">
                        <div class="cart-img">
                            <img id="" src="{{ $item->model->photo1) }}" alt="item-pitcure" />
                        </div>
                        <div class="cart-text">
                            <h4>{{$item->model->nome}}</h4>
                            <span>Taglia: {{$item->model->taglia}}</span>
                            <select class="quantity">
                                <option selected="">1</option>
                                <option>2</option>
                                <option>3</option> 
                                <option>4</option>
                                <option>5</option>
                            </select>
                            <span>€ {{$item->model->amount}}</span>
                            <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="cart-option"><i class="far fa-trash-alt"></i> Rimuovi</button>
                            </form>
                        </div>                        
                    </div>
                <?php $total += $item->model->amount * $item->model->quantity ?>

                @endforeach
                
                <div class="total">
                    <h3>Totale: € {{Cart::total()}}</h3>
                    <div class="col-lg-3 checkout-button">
                        <a href="#" class="">Completa Il Tuo Ordine <i class="fas fa-shopping-bag"></i></a>
                    </div>
                </div>
                <div class="">
                    <a href="{{ url('/') }}">Continua lo shopping</a>
                </div>

            @else

                <h3>Nessun prodotto nel carrello!</h3>
            
            @endif
        </div>
    </div>
@endsection