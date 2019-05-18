@extends('layouts.frontend.layout')
@section('meta')
      <!-- DataTables -->

       <link rel="stylesheet" href="{{asset('assets/plugins/datetimepicker/jquery.datetimepicker.min.css')}}">
@endsection
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

        <a href="{{route('product.index_company',['companyID' => $company->id])}}"  class="btn btn-small btn-success ">{{__('general.Products')}}</a>
        <a href="{{route('event.index_company',['companyID' => $company->id])}}"  class="btn btn-small btn-success ">{{__('general.Events')}}</a>

             <div class="box-header">

             </div>
             <!-- /.box-header -->
             <div class="box-body " id="editCompanyForm">
               <!-- form-->
               <form class="form-horizontal" method="post" action="{{url('events/'.$event->id)}}" enctype="multipart/form-data">
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
                         <input type="file" class="form-control" id="featureImage"  name="featureImage" placeholder="">
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
                         <label for="event">{{__('general.Event')}}</label>
                         <input  class="form-control"  name="event" id="event" value="{{$event->event}}"  placeholder="">
                       </div>
                       <!-- ./input -->

                       <!-- input -->
                       <div class="form-group" style="padding: 0 10px !important;">
                         <label for="event">{{__('general.Start Date')}}</label>
                         <input  class="form-control timepicker"   name="start_at" id="start_at" value="{{$event->start_at}}" placeholder="">
                       </div>
                       <!-- ./input -->

                       <!-- input -->
                       <div class="form-group" style="padding: 0 10px !important;">
                         <label for="event">{{__('general.End Date')}}</label>
                         <input   class="form-control timepicker"  name="end_at" id="end_at" value="{{$event->end_at}}" placeholder="">
                       </div>
                       <!-- ./input -->


                                              <!-- input -->
                                              <div class="form-group" style="padding:0 10px !important;">
                                                <label>{{__('general.Category')}}</label>
                                                <select  class="form-control" name="category_id" class="form-control" required>
                                                  <option value="{{$event->category->id}}">{{$event->category->category}}</option>
                                                  @foreach ($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->category}}</option>
                                                  @endforeach


                                                </select>
                                              </div>
                                              <!-- ./input -->



                     </div>
                     <!-- ./ col  ////////////////////////-->





                     <!-- col  ////////////////////////-->
                     <div class="col-lg-6" >
                       <!-- input -->
                       <div class="form-group" style="padding:0 10px !important;">
                         <label for="Name">{{__('general.Address')}}</label>
                         <input  class="form-control"  name="address" value="{{$event->address}}" placeholder="">
                       </div>
                       <!-- ./input -->

                       <!-- input -->
                       <div class="form-group" style="padding:0 10px !important;">
                         <label for="Name">{{__('general.Country')}}</label>

                         <select  name="country_id" id="country_id" class="form-control">
                           <option value="{{$event->country->id}}">{{$event->country->country}}</option>

                           @foreach ($countries as $country)
                             <option value="{{$country->id}}">{{$country->country}}</option>
                           @endforeach
                         </select>
                       </div>
                       <!-- ./input -->



                       <!-- input -->
                       <div class="form-group" style="padding:0 10px !important;">
                         <label for="Name">{{__('general.State')}}</label>
                         <select  name="state_id" id="state_id" class="form-control">
                           <option value="{{$event->state->id}}">{{$event->state->state}}</option>
                           @foreach ($regions as $region)
                             <option value="{{$region->id}}">{{$region->region}}</option>
                           @endforeach
                         </select>

                       </div>
                       <!-- ./input -->

                       <!-- input -->
                       <div class="form-group" style="padding:0 10px !important;">
                         <label for="Name">{{__('general.City')}}</label>

                         <select  name="city_id" id="city_id" class="form-control">
                           <option value="{{$event->city->id}}">{{$event->city->city}}</option>
                           @foreach ($cities as $city)
                             <option value="{{$city->id}}">{{$city->city}}</option>
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
                        <textarea class="form-control" name="description"   rows="8" cols="80">{{$event->description}}</textarea>
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
  <script src="{{asset('assets/plugins/datetimepicker/jquery.datetimepicker.full.min.js')}}"></script>
  <script>
  $(function () {


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

<script type="text/javascript" src="{{asset('js/admin/event.js')}}"></script>

@endsection
