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
            <h2>Data Products Distributor</h2>
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
            <p class="text-muted font-13 m-b-30">
              <a href="/stock/create" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add Product</a>
            </p>
            <table id="datatable-fixed-header" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Quantity</th>
                  <th>Price</th>
                  <th>Image</th>
                  <th>Description</th>
                  <th>Status</th>
                  <th colspan="2" style="text-align: center;">Action</th>
                  <th style="display: none"></th>
                </tr>
              </thead>

              <tbody>
                @forelse($distributor_products as $key => $data)
                <tr>
                  <td>{{$key+1}}</td>
                  <td>{{$data->name}}</td>
                  <td>{{$data->quantity}}</td>
                  <td>{{$data->price}}</td>
                  <td>
                    <img src="/images/{{$data->image}}">
                  </td>
                  <td>{{$data->description}}</td>
                  <td>
                    <span class="badge {{ ($data->status == 'Processing') ? 'badge-warning' : 
                      (($data->status == 'Canceled') ? 'badge-danger' :
                        'badge-success') }}">{{$data->status}}</span></td>
                  <td>
                    <a href="#/{{ $data->id }}/edit" style="text-decoration: none;" class="btn btn-sm btn-warning">
                      Edit
                    </a>
                  </td>
                  <td>
                    <form method="POST" action="#/{{ $data->petugas_id }}">
                      @csrf
                      @method('delete')
                      <input class="btn btn-sm btn-danger" type="submit" value="Hapus">
                    </form>
                  </td>
                  <td style="display: none"></td>
                </tr>
                @empty
                @endforelse
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