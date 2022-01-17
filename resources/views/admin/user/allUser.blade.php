@extends('layouts.app')

@section('page-title')
    All User Registered
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            @foreach($users as $user)
            <div class="col-4" style="border: 1px solid grey; border-radius: 5px; background-color: lightgrey">
                <a href="">
                    {{ $user->name }}
                </a>
            </div>
            @endforeach
        </div>
    </div>
@endsection