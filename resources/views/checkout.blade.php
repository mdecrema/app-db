@extends('layouts.app')

@section('page-title')
    Checkout
@endsection

@section('content')

<?php
$province = array (
'AG','AL','AN','AO','AQ','AR','AP','AT','AV','BA', 'BT', 'BL','BN','BG','BI','BO','BZ','BS','BR',
'CA','CL','CB','CI','CE','CT','CZ','CH','CO','CS','CR','KR','CN','EN','FM','FE','FI','FG','FC','FR','GE','GO','GR','IM','IS', 'SP','LT','LE','LC','LI','LO','LU','MC','MN','MS','MT','ME','MI','MO','MB',
'NA','NO','NU','OT','OR','PD','PA','PR','PV','PG','PU','PE','PC','PI','PT','PN','PZ','PO','RG','RA','RC','RE','RI','RN','RM','RO','SA','SS','SV','SI','SR','SO','TA','TE','TR','TO','TP','TN','TV','TS', 'UD','VA','VE','VB','VC','VR','VV','VI','VT');
?>

<div class="container" style="font-family: 'Roboto', sans-serif">  
    <div class="row">
        <div class="col-12 text-center" style="width: 100%; height: 40px; background-color: transparent; color: #000; border-radius: 4px; margin: 15px 0; line-height: 40px; font-size: 20px">
            <h3 class="panel-heading">CHECKOUT</h3>
        </div>
        <div class="col-12" style="background-color: #EFEFEF; padding: 20px 0">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="col-12" style="background-color: #EFEFEF; padding: 20px; text-align: center">
                        <h6>SPEDIZIONE GRATUITA SU TUTTI GLI ARTICOLI</h6>
                    </div>                   
                </div>
                <div class="panel-body">
  
                    @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif
  
                    <form role="form" action="{{ route('checkout.checkout') }}" method="post" class="validation"
                                                    data-cc-on-file="false"
                                                    data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                                                    id="payment-form">
                        @csrf
                    
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="float: left; padding: 0 20px">
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

                                <input name="items_id" class='form-control' size='20' type='text' placeholder="Nome" value='{{ json_encode($items_id) }}'>
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
                                <input name="email" class='form-control' size='20' type='email' placeholder="E-mail">
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
                                <input name="city" placeholder="Città/Paese" class='form-control' size='20' type='text'>
                            </div>
                        </div>

                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <!--<label class='control-label'>Provincia</label>--> 
                                {{-- <input name="area" class='form-control' size='20' type='text' placeholder="Provincia"> --}}
                                <select class='form-control' name="area" id="provincia" aria-placeholder="provincia">
                                    <option value="" style="color: #ABB8C5" disabled selected>Provincia</option>
                                    @foreach($province as $prov)
                                    <option value="{{ $prov }}">{{ $prov }}</option>
                                    @endforeach
                                </select>
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
                                <label class='control-label'>Nome e Cognome citofono</label> 
                                <input name="doorName" class='form-control' size='20' type='text'>
                            </div>
                        </div>

                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Altre note per la consegna</label> 
                                <input name="note" class='form-control' size='20' type='text'>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="float: left; padding: 0 20px">
                        <div style="height: 50px; background-color: #000; color: #fff; text-transform: uppercase; line-height: 50px; padding: 0 20px; margin-bottom: 20px">
                            <h5 style="line-height: 50px">2. DETTAGLI PAGAMENTO</h5>
                        </div>
        
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Nome Intestatario Carta</label> <input
                                    class='form-control' size='20' type='text'>
                            </div>
                        </div>
  
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Numero Carta</label> 
                                <input  name="card_no" type="tel" pattern="\d*" maxlength="19" class='form-control card-num' size='20'>
                            </div>
                        </div>
  
                        <div class='form-row row'>
                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                <label class='control-label'>CVC</label> 
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
                                    class='form-control card-expiry-year' placeholder='AAAA' size='4'
                                    type='text'>
                            </div>
                        </div>

                        <div class='form-row row'>
                            <div class='col-xs-12 form-group'>
                                <div>
                                    <label for="" class='control-label'>Tipi di pagamenti accettati</label>
                                </div>
                                <div style="width: 190px; height: 35px; overflow: hidden; float: left">
                                    <img src="{{ asset('img/cardTypesImg.png') }}" alt="Card Types Image" style="width: 100%; height: 100%">
                                </div>
                                <div style="width: 50px; height: 35px; overflow: hidden; float: left">
                                    <img src="{{ asset('img/discoverLogo.jpg') }}" alt="" style="width: 100%; height: 100%">
                                </div>
                            </div>
                        </div>
  
                        <div class='form-row row d-none'>
                            <div class='col-md-12 hide error form-group'>
                                <div class='alert-danger alert'>Fix the errors before you begin.</div>
                            </div>
                        </div>

                        <div class='form-row row' style="margin: 10px 0">
                            <div style="height: 50px; border: 2px solid #000; background-color: #fff; color: #000; margin-bottom: 20px; position: relative">
                                <strong>Spedizione Standard</strong> - gratuita
                                <div>
                                    <span style="font-size: 12px" id="deliveryDate"></span>
                                </div>
                                <div style="width: 50px; height: 100%; position: absolute; top: 0; right: 0; padding: 3%">
                                    <i class="fa fa-2x fa-box-circle-check"></i>
                                </div>
                            </div>
 
                        </div>

                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <input type="checkbox">
                                <label class='control-label' style="font-size: 14px">Accetto le Condizioni di <a href="">Privacy</a> *</label>
                            </div>
                        </div>

                        <div class="form-row row">
                            <div class='col-xs-12 col-md-12 form-group' style="text-align: right">
                                <input type="hidden" name="fullAmount" value="{{ Cart::total() }}">
                                <table class="col-6 offset-6" style="margin-top: 10px">
                                    <tr>
                                        <td>
                                            Subtotale
                                        </td>
                                        <td style="text-align: right; font-size: 10px">
                                            {{ number_format(Cart::total(), 2, '.', ',') }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Spedizione
                                        </td>
                                        <td style="text-align: right; font-size: 10px">
                                            0.00
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Sconti
                                        </td>
                                        <td style="text-align: right; font-size: 10px">
                                            0.00
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Tasse
                                        </td>
                                        <td style="text-align: right; font-size: 10px">
                                            10%
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 20px; font-weight: bold">
                                            Totale
                                        </td>
                                        <td style="text-align: right; font-size: 20px; font-weight: bold">
                                            <?php
                                            /** Calcolo fake da sistemare in produzione */
                                            // $subtotal = Cart::total();
                                            // $tax = 10;
                                            // $total = $subtotal + 5.00 * $tax / 10;
                                        ?>
                                            € {{ Cart::total() }}
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        
  
                        <div class="row">
                            <div class="col-xs-12">
                                <button class="btn btn-lg btn-block btn-conferma-paga" type="submit" style="background-color: #000; color: #fff; text-align: left; padding: 10px 20px; border-radius: 0; text-align: right">CONFERMA e PAGA <i class="fa fa-angle-right" style="font-size: 20px; margin-left: 5px"></i></button> <!-- #045871 / #BF4825-->
                            </div>
                        </div>
                    </div>
                          
                    </form>

                    
                </div>
            </div>        
        </div>

        <!-- Ordine -->
        <div class="col-12" style="background-color: #EFEFEF; padding: 20px 0; margin: 50px 0">
            <div class="col-12" style="background-color: #EFEFEF; padding-top: 20px; text-align: center">
                <h6>IL TUO ORDINE</h6>
            </div>                   
 
            <div class="cart-details">

                @foreach( Cart::content() as $item )
                
                    <div class="col-lg-12 d-flex flex-grow-1" style="background-color: lightgrey">
                        {{-- Elimina dal carrello --}}
                        {{-- <form style="position: absolute; top: 0; right: 5px;" action="{{ route('cart.destroy', [$item->rowId, $item->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="cart-option" style="border: none; background-color: transparent; font-size: 10px"><i class="fas fa-times"></i></button>
                        </form> --}}

                        <div class="cart-img" style="width: 50%; height: 150px; display: inline-block; overflow: hidden; padding: 2% 4%; text-align: right;">
                            <img class="active" id="" src="{{'https://img-space.fra1.digitaloceanspaces.com/img-space/uploads/images/'.$item->options['photo1']}}" alt="item-pitcure" style="width: 150px; height: 140px" />
                        </div>
                        <div class="cart-text" style="width: 50%; display: inline-block; position: relative; padding: 2% 4%; line-height: 30px;">
                            <h5><strong>{{$item->name}}</strong></h5>
                            <span>Taglia: {{$item->options['size']}}</span>
                            <select class="form-select" name="" id="" style="width: 50px; font-size: 12px; background-color: #000; color: #fff; padding: 5px 10px; border-radius: 3px">
                                <option selected="">1</option>
                                {{-- <option>2</option>
                                <option>3</option> 
                                <option>4</option>
                                <option>5</option> --}}
                            </select>
                            <span>€ {{ number_format($item->options['amount'], 2, '.', ',') }}</span>
                        </div> 

                    </div>

                @endforeach    
            </div>
        </div>

        <!-- FAQ -->
        <div style="margin: 30px 0; text-align: center;">
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


<script type="text/javascript" src="https://js.stripe.com/v3/"></script>
  
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
        Stripe($form.data('stripe-publishable-key'));
    // Stripe.setPublishableKey($form.data('stripe-publishable-key'));
    //   Stripe.createToken({
    //     number: $('.card-num').val(),
    //     cvc: $('.card-cvc').val(),
    //     exp_month: $('.card-expiry-month').val(),
    //     exp_year: $('.card-expiry-year').val()
    //   }, stripeHandleResponse);
    const token = await stripe.tokens.create({
    bank_account: {
        number: $('.card-num').val(),
        cvc: $('.card-cvc').val(),
        exp_month: $('.card-expiry-month').val(),
        exp_year: $('.card-expiry-year').val()
        },
    });

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

<script>
    // Calculate delivery day - using Moment.js
calculateDeliveryDate();
function calculateDeliveryDate() {
    console.log('ciao');
    var today = new Date();
    deliveryDay = moment().add(7, 'days').format("DD");
    deliveryMonth = convertMonthNumberInWord(moment().add(7, 'days').format("MM"));
    
    $('#deliveryDate').html('La consegna è prevista entro il ' + deliveryDay + ' ' + deliveryMonth);
}

function convertMonthNumberInWord(monthNum) {
    var months = ['Gennaio','Febbraio','Marzo','Aprile','Maggio','Giugno','Luglio','Agosto','Settembre','Ottobre','Novembre','Dicembre'];
    return months[parseInt(monthNum)-1];
}
</script>

@endsection

