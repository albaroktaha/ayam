<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8'],
            'fullname' => ['required', 'string'],
            'no_hp' => ['required', 'integer'],
            'alamat' => ['required', 'string'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(Request $request)
    {
        $user = User::create([
            'username' => $request['username'],
            'password' => Hash::make($request['password']),
            'roles' => 'Distributor',
        ]);

        //$user->save();

        dd($request);

        $getDistributorId = User::where('username', '=', $request['username'])->first();

        //dd($getDistributorId->id);

        // $distributor = DistributorModels::create([
        //     'distributor_name' => $data['fullname'],
        //     'distributor_phone' => $data['no_hp'],
        //     'distributor_address' => $data['alamat'],
        //     'id_user' => $getDistributorId->id,
        // ]);

        // $distributor->save();
    }
}
