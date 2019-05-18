<div class="box">
           <div class="box-header">

           </div>
           <!-- /.box-header -->
           <div class="box-body table-responsive">
             <table id="example1" class="table  table-bordered table-striped">
               <thead>
               <tr>
                 <th>{{__('general.Name')}}</th>
                 <td>{{__('general.State')}}</td>
                 <td>{{__('general.Country')}}</td>
                 <td>{{__('general.Action')}}</td>

               </tr>
               </thead>
               <tbody>

                 @php
                 $show = true;
                 $filter = false;
                 if(isset($_GET['state_id'])){
                   $filter = true;
                   $show =false;
                 }

                 @endphp

                 @foreach ($rows as $row)
                   @php
                   $country ="";
                   $countryid ="";
                   $state ="";
                   foreach ($states as $value) {
                     if($value->id === $row->state_id){
                     $state = $value->state;
                     foreach ($countries as $value2) {
                       if($value2->id === $value->country_id){
                       $country = $value2->country;
                       $countryid = $value2->id;
                       }
                     }

                   }

                   }

                   if($filter){
                     $show =false;
                     if( $row->state_id == $_GET['state_id']){
                     $show =true;
                     }

                   }

                   @endphp
                    @if ($show)
                 <tr>
                 <td>{{$row->city}}</td>
                 <td>{{$state}}</td>
                 <td>{{$country}}</td>
                 <td>
                   <button item="{{$row->city}}" country_id="{{$countryid}}" state_id="{{$row->state_id}}" itemId="{{$row->id}}" type="button" class="btn btn-xs btn-success btn-xs editbutton">{{__('general.Edit')}}</button>
                   <button item="{{$row->city}}" itemId="{{$row->id}}" type="button" class="btn btn-xs btn-primary btn-xs deletebutton">{{__('general.Delete')}}</button>
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
