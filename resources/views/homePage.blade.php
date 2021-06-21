@extends('layouts.app')

@section('page-title')
Red dot
@endsection

@section('content')

<div class="row">
    <!--<div class="col-lg-12" style="position: relative; height: 60vh; overflow: hidden; background-image: url({{ asset('img/moment2.jpg') }}); background-size: cover; background-position: -330px 0; background-repeat: no-repeat;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    ">

    <div style="width: 150px; height: 40px; background-color: #fff; border: 3px solid lightgrey; opacity: 0.7; position: absolute; top: 60%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
        <a href="{{ route('products') }}" style="text-decoration: none; color: #000; line-height: 35px">Nuovi Arrivi</a>
    </div>-->
   
   <!-- <img class="active" src="{{ asset('img/moment2.jpg') }}" alt="" style="width: 200%; height: 100%; margin-top: -100px; margin-left: -250px"> 
        <div class="col-lg-4" style="height: 200px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -70%);">
            <img src="{{ asset('img/off-w1.png') }}" alt="" style="width: 300px; height: 200px; position: absolute; bottom: 0px; left: 50%; transform: translate(-55%, 0%);"> 
        </div> -->
    </div>

    <div class="col-lg-12" style="margin-top: 20px; position: relative">
        <img class="active" src="{{ asset('img/copertina.jpg') }}" alt="" style="width: 100%; height: 300px;">
        <div style="width: 150px; height: 40px; background-color: #fff; border: 3px solid lightgrey; opacity: 0.7; position: absolute; top: 30%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
        <a href="{{ route('products') }}" style="text-decoration: none; color: #000; line-height: 35px">Nuovi Arrivi</a>
        </div>
    </div>

    <div class="col-lg-12" style="margin-top: 30px">
        <div class="col-lg-12" style="height: 100px; margin-bottom: 10px; border-radius: 2px; box-shadow: 2px 2px 5px lightgrey">
            <a href="{{ route('products') }}" style="text-decoration: none; color: #000">
                <div style="width: 40%; height: 100%; float: left; position: relative">
                    <div style="width: 100px; height: 100px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%)"></div>
                </div>
                <div style="width: 60%; height: 100%; float: left; text-align: left; padding: 20px; line-height: 45px; font-size: 20px">
                    Scarpe
                </div>
            </a>
        </div>
        <div class="col-lg-12" style="height: 100px; margin-bottom: 10px; border-radius: 2px; box-shadow: 2px 2px 5px lightgrey">
            <a href="{{ route('products') }}" style="text-decoration: none; color: #000">
                <div style="width: 40%; height: 100%; float: left;">
                    <div style="width: 100px; height: 100px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%)"></div>
                </div>
                <div style="width: 60%; height: 100%; float: left; text-align: left; padding: 20px; line-height: 45px; font-size: 20px">
                    Abbigliamento
                </div>
            </a>
        </div>
        <div class="col-lg-12" style="height: 100px; margin-bottom: 10px; border-radius: 2px; box-shadow: 2px 2px 5px lightgrey">
            <a href="{{ route('products') }}" style="text-decoration: none; color: #000">
                <div style="width: 40%; height: 100%; float: left;">
                    <div style="width: 100px; height: 100px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%)"></div>
                </div>
                <div style="width: 60%; height: 100%; float: left; text-align: left; padding: 20px; line-height: 45px; font-size: 20px">
                    Accessori
                </div>
            </a>
        </div>
    </div>
</div>
@endsection