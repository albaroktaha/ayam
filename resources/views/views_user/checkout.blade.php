@extends('layouts_user.masterOther')
@section('title', 'UD. POTONG AYAM SONI')
@section('content')
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class=" col-lg-8 offset-md-3">

                    <div class="text-center">
                        <h2>BELANJAAN ANDA</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg order-md-last">
                            <h4 class="d-flex justify-content-between align-items-center mb-3">
                                <span class="text-primary">RINCIAN BELANJA</span>
                                {{-- <span class="badge bg-primary rounded-pill">3</span> --}}
                            </h4>
                            <ul class="list-group mb-3">
                                <li class="list-group-item d-flex justify-content-between lh-sm">
                                    <div>
                                        <h6 class="my-0">Product name</h6>
                                        <small class="text-body-secondary">Brief description</small>
                                    </div>
                                    <span class="text-body-secondary">Rp </span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Jumlah</span>
                                    <strong>Rp 400.000</strong>
                                </li>
                            </ul>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn btn-primary me-md-2" type="button">Bayar</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
