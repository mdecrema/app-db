@extends('layouts.app')

@section('page-title')
    Create new Product
@endsection

@section('content')
<h1>CREA NUOVO PRODOTTO</h1>

<div class="container">
    <div class="row">
        <h2>Create New Product</h2>
        
        <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method("POST")

            <div class="form-group">
                <label for="title">Titolo</label>
                <input type="text" class="form-control" id="title" name="nome" placeholder="Titolo" value="{{old('title')}}">
            </div>

            <div class="form-group">
                <label for="content">Contenuto</label>
                <textarea class="form-control" name="description" id="content" cols="30" rows="10" placeholder="Contenuto"> {{old("content")}} </textarea>
            </div>

            <div class="form-group">
                <label for="photo1">Image 1</label>
                <input style="width:auto" type="file" class="form-control" id="photo1" name="photo1" accept="image/*">
            </div>

            <div class="form-group">
                <label for="photo2">Image 2</label>
                <input style="width:auto" type="file" class="form-control" id="photo2" name="photo2" accept="image/*">
            </div>

            <div class="form-group">
                <label for="photo3">Image 3</label>
                <input style="width:auto" type="file" class="form-control" id="photo3" name="photo3" accept="image/*">
            </div>

            <div class="form-group">
                <label for="photo4">Image 4</label>
                <input style="width:auto" type="file" class="form-control" id="photo4" name="photo4" accept="image/*">
            </div>

            <div class="form-group">
                <label for="photo5">Image 5</label>
                <input style="width:auto" type="file" class="form-control" id="photo5" name="photo5" accept="image/*">
            </div>

            <div class="form-group">
                <label for="availability">Availabity</label>
                <input style="width:auto" type="checkbox" class="form-control" id="availability" name="availability" value="1" >
            </div>

            <div class="form-group">
                <label for="title">Colore</label>
                <input type="text" class="form-control" id="title" name="colore" placeholder="Titolo" value="{{old('title')}}">
            </div>

            <div class="form-group">
                <label for="title">Amount</label>
                <input type="text" class="form-control" id="title" name="amount" placeholder="Titolo" value="{{old('title')}}">
            </div>

            <div class="form-group">
                <label for="title">categoria</label>
                <input type="text" class="form-control" id="title" name="categoria" placeholder="Titolo" value="{{old('title')}}">
            </div>

            <div class="form-group">
                <label for="title">Brand</label>
                <input type="text" class="form-control" id="title" name="brand" placeholder="Titolo" value="{{old('title')}}">
            </div>

            <div class="form-group">
                <label for="title">Valutazione</label>
                <input type="text" class="form-control" id="title" name="valutazione" placeholder="Titolo" value="{{old('title')}}">
            </div>

            <div class="form-group">
                <label for="title">Taglia</label>
                <input type="text" class="form-control" id="title" name="taglia" placeholder="Titolo" value="{{old('title')}}">
            </div>

            <div class="form-group">
                <label for="title">Genere</label>
                <input type="text" class="form-control" id="title" name="genere" placeholder="Titolo" value="{{old('title')}}">
            </div>

            <div class="form-group">
                <label for="appView">App View</label>
                <input type="text" class="form-control" id="appView" name="appView" placeholder="where?">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
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
    </div>
</div>
@endsection