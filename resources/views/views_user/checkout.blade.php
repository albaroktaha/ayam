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
                            @if (!empty($order))
                                {{-- {{dd($order);}} --}}
                                <ul class="list-group mb-3">
                                    <li class="list-group-item d-flex justify-content-between lh-sm">
                                        <div>
                                            <h6 class="my-0">{{ $order->name_product }}</h6>
                                            <small class="text-body-secondary">x{{ $order->quantity }}</small>
                                        </div>
                                        <span class="text-body-secondary">Rp {{ $order->price }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span>Jumlah</span>
                                        <strong>Rp {{ $order->total }}</strong>
                                    </li>
                                </ul>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn btn-primary me-md-2" type="button" id="pay-button">Bayar</button>
                                </div>
                            @else
                                <span>Data Kosong</span>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    /* You may add your own implementation here */
                    // alert("payment success!");
                    window.location.href = '/invoice/{{ $order->id }}'
                    console.log(result);
                },
                onPending: function(result) {
                    /* You may add your own implementation here */
                    alert("wating your payment!");
                    console.log(result);
                },
                onError: function(result) {
                    /* You may add your own implementation here */
                    alert("payment failed!");
                    console.log(result);
                },
                onClose: function() {
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                }
            })
        });
    </script>


@endsection
