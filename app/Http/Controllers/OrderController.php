<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\CustomerModels;
use App\Models\OrderModels;
use App\Models\ProductAdminModels;
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

        //$order->save();

        //dd($order);

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $order->id,
                'gross_amount' => $order->total,
            ),
            'item_details' => array([
                'id' => $order->id,
                'name' => $order->name_product,
                'price' => $order->price,
                'quantity' => $order->quantity,
            ]),
            'customer_details' => array(
                'first_name' => ucfirst($getCustomer->customer_name),
                'email' => $getCustomer->customer_email,
                'phone' => $getCustomer->customer_phone,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('views_user.checkout', compact('snapToken', 'order'));
    }

    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');

        $hash = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);

        if($hash == $request->signature_key)
        {
            if($request->transaction_status == "capture" or $request->transaction_status == "settlement")
            {
                $order = OrderModels::find($request->order_id);

                $getNameProduct = $order->name_product;

                $getStock = ProductAdminModels::where('product_name', '=', $getNameProduct)->first();

                $updateStock = $getStock->product_quantity - $order->quantity;

                $result = $getStock->update(['product_quantity' => $updateStock]);

                $order->update(['status' => "Success"]);
            }
        }
    }

    public function invoice($id)
    {
        $order = OrderModels::find($id);
        return view('views_user.invoice', compact('order'));
    }
}
