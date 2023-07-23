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

                        <div class="col-lg-4">
                            <form action="{{ asset('/checkout') }}" method="post">
                                @csrf
                                <div class="card shadow-sm">
                                    @if (!@empty($product))
                                        @forelse ($product as $key => $data)
                                            <img src="/uploads/product/{{ $data->product_image }}" class="card-img-top"
                                                alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $data->product_name }}
                                                    <input type="hidden" name="name_product"
                                                        value="{{ $data->product_name }}">
                                                </h5>
                                                <div class="card-text">
                                                    <small>{{ $data->product_description }}</small>
                                                </div>
                                                <div class="card-text">
                                                    <strong>Rp {{ $data->product_price }}</strong>
                                                    <input type="hidden" name="price" value="{{ $data->product_price }}">
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="btn-group">
                                                        <input class="form-control mr-1" type="number" name="quantity"
                                                            data-validate-minmax="0,100" min="0" required="required"
                                                            placeholder="0" max="{{ $data->product_quantity }}">
                                                        <button type="submit" class="btn btn-sm btn-success">Beli</button>
                                                    </div>
                                                </div>
                                            </div>

                                        @empty
                                            <span>Data Kosong</span>
                                        @endforelse
                                    @else
                                        <span>Data Kosong</span>
                                    @endif
                                </div>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
