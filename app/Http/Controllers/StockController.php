<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\OrderStock;
use App\Models\User;
use App\Models\DistributorModels;
use App\Models\DistributorProductsModels;
use File;
use Carbon\Carbon;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // $getById = DistributorProductsModels::all();
        $stock = DistributorProductsModels::join('distributor', 'distributor_products.id_distributor', '=', 'distributor.id')
        ->select('distributor_products.*', 'distributor.distributor_name')
        ->get();
        return view('views_admin.stock.index', compact('stock'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => ['string'],
            'product_harga' => ['int'],
            'order_stock' => ['integer'],
        ]);

        $id = Auth::user()->id;

        $total = $request['order_stock'] * $request['product_harga'];

        $OrderStock = OrderStock::create([
            'order_distributor_product_name_product' => $request['product_name'],
            'order_distributor_product_quantity' => $request['order_stock'],
            'order_distributor_product_price' => $request['product_harga'],
            'order_distributor_product_total' => $total,
            'order_distributor_product_status' => "Processing",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'id_users' => $id
        ]);

        $id = $request['id_product'];
        
        $ReduceStock = DistributorProductsModels::find($id);
        $getQuantity = $ReduceStock->distributor_product_quantity;
        $getStock = $request['order_stock'];

        $reduce = $getQuantity - $getStock;
        $ReduceStock->distributor_product_quantity = $reduce;

        $ReduceStock->save();

        // $OrderStock->save();

        //Alert::success('Sukses!', 'Add Stock succeded');

        // dd($request);
        return redirect('stock');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
