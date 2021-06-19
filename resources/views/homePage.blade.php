@extends('layouts.app')

@section('page-title')
Red dot
@endsection

@section('content')

<div class="row">
    <div class="col-lg-12" style="position: relative; height: 60vh; overflow: hidden; background-image: url({{ asset('img/moment2.jpg') }}); background-size: cover; background-position: -290px 0; background-repeat: no-repeat;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    ">
   
   <!-- <img class="active" src="{{ asset('img/moment2.jpg') }}" alt="" style="width: 200%; height: 100%; margin-top: -100px; margin-left: -250px"> 
        <div class="col-lg-4" style="height: 200px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -70%);">
            <img src="{{ asset('img/off-w1.png') }}" alt="" style="width: 300px; height: 200px; position: absolute; bottom: 0px; left: 50%; transform: translate(-55%, 0%);"> 
        </div> -->
    </div>

    <div class="col-lg-12" style="margin-top: 20px">
        <img class="active" src="{{ asset('img/copertina.jpg') }}" alt="" style="width: 100%; height: 300px">
    </div>
</div>
@endsection