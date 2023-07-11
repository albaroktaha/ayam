<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\DistributorModels;
use Illuminate\Support\Facades\Hash;

class Daftar extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
            'fullname' => ['required', 'string'],
            'no_hp' => ['required', 'numeric'],
            'alamat' => ['required', 'string'],
        ]);

        $user = User::create([
            'username' => $request['username'],
            'password' => Hash::make($request['password']),
            'roles' => 'Distributor',
        ]);

        $user->save();

        $getDistributorId = User::where('username', '=', $request['username'])->first();

        // dd($getDistributorId->id);

        $distributor = DistributorModels::create([
            'distributor_name' => $request['fullname'],
            'distributor_phone' => $request['no_hp'],
            'distributor_address' => $request['alamat'],
            'id_user' => $getDistributorId->id,
        ]);

        $distributor->save;

        return redirect('login');
    }
}
