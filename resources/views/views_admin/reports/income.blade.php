@extends('layouts.master')
@section('title', 'UD. POTONG AYAM SONI')
@section('content')

@push('no_print')

<style>
    @media print{
     .noprint{
         display:none;
     }
 }
</style>

@endpush

<div class="right_col" role="main">
    <div class="">

        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Data Income</h2>
                        <ul class="nav navbar-right panel_toolbox noprint">
                            <li>
                                <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                                {{-- <li>
                <a class="close-link"><i class="fa fa-close"></i></a>
            </li> --}}
        </ul>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <form action="/income" method="POST">
                        @csrf
                        <p class="text-muted font-13 m-b-30 noprint">
                            <div class="form-group row col-md-12 noprint">
                                <label class="col-form-label  label-align">From :
                                </label>
                                <div class="col-md-2 col-sm-2 ">
                                    <input name="from" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                    <script>
                                        function timeFunctionLong(input) {
                                            setTimeout(function() {
                                                input.type = 'text';
                                            }, 60000);
                                        }
                                    </script>
                                </div>

                                <label class="col-form-label  label-align">Until :
                                </label>
                                <div class="col-md-2 col-sm-2 ">
                                    <input name="until" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                    <script>
                                        function timeFunctionLong(input) {
                                            setTimeout(function() {
                                                input.type = 'text';
                                            }, 60000);
                                        }
                                    </script>
                                </div>

                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></button>

                                <a href="#" class="btn btn-sm btn-success" onclick="window.print()">
                                    <i class="fa fa-print"></i>&nbsp;Cetak
                                </a>
                            </form>
                        </div>
                    </p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Date</th>
                                <th>Customer Name</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($getIncome as $key => $data)
                            <tr>
                                <th scope="row">{{$key + 1}}</th>
                                <td>{{ $data->updated_at }}</td>
                                <td>{{ ucfirst($data->name_customer) }}</td>
                                <td>{{ $data->name_product }}</td>
                                <th>{{ $data->quantity }}</th>
                                <th>Rp. {{ number_format($data->price) }}</th>
                                <th>Rp. {{ number_format($data->total) }}</th>
                            </tr>
                            @empty
                            <h4><strong>{{ __('Transaction Not Found') }}</strong></h4>
                            @endforelse
                        </tbody>
                        <tbody>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>Total :</th>
                                <th>Rp. {{ number_format($getTotal) }}</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

</div>
</div>
</div>
<!-- /page content -->

</div>
</div>

@endsection
