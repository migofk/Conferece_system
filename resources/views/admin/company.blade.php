@extends('layouts.adminLayout')
@section($menuActive['menu'],'active')
@section($menuActive['submenu'],'active')
@section('title','Company')
@section('meta')
      <!-- DataTables -->
      <link rel="stylesheet" href="{{asset('assets/adminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">

@endsection

@section('pageHeader',$name)
@section('headerDescription','Company Module')
@section('body')




      <button data-toggle="modal" data-target="#modal-default" type="button" class="btn btn-small btn-success ">{{__('general.Create')}}</button>


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
        <div class="box-body table-responsive">
          <table id="example1" class="table  table-bordered table-striped">
            <thead>
              <tr>
                <th>{{__('general.Company')}}</th>
                <th>{{__('general.Category')}}</th>
                <th>{{__('general.Owner')}}</th>
                <th>{{__('general.Contact Person')}}</th>
                <th>{{__('general.Phone')}}</th>
                <th>{{__('general.Email')}}</th>
                <th>{{__('general.Address')}}</th>
                <th>{{__('general.City')}}</th>
                <th>{{__('general.State')}}</th>
                <th>{{__('general.Country')}}</th>
                <th>{{__('general.Post Code')}}</th>
                <th>{{__('general.Tax Number')}}</th>
                <th>{{__('general.Commercial Registry')}}</th>
                <td>{{__('general.Created at')}}</td>
                <td>{{__('general.Action')}}</td>

              </tr>
            </thead>
            <tbody>

              @foreach ($rows as $row)
                <tr>
                  <td>{{$row->company}}</td>
                  <td>{{$row->category->category}}</td>
                  <td>{{$row->user->name}}</td>
                  <td>{{$row->contact_person}}</td>
                  <td>{{$row->phone}}</td>
                  <td>{{$row->email}}</td>
                  <td>{{$row->address}}</td>
                  <td>{{$row->city->city}}</td>
                  <td>{{$row->state->state}}</td>
                  <td>{{$row->country->country}}</td>
                  <td>{{$row->postcode}}</td>
                  <td>{{$row->tax_number}}</td>
                  <td>{{$row->commercial_registry}}</td>

                  <td>{{$row->created_at}}</td>
                  <td>
                    <a type="link" href="{{url('/adminLink/companies/'.$row->id.'/edit')}}"  class="btn btn-xs btn-success btn-xs" >{{__('general.View')}}</a>

                  </td>
                </tr>
              @endforeach

            </tbody>
            <tfoot>

            </tfoot>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->






      <!-- models -->
      <!-- create activity inputs model -->
      <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">{{__('general.Create')}} {{$name}}</h4>
              </div>
              <div class="modal-body">


                <!-- form-->
                <form class="form-horizontal" method="post" action="{{url('/adminLink/companies')}}" enctype="multipart/form-data">
                  @csrf
                 <input type="hidden" name="added_by" value="{{auth::user()->id}}">
                  <div class="box-body">
                    <!-- row //////////////////////// -->
                    <div class="row">


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



                      <!-- col  //////////////////////// -->
                      <div class="col-lg-4" >
                        <!-- input -->
                        <div class="form-group" style="padding:0 10px !important;">
                          <label for="Name">{{__('general.Contact Person')}}</label>
                          <input required class="form-control"  name="contact_person" value="{{ old('contact_person') }}" placeholder="" required>
                        </div>
                        <!-- ./input -->



                        <!-- input -->
                        <div class="form-group" style="padding:0 10px !important;">
                          <label>{{__('general.Owner')}}</label>
                          <select required class="form-control" name="user_id" class="form-control" >
                            <option></option>
                            @foreach ($Users as $user)
                              <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach


                          </select>
                        </div>
                        <!-- ./input -->

                        <!-- input -->
                        <div class="form-group" style="padding:0 10px !important;">
                          <label>{{__('general.Category')}}</label>
                          <select required class="form-control" name="category_id" class="form-control" >
                            <option></option>
                            @foreach ($categories as $category)
                              <option value="{{$category->id}}">{{$category->category}}</option>
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
                          <label>{{__('general.Status')}}</label>
                          <select  class="form-control" name="status" class="form-control" required>
                            <option></option>
                            @foreach ($status as $statusX)
                              <option value="{{$statusX->id}}">{{$statusX->status}}</option>
                            @endforeach


                          </select>
                        </div>
                        <!-- ./input -->

                        <!-- input -->
                        <div class="form-group" style="padding:0 10px !important;">
                          <label for="Name">{{__('general.Tax Number')}}</label>
                          <input  class="form-control"  name="tax_number" value="{{ old('Tax_Number') }}" placeholder="">
                        </div>
                        <!-- ./input -->


                      </div>

                      <!-- ./ col   ////////////////////////-->


                      <!-- col  ////////////////////////-->
                      <div class="col-lg-4" >
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
                          <label for="Name">{{__('general.Commercial Registry')}}</label>
                          <input  class="form-control"  name="commercial_registry" value="{{ old('commercial_registry') }}" placeholder="">
                        </div>
                        <!-- ./input -->

                      </div>
                      <!-- ./ col  ////////////////////////-->



                    </div>
                    <!-- ./ row //////////////////////// -->



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
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!--./ create activity inputs model -->






      @endsection




      @section('scripts')

        <!-- DataTables -->
        <script src="{{asset('assets/adminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('assets/adminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
        <link rel="stylesheet" href="{{ asset('ezdz/jquery.ezdz.min.css') }}">
        <script src="{{ asset('ezdz/jquery.ezdz.min.js') }}"></script>
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
