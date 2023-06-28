<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\OrderDistributorModels;
use App\Models\DistributorModels;
use App\Models\DistributorProductsModels;
use File;

class OrdersDistributor extends Controller
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
        $id_user = Auth::user()->id;

        $distributor = DistributorModels::where('id_user', '=', $id_user)->first();
        $getDistributor = $distributor->distributor_name;

        $order = OrderDistributorModels::join('users', 'order_distributor_products.id_users', '=', 'users.id')
        ->where('order_distributor_product_distributor', '=', $getDistributor)
        ->select('order_distributor_products.*', 'users.username')
        ->get();

        return view('views_distributor.order.index', compact('order'));
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
        //
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
        if($id == null)
        {
            return redirect('orders-distributor');
        }
        else{

            $Order = OrderDistributorModels::find($id);
        
            $ReduceStock = DistributorProductsModels::where('distributor_product_name', '=', $Order->order_distributor_product_name_product)->first();
            
            // dd($ReduceStock);

            $getQuantity = $ReduceStock->distributor_product_quantity;

            $getStock = $Order->order_distributor_product_quantity;

            $reduce = $getQuantity - $getStock;
            $ReduceStock->distributor_product_quantity = $reduce;

            $ReduceStock->save();

            $Order->order_distributor_product_status = "Completed";

            $Order->save();

            return redirect('orders-distributor');

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
