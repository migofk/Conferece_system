

<div class="box">
           <div class="box-header">

           </div>
           <!-- /.box-header -->
           <div class="box-body table-responsive">
             <table id="example1" class="table  table-bordered table-striped">
               <thead>
               <tr>
                 <th>{{__('general.Name')}} </th>
                 <th>{{__('general.Code')}} </th>

                 <th>{{__('general.Calling Code')}} </th>

                 <td>{{__('general.Action')}} </td>

               </tr>
               </thead>
               <tbody>

                 @foreach ($rows as $row)

                 <tr>
                 <td><a href="{{url('get/states?country_id='.$row->id)}}">{{$row->country}}</a></td>
                 <td>{{$row->code}}</td>

                 <td>{{$row->calling_code}}</td>

                 <td>
                   <button item="{{$row->country}}" code="{{$row->code}}" calling_code="{{$row->calling_code}}"  itemId="{{$row->id}}" type="button" class="btn btn-xs btn-success btn-xs editbutton">{{__('general.Edit')}} </button>
                   <button item="{{$row->country}}" itemId="{{$row->id}}" type="button" class="btn btn-xs btn-primary btn-xs deletebutton">{{__('general.Delete')}}</button>
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
