@extends('layouts.dashboard_page')

@section('page-title')
    Create new Product
@endsection

@section('content')

<div class="container">
    <div class="row">
        @section('menu_link')
        Aggiungi articoli
        @endsection

        @if(count($categories) > 0)
        <!-- left box -->
        <div class="col-12 border_blue" style="background-color: #cdd9e9; margin-bottom: 20px; padding: 10px; border-radius: 5px">
            <h5 style="color: #183153; font-weight: bold">IMPORTA CATALOGO</h5>
            <form action="{{ route('admin.products.store.csv') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method("POST")
                <div class="form-group">
                    <label for="title" style="color: #183153">Carica file (.csv)</label>
                    <input style="width: 100%" type="file" class="form-control" id="" name="products_file" accept=".csv">
                </div>
                <button type="submit" class="btn btn-primary" style="float: right">Importa</button>
            </form>
        </div>

        <!-- right box -->
        <div class="col-12" style="border: 1px solid #grey; margin: 20px 0; padding: 10px; border-radius: 5px">
            <h5 style="color: #183153; font-weight: bold">CREA UN NUOVO PRODOTTO</h5>
            <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method("POST")
    
                <div class="form-group">
                    <label for="title">Titolo</label>
                    <input type="text" class="form-control" id="title" name="nome" placeholder="Titolo" placeholder="titolo">
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
                    <label for="availability">Disponibile</label>
                    <input style="width:auto" type="checkbox" id="availability" name="availability" value="1">
                </div>
    
                <div class="form-group">
                    <label for="title">Colore</label>
                    <input type="text" class="form-control" id="title" name="colore" placeholder="colore">
                </div>
    
                <div class="form-group">
                    <label for="title">Prezzo</label>
                    <input type="text" class="form-control" id="title" name="amount" placeholder="€">
                </div>
    
                <div class="form-group">
                    <label for="title">Categoria</label>
                    {{-- <input type="text" class="form-control" id="title" name="categoria" placeholder="categoria"> --}}
                    <select class="form-control" name="category_id" id="category_id">
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>
    
                <div class="form-group">
                    <label for="title">Brand</label>
                    <input type="text" class="form-control" id="title" name="brand" placeholder="brand">
                </div>
    
                <div class="form-group">
                    <label for="title">Valutazione</label>
                    <input type="text" class="form-control" id="title" name="valutazione" placeholder="valutazione">
                </div>
    
                {{-- <div class="form-group">
                    <label for="title">Taglia</label>
                    <input type="text" class="form-control" id="title" name="taglia" placeholder="taglia">
                </div> --}}

                <div class="form-group">
                    <label for="counterSizeType">Tipologia taglie</label>
                    <select class="form-control" name="counterSizeType" id="counterSizeType">
                        <option value="1">Caratteri alfabetici (ex. S, M, L ...)</option>
                        <option value="2">Numeri (scarpe)</option>
                        <option value="3" disabled>Numeri (pantaloni)</option>
                    </select>
                </div>
    
                <div class="form-group">
                    <label for="title">Genere</label>
                    <input type="text" class="form-control" id="title" name="genere" placeholder="genere">
                </div>
    
                <div class="form-group">
                    <label for="appView">App View</label>
                    <input type="text" class="form-control" id="appView" name="appView" placeholder="where?">
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

        </div>
        @else
        <div class="col-12">
            <h6>Non sono presenti categorie di prodotti!</h6>
            <p>Prima di procedere all'aggiunta di articoli devi creare almeno una categoria di prodotti nella specifica sezione</p>
            <button class="btn btn-primary"><a href="{{ route('admin.allCategories') }}" style="color: #fff; text-decoration: none">Vai a categorie</a></button>
        </div>
        @endif
    </div>
</div>
@endsection