<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Product;
use App\Item;
use App\Imports\ProductsImport;
use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;

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
            "sizes" => "nullable|max:10",
            "counterSizeType" => "nullable|numeric",
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
        // $newProduct->taglia = $data['taglia'];
        $newProduct->genere = $data['genere'];
        $newProduct->counterSizeType = intval($data['counterSizeType']);
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
     * Store product from csv file
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeProductsFromCSV(Request $request)
    {
        $filedata = $request['products_file'];

        // dd(request()->file('products_file'));

        Excel::import(new ProductsImport, request()->file('products_file'));

        return redirect()->route("admin.dashboard")->with('success_message', 'Catalogo prodotti importato con successo!');;
    }

    /**
     * Download products table from database as CSV/XLSX File
     *
     * @return \Illuminate\Http\Response
     */
    public function downloadProductsDatabaseTableAsCSV()
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }
    
    /**
     * Add Stocks
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeItems(Request $request)
    {
        $itemsData = $request->all();

        $product_id = $itemsData['productId'];
        $sizesObj = json_decode($itemsData['sizesObj']);

        for($i = 0; $i < count($sizesObj); $i++) {
            if ($sizesObj[$i]->qty != 0) {
                for ($k = 1; $k <= $sizesObj[$i]->qty; $k++) {
                    $newItem = new Item;

                    $newItem->product_id = $product_id;
                    $newItem->size = $sizesObj[$i]->size;
                    // Generazione Barcode random -> Da sviluppare in futuro
                    $newItem->barCode = rand(111111111111,999999999999);

                    $newItem->save();
                }
            }
        }

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
        $currentTime = intval(microtime(true) * 1000);
        $product = Product::find($id);
        $products = Product::all();
        $items =  Item::all()->where('product_id', $product->id);

        // Check what items are in other people's cart
        // Also check if carts session are expired or not, if yes i m gonna modify 'inCart' to false
        foreach($items as $item) {
            if ($item->inCart == true && (($currentTime - $item->inCartTime) > 3600000) ) {
                DB::table('items')
                    ->where('id', $item->id)
                    ->update(
                        [
                            'inCart' => false,
                            'inCartTime' => null
                        ]
                    );
            }
        }

        $items = Item::all()->where('product_id', $product->id)->where('available', true)->where('inCart', false);

        return view('product-details', compact('product', 'products', 'items'));
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
