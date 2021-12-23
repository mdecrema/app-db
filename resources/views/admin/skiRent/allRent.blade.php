@extends('layouts.app')

@section('page-title')
    All Equipment Rented
@endsection

@section('content')
<h2>Attrezzatura noleggiata</h2>
@if (session()->has('success_message'))
                        <div class="alert alert-success">
                            {{ session()->get('success_message') }}
                        </div>
                    @endif
<div class="row" style="margin: 30px 0">
    @foreach($allRent as $item)
        <div style="padding: 10px 20px; margin: 5px 0; border: 1px solid lightgrey; list-style: none; cursor: pointer; position: relative">
            <h4>{{ $item->ski_id }}</h4>
            <h5>{{ date("d-m-Y", ($item->date / 1000))  }}</h5>
            <!--<span>Tipologia: <strong></strong> </span><br>
            <span>Livello: <strong></strong> </span>
            </span>-->
            <a href="deleteRent/{{$item['id']}}" style="width: 30px; height: 50%; position: absolute; top: 0; right: 0; text-align: right; padding: 5px 10px;">
                <i class="far fa-times-circle"></i>
            </a>
        </div>
    @endforeach
    </ul>
</div>

@endsection