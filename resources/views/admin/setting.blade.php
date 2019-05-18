@extends('layouts.adminLayout')
@section($menuActive['menu'],'active')
@section($menuActive['submenu'],'active')
@section('meta')
  <!-- DataTables -->
<link rel="stylesheet" href="{{asset('assets/adminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">

@endsection

@section('pageHeader',$name)
@section('body')




<button data-toggle="modal" data-target="#modal-default" type="button" class="btn btn-small btn-success">{{__('general.Create')}}</button>

    @if($special)

      @if ($table ==="categories")
       @php
       $categories = App\category::where('status',1)->get();

       function haskids($array , $parent_id)
       {
         $hasKids = false;
          foreach ($array as $value) {
            if($value->parent_id == $parent_id){
              $hasKids = true;
              break;
            }
          }
          return $hasKids;
       }

        function make_menu($array,$row){
        $name = $row->category;

         foreach ($array as  $value) {
          if($row->id == $value->parent_id){
          $value->category =  $name .='/'.$value->category;
        if  (haskids($array , $value->id)){
              make_menu($array,$value);
              $name = $row->category;
          }

         }



         }


       }

       foreach ($categories as $rowX) {
         if($rowX->parent_id == null){
        make_menu($categories,$rowX );
              }
       }
    /*   function cmp($a, $b)
   {
       return strcmp($a->category, $b->category);
   }
    usort($categories, array($this, "cmp"));
*/
     $rows = $categories;

   //print_r($newcategories);
       @endphp
      @include('admin.setting_parties.category_table')
      @include('admin.setting_parties.category_addForm')
      @include('admin.setting_parties.category_editForm')
      @endif

      @if ($table ==="countries")

      @include('admin.setting_parties.country_table')
      @include('admin.setting_parties.country_addForm')
      @include('admin.setting_parties.country_editForm')
      @endif

      @if ($table ==="states")
        @php
          $countries = App\country::where('status',1)->get();
        @endphp
      @include('admin.setting_parties.state_table')
      @include('admin.setting_parties.state_addForm')
      @include('admin.setting_parties.state_editForm')
      @endif

      @if ($table ==="cities")
        @php
          $countries = App\country::where('status',1)->get();
          $states = App\state::where('status',1)->get();
        @endphp
      @include('admin.setting_parties.city_table')
      @include('admin.setting_parties.city_addForm')
      @include('admin.setting_parties.city_editForm')
      @endif


      @if ($table ==="roles")
        @php
           $permissions = Spatie\Permission\Models\Permission::all();
           $url = url('/');

        @endphp
        <script>
       var theUrl ="{{$url}}";
        </script>

      @include('admin.setting_parties.role_table')
      @include('admin.setting_parties.role_addForm')
      @include('admin.setting_parties.role_editForm')
      @include('admin.setting_parties.role_permissionForm')
      @include('admin.setting_parties.role_deleteForm')

      @endif



    @else
       <!-- table -->
       @include('admin.setting_parties.setting_table')
       <!--./ table -->


 <!-- models -->

                <!-- create activity inputs model -->
              @include('admin.setting_parties.setting_addForm')
              <!--./ create activity inputs model -->

              <!-- Edit activity inputs model -->
               @include('admin.setting_parties.setting_editForm')
            <!--./ Edit activity inputs model -->
    @endif

            <!-- delete activity inputs model -->
             @include('admin.setting_parties.setting_deleteForm')
          <!--./ delete activity inputs model -->

 <!-- ./models -->
@endsection




@section('scripts')

  <!-- DataTables -->
<script src="{{asset('assets/adminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/adminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

<script>
$(function () {
   $('#example1').DataTable()
   $('#example2').DataTable({
     'paging'      : true,
     'lengthChange': false,
     'searching'   : false,
     'ordering'    : true,
     'info'        : true,
     'autoWidth'   : false
   })
 })




 $('.deletebutton').click(function(){
   var editName= $(this).attr('item');
   var itemID= $(this).attr('itemId');
   $('#delName').val(editName);
   $('#itemIDdel').val(itemID);
   $('#modal-delete').modal('show')

 });


</script>
@if($special)

  @if ($table ==="categories")
  @include('admin.setting_parties.category_script')
  @endif

  @if ($table ==="countries")
  @include('admin.setting_parties.country_script')
  @endif

  @if ($table ==="states")
  @include('admin.setting_parties.state_script')
  @endif

  @if ($table ==="cities")
  @include('admin.setting_parties.city_script')
  @endif

  @if ($table ==="roles")
  @include('admin.setting_parties.role_script')
  @endif


@else

@include('admin.setting_parties.setting_script')
@endif
@endsection
