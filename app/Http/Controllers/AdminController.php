<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\User;
use App\Product;
use App\Item;
use App\Order;
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
        $menuOrdini1->link = 'dashboard/orders/allOrders';
                    
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
        $menuMagazzino2->name = 'Aggiungi prodotti';
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

        $menuUtenti1 = new MenuLink();
        $menuUtenti1->name = 'Utenti registrati';
        $menuUtenti1->link = 'dashboard/users/allUsers';

        $menuUtenti2 = new MenuLink();
        $menuUtenti2->name = 'Ospiti';
        $menuUtenti2->link = 'dashboard/users/allUsers';

        $menuUtenti3 = new MenuLink();
        $menuUtenti3->name = 'Aggiungi nuovo';
        $menuUtenti3->link = 'dashboard/users/allUsers';

        $utentiMenuList = array($menuUtenti1, $menuUtenti2, $menuUtenti3);

        $menuStatistiche1 = new MenuLink();
        $menuStatistiche1->name = 'Navigazione';
        $menuStatistiche1->link = '';

        $menuStatistiche2 = new MenuLink();
        $menuStatistiche2->name = ' Vendite';
        $menuStatistiche2->link = '';

        $menuStatistiche3 = new MenuLink();
        $menuStatistiche3->name = 'Sezione noleggio';
        $menuStatistiche3->link = '';

        $statisticheMenuList = array($menuStatistiche1, $menuStatistiche2, $menuStatistiche3);

        $menuPreferenze1 = new MenuLink();
        $menuPreferenze1->name = 'Aspetto e funzionalità';
        $menuPreferenze1->link = '';

        $menuPreferenze2 = new MenuLink();
        $menuPreferenze2->name = 'Impostazioni generali';
        $menuPreferenze2->link = '';

        $preferenzeMenuList = array($menuPreferenze1, $menuPreferenze2);

        $orders = Order::all();
        $newOrderNumber = 0;

        foreach($orders as $order) {
            if ($order->newOrder == true) {
                $newOrderNumber += 1;
            }
        }

        return view('admin.dashboard', compact('ordiniMenuList', 'magazzinoMenuList', 'noleggioMenuList', 'utentiMenuList', 'statisticheMenuList', 'preferenzeMenuList', 'newOrderNumber'));
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
    public function allUsers()
    {
        $users = User::all();

        return view('admin.users.allUsers', compact('users'));
    }

    /* ORDERS */

    // Pending Orders
    public function allOrders()
    {
        $orders = Order::orderBy('id', 'DESC')->get();
        $products = Product::all();
        $items = Item::all();

        return view('admin.orders.allOrders', compact('orders'));
    }

    // Progressing Orders
    public function progressingOrders()
    {
        return view('admin.orders.progressingOrders');
    }

    // History Orders
    public function orderDetails($id)
    {
        $order = Order::find($id);
        $itemsInOrder = [];
        $productsInOrder = [];

        if($order->newOrder !== false) {
            $order->newOrder = false;
            $order->update();
        }
        
        foreach(json_decode($order->items_id) as $item_id) {
            $item = Item::find($item_id);
            array_push($itemsInOrder, $item);
            array_push($productsInOrder, Product::find($item->product_id));
        }

       // dd($order);

        return view('admin.orders.orderDetails', compact('order', 'productsInOrder', 'itemsInOrder'));
    }

    // Prova php mailer
    public function phpMailer() {
        $mail_headers = "From: " .  'vlkn' . " <" .  'vlkn@info.it' . ">\r\n";
        $mail_headers .= "Reply-To: " .  'vlkn@info.it' . "\r\n";
        $mail_headers .= "X-Mailer: PHP/" . phpversion();

        mail('marcodecrema@libero.it', 'TEST PHP MAILER', 'PROVA PROVA PROVA', $mail_headers);

        return redirect()->route('/dashboard');
    }

}
