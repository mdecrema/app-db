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
use App\Mail\MailCheckoutCompleted;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{

    public function index($sessionToken)
    {
        try {
            if (strlen($sessionToken) === 27) {

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

                // if ($fullAmount > 0) 
                // {
                    return view('checkout', compact('items', 'products', 'fullAmount'));
                // }
        
            }

        } catch  ( Throwable $e) {
            report($e);
        }
        
        // $products = Product::all();
        // return view('errors.checkoutErrors.checkoutIndexAccessError');

    }

    public function checkout(Request $request)
    {   
        $data = $request->all();
            
        // Enter Your Stripe Secret
        Stripe\Stripe::setApiKey('sk_test_51J9DU3D4jhSKwP3iHJqBcqc6ZG4LvAyTzbkLT6xPs9Q8bc8cnpdJuITTdLwRCdBMcwmt8jTUt83MmiFARRkjt6X900Z19GJYHN');

        $tokForCustomer =  Stripe\Token::create([
            'card' => [
              'number' => $data['card_no'],
              'exp_month' => $data['expiry_month'],
              'exp_year' => $data['expiry_year'],
              'cvc' => $data['cvv'],
            ],
          ]);
        
        // Create Customer
        $customer = \Stripe\Customer::create([
            "description" => 'Guest',
            "name" => $data['firstname'],
            "email" => $data['email'],
            "phone" => $data['phone'],
            "source" => $tokForCustomer->id //invalid
            // "address" => $data['address']
        ]);
        
        $tok = Stripe\Token::create([
            'card' => [
              'number' => $data['card_no'],
              'exp_month' => $data['expiry_month'],
              'exp_year' => $data['expiry_year'],
              'cvc' => $data['cvv'],
            ],
          ]);

        // Charge Card
        $charge = Stripe\Charge::create([
            "customer" => $customer->id,
            "amount" => $request['fullAmount'] * 100,
            "currency" => "eur",
            // "source" => $tok->id, // in test: commentare "customer" e valorizzare "source" = "tok_mastercard"
            "description" => "Making test payment." 
        ]);

        // Create Invoice Items
        $invoice = Stripe\InvoiceItem::create([
            "customer" => $customer->id,
            "amount" => $request['fullAmount'] * 100,
            "currency" => "eur",
            "description" => "Questa è la ricevuta fiscale per il suo ordine"
        ]);

        // Sending Invoice
        $orderInvoice = Stripe\Invoice::create([
            "customer" => $customer->id
        ]);

        // Insert into Order Table

        //$order = Order::create([
        // $payment_intent = \Stripe\PaymentIntent::create([
        //     'number' => $request->number,
        //     'cvc' => $request->cvc,
        //     'exp_month' => $request->exp_month,
        //     'exp_year' => $request->exp_year,
        //     'amount' => 200,
        //     'error' => $request->error,
        // ]);

        // $intent = $payment_intent->client_secret;

        // Inser into Product Order Table
        /* foreach(Cart::content() as $item) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item->id,
                //'quantity' => $item->quantity,
            ]);
        }*/

        // $items = Cart::content();
        // $items_id = array();

        // foreach($items as $item)
        // {
        //     array_push($items_id, $item->id);
        // }
        
        
        $items_id = json_decode($data['items_id']);

        $newOrder = new Order;

        $newOrder->items_id = json_encode($items_id);
        $newOrder->firstName = $data['firstname'];
        $newOrder->lastName = $data['lastname'];
        $newOrder->email = $data['email'];
        $newOrder->phone = $data['phone'];
        $newOrder->street = $data['address'];
        $newOrder->house = $data['addressNumber'];
        $newOrder->city = $data['city'];
        $newOrder->area = $data['area'];
        $newOrder->doorName = $data['doorName'];
        $newOrder->postcode = $data['postcode'];
        $newOrder->fullAmount = $data['fullAmount'];

        $newOrder->save();

        ////////
        // $table->boolean('newOrder')->default(true);
        // $table->string('dateNewOrder')->nullable();
        // $table->boolean('pending')->default(true);
        // $table->boolean('inProgress')->default(false);
        // $table->string('dateInProgress')->nullable();
        // $table->boolean('delivered')->default(false);
        // $table->string('dateDelivered')->nullable();
        ////////

        // Send confirmation email
        $customerEmail = $data['email'];
        // dd($customerEmail);
        Mail::to($customerEmail)->send(new MailCheckoutCompleted());

        // Update item->sold to true
        foreach($items_id as $item)
        {
            DB::table('items')
                ->where('id', $item)
                ->update(['sold' => true]);
        }

        Cart::destroy();

        return view('checkout-completed');

    }

    public function afterPayment()
    {

        Session::flash('success', 'Payment successful!');
        return view('checkout-completed');

    }

    /**
     * 
     * ERRORS
     * 
     */
    // public function checkoutIndexAccessError() {

    //     return view('checkoutIndexAccessError');
    // }
}
