@extends('layouts.app')

@section('page-title')
    Dashboard
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12" style="margin-bottom: 30px; text-align: center">
        <h2>Admin Dashboard</h2>
        <h3></h3>
    </div>
    <div class="col-lg-8 offset-lg-2" style="border: 1px solid #333333; border-radius: 5px; margin-bottom: 20px">
        <ul class="nav">
            <li class="nav-item"><a class="nav-link" style="color: #000; text-decoration: none" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="nav-item"><a class="nav-link" style="color: #000; text-decoration: none" href="{{ route('admin.skiRent.allEquipment') }}">Ordini</a></li>
            <li class="nav-item"><a class="nav-link" style="color: #000; text-decoration: none" href="{{ route('admin.skiRent.allRent') }}">Utenti</a></li>
        </ul>
    </div>
    <div>
        <div id="magazzino-panel" class="col-xl-4 col-lg-4 col-md-10 col-sm-10 col-xs-10 offset-xl-2 offset-lg-2 offset-md-1 offset-sm-1 offset-xs-1" style="height: 300px">
                <h3 style="font-weight: bold">Magazzino</h3>
                <div class="card" style="padding: 0 10px; margin: 2px 0">
                    <a style="color: #000; text-decoration: none" href="{{ route('admin.products') }}">Tutti i prodotti</a><br/>
                </div>
                <div class="card" style="padding: 0 10px; margin: 2px 0">
                    <a style="color: #000; text-decoration: none" href="{{ route('admin.products.create') }}">Aggiungi nuovo</a><br/>
                </div>
                <div class="card" style="padding: 0 10px; margin: 2px 0">
                    <a style="color: #000; text-decoration: none" href="{{ route('admin.users.allUser') }}">Utenti registrati</a><br/>
                </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-10 col-sm-10 col-xs-10" style="height: 300px">
                <h3 style="font-weight: bold">Noleggio</h3>              
                <div class="card" style="padding: 0 10px; margin: 2px 0">
                    <a style="color: #000; text-decoration: none" href="{{ route('admin.skiRent.allEquipment') }}">Tutto il materiale</a><br/>
                </div>
                <div class="card" style="padding: 0 10px; margin: 2px 0">
                    <a style="color: #000; text-decoration: none" href="{{ route('admin.skiRent.addEquipment') }}">Aggiungi materiale</a><br/>
                </div>
                <div class="card" style="padding: 0 10px; margin: 2px 0">
                    <a style="color: #000; text-decoration: none" href="{{ route('admin.skiRent.allRent') }}">Materiale noleggiato</a><br/>
                </div>
        </div>
    </div>
</div>
@endsection
