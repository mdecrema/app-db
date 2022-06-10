@extends('layouts.app')

@section('page-title')
    Dashboard
@endsection

@section('content')
<div class="container border_blue" style="border-top: none">
    <div class="row " style="font-family: 'Roboto', sans-serif">
        <div class="col-lg-12 bg_darkblue pt-3 p-2" style="margin-bottom: 30px; text-align: center">
            <h4>Admin Dashboard</h4>
            <h3></h3>
            @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
            @endif
        </div>
    <div>
    
    <div class="row">
        <div class="col-xl-5 col-lg-5 col-md-10 col-sm-10 col-xs-10 offset-xl-1 offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1" style="height: 250px">
            <h5 style="font-weight: bold"><i class="fa fa-truck" style="color: #88A9D9"></i> Ordini</h5>         
            @foreach($ordiniMenuList as $menuItem)
            <div class="card" style="padding: 10px; margin: 2px 0">
                <a style="color: #000; text-decoration: none" href="{{ $menuItem->link }}">{{ $menuItem->name }}</a>
                @if ($menuItem->name === 'Ordini pending')
                <span class="badge badge-danger" style="position: absolute; top: 0; right: 0">{{ $newOrderNumber }}</span>
                @endif
            </div>
            @endforeach
        </div>
        <div id="magazzino-panel" class="col-xl-5 col-lg-5 col-md-10 col-sm-10 col-xs-10 offset-xl-1 offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1" style="height: 250px">
            <h5 style="font-weight: bold"><i class="fa fa-database" style="color: #88A9D9"></i> Magazzino</h5>
            @foreach($magazzinoMenuList as $menuItem)
            <div class="card" style="padding: 10px; margin: 2px 0">
                <a style="color: #000; text-decoration: none" href="{{ $menuItem->link }}">{{ $menuItem->name }}</a>
            </div>
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col-xl-5 col-lg-5 col-md-10 col-sm-10 col-xs-10 offset-xl-1 offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1" style="height: 250px">
            <h5 style="font-weight: bold"><i class="fa fa-barcode-read" style="color: #88A9D9"></i> Noleggio</h5> {{-- <i class="fa fa-scanner-touchscreen" style="color: #88A9D9"></i> --}}
            @foreach($noleggioMenuList as $menuItem)
            <div class="card" style="padding: 10px; margin: 2px 0">
                <a style="color: #000; text-decoration: none" href="{{ $menuItem->link }}">{{ $menuItem->name }}</a>
            </div>
            @endforeach
        </div>
        <div class="col-xl-5 col-lg-5 col-md-10 col-sm-10 col-xs-10 offset-xl-1 offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1" style="height: 250px">
            <h5 style="font-weight: bold"><i class="fa fa-key" style="color: #88A9D9"></i> Utenti</h5>          
            @foreach($utentiMenuList as $menuItem)
            <div class="card" style="padding: 10px; margin: 2px 0">
                <a style="color: #000; text-decoration: none" href="{{ $menuItem->link }}">{{ $menuItem->name }}</a>
            </div>
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col-xl-5 col-lg-5 col-md-10 col-sm-10 col-xs-10 offset-xl-1 offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1" style="height: 250px">
            <h5 style="font-weight: bold"><i class="fa fa-fas fa-chart-pie" style="color: #88A9D9"></i> Statistiche</h5>
            @foreach($statisticheMenuList as $menuItem)
            <div class="card" style="padding: 10px; margin: 2px 0">
                <a style="color: #000; text-decoration: none" href="{{ $menuItem->link }}">{{ $menuItem->name }}</a>
            </div>
            @endforeach
        </div>
        <div class="col-xl-5 col-lg-5 col-md-10 col-sm-10 col-xs-10 offset-xl-1 offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1" style="height: 250px">
            <h5 style="font-weight: bold"><i class="fa fa-gear" style="color: #88A9D9"></i> Preferenze</h5>          
            @foreach($preferenzeMenuList as $menuItem)
            <div class="card" style="padding: 10px; margin: 2px 0">
                <a style="color: #000; text-decoration: none" href="{{ $menuItem->link }}">{{ $menuItem->name }}</a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
