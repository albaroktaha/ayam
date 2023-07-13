<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\CustomerModels;
use Illuminate\Support\Facades\Hash;

class RegisterUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username'  => ['required', 'string'],
            'password'  => ['required', 'string'],
            'name'      => ['required', 'string'],
            'gender'    => ['required', 'string'],
            'email'     => ['required', 'string'],
            'phone'     => ['required', 'numeric'],
            'address'   => ['required', 'string'],
        ]);

        $user = User::create([
            'username' => $request['username'],
            'password' => Hash::make($request['password']),
            'roles' => 'User',
        ]);

        $user->save();

        $getCustomerId = User::where('username', '=', $request['username'])->first();

        // dd($getDistributorId->id);

        $customer = CustomerModels::create([
            'customer_name'     => $request['name'],
            'customer_gender'   => $request['gender'],
            'customer_email'    => $request['email'],
            'customer_phone'    => $request['phone'],
            'custommer_address' => $request['address'],
            'id_users'          => $getCustomerId->id,
        ]);

        $customer->save();

        return redirect('/');
    }
}
