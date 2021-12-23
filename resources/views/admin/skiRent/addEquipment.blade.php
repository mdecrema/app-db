@extends('layouts.app')

@section('page-title')
    All Equipment
@endsection

@section('content')
<h2>Add Equipment</h2>

<div style="margin: 30px 0">
    <form action="{{ route('admin.skiRent.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method("POST")

        <div class="form-group">
            <label for="brand">Marca</label>
            <input type="text" class="form-control" id="brand" name="brand" placeholder="Marca del materiale">
        </div>

        <div class="form-group">
            <label for="model">Modello</label>
            <textarea class="form-control" name="model" id="model" cols="30" rows="10" placeholder="Specifica il modello"> {{old("content")}} </textarea>
        </div>

        <div class="form-group">
            <label for="length">Lunghezza</label>
            <input type="text" class="form-control" id="length" name="length" placeholder="Lunghezza in cm">
        </div>

        <div class="form-group">
            <label for="level">Livello</label>
            <input type="text" class="form-control" id="level" name="level" placeholder="Livello di difficoltà">
        </div>

        <div class="form-group">
            <label for="type">Tipologia</label>
            <input type="text" class="form-control" id="type" name="type" placeholder="Tipologia di utilizzo">
        </div>

        <div class="form-group">
            <label for="value">Valore(€)</label>
            <input type="text" class="form-control" id="value" name="value" placeholder="Valore del materiale (no decimali)" placeholder="€">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    
</div>

@endsection