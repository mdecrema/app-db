<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Ski;
use App\Rent;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    public function allProducts()
    {
        $products = Product::all();

        return view('admin.products', compact('products'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        return view('admin.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        $product = Product::find($id);

        $product->delete();

        return redirect()->route("admin.dashboard");
    }

    public function deleteAll()
    {
        Product::truncate();

        return redirect()->route("admin.dashboard");
    }

    // Ski Rent Admin
    public function skiRentAllEquipment()
    {
        $allSki = Ski::all();
        return view('admin.skiRent.allEquipment', compact('allSki'));
    }

    // Ski Rent Admin
    public function skiRentAllRent()
    {
        $allRent = Rent::all();
        return view('admin.skiRent.allRent', compact('allRent'));
    }

    public function skiRentDeleteRent($id) {
        $allRent = Rent::all();
        $rent = Rent::find($id);

        $rent->delete();

        return redirect()->route('admin.skiRent.allRent', compact('allRent'))->with('success_message', 'Elemento cancellato correttamente!');
    }

    public function skiRentAddEquipment()
    {
        
        return view('admin.skiRent.addEquipment');
    }

    public function skiRentStore(Request $request)
    {
        $data = $request->all();

        $request->validate([
            "brand" => "required|max:255",
            "model" => "required|max:255",
            "length" => "nullable|max:255",
            "type" => "nullable|max:255",
            "level" => "nullable|max:255",
            "value" => "required|numeric",
        ]);

        $newSki = new Ski;

        $newSki->brand=$data['brand'];
        $newSki->model=$data['model'];
        $newSki->length=$data['length'];
        $newSki->level=$data['level'];
        $newSki->type=$data['type'];
        $newSki->value=$data['value'];

        $newSki->save();

        return redirect()->route("admin.skiRent.all");

    }

}
