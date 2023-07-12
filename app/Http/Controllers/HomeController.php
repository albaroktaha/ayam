<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductAdminModels;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function product()
    {
        $product = ProductAdminModels::all();
        return view('views_user.product', compact('product'));
    }

    public function checkout()
    {
        $id_costumer = Auth::user()->id;

        $customer = CustomerModels::where('id_costumer', '=', $id_customer)->first();
        $getCustomer = $customers->customer_name;

        $order = ProductAdminModels::join('users', 'products.id_users', '=', 'users.id')
        ->where('product', '=', $getCustomer)
        ->select('products.*', 'users.username')
        ->get();

        return view('views_user.checkout', compact('order'));
    }
}
