@extends('layouts.adminLayout')
@section('title','Edit Contact')
@section($menuActive['menu'],'active')
@section($menuActive['submenu'],'active')

@section('pageHeader')
<i class="fa fa-phone" aria-hidden="true"></i><span class="text-uppercase">{{$name}}</span>
@endsection
@section('headerDescription',$name)

@section('body')
<!-- success-->
@isset($success)
<div class="box">
  <div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <h4><i class="icon fa fa-check"></i>{{$success}}</h4>
   preview all <a href="{{url('contactWEB/contact')}}"> contacts</a> .

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
      <!--   <li class="active"><a data-toggle="tab" href="#english1">English</a></li>
       <li><a data-toggle="tab" href="#arabic2">Arabic</a></li> -->
      </ul>
    </div>
    <!--./tabs header  -->

    <!-- tabs body -->
    <div class="tab-content">

      <div id="english1" class="tab-pane active in">

        <!-- form -->
        <form role="form" action="{{url('/adminLink/contact/'.$contact->id)}}" method="post" enctype="multipart/form-data">
           {{ csrf_field() }}
           <input type="hidden" name="_method" id="_method" value="put">

          <div class="box-body">
            <!--Address -->
            <div class="form-group">
              <label for="name">Address (AR)</label>
              <input dir="rtl" type="text" class="form-control"  name="address_ar" placeholder="contact name" value="{{$contact->address_ar}}"  required>
            </div>
            <!--./ Address -->

            <!--Address -->
            <div class="form-group">
              <label for="name">Address (EN)</label>
              <input type="text" class="form-control"  name="address_en" placeholder="contact name" value="{{$contact->address_en}}"  required>
            </div>
            <!--./ Address -->
            <!--Phone1 -->
            <div class="form-group">
              <label for="name">Phone</label>
              <input type="text" class="form-control"  name="phone1" placeholder="email@example.com" value="{{$contact->phone1}}" required>
            </div>
            <!--./ Phone1 -->

            <!--Phone2 -->
            <div class="form-group">
              <label for="name">Fax</label>
              <input type="text" class="form-control"  name="phone2" placeholder="email@example.com" value="{{$contact->phone2}}" required>
            </div>
            <!--./ Phone2 -->

            <!--email -->
            <div class="form-group">
              <label for="name">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="email@example.com" value="{{$contact->email}}" required>
            </div>
            <!--./ email -->

            <!--socail -->
            <div class="form-group">
              <label for="name">Facebook</label>
              <input type="text" class="form-control"  name="facebook" placeholder="email@example.com" value="{{$contact->facebook}}" required>
            </div>

            <div class="form-group">
              <label for="name">Twitter</label>
              <input type="text" class="form-control"  name="twitter" placeholder="email@example.com" value="{{$contact->twitter}}" required>
            </div>
            <div class="form-group">
              <label for="name">Google</label>
              <input type="text" class="form-control"  name="google" placeholder="email@example.com" value="{{$contact->google}}" required>
            </div>
            <div class="form-group">
              <label for="name">Instagram</label>
              <input type="text" class="form-control"  name="instagram" placeholder="email@example.com" value="{{$contact->instagram}}" required>
            </div>
            <div class="form-group">
              <label for="name">LinkedIn</label>
              <input type="text" class="form-control"  name="linkedIn" placeholder="email@example.com" value="{{$contact->linkedIn}}" required>
            </div>
            <!--./ socail -->





            <!-- Feature image -->
          <!--   <div class="form-group"> -->
              <!--    <label for="exampleInputFile">File input</label> -->
            <!--   <input type="file" accept="image/png, image/jpeg"  class="custom-file-input"  id="featureImage" name="featureImage" >
            </div> -->
            <!-- ./Feature image -->



          </div>
          <!-- /.box-body -->
        </div>  <!-- /.english tab -->

        <!-- arabic tab **************************************** -->
      <!--  <div id="arabic2" class="tab-pane fade">
          <div class="box-body"> -->
            <!--Category -->
          <!--  <div class="form-group">
              <label for="category">Category</label>
              <input type="text" class="form-control" id="category_name1" name="category_name1" placeholder="category name" required>
            </div>  -->
            <!--./ Category -->
            <!--Description -->
          <!--  <div class="form-group">
              <label for="description">Description</label>
              <textarea class="form-control" rows="3" id="category_description1"  name="category_description1" placeholder="description ..." required></textarea>
            </div>  -->
            <!--./ Description -->




        <!--  </div>
        </div> --><!-- /.arabic tab -->


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
<script src="{{ asset('js/contact/contact.js') }}"></script>


<script>
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
</script>
@endsection
