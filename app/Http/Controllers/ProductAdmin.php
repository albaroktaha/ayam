<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\DistributorProductsModels;
use App\Models\DistributorModels;
use App\Models\ProductAdminModels;
use File;

class ProductAdmin extends Controller
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
        $product = ProductAdminModels::all();
        return view('views_admin.product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $distributor = DistributorModels::all();
        // $distributor = DistributorModels::find($id_user);
        return view('views_admin.product.add', compact('distributor'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'names' => ['required', 'string'],
            'quantity' => ['required', 'integer', 'min:1'],
            'price' => ['required', 'integer'],
            'file' => ['required', 'mimes:jpg,png,jpeg', 'max:2048'],
            'description' => ['required','min:1','max:255'],
        ]);

        $namaGambar = time().'.'.$request->file->extension();

        $request->file->move(public_path('uploads/product/'), $namaGambar);

        // dd($id_user);

        $product_admin = ProductAdminModels::create([
            'product_name' => $request['names'],
            'product_quantity' => $request['quantity'],
            'product_price' => $request['price'],
            'product_image' => $namaGambar,
            'product_description' => $request['description'],
            'id_distributor' => $request['id_distributor']
        ]);

        $product_admin->save();

        //Alert::success('Sukses!', 'Add Stock succeded');

        // dd($request);
        return redirect('product');
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
        $product = ProductAdminModels::find($id);
        return view('views_admin.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'names' => ['required', 'string'],
            'quantity' => ['required', 'integer', 'min:1'],
            'price' => ['required', 'integer'],
            'file' => ['mimes:jpg,png,jpeg', 'max:2048'],
            'description' => ['required','min:1','max:255'],
        ],
        [
            'file.mimes' => "File bukan foto",
            'file.max' => "File tidak boleh lebih dari 2MB"
        ]);

        $product = ProductAdminModels::find($id);

        if($request->has('file')) {

            $path = '/uploads/product/';
            File::delete(public_path($path. $product->product_image));

            $namaGambar = time().'.'.$request->file->extension();

            $request->file->move(public_path($path), $namaGambar);

            $product->product_image = $namaGambar;

            $product->save();
        }

        $product->product_name = $request['names'];
        $product->product_quantity = $request['quantity'];
        $product->product_price = $request['price'];
        $product->product_description = $request['description'];

        //Alert::success('Sukses!', 'Add Stock succeded');

        $product->save();

        return redirect('product');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = ProductAdminModels::find($id);

        $path = '/uploads/';
        File::delete(public_path($path. $product->product_image));

        $product->delete();

        // Alert::success('Sukses!', 'Pertanyaan sukses dihapus');

        return redirect('/product');
    }
}
