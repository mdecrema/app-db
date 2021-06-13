@extends('layouts.app')

@section('page-title')
    Dashboard
@endsection

@section('content')
    <ul>
        <li><a href="{{ route('admin.products') }}">Tutti i prodotti</a></li>
        <li><a href="{{ route('admin.products.create') }}">Crea nuovo prodotto</a></li>
        <li><a href="{{ route('admin.products.create') }}">Utenti registrati</a></li>
    </ul>
@endsection