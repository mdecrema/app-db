@extends('layouts.app')

@section('page-title')
    All Equipment
@endsection

@section('content')
<ul style="list-style: none">
    <li style="display: inline-block; padding: 0 5px"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li style="display: inline-block; padding: 0 5px"><a href="{{ route('admin.skiRent.addEquipment') }}">Aggiungi materiale</a></li>
    <li style="display: inline-block; padding: 0 5px"><a href="{{ route('admin.skiRent.allRent') }}">Attrezzatura noleggiata</a></li>
</ul>
<h2>Equipment stored</h2>

<div class="row" style="margin: 30px 0">
    @foreach($allSki as $ski)
        <div class="col-3" style="min-height: 200px; border: 1px solid lightgrey; border-radius: 10px;">
            <h4>{{ $ski->brand }}</h4>
            <h5>{{ $ski->model }}</h5>
            <span>Tipologia: <strong>{{ $ski->type }}</strong> </span><br>
            <span>Livello: <strong>{{ $ski->level }}</strong> </span>
            <a href="edit/{{$ski->id}}"><i class="fas fa-pencil-alt"></i></a>
        </div>
    @endforeach
    </ul>
</div>

@endsection