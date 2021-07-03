<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cartalyst\Stripe\Laravel\StripeServiceProvider;
use Gloudemans\Shoppingcart\Facades\Cart;
use Stripe;
use Session;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('checkout');
    }

    public function checkout(Request $request)
    {   
 
        // Enter Your Stripe Secret
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => 100 * 150,
                "currency" => "eur",
                "source" => $request->stripeToken,
                "description" => "Making test payment." 
        ]);

        // Insert into Order Table

        //$order = Order::create([
        $payment_intent = \Stripe\PaymentIntent::create([
            'email' => $request->email,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'address' => $request->address,
            'addressNumber' => $request->addressNumber,
            'city' => $request->city,
            'province' => $request->province,
            'postcode' => $request->postcode,
            'phone' => $request->phone,
            'nameOnCard' => $request->nameOnCard,
            'total' => 200,
            'error' => $request->error,
        ]);

        $intent = $payment_intent->client_secret;

        // Inser into Product Order Table
        /* foreach(Cart::content() as $item) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item->id,
                //'quantity' => $item->quantity,
            ]);
        }*/

        Cart::destroy();

        return view('checkout-completed');

    }

    public function afterPayment()
    {
        return view('checkout-completed');
    }
}
