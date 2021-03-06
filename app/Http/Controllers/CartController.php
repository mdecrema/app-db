<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Item;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Cart::content();

        // dd($items);

        return view('cart', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product_id = intval($request->id);
        $sizeChoosed = $request->size;

    //     $item = Item::where([
    //         'product_id' => $product_id,
    //         'size' => $sizeChoosed,
    //         'available' => true
    //  ])->first();

    $item = Product::join('items', 'items.product_id', '=', 'products.id')
    ->where([
        'items.product_id' => $product_id,
        'items.size' => $sizeChoosed,
        'items.available' => true
    ])
    ->get([
        'items.*', 
        'products.nome',
        'products.photo1',
        'products.photo2',
        'products.photo3',
        'products.photo4',
        'products.photo5',
        'products.category_id',
        'products.category_title',
        'products.genere',
        'products.description',
        'products.colore',
        'products.brand',
        'products.amount',
        'products.availability',
        'products.valutazione',
    ])->first();
    
    // verificare dati passati
    // if($item->available == 1 && $item->sold == 0) {
        Cart::add(
            $item->id, 
            $request->nome, 
            1, 
            $request->amount, 
            [
                'size' => $item->size,
                'photo1' => $item->photo1,
                'amount' => $item->amount
            ])
        ->associate('App\Product');

        // Update item availabilty to false
        DB::table('items')
            ->where('id', $item->id)
            ->update(
                [
                    'inCart' => true,
                    'inCartTime' => intval(microtime(true) * 1000)
                ]
            );
    
        return redirect()->route('cart')->with('success_message', 'Prodotto aggiunto al carrello!');
    // } else {
        $product = Product::find($product_id);
        $products = Product::all();
        $items = Item::all();
        return view('product-details', compact('product', 'products', 'items'));
    // }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($rowId, $id)
    {
        Cart::remove($rowId);

        // Update item availabilty to false
        DB::table('items')
            ->where('id', $id)
            ->update(
                [
                    'inCart' => false,
                    'inCartTime' => null
                ]
            );

        return back()->with('success_message', 'Item has been removed succesfully');
    }
}
