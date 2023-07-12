@extends('layouts_user.masterOther')
@section('title', 'UD. POTONG AYAM SONI')
@section('content')
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class=" col-lg-8 offset-md-3">

                    <div class="text-center mb-3">
                        <h2>PRODUK KAMI</h2>
                    </div>
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                        @if (!empty($product))
                            @forelse($product as $key => $data)
                                <div class="col-sm-4">
                                    <div class="card shadow-sm">
                                        <div class="card-body">
                                            <img src="/uploads/product/{{ $data->product_image }}" class="col card-img-top"
                                                alt="...">
                                            <strong class="card-title">{{ $data->product_name }}</strong>
                                            <p class="card-text">{{ $data->product_price }}</p>
                                            <div class="container overflow-hidden text-center">
                                                <div class="row gx-5">
                                                    <div class="col">
                                                        <input class="form-control" type="number" name="order_stock"
                                                            data-validate-minmax="0,100" min="0" required="required"
                                                            placeholder="0" max="{{ $data->distributor_product_quantity }}">
                                                    </div>
                                                    <div class="col">
                                                        <button type="submit" class="btn btn-success">Beli</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @empty
                                <h2>{{ __('Data Kosong') }}</h2>
                            @endforelse
                        @else
                            <h3>{{ __('Data Kosong') }}</h3>
                        @endif

                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
