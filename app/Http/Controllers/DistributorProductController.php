<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\DistributorProductsModels;
use App\Models\DistributorModels;
use File;
//use Alert;

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
        $id_user = Auth::user()->id;
        $id_distributor = DistributorModels::where('id_user', '=', $id_user)->get();

        $distributor_products = DistributorProductsModels::where(
            'id_distributor', '=', $id_distributor[0]['id']
        )->get();

        return view('views_distributor.distributor_products.index', compact('distributor_products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $id_user = Auth::user()->id;
        $distributor = DistributorModels::where('id_user', '=', $id_user)->get();
        return view('views_distributor.distributor_products.add', compact('distributor'));
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
            'file' => ['required', 'mimes:jpg,png,jpeg', 'max:2048'],
            'description' => ['required','min:1','max:255'],
        ]);

        $namaGambar = time().'.'.$request->file->extension();

        $request->file->move(public_path('uploads'), $namaGambar);

        // dd($id_user);

        $distributor_products = DistributorProductsModels::create([
            'name' => $request['names'],
            'quantity' => $request['quantity'],
            'price' => $request['price'],
            'image' => $namaGambar,
            'description' => $request['description'],
            'id_distributor' => $request['id_distributor']
        ]);

        $distributor_products->save();

        //Alert::success('Sukses!', 'Add Stock succeded');

        // dd($request);
        return redirect('product-distributor');
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
    public function edit($id)
    {
        $distributor_products = DistributorProductsModels::find($id);
        return view('views_distributor.distributor_products.edit', compact('distributor_products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'names' => ['required', 'string'],
            'quantity' => ['required', 'integer', 'min:1', 'max:4'],
            'price' => ['required', 'integer'],
            'file' => ['mimes:jpg,png,jpeg', 'max:2048'],
            'description' => ['required','min:1','max:255'],
        ],
        [
            'file.mimes' => "File bukan foto",
            'file.max' => "File tidak boleh lebih dari 2MB"
        ]);

        $distributor_products = DistributorProductsModels::find($id);

        if($request->has('file')) {

            $path = '/uploads/';
            File::delete(public_path($path. $distributor_products->image));

            $namaGambar = time().'.'.$request->file->extension();

            $request->file->move(public_path('uploads'), $namaGambar);

            $distributor_products->image = $namaGambar;

            $distributor_products->save();
        }

        $distributor_products->name = $request['names'];
        $distributor_products->quantity = $request['quantity'];
        $distributor_products->price = $request['price'];
        $distributor_products->description = $request['description'];

        //Alert::success('Sukses!', 'Add Stock succeded');

        $distributor_products->save();

        return redirect('product-distributor');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $distributor_products = DistributorProductsModels::find($id);

        $path = '/uploads/';
        File::delete(public_path($path. $distributor_products->image));

        $distributor_products->delete();

        // Alert::success('Sukses!', 'Pertanyaan sukses dihapus');

        return redirect('/product-distributor');
    }
}
