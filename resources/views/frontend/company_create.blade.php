@extends('layouts.frontend.layout')
@section('body')
  @section('meta')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/css/bootstrap-select.css">
  @endsection

  <section class="hero-banner bg-success">
      <div class="container text-center">

          <div class="row">
              <div class="col-sm-10 col-sm-offset-1">
                  <h2 class="text-white-1">سجل بيانات شركات!</h2><hr>

              </div>
          </div>
      </div>
  </section>
<br>
<br>

        <div class="container" dir="rtl">
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
          <div class="box-body ">
            <!-- form-->
            <form class="form-horizontal" method="post" action="{{url('/company')}}" enctype="multipart/form-data">
              @csrf
             <input type="hidden" name="added_by" value="{{auth::user()->id}}">
             <input type="hidden" name="status" value="3">

              <div class="box-body">
                <!-- row //////////////////////// -->
                <div class="row">

                  <!-- col  ////////////////////////-->
                  <div class="col-lg-4" >
                    <!-- input -->
                    <div class="form-group" style="padding:0 10px !important;">
                      <label>نوع الشركة</label>
                      <select  class="form-control" name="type" id="type" value="" class="form-control" required>
                        <option></option>
                        @foreach ($types as $type)

                          <option  value="{{$type->id}}">{{$type->type}}</option>
                        @endforeach


                      </select>
                    </div>
                    <!-- ./input -->
                    <!-- input -->
                    <div class="form-group" style="padding:0 10px !important;">
                      <label for="Name">{{__('general.Address')}}</label>
                      <input  class="form-control"  name="address" value="{{ old('address') }}" placeholder="">
                    </div>
                    <!-- ./input -->

                    <!-- input -->
                    <div class="form-group" style="padding:0 10px !important;">
                      <label for="Name">{{__('general.Country')}}</label>

                      <select required name="country_id" id="country_id" class="form-control">
                        <option></option>
                        @foreach ($countries as $country)
                          <option value="{{$country->id}}">{{$country->country}}</option>
                        @endforeach
                      </select>
                    </div>
                    <!-- ./input -->



                    <!-- input -->
                    <div class="form-group" style="padding:0 10px !important;">
                      <label for="Name">{{__('general.State')}}</label>
                      <select required name="state_id" id="state_id" class="form-control">
                        <option></option>
                        @foreach ($regions as $region)
                          <option value="{{$region->id}}">{{$region->region}}</option>
                        @endforeach
                      </select>

                    </div>
                    <!-- ./input -->

                    <!-- input -->
                    <div class="form-group" style="padding:0 10px !important;">
                      <label for="Name">{{__('general.City')}}</label>

                      <select required name="city_id" id="city_id" class="form-control">
                        <option></option>
                        @foreach ($cities as $city)
                          <option value="{{$city->id}}">{{$city->city}}</option>
                        @endforeach

                      </select>
                    </div>
                    <!-- ./input -->



                    <!-- input -->
                    <div class="form-group" style="padding:0 10px !important;">
                      <label for="Name">{{__('general.Post Code')}}</label>
                      <input  class="form-control"  name="postcode" value="{{ old('postcode') }}" placeholder="">
                    </div>
                    <!-- ./input -->


                    <!-- input -->
                    <div class="form-group" style="padding:0 10px !important;">
                      <label for="Name">البريد الالكترونى للشخص المفوض</label>
                      <input  class="form-control"  name="person_email" value="" placeholder="" required>
                    </div>
                    <!-- ./input -->
                    <!-- input -->
                    <div class="form-group" style="padding:0 10px !important;">
                      <label for="Name">عنوان الشخص المفوض</label>
                      <input  class="form-control"  name="person_address" value="" placeholder="" required>
                    </div>
                    <!-- ./input -->




                  </div>
                  <!-- ./ col  ////////////////////////-->




                  <!-- col  //////////////////////// -->
                  <div class="col-lg-4" >




                    <!-- input -->
                    <input type="hidden" name="user_id" value="{{$User->id}}">

                    <!-- ./input -->

                    <!-- input -->
                    <div class="form-group" style="padding:0 10px !important;">
                      <label>نوع النشاط</label>
                      <select   multiple data-live-search="true"  class="selectpicker form-control" name="category_id[]" id="category_id" value="" class="form-control" required>
                          <option value=""></option>
                        @foreach ($categories as $category)

                          <option   value="{{$category->id}}">{{$category->category}}</option>
                        @endforeach


                      </select>
                    </div>
                    <!-- ./input -->

                    <!-- input -->
                    <div class="form-group" style="padding:0 10px !important;">
                      <label for="Name">{{__('general.Website')}}</label>
                      <input  class="form-control"  name="website" value="{{ old('website') }}" placeholder="">
                    </div>
                    <!-- ./input -->




                    <!-- input -->
                    <div class="form-group" style="padding:0 10px !important;">
                      <label for="Name">{{__('general.Tax Number')}}</label>
                      <input  class="form-control"  name="tax_number" value="{{ old('Tax_Number') }}" placeholder="">
                    </div>
                    <!-- ./input -->

                    <!-- input -->
                    <div class="form-group" style="padding:0 10px !important;">
                      <label for="Name">{{__('general.Commercial Registry')}}</label>
                      <input  class="form-control"  name="commercial_registry" value="{{ old('commercial_registry') }}" placeholder="">
                    </div>
                    <!-- ./input -->
                    <!-- input -->
                    <div class="form-group" style="padding:0 10px !important;">
                      <label for="Name">{{__('general.Contact Person')}}</label>
                      <input  class="form-control"  name="contact_person" value="" placeholder="" required>
                    </div>
                    <!-- ./input -->


                    <!-- input -->
                    <div class="form-group" style="padding:0 10px !important;">
                      <label for="Name">وظيفة الشخص المفوض</label>
                      <input  class="form-control"  name="person_job" value="" placeholder="" required>
                    </div>
                    <!-- ./input -->
                    <!-- input -->
                    <div class="form-group" style="padding:0 10px !important;">
                      <label for="Name">تليفون الشخص المفوض</label>
                      <input  class="form-control"  name="person_phone1" value="" placeholder="" required>
                    </div>
                    <!-- ./input -->
                    <!-- input -->
                    <div class="form-group" style="padding:0 10px !important;">
                      <label for="Name">تليفون الشخص الموفوض 2</label>
                      <input  class="form-control"  name="person_phone2" value="" placeholder="" required>
                    </div>
                    <!-- ./input -->


                  </div>

                  <!-- ./ col   ////////////////////////-->


                  <!-- col  ////////////////////////-->
                  <div class="col-lg-4" >
                    <!-- input -->
                    <div class="form-group" style="padding: 0 10px !important;">
                      <label for="Company">{{__('general.Company')}}</label>
                      <input required  class="form-control"  name="company" id="company" value="{{ old('company') }}" placeholder="">
                    </div>
                    <!-- ./input -->




                    <!-- input -->
                    <div class="form-group" style="padding:0 10px !important;">
                      <label for="Name">{{__('general.Phone')}}</label>
                      <input required class="form-control"  name="phone" id="phone" value="{{ old('phone') }}"  placeholder="">
                    </div>
                    <!-- ./input -->

                    <!-- input -->
                    <div class="form-group" style="padding:0 10px !important;">
                      <label for="Name">{{__('general.Email')}}</label>
                      <input required class="form-control"  name="email" id="email" value="{{ old('email') }}" placeholder="">
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
                     <textarea class="form-control" name="description" rows="8" cols="80"></textarea>
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
