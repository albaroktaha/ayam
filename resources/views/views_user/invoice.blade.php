@extends('layouts_user.masterOther')
@section('content')
    <div class=" col-lg-8 offset-md-3">
        <div class="container-fluid">


            @if (!@empty($order))
                <div class="card">
                    <div class="card-header">
                        <strong>Invoice</strong><br>
                        <span>{{ date('d F Y') }}</span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive-sm">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="center">#</th>
                                        <th>Nama Produk</th>
                                        <th class="center">Kuantitas</th>
                                        <th class="right">Harga</th>
                                        <th class="right">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="center">1</td>
                                        <td class="left">{{ $order->name_product }}</td>
                                        <td class="center">{{ $order->quantity }}</td>
                                        <td class="right">Rp {{ $order->price }}</td>
                                        <td class="right">Rp {{ $order->total }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg col-sm ml-auto text-center">
                                <a class="btn btn-success" href="{{ url('/') }}" data-abc="true">
                                    <i class="fa fa-usd"></i> Halaman Utama</a>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <span>Data Kosong</span>
            @endif

        </div>
    </div>
@endsection
