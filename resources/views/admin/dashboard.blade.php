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
    <!-- <div class="col-lg-8 offset-lg-2" style="border: 1px solid #333333; border-radius: 5px; margin-bottom: 20px">
        <ul class="nav">
            <li class="nav-item"><a class="nav-link" style="color: #000; text-decoration: none" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="nav-item"><a class="nav-link" style="color: #000; text-decoration: none" href="{{ route('admin.skiRent.allEquipment') }}">Ordini</a></li>
            <li class="nav-item"><a class="nav-link" style="color: #000; text-decoration: none" href="{{ route('admin.skiRent.allRent') }}">Utenti</a></li>
        </ul>
    </div> -->
    <div>
    <div class="row">
        <div class="col-xl-8 col-lg-8 col-md-10 col-sm-10 offset-xl-2 offset-lg-2 offset-md-1 offset-sm-1" style="border: 1px solid lightgrey; border-left: none; border-right: none; margin-bottom: 50px; padding: 30px 0">
            <div class="col-12">
                <h3 style="font-weight: bold">Ordini</h3>         
                @foreach($ordiniMenuList as $menuItem)
                <div class="col-4 card text-truncate" style="padding: 15px; float: left">
                    <a style="color: #000; text-decoration: none" href="{{ $menuItem->link }}">{{ $menuItem->name }}</a>
                    @if ($menuItem->name === 'Ordini pending')
                    <span class="badge badge-danger" style="position: absolute; top: 0; right: 0">{{ $newOrderNumber }}</span>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="row">
        <div id="magazzino-panel" class="col-xl-4 col-lg-4 col-md-10 col-sm-10 col-xs-10 offset-xl-2 offset-lg-2 offset-md-1 offset-sm-1 offset-xs-1" style="height: 300px">
                <h3 style="font-weight: bold">Magazzino</h3>
                @foreach($magazzinoMenuList as $menuItem)
                <div class="card" style="padding: 10px; margin: 2px 0">
                    <a style="color: #000; text-decoration: none" href="{{ $menuItem->link }}">{{ $menuItem->name }}</a><br/>
                </div>
                @endforeach
        </div>
        <div class="col-xl-4 col-lg-4 col-md-10 col-sm-10 col-xs-10 offset-xl-0 offset-lg-0 offset-md-1 offset-sm-1 offset-xs-1" style="height: 300px">
                <h3 style="font-weight: bold">Noleggio</h3>          
                @foreach($noleggioMenuList as $menuItem)
                <div class="card" style="padding: 10px; margin: 2px 0">
                    <a style="color: #000; text-decoration: none" href="{{ $menuItem->link }}">{{ $menuItem->name }}</a><br/>
                </div>
                @endforeach
        </div>
    </div>
@endsection
