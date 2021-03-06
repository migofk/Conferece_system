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
                <th>{{__('general.Product')}}</th>
                <th>{{__('general.Category')}}</th>
                <td>{{__('general.Created at')}}</td>
                <td>{{__('general.Action')}}</td>

              </tr>
            </thead>
            <tbody>

              @foreach ($rows as $row)
                <tr>
                  <td>{{$row->product}}</td>
                  <td>{{$row->category->category}}</td>
                  <td>{{$row->created_at}}</td>
                  <td>
                    <a type="link" href="{{url('/adminLink/products/'.$row->id.'/edit')}}"  class="btn btn-xs btn-success btn-xs" >{{__('general.View')}}</a>

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
                <form class="form-horizontal" method="post" action="{{url('/adminLink/products')}}" enctype="multipart/form-data">
                  @csrf

                 <input type="hidden" name="added_by" value="{{auth::user()->id}}">
                 <input type="hidden" name="company_id" value="{{$company->id}}">
                  <div class="box-body">
                      <!-- row //////////////////////// -->
                    <div class="row">
                      <div class="col-md-12">

                        <!-- input -->
                        <div class="form-group" style="padding:0 10px !important;">
                          <label for="Name">{{__('general.Image')}}</label>
                          <input required type="file" class="form-control" id="featureImage"  name="featureImage" placeholder="">
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
                          <input  class="form-control"  name="product" id="product" value="{{ old('product') }}" placeholder="">
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
                            <option></option>
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
                              <option value="{{$statusX->id}}">{{$statusX->status}}</option>
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



      <script type="text/javascript" src="{{asset('js/admin/product.js')}}"></script>

      @endsection
