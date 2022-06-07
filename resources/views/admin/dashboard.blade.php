@extends('layouts.app')

@section('page-title')
    Dashboard
@endsection

@section('content')
<div class="container">
    <div class="row" style="font-family: 'Roboto', sans-serif">
        <div class="col-lg-12" style="margin-bottom: 30px; text-align: center">
            <h2>Admin Dashboard</h2>
            <h3></h3>
            @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
            @endif
        </div>
    <div>
    
    <div class="row">
        <div class="col-xl-5 col-lg-5 col-md-10 col-sm-10 col-xs-10 offset-xl-1 offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1" style="height: 300px">
            <h3 style="font-weight: bold">Ordini</h3>         
            @foreach($ordiniMenuList as $menuItem)
            <div class="card" style="padding: 10px; margin: 2px 0">
                <a style="color: #000; text-decoration: none" href="{{ $menuItem->link }}">{{ $menuItem->name }}</a><br/>
                @if ($menuItem->name === 'Ordini pending')
                <span class="badge badge-danger" style="position: absolute; top: 0; right: 0">{{ $newOrderNumber }}</span>
                @endif
            </div>
            @endforeach
        </div>
        <div id="magazzino-panel" class="col-xl-5 col-lg-5 col-md-10 col-sm-10 col-xs-10 offset-xl-1 offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1" style="height: 300px">
            <h3 style="font-weight: bold">Magazzino</h3>
            @foreach($magazzinoMenuList as $menuItem)
            <div class="card" style="padding: 10px; margin: 2px 0">
                <a style="color: #000; text-decoration: none" href="{{ $menuItem->link }}">{{ $menuItem->name }}</a><br/>
            </div>
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col-xl-5 col-lg-5 col-md-10 col-sm-10 col-xs-10 offset-xl-1 offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1" style="height: 300px">
            <h3 style="font-weight: bold">Noleggio</h3>          
            @foreach($noleggioMenuList as $menuItem)
            <div class="card" style="padding: 10px; margin: 2px 0">
                <a style="color: #000; text-decoration: none" href="{{ $menuItem->link }}">{{ $menuItem->name }}</a><br/>
            </div>
            @endforeach
        </div>
        <div class="col-xl-5 col-lg-5 col-md-10 col-sm-10 col-xs-10 offset-xl-1 offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1" style="height: 300px">
            <h3 style="font-weight: bold">Utenti</h3>          
            @foreach($utentiMenuList as $menuItem)
            <div class="card" style="padding: 10px; margin: 2px 0">
                <a style="color: #000; text-decoration: none" href="{{ $menuItem->link }}">{{ $menuItem->name }}</a><br/>
            </div>
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col-xl-5 col-lg-5 col-md-10 col-sm-10 col-xs-10 offset-xl-1 offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1" style="height: 300px">
            <h3 style="font-weight: bold">Statistiche</h3>          
            @foreach($statisticheMenuList as $menuItem)
            <div class="card" style="padding: 10px; margin: 2px 0">
                <a style="color: #000; text-decoration: none" href="{{ $menuItem->link }}">{{ $menuItem->name }}</a><br/>
            </div>
            @endforeach
        </div>
        <div class="col-xl-5 col-lg-5 col-md-10 col-sm-10 col-xs-10 offset-xl-1 offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1" style="height: 300px">
            <h3 style="font-weight: bold">Preferenze</h3>          
            @foreach($preferenzeMenuList as $menuItem)
            <div class="card" style="padding: 10px; margin: 2px 0">
                <a style="color: #000; text-decoration: none" href="{{ $menuItem->link }}">{{ $menuItem->name }}</a><br/>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
