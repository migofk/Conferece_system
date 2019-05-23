@extends('layouts.adminLayout')
@section('title','Add Slideshow')
@section($menuActive['menu'],'active')
@section($menuActive['submenu'],'active')

@section('pageHeader')
<i class="fa fa-image" aria-hidden="true"></i><span class="text-uppercase"> {{$name}}</span>
@endsection


@section('body')
  <!--style -->
  <!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="{{asset('public/adminCom/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
<!-- jquery time Picker -->

<link rel="stylesheet" href="{{asset('public/datetimepicker/jquery.datetimepicker.min.css')}}">
  <!--./style -->

<!-- success-->
@isset($success)
<div class="box">
  <div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <h4><i class="icon fa fa-check"></i>{{$success}}</h4>
  You can add another slideshow. preview all <a href="{{url('adminLink/slider')}}"> Slideshow</a> .

  </div>

</div>
@endisset
<!--./ success-->
  <!-- main box -->
  <div class="box box-primary">
    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
  <!--tabs header  -->
  <div class="box-header with-border">
    <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#english1">English</a></li>

    </ul>
  </div>
  <!--./tabs header  -->

  <!-- tabs body -->
  <div class="tab-content">

    <div id="english1" class="tab-pane active in">

      <!-- form -->
      <form role="form" action="{{url('/adminLink/slider')}}" method="post" enctype="multipart/form-data">
         {{ csrf_field() }}
         <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">
        <div class="box-body">
          <!--title -->
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Title" required>
          </div>
          <!--./ title -->


          <!-- Feature image -->
          <div class="form-group">
            <!--    <label for="exampleInputFile">File input</label> -->
            <input type="file" accept="image/png, image/jpeg"  class="custom-file-input"  id="featureImage" name="featureImage" required>
          </div>
          <!-- ./Feature image -->

          <!-- Date-->
          <div class="bootstrap-timepicker">
            <div class="form-group">
              <label>Date Added (Optionly)</label>

              <div class="input-group">
                <input type="text" id="timeStamp" name="timeStamp" class="form-control timepicker">

                <div class="input-group-addon">
                  <i class="fa fa-clock-o"></i>
                </div>
              </div>
              </div>
              </div>
          <!-- ./Date-->


        </div>
        <!-- /.box-body -->
      </div>  <!-- /.english tab -->

      <!-- arabic tab **************************************** -->



      <!-- common inputs **************************************** -->
      <div class="box-body">

        <!-- Submit -->
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <!-- /.Submit -->
      </div>
      <!-- ./ common inputs-->
    </form>
   <!--./ form -->

  </div>
  <!-- ./ tabs body -->
</div>
<!-- ./ main box -->


@endsection
@section('scripts')
  <script>
    var selectedParent ='';
    var cateID = '';
  </script>
  <link rel="stylesheet" href="{{ asset('public/ezdz/jquery.ezdz.min.css') }}">
<script src="{{ asset('public/ezdz/jquery.ezdz.min.js') }}"></script>
<script src="{{ asset('public/js/admin/slider.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('public/adminCom/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- jquery time picker -->
<script src="{{asset('public/datetimepicker/jquery.datetimepicker.full.min.js')}}"></script>

<script>
$(function () {
    $('[type="file"]').ezdz({
        text: 'drop a picture or click to choose one ',
        validators: {

        },
        reject: function(file, errors) {
            if (errors.mimeType) {
                alert(file.name + ' must be an image.');
            }


        }
    });
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5();
     $('#timeStamp').datetimepicker({
       format:'Y-m-d H:i:s',
    } );
  });
</script>
@endsection
