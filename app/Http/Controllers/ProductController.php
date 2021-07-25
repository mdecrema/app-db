<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Product;

class ProductController extends Controller
{
    public function homePage()
    {
        $products = Product::all();
        return view('homePage', compact('products'));
    }
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

    public function tees()
    {
        $products = Product::all();

        $tees = []; 

        foreach ($products as $product) {
            if ($product->categoria === 'tee') {
                array_push($tees, $product);
            }
        }

        return view('tees', compact('tees'));
    }

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
            "photo1" => "image|nullable",
            "photo2" => "image|nullable",
            "photo3" => "image|nullable",
            "photo4" => "image|nullable",
            "photo5" => "image|nullable",
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

        $photo1 = $data['photo1']->getClientOriginalName();
        $photo2 = $data['photo2']->getClientOriginalName();
        $photo3 = $data['photo3']->getClientOriginalName();
        $photo4 = $data['photo4']->getClientOriginalName();
        $photo5 = $data['photo5']->getClientOriginalName();

        $store1 = Storage::disk('spaces')->put('/img-space/uploads/images/'.$photo1,file_get_contents($request->file('photo1')->getRealPath()),'public');
        $store2 = Storage::disk('spaces')->put('/img-space/uploads/images/'.$photo2,file_get_contents($request->file('photo2')->getRealPath()),'public');
        $store3 = Storage::disk('spaces')->put('/img-space/uploads/images/'.$photo3,file_get_contents($request->file('photo3')->getRealPath()),'public');
        $store4 = Storage::disk('spaces')->put('/img-space/uploads/images/'.$photo4,file_get_contents($request->file('photo4')->getRealPath()),'public');
        $store5 = Storage::disk('spaces')->put('/img-space/uploads/images/'.$photo5,file_get_contents($request->file('photo5')->getRealPath()),'public');


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

        $newProduct->photo1 = $photo1;
        $newProduct->photo2 = $photo2;
        $newProduct->photo3 = $photo3;
        $newProduct->photo4 = $photo4;
        $newProduct->photo5 = $photo5;

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
