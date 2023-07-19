<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\CustomerModels;
use App\Models\OrderModels;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function index()
    {
        $id_customer = Auth::user()->id;

        $customer = CustomerModels::where('id_users', '=', $id_customer)->first();
        $getCustomer = $customer->customer_name;



        $order = OrderModels::join('users', 'orders.id_customer', '=', 'users.id')
        ->where('name_customer', '=', $getCustomer)
        ->select('orders.*', 'users.username')
        ->get();

        // $order = OrderModels::all();
        return view('views_user.checkout', compact('order'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_product'=> ['string'],
            'quantity'    => ['integer'],
            'price'       => ['integer'],
        ]);

        $id = Auth::user()->id;

        $getCustomer = CustomerModels::where('id_users', '=', $id)->first();

        $total = $request['quantity'] * $request['price'];

        $order = OrderModels::create([
            'name_customer' => $getCustomer->customer_name,
            'name_product'  => $request['name_product'],
            'quantity'      => $request['quantity'],
            'price'         => $request['price'],
            'total'         => $total,
            'status'        => 'Pending',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
            'id_customer'   => $getCustomer->id
        ]);

        $order->save();

        redirect('checkout');

        // dd($order);
    }
}
