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
    <div class="col-4 offset-2" style="height: 300px; border: 1px solid lightgrey; border-radius: 10px;">
        <div class="col-12">
            <h3>Vendita</h3>
        </div>
        <div class="col-12">
            <ul>
                <li><a href="{{ route('admin.products') }}">Tutti i prodotti</a></li>
                <li><a href="{{ route('admin.products.create') }}">Crea nuovo prodotto</a></li>
                <li><a href="{{ route('admin.products.create') }}">Utenti registrati</a></li>
            </ul>
        </div>
    </div>
    <div class="col-4" style="height: 300px; border: 1px solid lightgrey; border-radius: 10px">
        <div class="col-12">
            <h3>Noleggio</h3>
            <ul>
                <li><a href="{{ route('admin.skiRent.allEquipment') }}">Tutto il materiale presente</a></li>
                <li><a href="{{ route('admin.skiRent.addEquipment') }}">Aggiungi materiale</a></li>
                <li><a href="{{ route('admin.skiRent.allRent') }}">Materiale noleggiato</a></li>
            </ul>
        </div>
    </div>
</div>
@endsection