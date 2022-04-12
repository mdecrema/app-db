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

    $item = Item::join('products', 'items.product_id', '=', 'products.id')
    ->where([
        'items.product_id' => $product_id,
        'items.size' => $sizeChoosed,
        'items.available' => true
    ])
    ->get(['items.*', 'products.*'])->first();

    dd($item);

    // Item ID Sbagliato!!!
        Cart::add($item->id, $request->nome, 1, $request->amount, ['size' => $item->size])
            ->associate('App\Product');

        return redirect()->route('cart')->with('success_message', 'Item was added to your cart!');
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
    public function destroy($id)
    {
        Cart::remove($id);

        return back()->with('success_message', 'Item has been removed succesfully');
    }
}
