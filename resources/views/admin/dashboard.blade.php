@extends('layouts.app')

@section('page-title')
    Dashboard
@endsection

@section('content')
    <ul>
        <li><a href="{{ route('admin.products.create') }}">Crea nuovo prodotto</a></li>
    </ul>
@endsection