<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\DistributorProductsModels;
use File;
use Alert;

class DistributorProductController extends Controller
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
        $id_user = Auth::id();
        // $distributor_products = DistributorProductsModels::all();
        $distributor_products = DistributorProductsModels::where('id_users', '=', $id_user)->get();
        return view('views_admin.stock.index', compact('distributor_products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('views_admin.stock.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'names' => ['required', 'string'],
            'quantity' => ['required', 'integer', 'min:1', 'max:4'],
            'price' => ['required', 'integer'],
            'image' => ['required', 'mimes:jpg,png,jpeg', 'max:2048'],
            'description' => ['required','min:1','max:255'],
        ]);

        $namaGambar = time().'.'.$request->file->extension();

        $request->file->move(public_path('uploads'), $namaGambar);

        $id_user = Auth::user()->id;

        $distributor_products = DistributorProductsModels::create([
            'name' => $request['name'],
            'quantity' => $request['quantity'],
            'price' => $request['price'],
            'image' => $namaGambar,
            'description' => $request['description'],
            'id_users' => $id_user
        ]);

        $distributor_products->save();

        Alert::success('Sukses!', 'Add Stock succeded');

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
