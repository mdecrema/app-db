@extends('layouts.app')

@section('page-title')
    Dashboard
@endsection

@section('content')
<div class="row">
    <div class="col-10 offset-2" style="margin-bottom: 30px">
        <h2>Admin Dashboard</h2>
        <h3></h3>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-10 col-sm-10 col-xs-10 offset-xl-2 offset-lg-2 offset-md-1 offset-sm-1 offset-xs-1" style="height: 300px; border: 1px solid lightgrey; border-radius: 10px;">
        <div class="col-12">
            <h3>Vendita</h3>
        </div>
        <div class="col-12">
            
            <a href="{{ route('admin.products') }}">Tutti i prodotti</a><br/>
            <a href="{{ route('admin.products.create') }}">Crea nuovo prodotto</a><br/>
            <a href="{{ route('admin.products.create') }}">Utenti registrati</a><br/>
            
        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-10 col-sm-10 col-xs-10 offset-md-1 offset-sm-1 offset-xs-1" style="height: 300px; border: 1px solid lightgrey; border-radius: 10px">
        <div class="col-12">
            <h3>Noleggio</h3>
            
            <a href="{{ route('admin.skiRent.allEquipment') }}">Tutto il materiale presente</a><br/>
            <a href="{{ route('admin.skiRent.addEquipment') }}">Aggiungi materiale</a><br/>
            <a href="{{ route('admin.skiRent.allRent') }}">Materiale noleggiato</a><br/>
            
        </div>
    </div>
</div>
@endsection