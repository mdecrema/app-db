<div class="container">
    <div class="row">
        <div class="col-12">
            {{-- <form action="{{ route('admin.deleteAll') }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" disabled class="btn btn-holder btn-secondary">Cancella Tutti i Prodotti <i class="fas fa-exclamation-circle"></i></button>
            </form> --}}
            <div style="margin-bottom: 20px">
                <a href="/admin/dashboard">
                    <div class="back_btn" style="display: inline-block;">
                        <i class="fa fad fa-arrow-left"></i>
                    </div>
                </a>
                <div style="display: inline-block; margin-left: 10px">
                    <h4> Registro prodotti <a href="" style="font-size: 15px; margin-left: 10px" data-toggle="modal" data-target="#exampleModalCenter">Scarica file <i class="fa fa-download"></i></a> </h4>
                </div>
            </div>

            <!-- Modal Download db products -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Database prodotti</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Vuoi scaricare il file con tutti i prodotti registrati a magazzino?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                            <button type="button" class="btn btn-primary">
                                <a href="{{ route('admin.products.export.csv') }}" style="text-decoration: none; color: #fff">
                                    Scarica
                                </a>    
                            </button> 
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filtri di ricerca -->
            <div class="col-xl-6 col-lg-6 col-md-6 col-xs-12 col-sm-12" id="accordion" style="margin-top: 20px">
                <div class="card" style="border: 1px solid grey">
                  <div class="card-header" id="headingOne" style="height: 30px; line-height: 30px; padding: 5px 10px; cursor: pointer" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <h6 class="mb-0" onclick="changeCardArrow()">
                        Filtra risultati
                    </h6> {{-- <i class="fa fa-filter"></i> --}}
                    <div style="width: 50px; height: 50px; position: absolute; top: 0; right: 0; line-height: 25px; text-align: center">
                        <i id="filter_card_arrow" class="fa fa-chevron-down"></i>
                    </div>
                  </div>
              
                  <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Titolo</label>
                            <input type="text" class="form-control" id="title" name="nome" placeholder="Nome prodotto" placeholder="titolo">
                        </div>
            
                        <div class="form-group">
                            <label for="title">Categoria</label>
                            <select name="" id="categoria" class="form-control">
                                <option value="tutti" selected>- tutti -</option>
                            @foreach($products as $product)
                                @if($product->categoria)
                                <option value="{{ $product->categoria }}">{{ $product->categoria }}</option>
                                @endif
                            @endforeach
                        </select>
                        </div>
            
                        <div class="form-group">
                            <label for="title">Brand</label>
                            <select name="" id="brand" class="form-control">
                                    <option value="tutti" selected>- tutti -</option>
                                @foreach($products as $product)
                                    @if($product->brand)
                                    <option value="{{ $product->brand }}">{{ $product->brand }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
            
                        <div class="form-group">
                            <label for="title">Valutazione</label>
                            <select name="" id="valutazione" class="form-control">
                                <option value="tutti" selected>- tutti -</option>
                                @for($i = 1; $i <= 5; $i++)
                                    <option value="$i">{{$i}} </option>
                                @endfor
                            </select>
                        </div>
            
                        <div class="form-group">
                            <label for="title">Genere</label>
                            <select name="" id="genere" class="form-control">
                                <option value="tutti" selected>- tutti -</option>
                                <option value="donna">donna</option>
                                <option value="uomo">uomo</option>
                                <option value="bambino">bambino</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Cerca</button> 
                    </div>
                  </div>
                </div>
            </div>

        </div>
        @foreach($products as $product)   
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-6" style="height: 350px; padding: 10px; overflow: hidden;">     
            <a href="products/show/{{$product['id']}}">  
                <img class="active" src="{{'https://img-space.fra1.digitaloceanspaces.com/img-space/uploads/images/'.$product->photo1}}" alt="" style="width: 100%; height: 100%">
            </a>
        </div>
        @endforeach
    </div>
</div>

<script>
    changeCardArrow();
    function changeCardArrow() {

        if (!$('#collapseOne').hasClass('show')) {
            $('#filter_card_arrow').removeClass('fa-chevron-down');
            $('#filter_card_arrow').addClass('fa-chevron-up');
        } else {
            $('#filter_card_arrow').removeClass('fa-chevron-up');
            $('#filter_card_arrow').addClass('fa-chevron-down');
        }

    }
</script>