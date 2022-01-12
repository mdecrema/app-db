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

    // Ski Bar Codes
    public function skiRentBarCodes()
    {
        $skis = Ski::all();

        return view('admin.skiRent.skiBarCodes', compact('skis'));
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
        $skis = Ski::all();
        return view('admin.skiRent.allRent', compact('allRent', 'skis'));
    }

    public function skiRentRentDetails($id) {
        $skis = Ski::all();
        $rent = Rent::find($id);
        return view('admin.skiRent.rentDetails', compact('rent', 'skis'));
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
            "rentCost" => "required|numeric",
            "value" => "required|numeric",
        ]);

        $newSki = new Ski;

        $newSki->brand=$data['brand'];
        $newSki->model=$data['model'];
        $newSki->length=$data['length'];
        $newSki->level=$data['level'];
        $newSki->value=$data['value'];
        $newSki->rentCost=$data['rentCost'];
        $newSki->type=$data['type'];

        $newSki->save();

        return redirect()->route("admin.skiRent.allEquipment");

    }

    public function skiRentEditEquipment($id) {
        // $allRent = Rent::all();
        $ski = Ski::find($id);

        return view('admin.skiRent.editEquipment', compact('ski'));
    }

    public function skiRentUpdateEquipment(Request $request, $id) {
        // $allRent = Rent::all();
        $ski = Ski::find($id);

        $data = $request->all();

        $request->validate([
            "brand" => "required|max:255",
            "model" => "required|max:255",
            "length" => "nullable|max:255",
            "type" => "nullable|max:255",
            "level" => "nullable|max:255",
            "rentCost" => "required|numeric",
            "value" => "required|numeric",
        ]);

        $ski->brand=$data['brand'];
        $ski->model=$data['model'];
        $ski->length=$data['length'];
        $ski->level=$data['level'];
        $ski->value=$data['value'];
        $ski->rentCost=$data['rentCost'];
        $ski->type=$data['type'];

        $ski->update();

        return redirect()->route("admin.skiRent.allEquipment");
    }


    // // / / // / / / ///
    public function changeSkiStatus($id) {
        $ski = Ski::find($id);
        if ($ski->status === 0) {
            $ski->status = 1;
        } else if ($ski->status === 1) {
            $ski->status = 0;
        }
        $ski->update();
    }

    public function rentAddSki($rent_id, $ski_id) {
        $rent = Rent::find($rent_id);
        $rent->ski_id = $ski_id;
    }

}
