@extends('layouts.app')

@section('page-title')
Admin Products
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
                <h4> Registro articoli </h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-3 bg_darkblue p-3" style="height: 80vh;">
            <div class="w-100" style="height: 50px;">
                <input type="text" class="w-100 p-2" placeholder="Ricerca articolo per nome" style="height: 40px;">
            </div>
            <div class="p-2 pt-3">
                <h6>Elenco articoli a magazzino</h6>
            </div>
            <div class="w-100 pt-2" style="height: calc(100% - 100px); overflow-y: scroll; overflow-x: hidden">
                @foreach($products as $product)
                <div class="pl-4 p-2 text-truncate">{{ $product->nome }}</div>
                @endforeach
            </div>
        </div>
        <div class="col-9" style="height: 80vh; border: 2px solid #183153; background-color: lightgrey">
            <div class="col-12 p-2" style="height: 20%;">
                <h5>Filtri di ricerca</h5>
                @foreach($filters as $filter)
                <div class="col-2" style="display: inline-block">
                    <span>{{ $filter->name }}</span>
                    <select name="" id="" class="w-100">
                        @foreach($filter->options as $option)
                            <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                </div>
                @endforeach
            </div>
            <div class="col-12 bg_extradark" style="height: 80%; position: absolute; left: 0; bottom: 0; border-left: 2px solid #fff">
    
            </div>
        </div>
    </div>
</div>

@endsection