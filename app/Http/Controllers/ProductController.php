<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('products', compact('products'));
    }//

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $request->validate([
            //"user_id" => "required|exists:usersid",
            "nome" => "required|max:255",
            "photo1" => "image|nullable|max:1000",
            "photo2" => "image|nullable|max:1000",
            "photo3" => "image|nullable|max:1000",
            "photo4" => "image|nullable|max:1000",
            "photo5" => "image|nullable|max:1000",
            "categoria" => "required|max:50",
            "genere" => "required|max:10",
            "taglia" => "nullable|max:10",
            "description" => "nullable|max:2000",
            "colore" => "required|max:20",
            "brand" => "required|max:50",
            "amount" => "required|numeric",
            "availability" => "required|boolean",
            "valutazione" => "nullable|numeric",
            "appView" => "nullable|max:100"
            //"slug" => "required|unique:posts",
        ]);

        $path1 = Storage::disk('public')->put('productImages', $data['photo1']);
        $path2 = Storage::disk('public')->put('productImages', $data['photo2']);
        $path3 = Storage::disk('public')->put('productImages', $data['photo3']);
        $path4 = Storage::disk('public')->put('productImages', $data['photo4']);
        $path5 = Storage::disk('public')->put('productImages', $data['photo5']);


        $newProduct = new Product;
        //$newProduct->fill($data);

        $newProduct->nome = $data['nome'];
        $newProduct->categoria = $data['categoria'];
        $newProduct->taglia = $data['taglia'];
        $newProduct->genere = $data['genere'];
        $newProduct->description = $data['description'];
        $newProduct->colore = $data['colore'];
        $newProduct->brand = $data['brand'];
        $newProduct->valutazione = $data['valutazione'];
        $newProduct->amount = $data['amount'];
        $newProduct->availability = $data['availability'];    
        $newProduct->appView = $data['appView'];

        $newProduct->photo1 = $path1;
        $newProduct->photo2 = $path2;
        $newProduct->photo3 = $path3;
        $newProduct->photo4 = $path4;
        $newProduct->photo5 = $path5;

        $newProduct->save();

        return redirect()->route("admin.dashboard");
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

        return view('product-details', compact('product'));
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
        //
    }
}
