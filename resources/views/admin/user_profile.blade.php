
@php

//$roles = array('User' ,'Admin' );
$status = array('Deactive' ,'Active' );
@endphp
@extends('layouts.adminLayout')
@section($menuActive['menu'],'active')
@section($menuActive['submenu'],'active')

@section('meta')

<!-- Bootstrap time Picker -->
<link rel="stylesheet" href="{{asset('public/assets/adminLTE/plugins/timepicker/bootstrap-timepicker.min.css')}}">
@endsection

@section('pageHeader','User Profile')
@section('body')

  <div class="row">
    <div class="col-md-4">
      <!-- Widget: user widget style 1 -->
      <div class="box box-success  ">
        @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="box-body box-profile ">

            @php
            $activeInfo ="active";
            $activeActiv ="";
             if(isset($_GET['activity'])){
               $activeInfo ="";
              $activeActiv= "active";
             }
            $custLogo = 'public/images/user.png';
            $custName = $user->company;
              if ($user->image != null){
             $custLogo = 'public/photos/user-images/'.$user->image;
              }

              if ($user->company == null){
             $custName = $user->name;
              }
            @endphp

            <img class="profile-user-img img-responsive img-circle" src="{{asset($custLogo)}}" alt="User Avatar">

          <!-- /.widget-user-image -->
          <h3 class="profile-username text-center">{{$custName}}</h3>
          <h5 class="text-muted text-center">{{$user->mobile}}</h5>
        </div>
        <div class="box-footer no-padding">
          <ul class="nav nav-stacked">
            <li class="{{$activeInfo}}"><a href="#tab_1" data-toggle="tab">user Information</a></li>



          </ul>
        </div>
      </div>
      <!-- /.widget-user -->
    </div>

    <!-- /.col -->
    <div class="col-md-8">
      <div class="tab-content">
        <div class="tab-pane {{$activeInfo}}" id="tab_1">

          <div class="box box-success">
            <div class="box-header with-border">
              <i class="fa fa-info"></i>

              <h3 class="box-title">user Informaton</h3>
              <button item="{{$user->name}} / {{$user->company}}"  itemId="{{$user->id}}"  tableName="users"   data-toggle="modal" data-target="#modal-deleteContact" type="button" class="btn btn-xs btn-primary deletebutton pull-right">Delete</button>
              <button class="btn btn-xs btn-primary btn-xs pull-right" data-toggle="modal" data-target="#modal-permissionuser" >Permissions</button>
              <button class="btn btn-xs btn-primary btn-xs pull-right" data-toggle="modal" data-target="#modal-edituser" >Edit</button>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- row -->
              <div class="row ">
                <!-- col -->
                <div class="col-md-6">

              <dl class="dl-horizontal">

                <dt>Name</dt>
                <dd>{{$user->name}}</dd>

                <dt>Phone</dt>
                <dd>{{$user->phone}}</dd>
                <dt>Email</dt>
                <dd>{{$user->email}}</dd>


                <dt>Created_at</dt>
                <dd>{{$user->created_at}}</dd>

              </dl>
                </div>
                   <!-- ./ col -->
                <!-- col -->
             <div class="col-md-6">
              <dl class="dl-horizontal ">

                @php
                  $role = $user->getRoleNames()->first();
                  $active ="Active";


                  if ($user->status != 1) {
                   $active ="Deactive";
                  }


                @endphp


                <dt>Role</dt>
                <dd>{{$role}}</dd>
                <dt>Status</dt>
                <dd>{{$active}}</dd>



              </dl>
                </div>
                <!-- ./ col -->

                </div>
                    <!-- ./row -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

<br>


</div>






<!------------------------------------------------------->



<!-- edit cutomer model -->
 <div class="modal fade" id="modal-edituser">
     <div class="modal-dialog modal-lg">
       <div class="modal-content">
         <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">×</span></button>
           <h4 class="modal-title">Edit user</h4>
         </div>
         <div class="modal-body">

   <!--Form-->

   <!-- form-->
 <form class="form-horizontal" method="post" action="{{url('user_edit/'.$user->id)}}" enctype="multipart/form-data">
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
     <input  class="form-control"  name="name" value="{{$user->name}}" placeholder="">
   </div>
   <!-- ./input -->

   <!-- input -->
   <div class="form-group" style="padding:0 10px !important;">
     <label for="Name">Phone</label>
     <input  class="form-control"  name="phone" id="phone" value="{{$user->phone}}"  placeholder="">
   </div>
   <!-- ./input -->



   <!-- input -->
   <div class="form-group" style="padding:0 10px !important;">
     <label for="Name">Image</label>
     <input type="file" class="form-control" id="featureImage"  name="featureImage"  placeholder="">
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

         @for ($i=0; $i < count($roles); $i++)
           @if ($role == $roles[$i]->name)
          <option selected value="{{$roles[$i]->name}}">{{$roles[$i]->name}}</option>

         @else

         <option value="{{$roles[$i]->name}}">{{$roles[$i]->name}}</option>
              @endif
         @endfor


       </select>
     </div>
     <!-- ./input -->

     <!-- input -->
     <div class="form-group" style="padding:0 10px !important;">
       <label for="Name">Email</label>
       <input  class="form-control" id="email"  name="email" value="{{$user->email}}"  placeholder="">
     </div>
     <!-- ./input -->





     </div>
         <!-- ./ col  ////////////////////////-->


         <!-- col  //////////////////////// -->
       <div class="col-lg-4" >



         <!-- Bootstrap time Picker -->
         <link rel="stylesheet" href="{{asset('assets/adminLTE/plugins/timepicker/bootstrap-timepicker.min.css')}}">

         <!-- input -->
         <div class="form-group" style="padding:0 10px !important;">
           <label>Status</label>
           <select  class="form-control" name="status" class="form-control" required>
             @for ($i=0; $i < count($status); $i++)
               @if ($user->status ==$i)
              <option selected value="{{$i}}">{{$status[$i]}}</option>
              @else

             <option value="{{$i}}">{{$status[$i]}}</option>
              @endif
             @endfor



           </select>
         </div>
         <!-- ./input -->

         <!--password -->
         <div class="form-group">
           <label for="name">password</label>
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



   <!--./Form-->
       </div>
       <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
   </div>
<!--./ edit cutomer  model -->

<!------------------------------------------------------->

<!-- delete activity inputs model -->
 <div class="modal fade" id="modal-delete">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">×</span></button>
           <h4 class="modal-title">Delete User</h4>
         </div>
         <div class="modal-body">

           <!-- form-->
         <form class="form-horizontal" method="post" action="{{url('/adminLink/users/'.$user->id)}}">
           @csrf
           <input type="hidden" name="_method" value="delete">
           <input type="hidden" name="user_id" value="{{$user->id}}">
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

<!------------------------------------------------------->

<!-- persmissions inputs model -->
 <div class="modal fade" id="modal-permissionuser">
     <div class="modal-dialog modal-lg">
       <div class="modal-content">
         <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">×</span></button>
           <h4 class="modal-title">User Permissions</h4>
         </div>
         <div class="modal-body">

           <!-- form-->
         <form class="form-horizontal" method="post" action="{{url('/permissionUser')}}">
           @csrf
            <input type="hidden" name="user_id" value="{{$user->id}}">
           <input type="hidden" id="tableName" name="table" value="">
           <input type="hidden" id="itemIDdel" name="itemIDdel" value="">
         <div class="box-body">


          <div class="row">
          @foreach ($permissions as $permission)
            @php
            $checked ="";
            $disabled ="";
            $title ="";

            if($user->hasPermissionTo($permission->name)){
              $checked="checked";
              if(!$user->hasDirectPermission($permission->name)){
              $disabled="disabled";
              $title ="Can't be edit, user has this permission via role";
              }
            }
            @endphp
           <div class="col-lg-3 col-md-3" style="height:50px">


           <div class="form-group">
             <label >
               <input {{$checked}} {{$disabled}} title="{{$title}}" type="checkbox" value="{{$permission->name}}" name="permissions[]" class="flat-red" >
                {{$permission->name}}
               </label>
            </div>
            </div>
           @endforeach
           </div>

       </div>
        <!-- /.box-footer -->

         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
           <button type="submit" class="btn btn-success">Save</button>
         </div>
        </form>
           <!-- ./ form-->
       </div>
       <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
   </div>
<!--./ persmissions activity inputs model -->

<!------------------------------------------------------->


@endsection

@section('scripts')
<!-- Slimscroll -->
<script src="{{asset('public/assets/adminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- bootstrap time picker -->
<script src="{{asset('public/assets/adminLTE/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('public/assets/adminLTE/bower_components/fastclick/lib/fastclick.js')}}"></script>
<link rel="stylesheet" href="{{ asset('public/ezdz/jquery.ezdz.min.css') }}">
<script src="{{ asset('public/ezdz/jquery.ezdz.min.js') }}"></script>
<script src="{{asset('public/plugins/datetimepicker/jquery.datetimepicker.full.min.js')}}"></script>

<script>
$(function () {
  $('.openActivity').slideToggle();
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
  $('#featureImage').ezdz('preview', '{{url('public/photos/user-images/'.$user->image)}}');

});

//Timepicker
$('.timepicker').timepicker({
  showInputs: false,

})


$('.deletebutton').click(function(){
  var editName= $(this).attr('item');
  var itemID= $(this).attr('itemId');
  var Tablename= $(this).attr('tableName');
  $('#delName').val(editName);
  $('#itemIDdel').val(itemID);
  $('#tableName').val(Tablename);
  $('#modal-delete').modal('show')

});



/*$.get("{{url('activityForm/'.$user->id)}}", function(data, status){
       //alert("Data: " + data + "\nStatus: " + status);
       $('#tab_3').append(data);
   });*/
  $('body').on('click','.openActivityBTN',function(){
    var openID =$(this).attr('openId');

   $('#'+openID).slideToggle();
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
        data: {'searchData' : searchValue,
                    'id':'{{$user->id}}',
                 },
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
