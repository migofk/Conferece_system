@extends('layouts.adminLayout')
@section('title','About')
@section('l8','active')

@section('pageHeader')
<i class="fa fa-info" aria-hidden="true"></i><span class="text-uppercase"> About</span>
@endsection
@section('headerDescription','About')
@section('levelLinks')
<li><a href="{{url('adminLink/dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
<li class="active">About</li>
@endsection
@section('body')
<br>

<br>
  <br>
  <!-- Table -->
  <div class="box">

    <div class="box-header">

      <h3 class="box-title">All About</h3>
    </div>
    <!-- /.box-header -->

    <div class="box-body">
      <table class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>About</th>

          <th>Action</th>
        </tr>
        </thead>
        <tbody >


            <tr>
              <td>{!!$about->description!!}</td>

                 <td>
              <a href="{{url('/adminLink/about/'.$about->id.'/edit')}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>


                </td>
            </tr>



        </tbody>
        <tfoot>
        <tr>
          <th>About</th>

          <th>Action</th>

        </tr>
        </tfoot>
      </table>
    </div>

<!--/ Table -->
@endsection
@section('scripts')
<script src="{{ asset('public/js/admin/about.js') }}"></script>
@endsection
