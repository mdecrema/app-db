require('./bootstrap');
// dotFlashing();
var left = document.getElementById('arrowLeft');
var right = document.getElementById('arrowRight');

var imgFirst = $(".first");
var imgLast = $(".last");

var dot = document.getElementById('dot');
var count = 'a';

function dotFlashing() {
    setInterval(function() {
        if (count === 'a') {
            dot.style.visibility='hidden';
            count = 'b';
            setTimeout(function() {
                dot.style.visibility='visible';
            }, 5000);
        } else if (count === 'b') {
            dot.style.visibility='visible';

            count = 'a';
        }
    }, 2000);
}

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