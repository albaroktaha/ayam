@extends('layouts_user.masterOther')
@section('title', 'UD. POTONG AYAM SONI')
@section('content')
    <section>
        <div class="container-fluid">

            <div class=" col-lg-8 offset-md-3">
                <div class="text-center mb-3">
                    <h2>RIWAYAT</h2>
                </div>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    {{-- <div class="col-lg-4">
                            <img src="{{ asset('assets/images/ayam-1.png') }}" class="card-img-top" alt="...">
                        </div>
                        <div class="col-lg-4">
                            <div class="card shadow-sm">
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
                        </div> --}}
                    <div class="card mb-3">
                        <div class="row g-0 mt-3">
                            @if (!empty($log))
                                @forelse ($log as $key => $data)
                                    <div class="col-md-2">
                                        {{-- <div class="card-body">
                                                <img src="" class="img-fluid rounded-start" alt="...">
                                            </div> --}}
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $data->name_product }}</h5>
                                            <p class="card-text">Jumlah: x{{ $data->quantity }}</p>
                                            <p class="card-text">Total: </p>
                                            <p class="card-text">
                                                <small class="text-primary">
                                                    {{ date('d F Y'), strtotime($data->created_at) }}
                                                    {{-- {{ $data->created_at }} --}}
                                                </small>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card-body">
                                            <p class="card-text">Harga</p>
                                            <p class="card-text">Rp {{ $data->price }}</p>
                                            <p class="card-text">Rp {{ $data->total }}</p>
                                            <a href="{{ URL::to('/invoice/' . $data->id) }}"
                                                class="btn btn-sm btn-success">Details</a>
                                        </div>
                                    </div>
                                @empty
                                    <span>Data Kosong</span>
                                @endforelse
                            @else
                                <span>Data Kosong</span>
                            @endif
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection
