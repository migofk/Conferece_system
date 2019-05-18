<div class="box">
           <div class="box-header">

           </div>
           <!-- /.box-header -->
           <div class="box-body table-responsive">
             <table id="example1" class="table  table-bordered table-striped">
               <thead>
               <tr>
                 <th>{{__('general.Name')}}</th>
                 <td>{{__('general.Created at')}}</td>
                 <td>{{__('general.Action')}}</td>

               </tr>
               </thead>
               <tbody>

                 @foreach ($rows as $row)
                 <tr>
                 <td>{{$row->name}}</td>
                 <td>{{$row->created_at}}</td>
                 <td>
                   <button item="{{$row->name}}" itemId="{{$row->id}}" type="button" class="btn btn-xs btn-success btn-xs editbutton">{{__('general.Edit')}}</button>
                   <button item="{{$row->name}}" itemId="{{$row->id}}" type="button" class="btn btn-xs btn-primary btn-xs deletebutton">{{__('general.Delete')}}</button>
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
