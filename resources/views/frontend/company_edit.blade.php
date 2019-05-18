@extends('layouts.frontend.layout')
@section('body')
@section('meta')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/css/bootstrap-select.css">
@endsection


<br>
<br>
@isset($_GET['success'])
<div class="container">

<div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong> تم تعديل البيانات بنجاح! </strong>
</div>
</div>
@endisset

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

        <a href="{{route('product.index_company',['companyID' => $company->id])}}"  class="btn btn-small btn-success ">{{__('general.Products')}}</a>
        <a href="{{route('event.index_company',['companyID' => $company->id])}}"  class="btn btn-small btn-success ">{{__('general.Events')}}</a>

             <div class="box-header">

             </div>
             <!-- /.box-header -->
             <div class="box-body " id="editCompanyForm">
               <!-- form-->
               <form class="form-horizontal" method="post" action="{{url('company/'.$company->id)}}" enctype="multipart/form-data">
                 @csrf
                <input type="hidden" name="added_by" value="{{auth::user()->id}}">
                <input type="hidden" name="_method" value="PUT">
                 <div class="box-body">
                   <!-- row //////////////////////// -->
                   <div class="row">





                     <!-- col  //////////////////////// -->
                     <div class="col-lg-4" >


                       <!-- input -->
                       <div class="form-group" style="padding:0 10px !important;">
                         <label>نوع الشركة</label>
                         <select  class="form-control" name="type" id="type" value="{{$company->type}}" class="form-control" required>
                           <option></option>
                           @foreach ($types as $type)
                             @php
                               $selected = '';
                               if($type->id == $company->type){
                               $selected = 'selected';
                               }
                             @endphp
                             <option {{$selected}} value="{{$type->id}}">{{$type->type}}</option>
                           @endforeach


                         </select>
                       </div>
                       <!-- ./input -->






                       <!-- input -->
                       <div class="form-group" style="padding:0 10px !important;">
                         <label>{{__('general.Category')}}</label>
                         <select   multiple data-live-search="true"  class="selectpicker form-control" name="category_id[]" id="category_id" value="{{$company->category_id}}" class="form-control" required>

                           @foreach ($categories as $category)
                             @php
                             $selected ="";
                               foreach ($company->allcategories as $value) {
                                if ($value->id == $category->id){
                                  $selected = "selected";
                                  break;
                                }

                               }
                             @endphp
                             <option  {{$selected}} value="{{$category->id}}">{{$category->category}}</option>
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
                          <label for="Name">{{__('general.Tax Number')}}</label>
                          <input  class="form-control"  name="tax_number" value="{{$company->tax_number}}" value="{{ old('Tax_Number') }}" placeholder="">
                        </div>
                        <!-- ./input -->

                        <!-- input -->
                        <div class="form-group" style="padding:0 10px !important;">
                          <label for="Name">{{__('general.Commercial Registry')}}</label>
                          <input  class="form-control"  name="commercial_registry" value="{{$company->commercial_registry}}" placeholder="">
                        </div>
                        <!-- ./input -->

                        <!-- input -->
                        <div class="form-group" style="padding:0 10px !important;">
                          <label for="Name">وظيفة الشخص المفوض</label>
                          <input  class="form-control"  name="person_job" value="{{$company->person_job}}" placeholder="" required>
                        </div>
                        <!-- ./input -->
                        <!-- input -->
                        <div class="form-group" style="padding:0 10px !important;">
                          <label for="Name">تليفون الشخص المفوض</label>
                          <input  class="form-control"  name="person_phone1" value="{{$company->person_phone1}}" placeholder="" required>
                        </div>
                        <!-- ./input -->
                        <!-- input -->
                        <div class="form-group" style="padding:0 10px !important;">
                          <label for="Name">تليفون الشخص الموفوض 2</label>
                          <input  class="form-control"  name="person_phone2" value="{{$company->person_phone2}}" placeholder="" required>
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
                         <label for="Name">{{__('general.Contact Person')}}</label>
                         <input  class="form-control"  name="contact_person" value="{{$company->contact_person}}" placeholder="" required>
                       </div>
                       <!-- ./input -->
                       <!-- input -->
                       <div class="form-group" style="padding:0 10px !important;">
                         <label for="Name">البريد الالكترونى للشخص المفوض</label>
                         <input  class="form-control"  name="person_email" value="{{$company->person_email}}" placeholder="" required>
                       </div>
                       <!-- ./input -->
                       <!-- input -->
                       <div class="form-group" style="padding:0 10px !important;">
                         <label for="Name">عنوان الشخص المفوض</label>
                         <input  class="form-control"  name="person_address" value="{{$company->person_address}}" placeholder="" required>
                       </div>
                       <!-- ./input -->




                     </div>
                     <!-- ./ col  ////////////////////////-->


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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.js"></script>
  <!-- DataTables -->

  <link rel="stylesheet" href="{{ asset('ezdz/jquery.ezdz.min.css') }}">
  <script src="{{ asset('ezdz/jquery.ezdz.min.js') }}"></script>
  <script>

  $(function () {

    $('.selectpicker').selectpicker();
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
       $('#featureImage').ezdz('preview', '{{url('/photos/company-logos/'.$company->logo)}}');
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

<script>


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
