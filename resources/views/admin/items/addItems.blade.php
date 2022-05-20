@extends('layouts.app')

@section('page-title')
    Add Stocks
@endsection

@section('content')
<div class="container">
    <div class="row">
        <h2>AGGIUNGI GIACENZA</h2>
        
        <form action="{{ route('admin.items.storeItems') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method("POST")

            {{-- Prodotto a cui aggiungere giacenza --}}
            <div class="form-group">
                <label for="title">Seleziona prodotto</label>
                <select class="form-control" onchange="getProductSelected()" name="" id="productsList">
                    @foreach($products as $product)
                        <option value="{{ $product }}">{{ $product->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div style="display: none">
                <div class="form-group">
                    {{-- Id prodotto --}}
                    <input class="form-control" type="text" id="productId" name="productId">
                </div>
    
                <div class="form-group">
                    {{-- Oggetto taglie --}}
                    <input class="form-control" type="text" id="sizesObj" name="sizesObj">
                </div>
            </div>

            <?php
            $sizes1 = ['XS', 'S', 'M', 'L', 'XL', 'XXL'];
            $sizes2 = ['35', '36', '37', '38', '39', '40', '41', '42', '43', '44', '45'];       
            ?>
            <table class="table" id="tableSizeClothes" style="display: none">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">taglia</th>
                    <th scope="col">quantità</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($sizes1 as $size)
                  <tr>
                    <th scope="row">{{ $size }}</th>
                    <td><input onkeyup="getSizeQty('{{ $size }}')" type="number" id="{{ $size }}" placeholder="0" style="border: none"></td>
                  </tr>
                  @endforeach
                </tbody>
            </table>
            <table class="table" id="tableSizeShoes" style="display: none">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">taglia</th>
                    <th scope="col">quantità</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($sizes2 as $size)
                  <tr>
                    <th scope="row">{{ $size }}</th>
                    <td><input onkeyup="getSizeQty('{{ $size }}')" type="number" id="{{ $size }}" placeholder="0" style="border: none"></td>
                  </tr>
                  @endforeach
                </tbody>
            </table>

            <button type="submit" class="btn btn-primary">Salva</button>
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

<script>
    var productSelected = {};

    var sizeClothesObj = [
        {
            size: 'XS',
            qty: 0
        },
        {
            size: 'S',
            qty: 0
        },
        {
            size: 'M',
            qty: 0
        },
        {
            size: 'L',
            qty: 0
        },
        {
            size: 'XL',
            qty: 0
        },
        {
            size: 'XXL',
            qty: 0
        }
    ];

    var sizeShoesObj = [
        {
            size: '35',
            qty: 0
        },
        {
            size: '36',
            qty: 0
        },
        {
            size: '37',
            qty: 0
        },
        {
            size: '38',
            qty: 0
        },
        {
            size: '39',
            qty: 0
        },
        {
            size: '40',
            qty: 0
        },
        {
            size: '41',
            qty: 0
        },
        {
            size: '42',
            qty: 0
        },
        {
            size: '43',
            qty: 0
        },
        {
            size: '44',
            qty: 0
        },
        {
            size: '45',
            qty: 0
        }
    ];

    getProductSelected();

    function getProductSelected() {
        productSelected = JSON.parse(document.getElementById('productsList').value);
        console.log(productSelected);
        
        if (productSelected.counterSizeType === 1) {
            document.getElementById('tableSizeClothes').style.display='block';
            document.getElementById('tableSizeShoes').style.display='none'; 
        } else if (productSelected.counterSizeType === 2) {
            document.getElementById('tableSizeClothes').style.display='none';
            document.getElementById('tableSizeShoes').style.display='block';            
        }
        document.getElementById('productId').value = productSelected.id;
    }

    function getSizeQty(size) {
        var quantity = document.getElementById(size).value;
        console.log(size);
        console.log(quantity);

        if (productSelected.counterSizeType === 1) {
            for (let i = 0; i < sizeClothesObj.length; i++) {
                if (sizeClothesObj[i].size === size) {
                    sizeClothesObj[i].qty = parseFloat(quantity);
                }
            }
            console.log(sizeClothesObj);
            document.getElementById('sizesObj').value = JSON.stringify(sizeClothesObj);
        } else if (productSelected.counterSizeType === 2) {
            for (let i = 0; i < sizeShoesObj.length; i++) {
                if (sizeShoesObj[i].size == size) {
                    sizeShoesObj[i].qty = parseFloat(quantity);
                }
            }
            console.log(sizeShoesObj);
            document.getElementById('sizesObj').value = JSON.stringify(sizeShoesObj);
        }

    }


</script>
@endsection