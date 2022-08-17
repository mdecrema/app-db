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
        <form action="{{ route('admin.categories.store') }}" method="post" enctype="multipart/form-data" class="mb-3">
            @csrf
            @method("POST")
            
            <div class="form-group">
                <label for="title">Titolo</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Titolo categoria">
            </div>
            
            <button type="submit" class="btn btn-primary" style="float: right">Aggiungi</button>
        </form>

        <div class="col-12 bg_extradarkblue" style="min-height: 75vh; overflow: hidden">
            <div class="bg_extradarkblue pt-4 pl-3 pr-3 mb-2" style="width: 100%; height: 110px; float: left; color: #fff; overflow-y: hidden; overflow-x: scroll; -webkit-overflow-scrolling: touch; display: flex; flex-direction: row;">
                {{-- <div>
                    <h4>CATEGORIE</h4>
                </div> --}}
                
                    @foreach ($categories as $category)
                        @if($category->showOnMenu == 1)
                            <div id="category_box_{{ $category->id }}" class="bg_darkblue pt-2 pb-2 pr-2 pl-1 mr-2 border_around_radius category_box" style="width: 200px; height: 60px; cursor: pointer; float: left; display: flex; flex: 0 0 200px;" onclick="selectCategoryBox({{ $category->id }}, {{ $category }})">
                        @elseif ($category->showOnMenu == 0)
                            <div id="category_box_{{ $category->id }}" class="bg_darkblue pt-2 pb-2 pr-2 pl-1 mr-2 border_around_radius category_box disabled" style="width: 200px; height: 60px; cursor: pointer; float: left; display: flex; flex: 0 0 200px;" onclick="selectCategoryBox({{ $category->id }}, {{ $category }})">
                        @endif
                        <div id="title_category_{{ $category->id }}" class="mt-2 mb-2 ml-3" style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                            <span class="fs_18">{{ $category->title }}</span>
                        </div>
                        {{-- <div class="mt-3 mb-3 ml-3 pb-3">
                            <div id="status_category_{{ $category->id }}" status-attr={{ $category->showOnMenu }} class="mr-2" style="width: 15px; height: 15px; background: blue; border: 1px solid #fff; border-radius: 2px; float: left" onclick="changeCategoryStatus({{ $category->id }})"></div>
                            <div class="text-truncate" style="float: left; line-height: 15px"><span id="status_category_label_disable_{{ $category->id }}">Disabilita categoria</span><span class="d-none" id="status_category_label_able_{{ $category->id }}">Abilita categoria</span></div>
                        </div> --}}
                    </div>
                    @endforeach
                
            </div>
            <div id="subCategories_list" class="bg_extradarkblue pb-4 pl-3 pr-3 mt-3" style="width: 100%; height: 85px; float: left; color: #fff; overflow-y: hidden; overflow-x: scroll; -webkit-overflow-scrolling: touch; display: flex; flex-direction: row;">
                {{-- <div>
                    <h4>SOTTOCATEGORIE</h4>
                </div> --}}
                {{-- <div id="subCategories_list" class="bg_darkblue"> --}}
                    <!-- subcategories list -->
                {{-- </div> --}}
            </div>
            <div class="bg_extradarkblue col-xl-6 col-lg-6 col-md-8 col-sm-12 col-xs-12 pt-4 pb-4 pl-3 pr-3" style="height: 100%; float: left; color: #fff">
                <div>
                    <h4>Dettagli</h4>
                </div>
                <div>
                    <div id="status_category_group" class="mt-3 mb-3 pb-3">
                        <!-- status checkbox -->
                    </div>

                    <form action="{{ route('admin.categories.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("POST")

                        <div class="form-group d-none">
                            <label for="category_id">id categoria</label>
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

                        <div class="form-group d-none">
                            <label for="category_status">Status</label>
                            <input type="number" class="form-control" id="category_status" name="category_status" placeholder="">
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
        
        <!-- x eliminare tutte le categorie (funzionalità provvisoria) -->
        <form action="{{ route('admin.categories.delete.all') }}" method="post">
            @csrf
            @method("POST")
            <button type="submit" class="btn btn-danger" style="float: right">Elimina tutte le categorie</button>
        </form>

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
            $('#status_category_group').html('');
            // $('.category_box').removeClass('disabled');
            $('.category_box').removeClass('bg_blue');
            $('.category_box').addClass('bg_darkblue');
            $('#category_box_'+category_id).removeClass('bg_darkblue');
            $('#category_box_'+category_id).addClass('bg_blue');

            $('#transform_subcategory_title').html('Trasforma in sotto-categoria');

            // status checkbox
            if (category.showOnMenu == 1) { 
                    $status_checkbox = '<div id="status_category_' + category_id + '" status-attr=' + category.showOnMenu + ' class="mr-2" style="width: 15px; height: 15px; background: blue; border: 1px solid #fff; border-radius: 2px; float: left" onclick="changeCategoryStatus(' + category_id + ')"></div>';
                    $status_checkbox += '<div class="text-truncate" style="float: left; line-height: 15px">'
                    $status_checkbox += '<span id="status_category_label_disable_' + category_id + '">Disabilita categoria</span><span class="d-none" id="status_category_label_able_' + category_id + '">Abilita categoria</span>';
                    $status_checkbox += '</div>';
                } else if (category.showOnMenu == 0) {
                    $status_checkbox = '<div id="status_category_' + category_id + '" status-attr=' + category.showOnMenu + ' class="mr-2" style="width: 15px; height: 15px; background: #fff; border: 1px solid #fff; border-radius: 2px; float: left" onclick="changeCategoryStatus(' + category_id + ')"></div>';
                    $status_checkbox += '<div class="text-truncate" style="float: left; line-height: 15px">'
                    $status_checkbox += '<span class="d-none" id="status_category_label_disable_' + category_id + '">Disabilita categoria</span><span id="status_category_label_able_' + category_id + '">Abilita categoria</span>';
                    $status_checkbox += '</div>';
                }
            $('#status_category_group').append($status_checkbox);
            // category datas
            $('#category_id').val(category.id)
            $('#category_title').val(category.title);
            $('#category_description').val(category.description);
            $('#category_status').val(category.showOnMenu);

            openSubCategories(category_id);
        }
    }

    function selectSubCategoryBox(subCategory_id, subCategory) {
        category_selected = subCategory;

        $('#parent_folder_group').addClass('d-none');
        $('#trasform_subcategory_checkbox').removeClass('active');
        $('#trasform_subcategory').val(0);

        $('#status_category_group').html('');
        // $('.subcategory_box').removeClass('disabled');
        $('.subcategory_box').removeClass('bg_blue');
        $('.subcategory_box').addClass('bg_darkblue');
        $('#subcategory_box_'+subCategory_id).removeClass('bg_darkblue');
        $('#subcategory_box_'+subCategory_id).addClass('bg_blue');

        $('#transform_subcategory_title').html('Trasforma in categoria di primo livello');

        // status checkbox
        if (subCategory.showOnMenu == 1) { 
                $status_checkbox = '<div id="status_category_' + subCategory_id + '" status-attr=' + subCategory.showOnMenu + ' class="mr-2" style="width: 15px; height: 15px; background: blue; border: 1px solid #fff; border-radius: 2px; float: left" onclick="changeCategoryStatus(' + subCategory_id + ')"></div>';
                $status_checkbox += '<div class="text-truncate" style="float: left; line-height: 15px">';
                $status_checkbox += '<span id="status_category_label_disable_' + subCategory_id + '">Disabilita categoria</span><span class="d-none" id="status_category_label_able_' + subCategory_id + '">Abilita categoria</span>';
                $status_checkbox += '</div>';
            } else if (subCategory.showOnMenu == 0) {
                $status_checkbox = '<div id="status_category_' + subCategory_id + '" status-attr=' + subCategory.showOnMenu + ' class="mr-2" style="width: 15px; height: 15px; background: #fff; border: 1px solid #fff; border-radius: 2px; float: left" onclick="changeCategoryStatus(' + subCategory_id + ')"></div>';
                $status_checkbox += '<div class="text-truncate" style="float: left; line-height: 15px">';
                $status_checkbox += '<span class="d-none" id="status_category_label_disable_' + subCategory_id + '">Disabilita categoria</span><span id="status_category_label_able_' + subCategory_id + '">Abilita categoria</span>';
                $status_checkbox += '</div>';
            }
        $('#status_category_group').append($status_checkbox);
        // category datas
        $('#category_id').val(subCategory.id)
        $('#category_title').val(subCategory.title);
        $('#category_description').val(subCategory.description);
        $('#category_status').val(subCategory.showOnMenu);
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
            $('#category_box_'+category_id).addClass('disabled')
            // set form group status
            $('#category_status').val(0)
            break;
            case '0':
            status.attr('status-attr', '1')
            status.css('background-color', 'blue')
            $('#status_category_label_able_'+category_id).addClass('d-none');
            $('#status_category_label_disable_'+category_id).removeClass('d-none')
            $('#category_box_'+category_id).removeClass('disabled')
            // set form group status
            $('#category_status').val(1)
            break;
            default:
            status.attr('status-attr', '1')
            // set form group status
            $('#category_status').val(1)
            break;
        }
        console.log(status.attr('status-attr'));
        
    }

    function openSubCategories(parent_category_id) {
        // $("#spinner").removeClass('d-none');
        $('#subCategories_list').html('');

        $.ajax({
            type: "GET",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"').attr('content')
            },
            url: "categories/subCategories/"+parent_category_id,
            success: function(res){
                // $("#spinner").addClass('d-none');
                const subCategories = res.data;
                
                if (subCategories.length) {
                    console.log(subCategories)

                    var x = subCategories.map((el) => {
                        return el.id;
                    })

                    console.log(res)

                    for(let i = 0; i < subCategories.length; i++) {
                        var subCategory_box = '';
                        if (subCategories[i].showOnMenu == 1) {
                            subCategory_box += '<div id="subcategory_box_' + subCategories[i].id + '" class="bg_darkblue pt-2 pb-2 pr-2 pl-1 mr-2 border_around_radius subcategory_box" style="width: 200px; height: 60px; cursor: pointer; float: left; display: flex; flex: 0 0 200px;" onclick="selectSubCategoryBox(' + subCategories[i].id + ', ' + JSON.stringify(subCategories[i]).replace(/"/g, '&quot;') + ')">';
                        } else if (subCategories[i].showOnMenu == 0) {
                            subCategory_box += '<div id="subcategory_box_' + subCategories[i].id + '" class="bg_darkblue pt-2 pb-2 pr-2 pl-1 mr-2 border_around_radius subcategory_box disabled" style="width: 200px; height: 60px; cursor: pointer; float: left; display: flex; flex: 0 0 200px;" onclick="selectSubCategoryBox(' + subCategories[i].id + ', ' + JSON.stringify(subCategories[i]).replace(/"/g, '&quot;') + ')">';
                        }
                        subCategory_box += '<div id="title_subcategory_' + subCategories[i].id + '" class="mt-2 mb-2 ml-3" style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">';
                            subCategory_box += '<span class="fs_18">' + subCategories[i].title + '</span>'
                        subCategory_box += '</div>';
                        // subCategory_box += '<div class="mt-3 mb-3 ml-3 pb-3">';
                        //     subCategory_box += '<div id="status_subcategory_' + subCategories[i].id + '" status-attr=' + subCategories[i].showOnMenu + ' class="mr-2" style="width: 15px; height: 15px; background: blue; border: 1px solid #fff; border-radius: 2px; float: left" onclick="changeSubCategoryStatus(' + subCategories[i].id + ')"></div>'
                        //     subCategory_box += '<div class="text-truncate" style="float: left; line-height: 15px"><span id="status_subcategory_label_disable_' + subCategories[i].id + '">Disabilita categoria</span><span class="d-none" id="status_subcategory_label_able_' + subCategories[i].id + '">Abilita categoria</span></div>'
                        // subCategory_box += '</div>';
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