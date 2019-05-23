@extends('layouts.adminLayout')
@section('title','Slideshow')
@section($menuActive['menu'],'active')
@section($menuActive['submenu'],'active')

@section('pageHeader')
<i class="fa fa-image" aria-hidden="true"></i><span class="text-uppercase"> {{$name}}</span>
@endsection

@section('body')
<br>
<a type="link" href="{{url('adminLink/slider/create')}}" class="btn btn-primary btn-sm text-uppercase pull-right"><i class="fa fa-plus"></i> Add Slideshow</a>
<br>
  <br>
  <!-- Table -->
  <div class="box">

    <div class="box-header">

      <h3 class="box-title">All Slideshows</h3>
    </div>
    <!-- /.box-header -->
    @if(count($sliders) > 0)
    <div class="box-body">
      <table class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Title</th>
          <th>image</th>
          <th>created_at</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody >

          @foreach ($sliders as $slider)
            @php
              $featureClass = 'primary';
              if($slider->featured == 1){
              $featureClass = 'warning';
              }
            @endphp
            <tr>
              <td>{{$slider->name}}</td>
              <td><img src="{{url(''.$slider->featureImage)}}" width="80" height="44" alt=""> </td>
              <td>{{$slider->created_at}}</td>
                 <td>
              <a href="{{url('/adminLink/slider/'.$slider->id.'/edit')}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
              <a class="btn btn-primary delete p2" del-name="{{$slider->name}}" del-url="{{url('/adminLink/slider/'.$slider->id)}}"><i class="fa fa-trash"></i></a>

                </td>
            </tr>
          @endforeach


        </tbody>
        <tfoot>
        <tr>
          <th>Title</th>
          <th>image</th>
          <th>created_at</th>
          <th>Action</th>

        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.box-body -->
  @else
    <div  class="alert alert-info alert-dismissible ">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-warning"></i> Sorry, No Sliders found</h4>
    </div>
  @endif
  </div>
  <!-- /.box -->
<!--/ Table -->
@endsection
@section('scripts')
<script src="{{ asset('js/admin/slider.js') }}"></script>
@endsection
