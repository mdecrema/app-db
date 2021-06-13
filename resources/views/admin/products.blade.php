@extends('layouts.app')

@section('page-title')
Admin Products
@endsection

@section('content')
<h2>"Page in progress"</h2>
<form action="{{ route('admin.deleteAll') }}" method="POST">
@csrf
@method('DELETE')
<button type="submit">Cancella Tutti i Prodotti</button>
</form>

@endsection