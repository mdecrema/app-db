@extends('layouts.app')

@section('page-title')
    Checkout
@endsection

@section('content')

<div class="container">  
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="text-center" style="width: 100%; height: 40px; background-color: transparent; color: #000; border-radius: 4px; margin: 0 0 15px 0; line-height: 40px; font-size: 20px">
                        <span class="panel-heading">PAGAMENTO</h3>
                    </div>                    
                </div>
                <div class="panel-body">
  
                    @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif
  
                    <form role="form" action="{{ route('checkout.completed') }}" method="post" class="validation"
                                                     data-cc-on-file="false"
                                                    data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                                                    id="payment-form">
                        @csrf

                        <div style="height: 50px; background-color: #000; color: #fff; text-transform: uppercase; padding: 0 20px; margin-bottom: 20px">
                            <h5 style="line-height: 50px">1. opzioni di consegna</h5>
                        </div>

                        <div class='form-row row' style="display: none">
                            <div class='col-xs-12 form-group required'>
                                <!--<label class='control-label'>Nome</label>-->
                                <?php
                                $items_id = array();

                                foreach($items as $item)
                                {
                                    array_push($items_id, $item->id);
                                    
                                };
                                ?>

                                <input name="items_id" class='form-control' size='20' type='text' placeholder="Nome" value=$items_id>
                                <input name="fullAmount" class='form-control' size='20' type='text' placeholder="Nome" value='{{ $fullAmount }}'>
                            </div>
                        </div>

                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <!--<label class='control-label'>Nome</label>-->
                                <input name="firstname" class='form-control' size='20' type='text' placeholder="Nome">
                            </div>
                        </div>

                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <!--<label class='control-label'>Cognome</label>-->
                                <input name="lastname" class='form-control' size='20' type='text' placeholder="Cognome">
                            </div>
                        </div>

                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <!--<label class='control-label'>E-mail Address</label>-->
                                <input name="email" class='form-control' size='20' type='text' placeholder="E-mail">
                            </div>
                        </div>

                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <!--<label class='control-label'>Numero di cellulare</label>-->
                                <input name="phone" class='form-control' size='20' type='text' placeholder="Numero di cellulare">
                            </div>
                        </div>

                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Indirizzo di spedizione</label> 
                                <input name="address" class='form-control' size='20' type='text' placeholder="Via/Piazza">
                            </div>
                        </div>

                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <!--<label class='control-label'>Numero Civico</label>-->
                                <input name="addressNumber" class='form-control' size='20' type='text' placeholder="Numero civico">
                            </div>
                        </div>

                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <!--<label class='control-label'>Città</label>--> 
                                <input name="city" placeholder="Città" class='form-control' size='20' type='text'>
                            </div>
                        </div>

                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <!--<label class='control-label'>Provincia</label>--> 
                                <input name="province" class='form-control' size='20' type='text' placeholder="Provincia">
                            </div>
                        </div>

                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <!--<label class='control-label'>CAP</label>-->
                                <input name="postcode" class='form-control' size='20' type='text' placeholder="CAP">
                            </div>
                        </div>

                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Nome e Cognome citofono</label> <input name="nameOnCard"
                                    class='form-control' size='20' type='text'>
                            </div>
                        </div>

                        <div style="height: 50px; background-color: #000; color: #fff; text-transform: uppercase; line-height: 50px; padding: 0 20px; margin: 20px 0">
                            <h5 style="line-height: 50px">2. PAGAMENTO</h5>
                        </div>

                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <input id="visa" name="typeOfCard" type='radio' value="visa" checked>
                                <label for="visa" class='control-label' style="margin: 0 20px 0 10px"><i class="fab fa-2x fa-cc-visa"></i></label>
                                <input id="mastercard" name="typeOfCard" type='radio' value="mastercard">
                                <label for="mastercard" class='control-label' style="margin: 0 10px"><i class="fab fa-2x fa-cc-mastercard"></i></label>
                            </div>
                        </div>
        
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Nome Intestatario Carta</label> <input
                                    class='form-control' size='20' type='text'>
                            </div>
                        </div>
  
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Numero Carta</label> <input  name="card_no"
                                    autocomplete='off' class='form-control card-num' size='20'
                                    type='text'>
                            </div>
                        </div>
  
                        <div class='form-row row'>
                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                <label class='control-label'>CVV</label> 
                                <input autocomplete='off' class='form-control card-cvc' placeholder='e.g 415' size='4'  name="cvv"
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Mese di Scadenza</label> <input  name="expiry_month"
                                    class='form-control card-expiry-month' placeholder='MM' size='2'
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'> 
                                <label class='control-label'>Anno di Scadenza</label> <input  name="expiry_year"
                                    class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                    type='text'>
                            </div>
                        </div>
  
                        <div class='form-row row'>
                            <div class='col-md-12 hide error form-group'>
                                <div class='alert-danger alert'>Fix the errors before you begin.</div>
                            </div>
                        </div>

                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <input type="checkbox">
                                <label class='control-label'>Accetto le Condizioni di <a href="">Privacy</a> *
                            </div>
                        </div>

                        <div class="form-row row">
                            <div class='col-xs-12 col-md-4 form-group'>
                                <label class='control-label'>TOTALE €(euro) </label> <input name="total"
                                class='form-control' size='20' type='text'>
                            </div>
                        </div>
  
                        <div class="row">
                            <div class="col-xs-12">
                                <button class="btn btn-lg btn-block" type="submit" style="background-color: #045871; color: #fff; text-align: left; padding: 10px 20px; border-radius: 0">CONFERMA e PAGA</button>
                            </div>
                        </div>
                          
                    </form>

                    <div>
                        <div class="col-xs-12" style="margin: 50px 0 30px; text-align: center;">
                            <div style="margin: 10px 0">
                                Spedizione
                            </div> 
                            <div style="margin: 10px 0">
                                Restituzioni
                            </div> 
                            <div style="margin: 10px 0">
                                Hai bisogno d'aiuto?
                            </div>    
                        </div>
                    </div>

                </div>
            </div>        
        </div>
    </div>
</div>


<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
  
 <script type="text/javascript">
$(function() {
    var $form         = $(".validation");
  $('form.validation').bind('submit', function(e) {
    var $form         = $(".validation"),
        inputVal = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputVal),
        $errorStatus = $form.find('div.error'),
        valid         = true;
        $errorStatus.addClass('hide');
 
        $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
      var $input = $(el);
      if ($input.val() === '') {
        $input.parent().addClass('has-error');
        $errorStatus.removeClass('hide');
        e.preventDefault();
      }
    });
  
    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
      Stripe.createToken({
        number: $('.card-num').val(),
        cvc: $('.card-cvc').val(),
        exp_month: $('.card-expiry-month').val(),
        exp_year: $('.card-expiry-year').val()
      }, stripeHandleResponse);
    }
  
  });
  
  function stripeHandleResponse(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            var token = response['id'];
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
  
});
</script> 

@endsection

