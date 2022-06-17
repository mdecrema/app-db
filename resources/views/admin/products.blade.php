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
    <div class="row" style="height: 80vh">
        {{-- Filters --}}
        <div class="col-12 bg_extradarkblue p-3 d-flex" style="height: 15%;">
            <div class="col-3 pl-0 mr-3">
                <span style="color: #fff">Cerca per nome</span>
                <input type="text" class="p-2 form-control" placeholder="Ricerca articolo per nome">
            </div>
            <div style="color: #fff">
                <i class="fa fa-magnifying-glass"></i>
            </div>
            @foreach($filters as $filter)
                <div class="mr-3" style="max-width: 120px;">
                    <span style="font-size: 12px; color: #fff">{{ $filter->name }}</span>
                    <select onchange="setFilter('{{ $filter->name }}')" name="" id="{{ $filter->name }}" class="w-100 form-control text-truncate">
                        <option value="0">qualsiasi</option>
                        @foreach($filter->options as $option)
                        <option value="{{ $option }}" class="text-truncate">{{ $option }}</option>
                        @endforeach
                    </select>
                </div>
                @endforeach
                <div style="color: #fff; line-height: 40px">
                    <i class="fa fa-bars-sort"></i>
                </div>
                {{-- <div style="max-width: 120px; display: inline-block">
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
                </div> --}}
           
        </div>
        {{-- Column Left --}}
        <div class="col-3 bg_darkblue p-3" style="height: 85%;">
            <div class="p-2 pt-3">
                <h6>Elenco articoli a magazzino</h6>
            </div>
            <div class="w-100 pt-2 pb-3 products_list" style="height: 90%; cursor: pointer; overflow-y: scroll; overflow-x: hidden; scrollbar-width: thin;">
                {{-- @foreach($products as $product)
                <div id="{{ $product->id }}" onclick="selectProduct({{ $product->id }})" class="pl-4 p-2 text-truncate">{{ $product->nome }}</div>
                @endforeach --}}
            </div>
        </div>
        {{-- Column Right --}}
        <div class="col-9 bg_lightgrey p-3" style="height: 85%; border-left: 2px solid #0a182a; overflow-y: scroll">
                {{-- Spinner Loader --}}
                <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%)">
                    <i id="spinner" class="fa fa-4x fa-spinner fa-spin d-none" style="color: #183153; z-index: 10"></i>
                </div>
                {{-- /Spinner Loader --}}
                <div class="col-12 selected_product_details" style="height: 100%;">
                    <div class="col-12">
                        <div class="mt-3 mb-3" style="position: relative">
                            <h3 id="product_name" class="text-uppercase font-weight-bold"></h3>
                            <div class="d-flex justify-content-between" style="position: absolute; top: 0; right: 0; text-align: right">
                                <div id="edit_btn" class="d-none">
                                    <button class="btn btn-primary">Modifica</button>
                                </div>
                                {{-- <div id="edit_btn" class="d-none">
                                    <button class="btn btn-primary">Impostazioni</button>
                                </div> --}}
                                <div id="config_btn" class="d-none ml-2">
                                    <button class="btn btn-primary">Configura</button>
                                </div>
                                <div id="delete_btn" class="d-none ml-2">
                                    <button class="btn bg_darkblue" style="color: #fff">Elimina</button>
                                </div>
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
                    <div class="col-6 p-3" style="float: left; text-align: right;">
                        {{-- <div class="mt-3 mb-3">
                            <h6>Foto</h6>
                        </div> --}}
                        <div class="mt-3 mb-3">
                            <img id="product_photo1" class="d-none" src="" alt="" style="width: 200px; height: 200px;">
                        </div>
                        <div class="mt-3 mb-3">
                            <img id="product_photo2" class="d-none" src="" alt="" style="width: 200px; height: 200px">
                        </div>
                        <div class="mt-3 mb-3">
                            <img id="product_photo3" class="d-none" src="" alt="" style="width: 200px; height: 200px">
                        </div>
                        <div class="mt-3 mb-3">
                            <img id="product_photo4" class="d-none" src="" alt="" style="width: 200px; height: 200px">
                        </div>
                        <div class="mt-3 mb-3">
                            <img id="product_photo5" class="d-none" src="" alt="" style="width: 200px; height: 200px">
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>

<script>
    $(document).ready(() => {
        getAllProducts(null, false);
    });

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
        $("#spinner").removeClass('d-none');

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
                $("#spinner").addClass('d-none');

                $(".products_list > div").remove();
                res.data.forEach(product => {
                    let div = '<div id="'+ product.id +'" onclick="selectProduct('+ product.id +')" class="pl-4 p-2 text-truncate">'+ product.nome +'</div>';
                    $(".products_list").append(div)
                });

                selectProduct(res.data[0].id)
                
            }
        })
    }

    function setFilter(name) {
        var selectVal = $('#'+name).val();
        if (selectVal !== '0') {
            $('#'+name).css("background-color", "#0061EB"); // #00D7D2
            $('#'+name).css("color", "#fff");
            // $('#'+name).css("font-weight", "bold");
        } else {
            $('#'+name).css("background-color", "#fff");
            $('#'+name).css("color", "#000");
            // $('#'+name).css("font-weight", "normal");
        }
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
        $("#spinner").removeClass('d-none');

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
                $("#spinner").addClass('d-none');

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
                $('#product_amount').html(product.amount); // .toFixed(2)
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
                $('.selected_product_details img').removeClass('d-none');
                $('#edit_btn').removeClass('d-none');
                $('#delete_btn').removeClass('d-none');
                $('#config_btn').removeClass('d-none');
            }
        })
    }
</script>

@endsection