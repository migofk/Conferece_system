<div class="box">
           <div class="box-header">

           </div>
           <!-- /.box-header -->
           <div class="box-body table-responsive">
             <table id="example1" class="table  table-bordered table-striped">
               <thead>
               <tr>
                 <th>{{__('general.Name')}}</th>
                 <td>{{__('general.Country')}}</td>
                 <td>{{__('general.Action')}}</td>

               </tr>
               </thead>
               <tbody>
                 @php
                 $show = true;
                 $filter = false;
                 if(isset($_GET['country_id'])){
                   $filter = true;
                   $show =false;
                 }

                 @endphp
                 @foreach ($rows as $row)

                   @php



                   $country ="";
                   foreach ($countries as $value) {
                     if($value->id === $row->country_id){
                     $country = $value->name;
                     }

                   }

                   if($filter){
                     $show =false;
                     if( $row->country_id == $_GET['country_id']){
                     $show =true;
                     }

                   }

                   @endphp
                   @if ($show)


                 <tr>
                 <td><a href="{{url('get/cities?state_id='.$row->id)}}">{{$row->state}}</a></td>
                 <td>{{$country}}</td>
                 <td>
                   <button item="{{$row->state}}" country_id="{{$row->country_id}}" itemId="{{$row->id}}" type="button" class="btn btn-xs btn-success btn-xs editbutton">{{__('general.Edit')}}</button>
                   <button item="{{$row->state}}" itemId="{{$row->id}}" type="button" class="btn btn-xs btn-primary btn-xs deletebutton">{{__('general.Delete')}}</button>
                 </td>
                 </tr>
                  @endif
                 @endforeach

               </tbody>
               <tfoot>

               </tfoot>
             </table>
           </div>
           <!-- /.box-body -->
         </div>
         <!-- /.box -->
