@extends('layouts.dashboard_page')

@section('page-title')
    Order details
@endsection

@section('content')
<div class="container" style="font-family: 'Roboto', sans-serif">
    <div class="row">
        <div class="col-12" style="margin: 15px 0;">
            <h3><em>Ordine #{{ $order->id }}</em></h3>
        </div>
        <div class="col-12" style="border: 1px solid lightgrey; background-color: lightgrey; padding: 20px">
            <div class="card" style="border: 2px solid #333333">
                <div class="card-body card-order-details">
                    {{-- Anagrafica cliente --}}
                    <h5 class="card-title"><i class="fa fa-chevron-right" style="margin-right: 10px"></i> Anagrafica cliente</h5> {{-- <i class="fa fa-2x fa-file-user"></i> --}}
                    <table class="table">
                        <tr scope="col"> 
                            <td scope="row" style="width: 50%;">Nome:</td>
                            <td style="width: 50%;"><strong>{{ $order->firstName }} {{ $order->lastName }}</strong></td>
                        </tr>
                        <tr scope="col"> 
                            <td scope="row" style="width: 50%;">Indirizzo mail:</td>
                            <td style="width: 50%;"><strong>{{ $order->email }}</strong></td>
                        </tr>
                        <tr scope="col"> 
                            <td scope="row" style="width: 50%;">Telefono:</td>
                            <td style="width: 50%;"><strong>{{ $order->phone }}</strong></td>
                        </tr>
                    </table>
                    {{-- Rimandare all'anagrafica user se verrà sviluppata in futuro --}}
                    {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}

                    {{-- Indirizzo --}}
                    <h5 class="card-title"><i class="fa fa-chevron-right" style="margin-right: 10px"></i> Indirizzo di spedizione</h5> {{-- <i class="fa fa-2x fa-person-dolly"></i> --}}
                    <table class="table">
                        
                        <tr scope="col"> 
                            <td scope="row" style="width: 50%;">Via:</td>
                            <td style="width: 50%;"><strong>{{ $order->street }}, {{ $order->house }}</strong></td>
                        </tr>
                        <tr scope="col"> 
                            <td scope="row" style="width: 50%;">Città/Paese:</td>
                            <td style="width: 50%;"><strong>{{ $order->city }} - {{ $order->area }}</strong></td>
                        </tr>
                        <tr scope="col"> 
                            <td scope="row" style="width: 50%;">CAP:</td>
                            <td style="width: 50%;"><strong>{{ $order->postcode }}</strong></td>
                        </tr>
                        <tr scope="col"> 
                            <td scope="row" style="width: 50%;">Citofono:</td>
                            <td style="width: 50%;"><strong>{{ $order->doorName }}</strong></td>
                        </tr>
                    </table>
                </div>
            </div>
        <div>

        <div class="col-12" style="border: 1px solid lightgrey; background-color: lightgrey; padding: 20px">
            <div style="min-height: 50px">
                <div class="col-6" style="float: left">
                    <h3>Prodotti acquistati</h3>
                </div>
                <div class="col-6" style="float: left; text-align: right">
                    <h3>€ {{ $order->fullAmount }}</h3>
                </div>
            </div>
            
            <div style="border: 2px solid #333333;">
                
                @foreach( $productsInOrder as $item )
                <div style="height: 50px; padding: 10px; background-color: grey">
                    <div class="col-6" style="float: left">
                        <h4>ID: {{ $itemsInOrder[array_search($item, $productsInOrder)]->id }}</h4>
                    </div>
                    <div class="col-6" style="float: left; text-align: right">
                        <h4>
                            {{ $itemsInOrder[array_search($item, $productsInOrder)]->barCode }}
                        </h4>
                    </div>
                </div>
                
                    <div class="col-lg-12 d-flex flex-grow-1" style="background-color: #fff">
                        <div class="cart-img" style="width: 30%; height: 150px; display: inline-block; overflow: hidden;">
                            <img class="active" id="" src="{{'https://img-space.fra1.digitaloceanspaces.com/img-space/uploads/images/'.$item['photo1']}}" alt="item-pitcure" style="width: 150px; height: 140px" />
                        </div>
                        <div class="cart-text" style="width: 70%; display: inline-block; position: relative; line-height: 30px;">
                            <ul style="list-style: none">
                                <li><h5><strong>{{$item->nome}}</strong></h5></li>
                                <li>taglia: {{ $itemsInOrder[array_search($item, $productsInOrder)]->size }}</li>
                                <li>€ {{ number_format($item['amount'], 2, '.', ',') }}</li>
                            </ul>
                        </div> 

                    </div>

                @endforeach    
            </div>
        </div>

    </div>
</div>

@endsection