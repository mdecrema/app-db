@extends('layouts.app')

@section('page-title')
    Product Details
@endsection

@section('content')
<div class="container">
    <div class="item-view row">
        
        <div class="item-picture" style="overflow: hidden; position: relative;">
            <img id="uno" src="{{'https://img-space.fra1.digitaloceanspaces.com/img-space/uploads/images/'.$product->photo1}}" class="image active first" alt="item pictures" style="width: 100%; height: 350px" /> <!-- {{ asset('storage/'.$product->photo1) }} -->
            <img id="due" src="{{'https://img-space.fra1.digitaloceanspaces.com/img-space/uploads/images/'.$product->photo2}}" class="image" alt="item pictures" style="width: 100%; height: 350px" />
            <img id="tre" src="{{'https://img-space.fra1.digitaloceanspaces.com/img-space/uploads/images/'.$product->photo3}}" class="image" alt="item pictures" style="width: 100%; height: 350px" />
            <img id="quattro" src="{{'https://img-space.fra1.digitaloceanspaces.com/img-space/uploads/images/'.$product->photo4}}" class="image last" alt="item pictures" style="width: 100%; height: 350px" />
            <!-- Arrows Left and Right -->
            <div style="width: 50px; height: 100%; position: absolute; top: 0; left: 0">
                <div id="arrowLeft" style="width: 50px; height: 50px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center">
                    <i class="fas fa-2x fa-chevron-left"></i>
                </div>
            </div>
            <div style="width: 50px; height: 100%; position: absolute; top: 0; right: 0">
                <div id="arrowRight" style="width: 50px; height: 50px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center">
                    <i class="fas fa-2x fa-chevron-right"></i>
                </div>
            </div>
        </div>
        <div class="item-details" style="padding: 15px 25px;">
            <span style="color: grey;">{{ $product->categoria }} - {{ $product->genere }}</span><br>
            <span style="color: #000; font-size: 20px; font-weight: bold">{{ $product->nome }}</span><br>
            <span style="color: #000;  font-weight: bold">{{ $product->amount }} €</span>
        </div>
        <div class="item-details" style="padding: 15px 25px;">
            <span style="color: #000; font-size: 16px;">{{ $product->description }}</span><br>
        </div>
        <div class="item-cart col-lg-2">
        <form action="{{ route('cart.store') }}" method="POST"> {{--  --}}
                @csrf
                @method('POST')
                <input type="hidden" name="id" value="{{ $product->id }}">
                <input type="hidden" name="nome" value="{{ $product->nome }}">
                <!--<input type="hidden" name="taglia" value="{{ $product->taglia }}">-->
                <input type="hidden" name="amount" value="{{ $product->amount }}">
                <button type="submit" class="btn btn-holder" style="background-color: #AFB49D">Add to Cart</button>
            </form>
        </div>
    </div>
</div>

<script>
    var left = document.getElementById('arrowLeft');
var right = document.getElementById('arrowRight');


var imgFirst = $(".first");
var imgLast = $(".last");

left.addEventListener('click', arrowLeft);
right.addEventListener('click', arrowRight);

function arrowLeft() {
    
        var img = $("img.active");
        img.removeClass("active");
        /*var punto = $("i.active");
        punto.removeClass("active");*/
    
        if (img.hasClass("first")) { /* && punto.hasClass("first") */
        var imgNext = imgLast;
        //var puntoNext = imgLast;
      } else {
        var imgNext = img.prev();
        //var puntoNext = punto.prev();
      }
      imgNext.addClass("active");
      //puntoNext.addClass("active");
}

function arrowRight() {

    var img = $("img.active");
    img.removeClass("active");
    
    if (img.hasClass("last")) {
        // Allora significa che cliccando a destra dovrò vedere la prima immagine e il primo pallino sarà blu
      var imgNext = imgFirst;
      
    } else {
      // Altrimenti verrà selezionata l'immagine successiva a quella che al momento a classe 'active'
      var imgNext = img.next();
      // Stesso cosa per il pallino
      
    }
  
    // Una volta individuato l'elemento corretto gli aggiungo la classe 'active' in modo da renderlo visibile
    imgNext.addClass("active");
   
}
</script>
@endsection