@extends('layouts.dashboard_page')

@section('page-title')
    Categorie di prodotto
@endsection

@section('content')
<div class="container">
    <div class="row">
        @section('menu_link')
        Categorie di prodotto
        @endsection
        
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

        <form action="{{ route('admin.categories.delete.all') }}" method="post">
            @csrf
            @method("POST")
            <button type="submit" class="btn btn-danger" style="float: right">Elimina tutte le categorie</button>
        </form>

        <div class="col-12" style="height: 70vh">
            <div class="bg_extradarkblue pt-4 pb-4 pl-3 pr-3" style="width: calc(100%/4); height: 100%; float: left; color: #fff">
                <div>
                    <h4>CATEGORIE</h4>
                </div>
                <div class="bg_darkblue">
                    @foreach ($categories as $category)
                    <div id="category_box_{{ $category->id }}" class="pt-3 pb-3 border_bottom category_box" style="cursor: pointer" onclick="selectCategoryBox({{ $category->id }}, {{ $category }})">
                        <div id="title_category_{{ $category->id }}" class="w-100 mt-2 mb-2 ml-3">
                            <span class="fs_18">{{ $category->title }} . {{ $category->folderLevel }}</span>
                        </div>
                        <div class="mt-3 mb-3 ml-3 pb-3">
                            <div id="status_category_{{ $category->id }}" status-attr={{ $category->showOnMenu }} class="mr-2" style="width: 15px; height: 15px; background: blue; border: 1px solid #fff; border-radius: 2px; float: left" onclick="changeCategoryStatus({{ $category->id }})"></div>
                            <div class="text-truncate" style="float: left; line-height: 15px"><span id="status_category_label_disable_{{ $category->id }}">Disabilita categoria</span><span class="d-none" id="status_category_label_able_{{ $category->id }}">Abilita categoria</span></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="bg_extradarkblue pt-4 pb-4 pl-3 pr-3" style="width: calc(100%/4); height: 100%; float: left; color: #fff">
                <div>
                    <h4>SOTTOCATEGORIE</h4>
                </div>
                <div id="subCategories_list" class="bg_darkblue">
                    <!-- subcategories list -->
                </div>
            </div>
            <div class="bg_extradarkblue pt-4 pb-4 pl-3 pr-3" style="width: calc(100%/2); height: 100%; float: left; color: #fff">
                <div>
                    <h4>Dettagli</h4>
                </div>
                <div>
                    <form action="{{ route('admin.categories.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("POST")

                        <div class="form-group">
                            <label for="category_id">Nome categoria</label>
                            <input type="text" class="form-control " id="category_id" name="category_id">
                        </div>

                        <div class="form-group">
                            <label for="category_title">Nome categoria</label>
                            <input type="text" class="form-control" id="category_title" name="category_title" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="category_description">Descrizione</label>
                            <input type="text" class="form-control" id="category_description" name="category_description" placeholder="">
                        </div>


                        <div class="form-group">
                            <div id="trasform_subcategory_checkbox" class="mr-2" style="width: 15px; height: 15px; border: 1px solid #fff; border-radius: 2px; float: left" onclick="click_transform_subcategory()"></div>
                            <!-- id="trasform_subcategory_ " status-attr=... -->
                            <label id="transform_subcategory_title" for="trasform_subcategory"></label>
                            <input id="trasform_subcategory" name="trasform_subcategory" class="d-none" type="number" value=0>
                        </div>

                        <div id="parent_folder_group" class="form-group d-none">
                            <label for="parent_category_id">Seleziona una categoria padre a cui associarla</label>
                            {{-- <input type="text" class="form-control" id="title" name="categoria" placeholder="categoria"> --}}
                            <select class="form-control" name="parent_category_id" id="parent_category_id">
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary" style="float: right">Salva modifiche</button>
                    </form>
                </div>
            </div>
        </div>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        
        {{-- <div class="col-12 bg_lightgrey">
            @foreach($categories as $category)
            <div>
                #{{ $category->id }} - {{ $category->title }}
            </div>
            @endforeach
        </div> --}}

    </div>
</div>

<script>
    $(document).ready(() => {
        const categoryList = <?php echo json_encode($categories); ?>;
        selectCategoryBox(categoryList[0].id, categoryList[0]);
        console.log(categoryList);
    })

    var category_selected;

    function selectCategoryBox(category_id, category) {
        category_selected = category;

        $('#parent_folder_group').addClass('d-none');
        $('#trasform_subcategory_checkbox').removeClass('active');
        $('#trasform_subcategory').val(0);

        if (!$('#category_box_'+category_id).hasClass('bg_blue')) {
            $('.category_box').removeClass('bg_blue');
            $('#category_box_'+category_id).addClass('bg_blue');

            $('#transform_subcategory_title').html('Trasforma in sotto-categoria');

            $('#category_id').val(category.id)
            $('#category_title').val(category.title);
            $('#category_description').val(category.description);

            openSubCategories(category_id);
        }
    }

    function selectSubCategoryBox(subCategory_id, subCategory) {
        category_selected = subCategory;

        $('#parent_folder_group').addClass('d-none');
        $('#trasform_subcategory_checkbox').removeClass('active');
        $('#trasform_subcategory').val(0);

        $('.subcategory_box').removeClass('bg_blue');
        $('#subcategory_box_'+subCategory_id).addClass('bg_blue');

        $('#transform_subcategory_title').html('Trasforma in categoria di primo livello');

        $('#category_id').val(subCategory.id)
        $('#category_title').val(subCategory.title);
        $('#category_description').val(subCategory.description);
    }

    function changeCategoryStatus(category_id) {
        var status = $('#status_category_'+category_id);
        switch (status.attr('status-attr')) 
        {
            case '1':
            status.attr('status-attr', '0')
            status.css('background-color', '#fff')
            $('#status_category_label_able_'+category_id).removeClass('d-none')
            $('#status_category_label_disable_'+category_id).addClass('d-none')
            $('#title_category_'+category_id).addClass('disabled')
            break;
            case '0':
            status.attr('status-attr', '1')
            status.css('background-color', 'blue')
            $('#status_category_label_able_'+category_id).addClass('d-none');
            $('#status_category_label_disable_'+category_id).removeClass('d-none')
            $('#title_category_'+category_id).removeClass('disabled')
            break;
            default:
            status.attr('status-attr', '1')
            break;
        }
        console.log(status.attr('status-attr'));
        
    }

    function openSubCategories(parent_category_id) {
        // $("#spinner").removeClass('d-none');
        $('#subCategories_list').html('');

        $.ajax({
            type: "GET",
            url: "categories/subCategories/"+parent_category_id,
            success: function(res){
                // $("#spinner").addClass('d-none');
                const subCategories = res.data;
                
                if (subCategories.length) {
                    console.log(subCategories)

                    var x = subCategories.map((el) => {
                        return el.id;
                    })

                    console.log(x)

                    for(let i = 0; i < subCategories.length; i++) {
                        var subCategory_box = '<div id="subcategory_box_' + subCategories[i].id + '" class="pt-3 pb-3 border_bottom subcategory_box" style="cursor: pointer" onclick="selectSubCategoryBox(' + subCategories[i].id + ', ' + JSON.stringify(subCategories[i]).replace(/"/g, '&quot;') + ')">';
                                subCategory_box += '<div id="title_subcategory_' + subCategories[i].id + '" class="w-100 mt-2 mb-2 ml-3">';
                                    subCategory_box += '<span class="fs_18">' + subCategories[i].title + '</span>'
                                subCategory_box += '</div>';
                                subCategory_box += '<div class="mt-3 mb-3 ml-3 pb-3">';
                                    subCategory_box += '<div id="status_subcategory_' + subCategories[i].id + '" status-attr=' + subCategories[i].showOnMenu + ' class="mr-2" style="width: 15px; height: 15px; background: blue; border: 1px solid #fff; border-radius: 2px; float: left" onclick="changeSubCategoryStatus(' + subCategories[i].id + ')"></div>'
                                    subCategory_box += '<div class="text-truncate" style="float: left; line-height: 15px"><span id="status_subcategory_label_disable_' + subCategories[i].id + '">Disabilita categoria</span><span class="d-none" id="status_subcategory_label_able_' + subCategories[i].id + '">Abilita categoria</span></div>'
                                subCategory_box += '</div>';
                            subCategory_box += '</div>';

                        $('#subCategories_list').append(subCategory_box);
                    }
                }
            }
        })
    }

    function click_transform_subcategory() {
        if (!$('#trasform_subcategory_checkbox').hasClass('active')) {
            category_selected.folderLevel == 1 ? $('#parent_folder_group').removeClass('d-none') : '';
            $('#trasform_subcategory_checkbox').addClass('active');
            $('#trasform_subcategory').val(1);
        } else {
            category_selected.folderLevel == 1 ? $('#parent_folder_group').addClass('d-none') : '';
            $('#trasform_subcategory_checkbox').removeClass('active');
            $('#trasform_subcategory').val(0);
        }
       
    }

</script>

@endsection