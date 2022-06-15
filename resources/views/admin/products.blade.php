@extends('layouts.app')

@section('page-title')
Admin Products
@endsection

@section('content')
<div class="container" style="font-family: 'Roboto', sans-serif">
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
        {{-- Column Left --}}
        <div class="col-3 bg_darkblue p-3" style="height: 80vh;">
            <h6>Cerca per nome</h6>
            <div class="w-100" style="height: 50px; margin">
                <input type="text" class="w-100 p-2" placeholder="Ricerca articolo per nome" style="height: 40px;">
            </div>
            <div class="p-2 pt-3">
                <h6>Elenco articoli a magazzino</h6>
            </div>
            <div class="w-100 pt-2 pb-3 products_list" style="height: calc(100% - 100px); cursor: pointer; overflow-y: scroll; overflow-x: hidden">
                {{-- @foreach($products as $product)
                <div id="{{ $product->id }}" onclick="selectProduct({{ $product->id }})" class="pl-4 p-2 text-truncate">{{ $product->nome }}</div>
                @endforeach --}}
            </div>
        </div>
        {{-- Column Right --}}
        <div class="col-9 p-3" style="height: 80vh; border: 2px solid #183153; background-color: lightgrey">
            <div class="col-12" style="height: 20%;">
                <!-- <h6>Filtri di ricerca</h6> -->
                @foreach($filters as $filter)
                <div class="mr-3" style="max-width: 120px; display: inline-block">
                    <span style="font-size: 12px">{{ $filter->name }}</span>
                    <select onchange="setFilter('{{ $filter->name }}')" name="" id="{{ $filter->name }}" class="w-100 form-control text-truncate">
                        @foreach($filter->options as $option)
                            <option value="0">qualsiasi</option>
                            <option value="{{ $option }}" class="text-truncate">{{ $option }}</option>
                        @endforeach
                    </select>
                </div>
                @endforeach
                <div style="max-width: 120px; display: inline-block">
                    <span style="font-size: 12px">Prezzo</span>
                    <select name="" id="" class="w-100 form-control text-truncate">
                        <option value="0" class="text-truncate">qualsiasi</option>
                        <option value="1" class="text-truncate" >0 - 50</option>
                        <option value="2" class="text-truncate">50 - 100</option>
                        <option value="3" class="text-truncate">150 - 200</option>
                        <option value="4" class="text-truncate">250 - 300</option>
                        <option value="5" class="text-truncate">350 - 400</option>
                        <option value="6" class="text-truncate">450 - 500</option>
                        <option value="7" class="text-truncate">500+</option>
                    </select>
                </div>
            </div>
            <div class="col-12 bg_extradark p-3" style="height: 80%; position: absolute; left: 0; bottom: 0; border-left: 2px solid #fff; overflow-y: scroll">
                <div class="col-12 selected_product_details" style="height: 100%; color: #fff">
                    <div class="col-12">
                        <div class="mt-3 mb-3" style="position: relative">
                            <h3 id="product_name" class="text-uppercase"></h3>
                            <div id="edit_btn" class="d-none" style="position: absolute; top: 0; right: 0">
                                <button class="btn btn-primary">Modifica</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-6" style="float: left">
                        <div class="mt-3 mb-3">
                            <h6 id="label_description"></h6>
                            <p id="product_description" class="p-2 d-none" style="background-color: #fff; color: #000"></p>
                        </div>
                        <div class="mt-3 mb-3">
                            <h6 id="label_category"></h6>
                            <p id="product_category" class="p-2 d-none" style="background-color: #fff; color: #000"></p>
                        </div>
                        <div class="mt-3 mb-3">
                            <h6 id="label_brand"></h6>
                            <p id="product_brand" class="p-2 d-none" style="background-color: #fff; color: #000"></p>
                        </div>
                        <div class="mt-3 mb-3">
                            <h6 id="label_color"></h6>
                            <p id="product_color" class="p-2 d-none" style="background-color: #fff; color: #000"></p>
                        </div>
                        <div class="mt-3 mb-3">
                            <h6 id="label_amount"></h6>
                            <p id="product_amount" class="p-2 d-none" style="background-color: #fff; color: #000"></p>
                        </div>
                        <div class="mt-3 mb-3">
                            <h6 id="label_availability"></h6>
                            <p id="product_availability" class="p-2 d-none" style="background-color: #fff; color: #000"></p>
                        </div>
                    </div>
                    <div class="col-6" style="float: left; text-align: right">
                        <div class="mt-3 mb-3">
                            <h6>Foto</h6>
                        </div>
                        <div class="mt-3 mb-3">
                            <img id="product_photo1" class="" src="" alt="" style="width: 200px; height: 200px">
                        </div>
                        <div class="mt-3 mb-3">
                            <img id="product_photo2" class="" src="" alt="" style="width: 200px; height: 200px">
                        </div>
                        <div class="mt-3 mb-3">
                            <img id="product_photo3" class="" src="" alt="" style="width: 200px; height: 200px">
                        </div>
                        <div class="mt-3 mb-3">
                            <img id="product_photo4" class="" src="" alt="" style="width: 200px; height: 200px">
                        </div>
                        <div class="mt-3 mb-3">
                            <img id="product_photo5" class="" src="" alt="" style="width: 200px; height: 200px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(() => {
        getAllProducts(null, false);
    })

    var filters = [
        {
            name: 'Categoria',
            option: '0'
        },
        {
            name: 'Genere',
            option: '0'
        },
        {
            name: 'Brand',
            option: '0'
        },
        {
            name: 'Colore',
            option: '0'
        }
    ];

    function getAllProducts(data, isFiltered) {
        console.log('data:');
        //console.log(f);
        $.ajax({
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "products/all",
            data: {
                filters: isFiltered,
                filterObj: data
            },
            dataType: "json",
            success: function(res){
                console.log(res);
                $(".products_list > div").remove();
                res.data.forEach(product => {
                    let div = '<div id="'+ product.id +'" onclick="selectProduct('+ product.id +')" class="pl-4 p-2 text-truncate">'+ product.nome +'</div>';
                    $(".products_list").append(div)
                });
            }
        })
    }

    function setFilter(name) {
        var selectVal = $('#'+name).val();
        for (let i = 0; i < filters.length; i++) {
            if (filters[i].name === name) {
                console.log(filters[i].name);
                console.log(name);
                filters[i].option = selectVal;
                console.log(filters);
            }
        }
        console.log(filters);
        getAllProducts(filters, true);
    }

    function selectProduct(id) {
        console.log(id);
        var product = {};
        $(".products_list > div").css("background-color", "transparent");
        let divSelected = '#'+id;
        $("#"+id).css("background-color", "#0061EB");

        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"').attr('content')
        //     }
        // });

        $.ajax({
            type: "GET",
            // headers: {
            //     'X-CSRF-TOKEN': $('meta[name="csrf-token"').attr('content')
            // }
            url: "products/details/"+id,
            success: function(res){
                console.log(res);
                product = res.data;

                $('#product_name').html(product.nome);
                $('#label_description').html('Descrizione');
                $('#product_description').html(product.description);
                $('#label_category').html('Categoria');
                $('#product_category').html(product.categoria);
                $('#label_brand').html('Brand');
                $('#product_brand').html(product.brand);
                $('#label_color').html('Colore');
                $('#product_color').html(product.colore);
                $('#label_amount').html('Prezzo');
                $('#product_amount').html(product.amount.toFixed(2));
                $('#label_availability').html('Disponibilità');
                $('#product_availability').html(product.availability);

                $('#product_photo1').attr('src', 'https://img-space.fra1.digitaloceanspaces.com/img-space/uploads/images/'+product.photo1);
                $('#product_photo2').attr('src', 'https://img-space.fra1.digitaloceanspaces.com/img-space/uploads/images/'+product.photo2);
                $('#product_photo3').attr('src', 'https://img-space.fra1.digitaloceanspaces.com/img-space/uploads/images/'+product.photo3);
                $('#product_photo4').attr('src', 'https://img-space.fra1.digitaloceanspaces.com/img-space/uploads/images/'+product.photo4);
                $('#product_photo5').attr('src', 'https://img-space.fra1.digitaloceanspaces.com/img-space/uploads/images/'+product.photo5);
                // $('#label_appView').html('Mostra');
                // $('#product_appView').html(product.amount);
                $('.selected_product_details p').removeClass('d-none');
                $('#edit_btn').removeClass('d-none');
            }
        })
    }
</script>

@endsection