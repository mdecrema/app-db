@extends('layouts.app')

@section('page-title')
    Ski Rent
@endsection

@section('content')
<h2>RESULTS</h2>

<div style="margin: 30px 0">
    <ul>
    @foreach($skiArray as $ski)
        <li>
            <h4>{{ $ski->brand }}</h4>
            <span>{{ $ski->model }}</span>
        </li>
    @endforeach
    </ul>
</div>

@endsection