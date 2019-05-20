@extends('layouts.adminLayout')
@section($menuActive['menu'],'active')
@section($menuActive['submenu'],'active')
@section('title','Company')

@section('meta')
  <!-- DataTables -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/css/bootstrap-select.css">
@endsection

@section('pageHeader',$name)
@section('headerDescription','Company Module')
@section('body')


  <div class="box">
    @isset($_GET['success'])


    <div class="alert alert-success alert-dismissible">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>SUCCESS</strong>
    </div>

    @endisset

    @if ($errors->any())
      <div class="alert alert-danger alert-dismissible">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif




             <div class="box-header">
        <a href="{{url('/adminLink/tickets/'.$attendant->id)}}"  class="btn btn-small btn-success ">{{__('general.Tickets')}}</a>
             </div>
             <!-- /.box-header -->
             <div class="box-body " id="editCompanyForm">
               <!-- form-->
               <form class="form-horizontal" method="post" action="{{url('/adminLink/attendants/'.$attendant->id)}}" enctype="multipart/form-data">
                @csrf
               <input type="hidden" name="added_by" value="{{auth::user()->id}}">
               <input type="hidden" name="_method" value="PUT">
                <div class="box-body">

                  <!-- row -->
                  <div class="row">
                    <div class="col-lg-6" >
                    <!-- input -->
                    <div class="form-group" style="padding:0 10px !important;">
                      <label for="Name">How many invitations do you need? </label>

                      <select required name="invitations" id="invitations" class="form-control">

                        <option></option>
                        @php
                            $xx = count($attendants);
                        @endphp
                        @for ($i = 1; $i < 6; $i++)
                        @if($i == $xx+1)
                        <option  selected value="{{$i}}">{{$i}}</option>
                        @else
                      <option value="{{$i}}">{{$i}}</option>
                      @endif
                        @endfor



                      </select>
                    </div>
                    <!-- ./input -->
                   </div>
                  </div>

                  <!-- /row -->
                  <!-- row //////////////////////// -->
                  <div class="row">


                    <!-- col  ////////////////////////-->
                    <div class="col-lg-4" >
                      <!-- input -->
                      <div class="form-group" style="padding: 0 10px !important;">
                        <label for="Company">{{__('general.Name')}}</label>
                        <input required  class="form-control"  name="name" id="name" value="{{$attendant->name}}" placeholder="">
                      </div>
                      <!-- ./input -->
                      @php
                       $XC = 1;
                      @endphp
                      @foreach ($attendants as $attendantX)
                         <div id="name_{{$XC}}" class="form-group" style="padding: 0 10px !important;">
                            <label for="Company">{{__('general.Name')}} {{$XC+1}}</label>
                         <input   class="form-control"  name="name_arr[]"  value="{{$attendantX->name}}"  placeholder="">
                          </div>
                       @php
                       $XC++;
                       @endphp
                      @endforeach
                      @for ($i=$XC; $i < 5; $i++)
                        <div id="name_{{$i}}" class="form-group" style="padding: 0 10px !important;">
                          <label for="Company">{{__('general.Name')}} {{$i+1}}</label>
                          <input   class="form-control"  name="name_arr[]"   placeholder="">
                        </div>
                      @endfor
                     <br><br>
                      <!-- input -->
                      <div class="form-group" style="padding:0 10px !important;">
                        <label for="Name">{{__('general.Country')}}</label>

                        <select required name="country_id" id="country_id" class="form-control">
                          <option></option>
                          @foreach ($countries as $country)
                          @php
                          $selected = '';
                          if($country->id == $attendant->country_id){
                          $selected = 'selected';
                          }
                          @endphp
                          <option {{$selected }} value="{{$country->id}}">{{$country->country}}</option>
                          @endforeach
                        </select>
                      </div>
                      <!-- ./input -->

                      <!-- input -->
                      <div class="form-group" style="padding:0 10px !important;">
                        <label for="Name">{{__('general.Adult Number')}}</label>
                        <input type="number" min="1"  class="form-control"  name="adult_number" value="{{$attendant->subattendants->adult_number}}" placeholder="" required>
                      </div>
                      <!-- ./input -->


                      <!-- input -->
                      <div class="form-group" style="padding:0 10px !important;">
                        <label for="Name">{{__('general.Package')}}</label>

                        <select required name="package" id="package" class="form-control">
                                <option value="{{$attendant->subattendants->package}}">{{$attendant->subattendants->package}}</option>
                          <option></option>
                            <option value="Standard Main">Standard Main</option>
                            <option value="Standard Relax">Standard Relax</option>
                            <option value="Standard Nile">Standard Nile</option>
                            <option value="Standard Full">Standard Full</option>
                         <option></option>
                            <option value="Standard Main">Deluxe Main</option>
                            <option value="Standard Relax">Deluxe Relax</option>
                            <option value="Standard Nile">Deluxe Nile</option>
                            <option value="Standard Full">Deluxe Full</option>

                        </select>
                      </div>
                      <!-- ./input -->




                      <!-- input -->
                      <div class="form-group" style="padding:0 10px !important;">
                            <label>{{__('general.Status')}}</label>
                            <select  class="form-control" name="status" class="form-control" required>
                              <option></option>
                              @foreach ($status as $statusX)
                                @php
                                  $selected = '';
                                  if($statusX->id == $attendant->status){
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



                    <!-- col  //////////////////////// -->
                    <div class="col-lg-4" >
                      <!-- input -->
                      <div class="form-group" style="padding:0 10px !important;">
                        <label for="Name">{{__('general.Phone')}}</label>
                        <input required class="form-control"  name="phone" id="phone" value="{{$attendant->phone}}"  placeholder="">
                      </div>
                      <!-- ./input -->

                      <!-- ./input -->
                      @php
                      $XC = 1;
                     @endphp
                     @foreach ($attendants as $attendantX)
                        <div id="phone_{{$XC}}" class="form-group" style="padding: 0 10px !important;">
                           <label for="Company">{{__('general.Phone')}} {{$XC+1}}</label>
                        <input   class="form-control"  name="phone_arr[]"  value="{{$attendantX->phone}}"  placeholder="">
                         </div>
                      @php
                      $XC++;
                      @endphp
                     @endforeach
                      @for ($i=$XC; $i < 5; $i++)
                        <div id="phone_{{$i}}" class="form-group" style="padding: 0 10px !important;">
                          <label for="Company">{{__('general.Phone')}} {{$i+1}}</label>
                          <input   class="form-control"  name="phone_arr[]"  placeholder="">
                        </div>
                      @endfor
                     <br><br>
                      <!-- input -->

                      <!-- input -->
                      <div class="form-group" style="padding: 0 10px !important;">
                        <label for="event">{{__('general.Arrival Date')}}</label>
                        <input  class="form-control timepicker"  name="arrival_date" id="arrival_date" value="{{$attendant->subattendants->arrival_date}}" placeholder="">
                      </div>
                      <!-- ./input -->


                      <!-- input -->
                      <div class="form-group" style="padding:0 10px !important;">
                        <label for="Name">{{__('general.Childern Number')}}</label>
                        <input type="number" min="0"  class="form-control"  name="children_number" value="{{$attendant->subattendants->children_number}}" placeholder="" required>
                      </div>
                      <!-- ./input -->









                      <!-- input -->
                      <div class="form-group" style="padding:0 10px !important;">
                        <label for="Name">{{__('general.Single Room')}}</label>
                        <input type="number" min="0"  class="form-control"  name="room_single" value="{{$attendant->subattendants->room_single}}" placeholder="" required>
                      </div>
                      <!-- ./input -->




                    </div>

                    <!-- ./ col   ////////////////////////-->


                    <!-- col  ////////////////////////-->
                    <div class="col-lg-4" >

                      <!-- input -->
                      <div class="form-group" style="padding:0 10px !important;">
                        <label for="Name">{{__('general.Email')}}</label>
                        <input required class="form-control"  name="email" id="email" value="{{$attendant->email}}" placeholder="">
                      </div>
                      <!-- ./input -->

                      <!-- ./input -->
                     @php
                      $XC = 1;
                     @endphp
                     @foreach ($attendants as $attendantX)
                        <div id="email_{{$XC}}" class="form-group" style="padding: 0 10px !important;">
                           <label for="Company">{{__('general.Email')}} {{$XC+1}}</label>
                        <input   class="form-control"  name="email_arr[]"  value="{{$attendantX->email}}"  placeholder="">
                         </div>
                      @php
                      $XC++;
                      @endphp
                     @endforeach
                      @for ($i=$XC; $i < 5; $i++)
                        <div id="email_{{$i}}" class="form-group" style="padding: 0 10px !important;">
                          <label for="Company">{{__('general.Email')}} {{$i+1}}</label>
                          <input   class="form-control"  name="email_arr[]"  placeholder="">
                        </div>
                      @endfor
                     <br><br>
                      <!-- input -->

                      <!-- input -->
                      <div class="form-group" style="padding: 0 10px !important;">
                        <label for="event">{{__('general.Departure Date')}}</label>
                        <input  class="form-control timepicker"  name="departure_date" id="departure_date" value="{{$attendant->subattendants->departure_date}}" placeholder="">
                      </div>
                      <!-- ./input -->

                      <!-- input -->
                      <div class="form-group" style="padding:0 10px !important;">
                        <label for="Name">{{__('general.Childern Age')}}</label>
                        <input type="number" min="0" required class="form-control"  name="children_age" value="{{$attendant->subattendants->children_age}}" placeholder="" required>
                      </div>
                      <!-- ./input -->


                      <!-- input -->
                      <div class="form-group" style="padding:0 10px !important;">
                        <label for="Name">{{__('general.Double Room')}}</label>
                        <input type="number" min="0" required class="form-control"  name="room_double" value="{{$attendant->subattendants->room_double}}" placeholder="" required>
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
                       <label for="Name">{{__('general.Flight Details')}}</label>
                       <textarea class="form-control" name="flight_details" rows="4" cols="80">{{$attendant->subattendants->flight_details}}</textarea>
                      </div>
                      <!-- ./input -->

                    </div>

                  </div>

                  <!-- /row -->

                  <!-- row -->
                  <div class="row">
                    <div class="col-md-12">
                      <!-- input -->
                      <div class="form-group" style="padding:0 10px !important;">
                       <label for="Name">{{__('general.Comment')}}</label>
                       <textarea class="form-control" name="comment" rows="4" cols="80">{{$attendant->subattendants->comment}}</textarea>
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

<script>
$(function () {
  $('.selectpicker').selectpicker();

  for (var i = {{$xx+1}}; i < 5; i++) {
        $('#name_'+i).hide().find('input').val('');
        $('#phone_'+i).hide().find('input').val('');
        $('#email_'+i).hide().find('input').val('');
      }
 });



        // #invitations
        $('#invitations').change(function(){
          var x = $(this).val();

          for (var i = 1; i < 5; i++) {
            if((i < x) && (x != 1)){
            $('#name_'+i).show().find('input').val('');
            $('#phone_'+i).show().find('input').val('');
            $('#email_'+i).show().find('input').val('');
          }else{
            $('#name_'+i).hide().find('input').val('');
            $('#phone_'+i).hide().find('input').val('');
            $('#email_'+i).hide().find('input').val('');
          }
        }
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







</script>

<script type="text/javascript" src="{{asset('js/admin/company.js')}}"></script>

@endsection
