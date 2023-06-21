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

            <h2>Order Products From Distributor</h2>
            <ul class="nav navbar-right panel_toolbox">
              {{-- <li>
                <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li> --}}
              {{-- <li>
                <a class="close-link"><i class="fa fa-close"></i></a>
              </li> --}}
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="col-md-12 col-sm-12"></div>

            <div class="clearfix"></div>

            @forelse($stock as $key => $data)
            <div class="col-md-4 col-sm-4  profile_details">
              <div class="well profile_view">
                <div class="col-sm-12">
                  <div class="left col-md-7 col-sm-7" style="color:black">
                    <h2>{{$data->distributor_product_name}}</h2>
                    <h5>Rp. {{number_format($data->distributor_product_price)}}</h5>
                    <p class="badge badge-success"><strong>By : {{$data->distributor_name}} </strong></p>
                    <ul class="list-unstyled">
                      <li><strong>Description : </strong> </li>
                      <li>{{substr($data->distributor_product_description, 0, 100)}}... </li>
                    </ul>
                  </div>
                  <div class="right col-md-5 col-sm-5 text-center">
                    <img src="{{asset('uploads/'.$data->distributor_product_image)}}" alt="" class="img-circle img-fluid">
                  </div>
                </div>
                <div class=" profile-bottom text-center">
                  <div class=" col-sm-6 emphasis">
                    <p class="ratings">
                      <a>4.0</a>
                      <a href="#"><span class="fa fa-star"></span></a>
                      <a href="#"><span class="fa fa-star"></span></a>
                      <a href="#"><span class="fa fa-star"></span></a>
                      <a href="#"><span class="fa fa-star"></span></a>
                      <a href="#"><span class="fa fa-star-o"></span></a>
                    </p>
                  </div>
                  <div class=" col-sm-6 emphasis">
                    <button type="button" class="btn btn-success btn-md">
                      <i class="fa fa-shopping-cart"></i> Buy
                    </button>
                  </div>
                </div>
              </div>
            </div>

            @empty
            {{__('Data Kosong')}}
            @endforelse
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