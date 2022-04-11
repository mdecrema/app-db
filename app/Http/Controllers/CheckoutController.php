<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cartalyst\Stripe\Laravel\StripeServiceProvider;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use App\Order;
use App\Product;
use Stripe;
use Session;

class CheckoutController extends Controller
{

    public function index()
    {
        $items = Cart::content();
        $products_id = array();
        $fullAmount = 0;   

        foreach($items as $item)
        {
            array_push($products_id, $item->id);
        }

        $products = Product::whereIn('id', $products_id)->get();

        foreach($products as $product)
        {
            $fullAmount += $product->amount;
        }

        return view('checkout', compact('items', 'products', 'fullAmount'));
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
        $newOrder = new Order;

        $newOrder->items_id = ['8','9','10'];
        $newOrder->firstnName = $data['firstname'];
        $newOrder->lastName = $data['lastname'];
        $newOrder->street = $data['address'];
        $newOrder->house = $data['addressNumber'];
        $newOrder->city = $data['city'];
        $newOrder->postcode = $data['postcode'];
        $newOrder->fullAmount = $data['fullAmount'];

        $newOrder->save();

        Cart::destroy();

        return view('checkout-completed');

    }

    public function afterPayment(Request $request)
    {
        $items = Cart::content();
        $items_id = array();

        foreach($items as $item)
        {
            array_push($items_id, $item->id);
        }

        $data = $request->all();

        $newOrder = new Order;

        $newOrder->items_id = json_encode($items_id);
        $newOrder->firstName = $data['firstname'];
        $newOrder->lastName = $data['lastname'];
        $newOrder->street = $data['address'];
        $newOrder->house = $data['addressNumber'];
        $newOrder->city = $data['city'];
        $newOrder->postcode = $data['postcode'];
        $newOrder->fullAmount = $data['fullAmount'];

        $newOrder->save();

        return view('checkout-completed');
    }
}
