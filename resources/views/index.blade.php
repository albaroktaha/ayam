@extends('layouts.master')
@section('title', 'AYAM POTONG')
@section('content')

<div class="right_col" role="main">

    <div class="row">

        <div class="col-md-12 col-sm-4 ">
            <div class="x_panel tile fixed_height_150">

                <h6><strong>Welcome {{ ucfirst(Auth::user()->username) }} to the Application</strong></h6>
                <h6>On this dashboard, you can manage the Application</h6>
            </div>
        </div>
    </div>
</div>

</div>

@endsection
