<!-- persmissions inputs model -->
 <div class="modal fade" id="permissionsbutton">
     <div class="modal-dialog modal-lg">
       <div class="modal-content">
         <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">×</span></button>
           <h4 class="modal-title">{{__('general.Role Permissions')}}</h4>
         </div>
         <div class="modal-body">

           <!-- form-->
         <form class="form-horizontal" method="post" action="{{url('/permissionRole')}}">
           @csrf
            <input type="hidden" name="user_id" value="">
           <input type="hidden" id="tableName" name="table" value="">
           <input type="hidden" id="itemIDPermission" name="role_id" value="">
         <div class="box-body">


          <div class="row">
          @foreach ($permissions as $permission)
            @php
            $checked ="";
            $disabled ="";
            $title ="";

            /*if($role->hasPermissionTo($permission->name)){
              $checked="checked";
              if(!$role->hasDirectPermission($permission->name)){
              $disabled="disabled";
              $title ="Can't be edit, user has this permission via role";
              }
            }*/
            @endphp
           <div class="col-lg-3 col-md-3" style="height:50px">


           <div class="form-group">
             <label >
               <input  {{$checked}} {{$disabled}} title="{{$title}}" type="checkbox" id="_{{$permission->id}}" value="{{$permission->name}}" name="permissions[]" class="checkITems flat-red" >
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
           <button type="button" class="btn btn-default pull-left" data-dismiss="modal">{{__('general.Close')}}</button>
           <button type="submit" class="btn btn-success">{{__('general.Save')}}</button>
         </div>
        </form>
           <!-- ./ form-->
       </div>
       <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
   </div>
<!--./ persmissions activity inputs model -->
