@extends('layouts.app')

@section('page-title')

@endsection

@section('content')
<div class="container">
    <div class="row">
        <div style="margin-bottom: 20px">
            <a href="/admin/dashboard">
                <div class="back_btn" style="display: inline-block;">
                    <i class="fa fad fa-arrow-left"></i>
                </div>
            </a>
            <div style="display: inline-block; margin-left: 10px">
                <h4> Statistiche </h4>
            </div>
        </div>

        {{-- <div class="col-12">
            @foreach($users as $user)
            <div class="col-lg-6 col-xl-6 col-md-6 col-sm-12 col-xs-12 card">
                {{ $user->name }}
            </div>
            @endforeach
        </div> --}}
        <div class="col-12 p-2" style="background-color: rgb(227, 227, 227); border-radius: 5px">
            <div class="mt-3 mb-5 pl-3">
                <span style="font-size: 20px">Visualizzazioni pagine</span>
            </div>
            <div class="d-flex justify-content-around" style="height: 300px;">
                @foreach($viewStatsArr as $stat)
                <div style="width: 70px; height: 300px; background-color: lightgrey; box-shadow: 2px 2px 5px grey; position: relative; border-radius: 5px">
                    <div class="d-flex justify-content-center align-items-center" style="position: absolute; bottom: 0; left: 0; width: 100%; height: {{ $stat->viewPercentage }}%; background-color: #0AA09D">
                        <div class="center">
                            <span style="font-size: 20px; color: #fff">{{ $stat->viewCount }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="mt-3 d-flex justify-content-around">
                @foreach($viewStatsArr as $stat)
                <div class="">
                    {{ $stat->name }}
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection