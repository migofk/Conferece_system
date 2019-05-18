@extends('layouts.adminLayout')
@section($menuActive['menu'],'active')
@section($menuActive['submenu'],'active')
@section('meta')
<!-- Bootstrap time Picker -->
<link rel="stylesheet" href="{{asset('public/assets/adminLTE/plugins/timepicker/bootstrap-timepicker.min.css')}}">
@endsection

@section('pageHeader',$name)
@section('body')




<button data-toggle="modal" data-target="#modal-default" type="button" class="btn btn-small btn-success">CREATE</button>

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
                   <th>Name</th>
                   <th>Phone</th>
                   <th>Email</th>
                   <th>Role</th>

                   <td>Created_at</td>
                   <td>Action</td>

                 </tr>
                 </thead>
                 <tbody>

                   @foreach ($rows as $row)
                   <tr>
                   <td>{{$row->name}}</td>
                   <td>{{$row->phone}}</td>
                   <td>{{$row->email}}</td>
                   <td>{{$row->role->name}}</td>
                   <td>{{$row->created_at}}</td>
                   <td>
                      <a type="link" href="{{url('user/'.$row->id)}}"  class="btn btn-xs btn-success btn-xs" >VIEW</a>

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
                           <h4 class="modal-title">Create {{$name}}</h4>
                         </div>
                         <div class="modal-body">


                           <!-- form-->
                         <form class="form-horizontal" method="post" action="{{url('/user_add')}}" enctype="multipart/form-data">
                           @csrf
                           <input type="hidden" name="table" value="{{$table}}">
                         <div class="box-body">
                           <!-- row //////////////////////// -->
                           <div class="row">


                         <!-- col  ////////////////////////-->
                         <div class="col-lg-4" >
                           <!-- input -->
                           <div class="form-group" style="padding: 0 10px !important;">
                             <label for="Company">Name</label>
                             <input  class="form-control"  name="name" placeholder="">
                           </div>
                           <!-- ./input -->

                           <!-- input -->
                           <div class="form-group" style="padding:0 10px !important;">
                             <label for="Name">Phone</label>
                             <input  class="form-control"  name="phone" id="phone"  placeholder="">
                           </div>
                           <!-- ./input -->



                           <!-- input -->
                           <div class="form-group" style="padding:0 10px !important;">
                             <label for="Name">Image</label>
                             <input type="file" class="form-control" id="featureImage"  name="featureImage" placeholder="">
                           </div>
                           <!-- ./input -->

                           </div>
                            <!-- ./ col  ////////////////////////-->

                             <!-- col  ////////////////////////-->
                           <div class="col-lg-4" >


                             <!-- input -->
                             <div class="form-group" style="padding:0 10px !important;">
                               <label>Role</label>
                               <select  class="form-control" name="role" class="form-control" required>
                                 <option></option>
                                 @foreach ($roles as $role)
                                   <option value="{{$role->name}}">{{$role->name}}</option>

                                 @endforeach


                               </select>
                             </div>
                             <!-- ./input -->

                             <!-- input -->
                             <div class="form-group" style="padding:0 10px !important;">
                               <label for="Name">Email</label>
                               <input  class="form-control" id="email"  name="email" placeholder="">
                             </div>
                             <!-- ./input -->





                             </div>
                                 <!-- ./ col  ////////////////////////-->


                                 <!-- col  //////////////////////// -->
                               <div class="col-lg-4" >






                                 <!-- input -->
                                 <div class="form-group" style="padding:0 10px !important;">
                                   <label>Status</label>
                                   <select  class="form-control" name="status" class="form-control" required>
                                     <option></option>
                                     <option value="1">Active</option>
                                     <option value="0">Deactive</option>


                                   </select>
                                 </div>
                                 <!-- ./input -->

                                 <!--password -->
                                 <div class="form-group">
                                   <label for="name">Password</label>
                                   <input type="password" class="form-control" id="password" name="password" placeholder="password" value="" >
                                 </div>
                                 <!--./ username -->

                                 <!--password 2 -->
                                 <div class="form-group">
                                   <label for="name">Confirm Password</label>
                                   <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="password" value="" >
                                 </div>
                                 <!--./ password 2-->




                              </div>

                              <!-- ./ col   ////////////////////////-->

                           </div>
                           <!-- ./ row //////////////////////// -->





                         </div>
                        <!-- /.box-footer -->

                         </div>
                         <div class="modal-footer">
                           <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                           <button id="saveBtn" type="submit" class="btn btn-success">Save</button>
                         </div>
                        </form>
                           <!-- ./ form-->
                       </div>
                       <!-- /.modal-content -->
                     </div>
                     <!-- /.modal-dialog -->
                   </div>
              <!--./ create activity inputs model -->


              <!-- Edit activity inputs model -->
               <div class="modal fade" id="modal-Edit">
                   <div class="modal-dialog">
                     <div class="modal-content">
                       <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">×</span></button>
                         <h4 class="modal-title">Edit {{$name}}</h4>
                       </div>
                       <div class="modal-body">

                         <!-- form-->
                       <form class="form-horizontal" method="post" action="{{url('/editactInput')}}">
                         @csrf
                         <input type="hidden" name="table" value="{{$table}}">
                         <input type="hidden" id="itemID" name="itemID" value="">
                       <div class="box-body">
                         <div class="row">


                        <div class="form-group">
                         <label for="inputEmail3" class="col-sm-2 control-label">Name</label>

                         <div class="col-sm-10">
                         <input type="text" class="form-control" value="" name="editName" id="editName" placeholder="">
                       </div>
                      </div>
                     </div>
                      <!-- /.box-footer -->

                       </div>
                       <div class="modal-footer">

                         <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                         <button  type="submit" class="btn btn-success">Save</button>
                       </div>
                      </form>
                         <!-- ./ form-->
                      </div>
                     </div>
                     <!-- /.modal-content -->
                   </div>
                   <!-- /.modal-dialog -->
                 </div>

            <!--./ Edit activity inputs model -->


            <!-- delete activity inputs model -->
             <div class="modal fade" id="modal-delete">
                 <div class="modal-dialog">
                   <div class="modal-content">
                     <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">×</span></button>
                       <h4 class="modal-title">Delete {{$name}}</h4>
                     </div>
                     <div class="modal-body">

                       <!-- form-->
                     <form class="form-horizontal" method="post" action="{{url('/deleteactInput')}}">
                       @csrf
                       <input type="hidden" name="table" value="{{$table}}">
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
 <!-- ./models -->
@endsection




@section('scripts')


<!-- bootstrap time picker -->
<script src="{{asset('public/assets/adminLTE/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
<link rel="stylesheet" href="{{ asset('public/ezdz/jquery.ezdz.min.css') }}">
<script src="{{asset('public/ezdz/jquery.ezdz.min.js') }}"></script>
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
       text: 'Image',
       validators: {

       },
       reject: function(file, errors) {
           if (errors.mimeType) {
               alert(file.name + ' must be an image.');
           }


       }
   });
 })
 //Timepicker
 $('.timepicker').timepicker({
   showInputs: false
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



 //validate
 //searching function
 function searchNumber(searchValue,elementName){
   $.ajax({
       url: '{{url('/userX/searchNumber')}}',
       //dataType: 'script',
       cache: false,
       /*contentType: false,
       processData: false,*/
       data: {'searchData' : searchValue,},
       type: 'post',
       headers: {
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
       success: function(data){
         console.log(data);
         if(data != '200'){
           $(elementName).css('background-color','#ffd196');
           alert(searchValue +' is already existed and assigned to '+ data.assignedName);
          $('#saveBtn').attr('disabled',true);
         }
          else{
            $(elementName).css('background-color','lightgreen');
            $('#saveBtn').attr('disabled',false);
          }
       }
       });

 }

 $('#phone').keyup(function(){
 var thisValue = $(this).val();


 searchNumber(thisValue,$(this));

 });



 //validate
 $('#email').keyup(function(){
 var thisValue = $(this).val();

 searchNumber(thisValue,$(this));

 });
</script>
@endsection
