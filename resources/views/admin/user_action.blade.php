@extends('layouts.adminLayout')
@section($menuActive['menu'],'active')
@section($menuActive['submenu'],'active')
@section('title','Company')

@section('meta')

@endsection

@section('pageHeader',$name)
@section('headerDescription','Company Module')
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

             </div>
             <!-- /.box-header -->
             <div class="box-body " id="editCompanyForm">
               <!-- form-->
               <form class="form-horizontal" method="post" action="{{url('/adminLink/companies/'.$company->id)}}" enctype="multipart/form-data">
                 @csrf
                <input type="hidden" name="added_by" value="{{auth::user()->id}}">
                <input type="hidden" name="_method" value="PUT">
                 <div class="box-body">
                   <!-- row //////////////////////// -->
                   <div class="row">


                     <!-- col  ////////////////////////-->
                     <div class="col-lg-4" >
                       <!-- input -->
                       <div class="form-group" style="padding: 0 10px !important;">
                         <label for="Company">{{__('general.Company')}}</label>
                         <input  class="form-control"  name="company" id="company" value="{{$company->company}}" placeholder="">
                       </div>
                       <!-- ./input -->




                       <!-- input -->
                       <div class="form-group" style="padding:0 10px !important;">
                         <label for="Name">{{__('general.Phone')}}</label>
                         <input  class="form-control"  name="phone" id="phone" value="{{$company->phone}}"  placeholder="">
                       </div>
                       <!-- ./input -->

                       <!-- input -->
                       <div class="form-group" style="padding:0 10px !important;">
                         <label for="Name">{{__('general.Email')}}</label>
                         <input  class="form-control"  name="email" id="email" value="{{$company->email}}" placeholder="">
                       </div>
                       <!-- ./input -->

                       <!-- input -->
                       <div class="form-group" style="padding:0 10px !important;">
                         <label for="Name">{{__('general.Logo image')}}</label>
                         <input type="file" class="form-control" id="featureImage"  name="featureImage" placeholder="">
                       </div>
                       <!-- ./input -->

                     </div>
                     <!-- ./ col  ////////////////////////-->



                     <!-- col  //////////////////////// -->
                     <div class="col-lg-4" >
                       <!-- input -->
                       <div class="form-group" style="padding:0 10px !important;">
                         <label for="Name">{{__('general.Contact Person')}}</label>
                         <input  class="form-control"  name="contact_person" value="{{$company->contact_person}}" placeholder="" required>
                       </div>
                       <!-- ./input -->



                       <!-- input -->
                       <div class="form-group" style="padding:0 10px !important;">
                         <label>{{__('general.Owner')}}</label>
                         <select  class="form-control" name="user_id" id="user_id" value="{{$company->user_id}}" class="form-control" required>
                                 <option selected value="{{$company->user->id}}">{{$company->user->name}}</option>
                           @foreach ($Users as $user)
                             <option value="{{$user->id}}">{{$user->name}}</option>
                           @endforeach


                         </select>
                       </div>
                       <!-- ./input -->

                       <!-- input -->
                       <div class="form-group" style="padding:0 10px !important;">
                         <label>{{__('general.Category')}}</label>
                         <select  class="form-control" name="category_id" id="category_id" value="{{$company->category_id}}" class="form-control" required>
                            <option selected value="{{$company->category->id}}">{{$company->category->category}}</option>
                           @foreach ($categories as $category)
                             <option value="{{$category->id}}">{{$category->category}}</option>
                           @endforeach


                         </select>
                       </div>
                       <!-- ./input -->

                       <!-- input -->
                       <div class="form-group" style="padding:0 10px !important;">
                         <label for="Name">{{__('general.Website')}}</label>
                         <input  class="form-control"  name="website" value="{{$company->website}}" placeholder="">
                       </div>
                       <!-- ./input -->

                       <!-- input -->
                       <div class="form-group" style="padding:0 10px !important;">
                         <label>{{__('general.Status')}}</label>
                         <select  class="form-control" name="status" id="status" value="{{$company->status}}" class="form-control" required>
                           <option></option>
                           @foreach ($status as $statusX)
                             @php
                               $selected = '';
                               if($statusX->id == $company->status){
                               $selected = 'selected';
                               }
                             @endphp
                             <option {{$selected}} value="{{$statusX->id}}">{{$statusX->status}}</option>
                           @endforeach


                         </select>
                       </div>
                       <!-- ./input -->

                       <!-- input -->
                       <div class="form-group" style="padding:0 10px !important;">
                         <label for="Name">{{__('general.Tax Number')}}</label>
                         <input  class="form-control"  name="tax_number" value="{{$company->tax_number}}" value="{{ old('Tax_Number') }}" placeholder="">
                       </div>
                       <!-- ./input -->


                     </div>

                     <!-- ./ col   ////////////////////////-->


                     <!-- col  ////////////////////////-->
                     <div class="col-lg-4" >
                       <!-- input -->
                       <div class="form-group" style="padding:0 10px !important;">
                         <label for="Name">{{__('general.Address')}}</label>
                         <input  class="form-control"  name="address" value="{{$company->address}}" value="{{ old('address') }}" placeholder="">
                       </div>
                       <!-- ./input -->

                       <!-- input -->
                       <div class="form-group" style="padding:0 10px !important;">
                         <label for="Name">{{__('general.Country')}}</label>

                         <select  name="country_id" id="country_id" value="{{$company->country_id}}" class="form-control">
                           <option selected value="{{$company->country->id}}">{{$company->country->country}}</option>
                           @foreach ($countries as $country)
                             <option value="{{$country->id}}">{{$country->country}}</option>
                           @endforeach
                         </select>
                       </div>
                       <!-- ./input -->



                       <!-- input -->
                       <div class="form-group" style="padding:0 10px !important;">
                         <label for="Name">{{__('general.State')}}</label>
                         <select  name="state_id" id="state_id" value="{{$company->state_id}}" class="form-control">
                          <option selected value="{{$company->state->id}}">{{$company->state->state}}</option>
                           @foreach ($regions as $region)
                             <option value="{{$region->id}}">{{$region->region}}</option>
                           @endforeach
                         </select>

                       </div>
                       <!-- ./input -->

                       <!-- input -->
                       <div class="form-group" style="padding:0 10px !important;">
                         <label for="Name">{{__('general.City')}}</label>

                         <select  name="city_id" id="city_id"  class="form-control">
                           <option selected value="{{$company->city->id}}">{{$company->city->city}}</option>
                           @foreach ($cities as $city)


                             <option  value="{{$city->id}}">{{$city->city}}</option>
                           @endforeach

                         </select>
                       </div>
                       <!-- ./input -->



                       <!-- input -->
                       <div class="form-group" style="padding:0 10px !important;">
                         <label for="Name">{{__('general.Post Code')}}</label>
                         <input  class="form-control"  name="postcode" value="{{$company->postcode}}"  placeholder="">
                       </div>
                       <!-- ./input -->


                       <!-- input -->
                       <div class="form-group" style="padding:0 10px !important;">
                         <label for="Name">{{__('general.Commercial Registry')}}</label>
                         <input  class="form-control"  name="commercial_registry" value="{{$company->commercial_registry}}" placeholder="">
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
                        <textarea class="form-control" name="description" rows="8" cols="80">{{$company->description}}</textarea>
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






@endsection




@section('scripts')

  <!-- DataTables -->

<link rel="stylesheet" href="{{ asset('public/ezdz/jquery.ezdz.min.css') }}">
<script src="{{ asset('public/ezdz/jquery.ezdz.min.js') }}"></script>
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
   $('#featureImage').ezdz('preview', '{{url('public/photos/company-logos/'.$company->logo)}}');
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

<script type="text/javascript" src="{{asset('js/admin/company.js')}}"></script>

@endsection
