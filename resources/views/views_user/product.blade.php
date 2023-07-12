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
                            <div class="card shadow-sm">
                                <img src="{{ asset('assets/images/ayam-1.png') }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the bulk of the card's content.</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                        </div>
                                        <small class="text-body-secondary">9 mins</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
