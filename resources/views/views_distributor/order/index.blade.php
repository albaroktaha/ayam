@extends('layouts.master')
@section('title', 'UD. POTONG AYAM SONI')
@section('content')

<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>

    <div class="row">

      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <h2>Data Order Products</h2>
            <ul class="nav navbar-right panel_toolbox">
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
                      <table id="datatable-fixed-header" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Final Price</th>
                            <th>Ordered By</th>
                            <th>Status</th>
                            <th>Action</th>
                            <th style="display: none"></th>
                          </tr>
                        </thead>

                        <tbody>
                          @if(!empty($order))
                          @forelse($order as $key => $data)
                          <tr>

                            <td>{{$key+1}}</td>
                            <td>{{$data->order_distributor_product_name_product}}</td>
                            <td>{{$data->order_distributor_product_quantity}}</td>
                            <td>Rp. {{number_format($data->order_distributor_product_price)}}</td>
                            <td>
                              Rp. {{number_format($data->order_distributor_product_total)}}
                            </td>
                            <td>{{$data->username}}</td>
                            <td>
                              <span class="badge {{ ($data->order_distributor_product_status == 'Pending') ? 'badge-warning' : 
                                (($data->order_distributor_product_status == 'Canceled') ? 'badge-danger' :
                                  'badge-success') }}">{{$data->order_distributor_product_status}}
                              </span>
                            </td>
                            <td>
                              @if($data->order_distributor_product_status == "Completed")
                              <button class="btn btn-sm btn-info" disabled>
                                <i class="fa fa-check-square"></i> Success
                              </button>
                                
                              @else
                              <form action="/orders-distributor/{{ $data->id }}" method="POST">
                                @csrf
                                @method('put')
                                <input type="hidden" value="{{$data->id}}" name="id_product">
                                <button class="btn btn-sm btn-success" type="submit">
                                  <i class="fa fa-check-square"></i> Process
                                </button>
                              </form>
                              @endif
                            </td>
                            <td style="display: none"></td>
                            <td style="display: none"></td>
                          </tr>
                          @empty
                          <h2>{{__('Data Kosong')}}</h2>
                          @endforelse

                          @else
                          <h3>{{__('Data Kosong')}}</h3>
                          @endif
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

@push('scripts')

<!-- Datatables -->
<script src="{{asset('assets/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
<script src="{{asset('assets/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('assets/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
<script src="{{asset('assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
<script src="{{asset('assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
<script src="{{asset('assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
<script src="{{asset('assets/vendors/jszip/dist/jszip.min.js')}}"></script>
<script src="{{asset('assets/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/vendors/pdfmake/build/vfs_fonts.js')}}"></script>

@endpush

@endsection