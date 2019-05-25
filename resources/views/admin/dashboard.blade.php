@extends('layouts.adminLayout')
@section($menuActive['menu'],'active')
@section('title','Dashboard')

@section('meta')
  <!-- DataTables -->
<link rel="stylesheet" href="{{asset('assets/adminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">

@endsection

@section('pageHeader',$name)
@section('body')

@php
/*$role = Spatie\Permission\Models\Role::create(['name' => 'writer']);
$permission = Spatie\Permission\Models\Permission::create(['name' => 'edit articles']);
$role->givePermissionTo($permission);
$permission->assignRole($role);*/
//auth::user()->givePermissionTo('edit articles');
//auth::user()->revokePermissionTo('edit articles');
//auth::user()->assignRole('IT');
@endphp

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-blue">
          <div class="inner">
            <h3>{{App\attendant::where('status',2)->count()}}</h3>

            <p>Waiting Review</p>
          </div>
          <div class="icon">
            <i class="fa fa-bell-o"></i>
          </div>

        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>{{App\attendant::where('status',1)->count()}}</h3>

            <p>Active Attendants</p>
          </div>
          <div class="icon">
            <i class="fa  fa-leaf"></i>
          </div>

        </div>
      </div>

      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3>{{App\attendant::where('status',0)->count()}}</h3>

            <p>Rejected Attendants</p>
          </div>
          <div class="icon">
            <i class="fa  fa-arrow-circle-down"></i>
          </div>

        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-maroon">
          <div class="inner">
            @php
              $views = DB::table('views')->get();
              foreach ($views as $value) {
                $views = $value->views;
              }
            @endphp
            <h3>{{$views}}</h3>

            <p>Visitors</p>
          </div>
          <div class="icon">
            <i class="fa  fa-handshake-o"></i>
          </div>

        </div>
      </div>
      
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <section class="col-lg-7 connectedSortable">






      </section>
      <!-- /.Left col -->
      <!-- right col (We are only adding the ID to make the widgets sortable)-->
      <section class="col-lg-5 connectedSortable">






      </section>
      <!-- right col -->
    </div>
    <!-- /.row (main row) -->

  </section>
  <!-- /.content -->










@endsection

@section('scripts')

  <!-- DataTables -->
<script src="{{asset('assets/adminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/adminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

<script>
$(function () {

 })








</script>
@endsection
