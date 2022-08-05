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

        <div class="col-10" style="height: 70vh">
            <div class="bg_extradarkblue pt-4 pb-4 pl-3 pr-3" style="width: calc(100%/3); height: 100%; float: left; color: #fff">
                <div>
                    <h4>CATEGORIE</h4>
                </div>
                <div class="bg_darkblue">
                    @foreach ($categories as $category)
                    <div id="category_box_{{ $category->id }}" class="pt-3 pb-3 border_bottom category_box" style="cursor: pointer" onclick="selectCategoryBox({{ $category->id }})">
                        <div id="title_category_{{ $category->id }}" class="w-100 mt-2 mb-2 ml-3">
                            <span class="fs_18">{{ $category->title }}</span>
                        </div>
                        <div class="mt-3 mb-3 ml-3 pb-3">
                            <div id="status_category_{{ $category->id }}" status-attr={{ $category->showOnMenu }} class="mr-2" style="width: 15px; height: 15px; background: blue; border: 1px solid #fff; border-radius: 2px; float: left" onclick="changeCategoryStatus({{ $category->id }})"></div>
                            <div class="text-truncate" style="float: left; line-height: 15px"><span id="status_category_label_disable_{{ $category->id }}">Disabilita categoria</span><span class="d-none" id="status_category_label_able_{{ $category->id }}">Abilita categoria</span></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="bg_extradarkblue pt-4 pb-4 pl-3 pr-3" style="width: calc(100%/3); height: 100%; float: left; color: #fff">
                <div>
                    <h4>SOTTOCATEGORIE</h4>
                </div>
                <div class="bg_darkblue">
                    @foreach ($subCategories as $subCategory)
                    <div id="category_box_{{ $subCategory->id }}" class="pt-3 pb-3 border_bottom category_box" style="cursor: pointer" onclick="selectCategoryBox({{ $subCategory->id }})">
                        <div id="title_category_{{ $subCategory->id }}" class="w-100 mt-2 mb-2 ml-3">
                            <span class="fs_18">{{ $subCategory->title }}</span>
                        </div>
                        <div class="mt-3 mb-3 ml-3 pb-3">
                            <div id="status_category_{{ $subCategory->id }}" status-attr={{ $subCategory->showOnMenu }} class="mr-2" style="width: 15px; height: 15px; background: blue; border: 1px solid #fff; border-radius: 2px; float: left" onclick="changeCategoryStatus({{ $subCategory->id }})"></div>
                            <div class="text-truncate" style="float: left; line-height: 15px"><span id="status_category_label_disable_{{ $subCategory->id }}">Disabilita categoria</span><span class="d-none" id="status_category_label_able_{{ $subCategory->id }}">Abilita categoria</span></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="bg_extradarkblue pt-4 pb-4 pl-3 pr-3" style="width: calc(100%/3); height: 100%; float: left; color: #fff">
                <div>
                    <h4>Dettagli</h4>
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
        selectCategoryBox(categoryList[0].id);
        console.log(categoryList);
    })

    function selectCategoryBox(category_id) {
        $('.category_box').removeClass('bg_blue');
        $('#category_box_'+category_id).addClass('bg_blue');
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

</script>

@endsection