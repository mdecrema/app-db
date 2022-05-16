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
            <div style="width: 50px; height: 100%; position: absolute; top: 0; left: 5px">
                <div id="arrowLeft" style="width: 25px; height: 25px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; background-color: #fff; border-radius: 100%;">
                    <i class="fas fa-chevron-left"></i>
                </div>
            </div>
            <div style="width: 50px; height: 100%; position: absolute; top: 0; right: 5px">
                <div id="arrowRight" style="width: 25px; height: 25px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; background-color: #fff; border-radius: 100%;">
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div>
            <!-- Pallini -->
            <!-- -->
            <div class="box-pallini" style="width: 150px; height: 20px; position: absolute; bottom: 0; left: 50%; transform: translate(-50%, 0%); font-size: 8px; text-align: center;">
                <i class="fas fa-circle active first" style="margin: 0 5px;"></i>
                <i class="fas fa-circle" style="margin: 0 5px;"></i>
                <i class="fas fa-circle" style="margin: 0 5px;"></i>
                <i class="fas fa-circle last" style="margin: 0 5px;"></i>
            </div>
        </div>
        <div class=" item-details" style="width: 50%; padding: 15px 25px;">
            <span style="color: grey;">{{ $product->categoria }} - {{ $product->genere }}</span><br>
            <span style="color: #000; font-size: 20px; font-weight: bold">{{ $product->nome }}</span><br>
            <span style="color: #000;  font-weight: bold">{{ number_format($product->amount, 2, '.', ',') }} €</span>
        </div>
        
        <div class="item-details" style="padding: 15px 25px;">
            <span style="color: #000; font-size: 16px;">{{ $product->description }}</span><br>
        </div>

        <div class="" style="width: 50%; padding: 15px 25px">
            <?php 
              $sizesAvailable = array();
              $sizes1 = ['XS', 'S', 'M', 'L', 'XL', 'XXL'];
              $sizes2 = ['35', '36', '37', '38', '39', '40', '41', '42', '43', '44', '45'];
  
              foreach($items as $item) {
                if ($item->available == true && $item->sold == false) {
                  array_push($sizesAvailable, $item->size);
                }
              }             
             
            ?>
            @if(count($sizesAvailable) !== 0)
            Taglie disponibili
            <select onchange="getSizeValue()" class="form-select" name="" id="itemSize" style="width: 100px; background-color:  #fff; color: #000; padding: 5px 10px; border-radius: 3px border-bottom: 2px solid  #FF4901">
            @if($product->categoria==='t-shirt')
              
              @foreach($sizes1 as $size)
                @if( in_array($size, $sizesAvailable) )
                  <option value="{{ $size }}" style="font-weight: bold">{{ $size }}</option>
                @else
                  <option value="{{ $size }}" disabled="true" style="color: lightgrey">
                    {{ $size }}
                  </option>
                @endif
              @endforeach

            @elseif($product->categoria==='shoes')

              @foreach($sizes2 as $size)
                @if( in_array($size, $sizesAvailable) )
                  <option value="{{ $size }}" style="font-weight: bold">{{ $size }}</option>
                @else
                  <option value="{{ $size }}" disabled="true" style="color: lightgrey">
                    {{ $size }}
                  </option>
                @endif
              @endforeach

            @endif
            </select>
            @else
            <div>
              <strong>SOLD OUT</strong>
            </div>
            @endif
         </div>

        <div class="item-cart col-lg-2" style="padding: 15px 25px">
        @if(count($sizesAvailable) !== 0)
        <form action="{{ route('cart.store') }}" method="POST"> {{--  --}}
          @csrf
          @method('POST')
                
          <input type="hidden" name="id" value="{{ $product->id }}">
          <input type="hidden" name="nome" value="{{ $product->nome }}">
          <input type="hidden" name="size" id="sizeSelected" value="">
          <input type="hidden" name="amount" value="{{ $product->amount }}">
          <button type="submit" class="btn btn-holder" style="width: 100%; background-color: #000; color: #fff">Aggiungi al Carrello</button> <!-- background-color: #96DED1 -->
        </form>
        @endif
        </div>
    </div>

    <div class="row">
        <!-- Accordion - Prova --> 
    <div class="accordion" id="accordionExample" style="margin-top: 30px; margin-bottom: 30px;">
  <div class="card" style="border: none;">
    <div class="card-header" style="background-color: #fff;" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left" style="padding: 0; color: #000" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
          Dettagli Prodotto <i style="font-size: 12px" class="fas fa-chevron-down"></i>
        </button>
      </h2>
    </div>

    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        Some placeholder content for the first accordion panel. This panel is shown by default, thanks to the <code>.show</code> class.
      </div>
    </div>
  </div>
  <div class="card" style="border: none;">
    <div class="card-header" style="background-color: #fff;" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" style="padding: 0; color: #000" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Guida alle taglie <i style="font-size: 12px" class="fas fa-chevron-down"></i>
        </button>
      </h2>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
        <!-- Guida alle taglie table -->
        <table class="table table-striped">
  <thead>
    <tr>  
      <th scope="col">IT</th>
      <th scope="col">US</th>
      <th scope="col">UK</th>
    </tr>
  </thead>
  <tbody>
    <tr>     
      <td>35</td>
      <td>4.5</td>
      <td>2.5</td>
    </tr>
    <tr>  
      <td>35.5-36</td>
      <td>5</td>
      <td>3</td>
    </tr>
    <tr>    
      <td>36.5</td>
      <td>5.5</td>
      <td>3.5</td>
    </tr>
    <tr>   
      <td>37</td>
      <td>6</td>
      <td>4</td>
    </tr>
    <tr>     
      <td>37.5-38</td>
      <td>6.5</td>
      <td>4.5</td>
    </tr>
    <tr>
      <td>38-38.5</td>
      <td>7</td>
      <td>5</td>
    </tr>
    <tr>
      <td>39</td>
      <td>7.5</td>
      <td>5.5</td>
    </tr>
    <tr>
      <td>39.5</td>
      <td>8</td>
      <td>6</td>
    </tr>
    <tr>
      <td>40-40.5</td>
      <td>8.5</td>
      <td>6.5</td>
    </tr>
    <tr>
      <td>40.5-41</td>
      <td>9</td>
      <td>7</td>
    </tr>
    <tr>
      <td>41.5</td>
      <td>9.5</td>
      <td>7.5</td>
    </tr>
    <tr>
      <td>42</td>
      <td>10</td>
      <td>8</td>
    </tr>
    <tr>
      <td>42.5-43</td>
      <td>10.5</td>
      <td>8.5</td>
    </tr>
    <tr>
      <td>43-43.5</td>
      <td>11</td>
      <td>9</td>
    </tr>
    <tr>
      <td>44</td>
      <td>11.5</td>
      <td>9.5</td>
    </tr>
    <tr>
      <td>44.5</td>
      <td>12</td>
      <td>10</td>
    </tr>
    <tr>
      <td>45-45.5</td>
      <td>12.5</td>
      <td>10.5</td>
    </tr>
  </tbody>
</table>
        <!-- /Guida alle taglie table -->
      </div>
    </div>
  </div>
  <!--<div class="card" style="border: none;">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" style="padding: 0" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          'Prova' Item #3
        </button>
      </h2>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
        And lastly, the placeholder content for the third and final accordion panel. This panel is hidden by default.
      </div>
    </div>
  </div>-->
</div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <h5>Consigliati per te</h5>
        </div>
        <!-- scroll items -->
        <div class="col-lg-12" style="height: 200px; border-top: 1px solid grey; border-bottom: 1px solid grey;overflow-x: scroll; overflow-y: hidden; -webkit-overflow-scrolling: touch;">
            <div style="width: 1000px; height: 200px;">
            @foreach($products as $product)
                <a href="products/{{$product['id']}}">
                    <div style="width: 150px; height: 200px; display: inline-block; position: relative; margin: 0 2px;">
                        <img src="{{ 'https://img-space.fra1.digitaloceanspaces.com/img-space/uploads/images/'.$product->photo1 }}" alt="product-img" style="width: 100%; height: 150px">
                        <span style="color: #000; font-size: 12px; font-weight: bold" class="text-truncate">{{ $product->nome }}</span><br>
                        <span style="color: #000; font-size: 10px; font-weight: bold">{{ $product->amount }} €</span>
                        <!--<div style="display: none; position: absolute; top: 50%; left: 50%; transform: translate(-50%; -50%)">
                            <h6>{{ $product->nome }}</h6>
                        </div>-->
                    </div>
                </a>
            @endforeach
            </div>
        </div>
        <!-- /scroll items -->
    </div>

</div>

<script>
var size = document.getElementById('itemSize').value;
document.getElementById('sizeSelected').value = size;

var left = document.getElementById('arrowLeft');
var right = document.getElementById('arrowRight');


var imgFirst = $(".first");
var imgLast = $(".last");

left.addEventListener('click', arrowLeft);
right.addEventListener('click', arrowRight);

function arrowLeft() {
    
        var img = $("img.active");
        img.removeClass("active");
        var punto = $("i.active");
        punto.removeClass("active");
    
        if (img.hasClass("first")  && punto.hasClass("first")) { /* && punto.hasClass("first") */
        var imgNext = imgLast;
        var puntoNext = imgLast;
      } else {
        var imgNext = img.prev();
        var puntoNext = punto.prev();
      }
      imgNext.addClass("active");
      puntoNext.addClass("active");
}

function arrowRight() {

    var img = $("img.active");
    img.removeClass("active");
    var punto = $("i.active");
    punto.removeClass("active");
    
    if (img.hasClass("last")  && punto.hasClass("last")) {
        // Allora significa che cliccando a destra dovrò vedere la prima immagine e il primo pallino sarà blu
      var imgNext = imgFirst;
      var puntoNext = imgFirst;
      
    } else {
      // Altrimenti verrà selezionata l'immagine successiva a quella che al momento a classe 'active'
      var imgNext = img.next();
      // Stesso cosa per il pallino
      var puntoNext = punto.next();
    }  
    // Una volta individuato l'elemento corretto gli aggiungo la classe 'active' in modo da renderlo visibile
    imgNext.addClass("active");
    puntoNext.addClass("active");
}

// Item size selected
function getSizeValue() {
  size = document.getElementById('itemSize').value;
  document.getElementById('sizeSelected').value = size;
}
</script>
@endsection