@extends('layouts.adminLayout')
@section('title','Edit About')
@section($menuActive['menu'],'active')
@section($menuActive['submenu'],'active')

@section('pageHeader')
<i class="fa fa-info" aria-hidden="true"></i><span class="text-uppercase"> {{$name}}</span>
@endsection


@section('body')
  <!--style -->

  <!-- jquery time Picker -->

  <link rel="stylesheet" href="{{asset('datetimepicker/jquery.datetimepicker.min.css')}}">
  <!--./style -->
<!-- success-->
@isset($success)
<div class="box">
  <div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <h4><i class="icon fa fa-check"></i>{{$success}}</h4>
   preview all <a href="{{url('adminLink/about')}}"> About</a> .

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
      <li ><a data-toggle="tab" href="#english1">Arabic</a></li>
      <!--  <li class="active"><a data-toggle="tab" href="#arabic2">Arabic</a></li>-->
    </ul>
  </div>
  <!--./tabs header  -->

  <!-- tabs body -->
  <div class="tab-content">

    <div id="english1" class="tab-pane active in  ">

      <!-- form -->
      <form role="form" action="{{url('/adminLink/about/'.$about->id)}}" method="post" enctype="multipart/form-data">
         {{ csrf_field() }}
         <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">
         <input type="hidden" name="_method" id="_method" value="put">
        <div class="box-body">
          <!--title -->


            <input type="hidden" class="form-control" id="name" name="name" placeholder="Title" value="{{$about->name}}" required>

          <!--./ title -->

                    <!--Description -->
                    <div class="form-group">
                      <label for="description">Description</label>
                      <textarea class="textarea" id="description1"  name="description1" placeholder="Place some text here"
                              required  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$about1->description}}</textarea>
                    </div>
                    <!--./ Description -->
                    <!-- Feature image -->
                    <div class="form-group">
                      <!--    <label for="exampleInputFile">File input</label> -->
                      <input type="file" accept="image/png, image/jpeg"  class="custom-file-input"  id="featureImage" name="featureImage" >
                    </div>
                    <!-- ./Feature image -->


        </div>
        <!-- /.box-body -->
      </div>  <!-- /.english tab -->

      <!-- arabic tab **************************************** -->
      <div id="arabic2" class="tab-pane fade ">
        <div class="box-body">


          <!--summary -->
          <div class="form-group">
            <label for="description">CEO Speech</label>
            <textarea class="form-control" id="summary"  name="summary" rows="3" placeholder="Place some text here" required>{{$about->summary}}</textarea>

          </div>
          <!--./summary -->
          <!--Description -->
          <div class="form-group">
            <label for="description">Description</label>

            <textarea class="textarea" id="description"  name="description" placeholder="Place some text here"
                    required  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$about->description}}</textarea>
          </div>
          <!--./ Description -->


                    <!--summary -->
                    <div class="form-group">
                      <label for="description">CEO Word</label>
                      <textarea dir="rtl" class="form-control" id="summary1"  name="summary1" rows="3" placeholder="Place some text here" required>{{$about1->summary}}</textarea>

                    </div>
                    <!--./summary -->





        </div>
      </div> <!-- /.arabic tab -->


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
  <link rel="stylesheet" href="{{ asset('ezdz/jquery.ezdz.min.css') }}">
<script src="{{ asset('ezdz/jquery.ezdz.min.js') }}"></script>
<script src="{{ asset('js/admin/admin.js') }}"></script>
<!-- ckeditor -->
  <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<!-- jquery time picker -->
<script src="{{asset('datetimepicker/jquery.datetimepicker.full.min.js')}}"></script>

<script>
$(function () {
    $('[type="file"]').ezdz({
        text: 'drop a profile picture or click to choose one ',
        validators: {

        },
        reject: function(file, errors) {
            if (errors.mimeType) {
                alert(file.name + ' must be an image.');
            }


        }
    });
    $('#featureImage').ezdz('preview', '{{url($about->featureImage)}}');


    CKEDITOR.replace( 'description' );
    CKEDITOR.replace( 'description1' );


     $('#timeStamp').datetimepicker({
       format:'Y-m-d H:i:s',
    });
  });
</script>
@endsection
