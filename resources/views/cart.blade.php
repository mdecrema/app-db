@extends('layouts.app')

@section('page-title')
    Cart
@endsection

@section('content')
<?php $total = 0 ?>
    <div class="container">
        <div class="row">
            <h3>Carrello</h3>
            @if (session()->has('success_message'))
                <div class="alert alert-success">
                    {{ session()->get('success_message') }}
                </div>
            @endif

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
                    {{-- Elimina dal carrello --}}
                    <form style="position: absolute; top: 0; right: 5px" action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="cart-option" style="border: none; background-color: transparent; font-size: 10px"><i class="fas fa-times"></i></button>
                    </form>

                    <div class="col-lg-12 d-flex flex-grow-1">

                        <div class="cart-img" style="width: 50%; height: 150px; display: inline-block; overflow: hidden; padding: 2%;">
                            <img class="active" id="" src="{{'https://img-space.fra1.digitaloceanspaces.com/img-space/uploads/images/'.$item->model->photo1}}" alt="item-pitcure" />
                        </div>
                        <div class="cart-text" style="width: 50%; display: inline-block; position: relative; padding: 2% 4%; line-height: 30px;">
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
                <?php $total += $item->model->amount * $item->model->quantity ?>

                @endforeach    
        </div>

            <table class="col-6 offset-6" style="margin-top: 10px">
                <tr>
                    <td>
                        Subtotale
                    </td>
                    <td style="text-align: right; font-size: 10px">
                        {{Cart::total()}}
                    </td>
                </tr>
                <tr>
                    <td>
                        Spedizione
                    </td>
                    <td style="text-align: right; font-size: 10px">
                        5.00
                    </td>
                </tr>
                <tr>
                    <td>
                        Sconti
                    </td>
                    <td style="text-align: right; font-size: 10px">
                        0.00
                    </td>
                </tr>
                <tr>
                    <td>
                        Tasse
                    </td>
                    <td style="text-align: right; font-size: 10px">
                        10%
                    </td>
                </tr>
                <tr>
                    <td style="font-size: 20px; font-weight: bold">
                        Totale
                    </td>
                    <td style="text-align: right; font-size: 20px; font-weight: bold">
                    <?php 
                        $subtotal = Cart::total();
                        $tax = 10;
                        $total = $subtotal + 5.00 * $tax / 10;
                    ?>
                        € {{ $total }}
                    </td>
                </tr>
            </table>

        <!-- <h6 style="text-align: right; font-size: 10px;">Spedizione: 5.00</h6>
        <h6 style="text-align: right; font-size: 10px;">Sconti: 0.00</h6>
        <h6 style="text-align: right; font-size: 10px;">Tasse: 10%</h6>
        <h4 style="text-align: right; padding: 0 10px; margin: 20px 0">Totale: € {{Cart::total()}}</h4> -->
        <div class="col-lg-6 offset-lg-6 col-md-6  offset-md-6 col-xm-12 col-xs-12 checkout-button" style="height: 35px; padding: 5px 10px; background-color: #ECDA48; border-radius: 3px; margin-top: 50px; text-align: right"><!--#045871-->
            <a href="{{ route('checkout.index') }}" class="" style="text-decoration: none; color: #000">Completa Il Tuo Ordine <i class="fas fa-shopping-bag"></i></a>
        </div>

        <div class="" style="margin: 10px 0 50px; text-align: right">
            <a href="{{ url('/') }}" style="text-decoration: none; color: #000">Continua lo shopping <i class="fas fa-chevron-right" style="font-size: 10px; margin-left: 5px"></i></a>
        </div>

        @else

        <h5>Nessun prodotto nel carrello!</h5>
            
        @endif
    </div>
</div>
@endsection