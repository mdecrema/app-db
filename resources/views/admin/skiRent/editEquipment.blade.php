@extends('layouts.dashboard_page')

@section('page-title')
    All Equipment
@endsection

@section('content')
<h2>Edit Equipment - {{ $ski->id }}</h2>

<div style="margin: 30px 0">
    <form action="{{ route('admin.skiRent.update', $ski['id']) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method("POST")

        <div class="form-group">
            <label for="brand">Marca</label>
            <input type="text" class="form-control" id="brand" name="brand" value="{{ $ski->brand }}" placeholder="Marca del materiale">
        </div>

        <div class="form-group">
            <label for="model">Modello</label>
            <textarea class="form-control" name="model" id="model" cols="30" rows="10" value="{{ $ski->model }}" placeholder="Specifica il modello"></textarea>
        </div>

        <div class="form-group">
            <label for="length">Lunghezza</label>
            <input type="text" class="form-control" id="length" name="length" value="{{ $ski->length }}" placeholder="Lunghezza in cm">
        </div>

        <div class="form-group">
            <label for="level">Livello</label>
            <input type="text" class="form-control" id="level" name="level" value="{{ $ski->level }}" placeholder="Livello di difficoltà">
        </div>

        <div class="form-group">
            <label for="type">Tipologia</label>
            <input type="text" class="form-control" id="type" name="type" value="{{ $ski->type }}" placeholder="Tipologia di utilizzo">
        </div>

        <div class="form-group">
            <label for="rentCost">Costo per noleggio (€/giorno)</label>
            <input type="text" class="form-control" id="rentCost" name="rentCost" value="{{ $ski->rentCost }}" placeholder="15.00">
        </div>

        <div class="form-group">
            <label for="value">Valore attrezzatura</label>
            <input type="text" class="form-control" id="value" name="value" value="{{ $ski->value }}" placeholder="€ (no decimali)" placeholder="€">
        </div>
        
        <button type="submit" class="btn btn-primary">Modifica</button>
    </form>
    
</div>

@endsection