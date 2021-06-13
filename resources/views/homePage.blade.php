@extends('layouts.app')

@section('page-title')
Red dot
@endsection

@section('content')

<div class="row">
    <div class="col-lg-12" style="position: relative; height: 50vh; background-image: url('{{ asset('DSCF0438.jpg') }}'); background-size: cover; background-position: -200px -100px;  background-repeat: no-repeat">
        <div class="col-lg-4" style="height: 200px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -70%);">
            <img src="{{ asset('off-w1.png') }}" alt="" style="width: 300px; height: 200px; position: absolute; bottom: 0px; left: 50%; transform: translate(-55%, 0%);"> 
        </div>
    </div>
</div>
@endsection