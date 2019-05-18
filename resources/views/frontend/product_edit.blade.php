@extends('layouts.frontend.layout')
@section('body')

  <section class="hero-banner bg-success">
      <div class="container text-center">

          <div class="row">
              <div class="col-sm-10 col-sm-offset-1">
                  <h2 class="text-white-1">WEB ARTISANS FOR YOUR PROJECTS!</h2><hr>
                  <div class="row">
                      <div class="col-sm-12 text-white-1">
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
<br>
<br>


  <div class="container">
    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif


             <div class="box-header">

             </div>
             <!-- /.box-header -->
             <div class="box-body " id="editCompanyForm">

               <!-- form-->
               <form class="form-horizontal" method="post" action="{{url('products/'.$product->id)}}" enctype="multipart/form-data">
                 @csrf
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="added_by" value="{{auth::user()->id}}">
                <div class="box-body">
                    <!-- row //////////////////////// -->
                  <div class="row">
                    <div class="col-md-12">

                      <!-- input -->
                      <div class="form-group" style="padding:0 10px !important;">
                        <label for="Name">{{__('general.Image')}}</label>
                        <input  type="file" class="form-control" id="featureImage"  name="featureImage" placeholder="">
                      </div>
                      <!-- ./input -->

                    </div>

                  </div>
                  <!-- row //////////////////////// -->
                  <div class="row">


                    <!-- col  ////////////////////////-->
                    <div class="col-lg-6" >
                      <!-- input -->
                      <div class="form-group" style="padding: 0 10px !important;">
                        <label for="product">{{__('general.Product')}}</label>
                        <input  class="form-control"  name="product" id="product" value="{{$product->product}}" placeholder="">
                      </div>
                      <!-- ./input -->


                    </div>
                    <!-- ./ col  ////////////////////////-->



                    <!-- col  //////////////////////// -->
                    <div class="col-lg-6" >


                      <!-- input -->
                      <div class="form-group" style="padding:0 10px !important;">
                        <label>{{__('general.Category')}}</label>
                        <select  class="form-control" name="category_id" class="form-control" required>

                          <option value="{{$product->category->id}}">{{$product->category->category}}</option>

                          @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->category}}</option>
                          @endforeach


                        </select>
                      </div>
                      <!-- ./input -->


                    </div>

                    <!-- ./ col   ////////////////////////-->





                  </div>
                  <!-- ./ row //////////////////////// -->

                  <!-- row -->
                  <div class="row">
                    <div class="col-md-12">
                      <!-- input -->
                      <div class="form-group" style="padding:0 10px !important;">
                       <label for="Name">{{__('general.Description')}}</label>
                       <textarea class="form-control" name="description" rows="8" cols="80">{{$product->description}}</textarea>
                      </div>
                      <!-- ./input -->

                    </div>

                  </div>

                  <!-- /row -->

                </div>
                 <!-- /.box-footer -->

               </div>
               <div class="modal-footer">
              
                 <button id="saveBtn" type="submit" class="btn btn-success">{{__('general.Save')}}</button>
               </div>
             </form>
             <!-- ./ form-->

             </div>
             <!-- /.box-body -->
           </div>
           <!-- /.box -->




@endsection
@section('scripts')

  <!-- DataTables -->

  <link rel="stylesheet" href="{{ asset('ezdz/jquery.ezdz.min.css') }}">
  <script src="{{ asset('ezdz/jquery.ezdz.min.js') }}"></script>
  <script>
  $(function () {


    $('[type="file"]').ezdz({
      text: 'Logo',
      validators: {

      },
      reject: function(file, errors) {
        if (errors.mimeType) {
          alert(file.name + ' must be an image.');
        }


      }
    });
       $('#featureImage').ezdz('preview', '{{url('/photos/product-images/'.$product->photo)}}');
  })


  $('.editbutton').click(function(){
    var editName= $(this).attr('item');
    var itemID= $(this).attr('itemId');
    $('#editName').val(editName);
    $('#itemID').val(itemID);
    $('#modal-Edit').modal('show')

  });

  $('.deletebutton').click(function(){
    var editName= $(this).attr('item');
    var itemID= $(this).attr('itemId');
    $('#delName').val(editName);
    $('#itemIDdel').val(itemID);
    $('#modal-delete').modal('show')

  });



  //validate

</script>



<script type="text/javascript" src="{{asset('js/admin/company.js')}}"></script>

@endsection
