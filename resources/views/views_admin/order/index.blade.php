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
            <h2>Data Order</h2>
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
                            <th>Date</th>
                            <th>Ordered By</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price per Quantity</th>
                            <th>Total</th>
                            <th>Status</th>
                          </tr>
                        </thead>

                        <tbody>
                          @if(!empty($order))
                          @forelse($order as $key => $data)
                          <tr>

                            <td>{{$key+1}}</td>
                            <td>{{$data->created_at}}</td>
                            <td>{{ucfirst($data->name_customer)}}</td>
                            <td>{{$data->name_product}}</td>
                            <td>{{$data->quantity}}</td>
                            <td>
                              Rp. {{number_format($data->price)}}
                            </td>
                            <td>Rp. {{number_format($data->total)}}</td>
                            @if($data->status == "Success")
                              <td>
                                <span class="badge badge-success">{{$data->status}}</span>
                              </td>
                            @elseif($data->status == "Pending")
                              <td>
                                <span class="badge badge-warning">{{$data->status}}</span>
                              </td>
                            @else
                              <td>
                                <span class="badge badge-danger">{{$data->status}}</span>
                              </td>
                            @endif
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