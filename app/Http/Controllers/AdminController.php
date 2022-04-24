<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\User;
use App\Product;
use App\Ski;
use App\Rent;

class MenuLink
{
    public $name;
    public $link;
}

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {           
    
        $menuOrdini1 = new MenuLink();
        $menuOrdini1->name = 'Ordini pending';
        $menuOrdini1->link = 'dashboard/orders/pending';
                    
        $menuOrdini2 = new MenuLink();
        $menuOrdini2->name = 'Ordini in lavorazione';
        $menuOrdini2->link = 'dashboard/orders/progressing';
                    
        $menuOrdini3 = new MenuLink();
        $menuOrdini3->name = 'Storico ordini';
        $menuOrdini3->link = 'dashboard/orders/history';
    
        $ordiniMenuList = array($menuOrdini1, $menuOrdini2, $menuOrdini3);

        $menuMagazzino1 = new MenuLink();
        $menuMagazzino1->name = 'Tutti i prodotti';
        $menuMagazzino1->link = 'dashboard/products';

        $menuMagazzino2 = new MenuLink();
        $menuMagazzino2->name = 'Aggiungi nuovo prodotto';
        $menuMagazzino2->link = 'dashboard/products/create';

        $menuMagazzino3 = new MenuLink();
        $menuMagazzino3->name = 'Ricarica giacenza';
        $menuMagazzino3->link = 'dashboard/items/addItems';

        $magazzinoMenuList = array($menuMagazzino1, $menuMagazzino2, $menuMagazzino3);

        $menuNoleggio1 = new MenuLink();
        $menuNoleggio1->name = 'Tutto il materiale';
        $menuNoleggio1->link = 'dashboard/skiRent/allEquipment';

        $menuNoleggio1 = new MenuLink();
        $menuNoleggio1->name = 'Aggiugni materiale';
        $menuNoleggio1->link = 'dashboard/skiRent/addEquipment';

        $menuNoleggio1 = new MenuLink();
        $menuNoleggio1->name = 'Materiale noleggiato';
        $menuNoleggio1->link = 'dashboard/skiRent/allRent';

        $noleggioMenuList = array($menuNoleggio1, $menuOrdini2, $menuOrdini3);

        return view('admin.dashboard', compact('ordiniMenuList', 'magazzinoMenuList', 'noleggioMenuList'));
    }

    public function allProducts()
    {
        $products = Product::all();

        return view('admin.products', compact('products'));
    }

    /**
     * View to add stocks.
     *
     * @return \Illuminate\Http\Response
     */
    public function addItems()
    {
        $products = Product::all();

        return view('admin.items.addItems', compact('products'));
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


    ///////////////////////////////////////////////////////
    /*
    * Funzione di storno materiale quando scannerizzato
    * >> Ancora in fase di sviluppo
    * da test risulta non funzionare correttamente
    */
    public function changeSkiStatus($id) {
        $ski = Ski::find($id);
        if ($ski->status === 0) {
            $ski->status = 1;
        } else if ($ski->status === 1) {
            $ski->status = 0;
        }
        $ski->update();
        
    }
    //////////////////////////////////////////////////////

    public function rentAddSki(Request $request) {
        $allRent = Rent::all();
        $skis = Ski::all();

        $data = $request->all();

        $request->validate([
            "rent_id" => "required",
            "ski_id" => "required"
        ]);

        $ski = Ski::find($data['ski_id']);
        if ($ski->status !== 1) {
            $ski->status = 1;
            $ski->save();
        } else if ($ski->status === 1) {
            // $ski->status = 0;
        }

        $id=$data['rent_id'];
        $rent = Rent::find($id);
        $rent->ski_id = $data['ski_id'];
        $rent->save();

        return view('admin.skiRent.rentDetails', compact('rent', 'skis'));
    }



    /* USERS */
    public function allUser()
    {
        $users = User::all();

        return view('admin.user.allUser', compact('users'));
    }

    /* ORDERS */

    // Pending Orders
    public function pendingOrders()
    {
        return view('admin.orders.pendingOrders');
    }

    // Progressing Orders
    public function progressingOrders()
    {
        return view('admin.orders.progressingOrders');
    }

    // History Orders
    public function historyOrders()
    {
        return view('admin.orders.historyOrders');
    }
}
