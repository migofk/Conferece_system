@extends('layouts.adminLayout')
@section($menuActive['menu'],'active')
@section($menuActive['submenu'],'active')
@section('title','product')

@section('meta')
  <!-- DataTables -->
<link rel="stylesheet" href="{{asset('assets/adminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
 <link rel="stylesheet" href="{{asset('assets/plugins/datetimepicker/jquery.datetimepicker.min.css')}}">
@endsection

@section('pageHeader',$name)
@section('headerDescription','product Module')
@section('body')


  <div class="box">
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
            <button item="{{$product->product}}"  itemId="{{$product->id}}"  tableName="users"   data-toggle="modal" data-target="#modal-deleteContact" type="button" class="btn btn-xs btn-primary deletebutton pull-right">Delete</button>
             </div>
             <!-- /.box-header -->
             <div class="box-body " id="editproductForm">
               <!-- form-->
               <form class="form-horizontal" method="post" action="{{url('/adminLink/products/'.$product->id)}}" enctype="multipart/form-data">
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
                    <div class="col-lg-4" >
                      <!-- input -->
                      <div class="form-group" style="padding: 0 10px !important;">
                        <label for="product">{{__('general.Product')}}</label>
                        <input  class="form-control"  name="product" id="product" value="{{$product->product}}" placeholder="">
                      </div>
                      <!-- ./input -->


                    </div>
                    <!-- ./ col  ////////////////////////-->



                    <!-- col  //////////////////////// -->
                    <div class="col-lg-4" >


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


                    <!-- col  ////////////////////////-->
                    <div class="col-lg-4" >

                      <!-- input -->
                      <div class="form-group" style="padding:0 10px !important;">
                        <label>{{__('general.Status')}}</label>
                        <select  class="form-control" name="status" class="form-control" required>
                          <option></option>
                          @foreach ($status as $statusX)
                            @php
                              $selected = '';
                              if($statusX->id == $product->status){
                              $selected = 'selected';
                              }
                            @endphp
                            <option {{$selected}} value="{{$statusX->id}}">{{$statusX->status}}</option>
                          @endforeach


                        </select>
                      </div>
                      <!-- ./input -->


                    </div>
                    <!-- ./ col  ////////////////////////-->



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
                 <button type="button" class="btn btn-default pull-left" data-dismiss="modal">{{__('general.Close')}}</button>
                 <button id="saveBtn" type="submit" class="btn btn-success">{{__('general.Save')}}</button>
               </div>
             </form>
             <!-- ./ form-->
             </div>
             <!-- /.box-body -->
           </div>
           <!-- /.box -->


           <!-- delete activity inputs model -->
            <div class="modal fade" id="modal-delete">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                      <h4 class="modal-title">Delete Product</h4>
                    </div>
                    <div class="modal-body">

                      <!-- form-->
                    <form class="form-horizontal" method="post" action="{{url('/adminLink/products/'.$product->id)}}">
                      @csrf
                      <input type="hidden" name="_method" value="delete">
                      <input type="hidden" name="user_id" value="{{$product->id}}">
                      <input type="hidden" id="tableName" name="table" value="">
                      <input type="hidden" id="itemIDdel" name="itemIDdel" value="">
                    <div class="box-body">
                     <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Name</label>

                      <div class="col-sm-10">
                      <input type="text" disabled class="form-control" value="" name="delName" id="delName" placeholder="">
                    </div>
                   </div>
                  </div>
                   <!-- /.box-footer -->

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-success">Delete</button>
                    </div>
                   </form>
                      <!-- ./ form-->
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
           <!--./ delete activity inputs model -->



@endsection




@section('scripts')

  <!-- DataTables -->
<script src="{{asset('assets/adminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/adminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<link rel="stylesheet" href="{{ asset('ezdz/jquery.ezdz.min.css') }}">
<script src="{{ asset('ezdz/jquery.ezdz.min.js') }}"></script>
  <script src="{{asset('assets/plugins/datetimepicker/jquery.datetimepicker.full.min.js')}}"></script>
<script>
$(function () {
   $('#example1').DataTable();
   $('#example2').DataTable({
     'paging'      : true,
     'lengthChange': false,
     'searching'   : false,
     'ordering'    : true,
     'info'        : true,
     'autoWidth'   : false
   });

   $('#timeStamp,.alertX,.timepicker').datetimepicker({
        ampm: true, // FOR AM/PM FORMAT
       format:'Y-m-d H:i:s',
       validateOnBlur: false,
    step:15

    } );

   $('[type="file"]').ezdz({
       text: 'Cover Image',
       validators: {

       },
       reject: function(file, errors) {
           if (errors.mimeType) {
               alert(file.name + ' must be an image.');
           }


       }
   });
   $('#featureImage').ezdz('preview', '{{url('/photos/product-images/'.$product->photo)}}');
 });


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




</script>

<script>

@php
  $countries = App\country::where('status',1)->get();
@endphp
  var states = [];
  var cities = [];
  @foreach ($countries as $country)
states[{{$country->id}}] =[
     @foreach ($country->states as $value)
      { 'id':'{{$value->id}}','name':'{{$value->state}}'},
     @endforeach
  ];

   @foreach ($country->states as $state)
     cities[{{$state->id}}] =[
     @foreach ($state->cities as  $value)
     { 'id':'{{$value->id}}','name':'{{$value->city}}'},
     @endforeach
     ];
   @endforeach
   @endforeach

$('#country_id').change(function(){
  var country_id = $('#country_id').val();
  //$('#city_id')[0].options.length = 0;
  $('#state_id').find('option:not(:first)').remove();
  $('#state_id').find('option:not(:first)').remove();
  $.each(states[country_id], function (i, item) {
    $('#state_id').append($('<option>', {
        value: item.id,
        text : item.name
    }));
});

});



$('#state_id').change(function(){
  var state_id = $('#state_id').val();
  //$('#zone_id')[0].options.length = 0;
  $('#city_id').find('option:not(:first)').remove();
  $.each(cities[state_id], function (i, item) {
    $('#city_id').append($('<option>', {
        value: item.id,
        text : item.name
    }));
});

});
</script>

<script type="text/javascript" src="{{asset('js/admin/product.js')}}"></script>

@endsection
