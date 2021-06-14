require('./bootstrap');
// dotFlashing();
require('./product-details');

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
