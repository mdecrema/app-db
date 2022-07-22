@extends('layouts.app')

@section('page-title')
    Categorie di prodotto
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
                <h4> Categorie di prodotto </h4>
            </div>
        </div>
        
        <h6>Crea una nuova categoria di prodotto</h6>
        <form action="{{ route('admin.categories.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method("POST")
            
            <div class="form-group">
                <label for="title">Titolo</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Titolo categoria">
            </div>
            
            <button type="submit" class="btn btn-primary" style="float: right">Aggiungi</button>
        </form>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        
        <div class="col-12 bg_lightgrey">
            @foreach($categories as $category)
            <div>
                #{{ $category->id }} - {{ $category->title }}
            </div>
            @endforeach
        </div>

    </div>
</div>

@endsection