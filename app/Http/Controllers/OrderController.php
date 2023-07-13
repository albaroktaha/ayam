<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\CustomerModels;
use App\Models\OrderModels;

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
}
