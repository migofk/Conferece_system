<div class="modal fade" id="modal-Edit">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span></button>
          <h4 class="modal-title">{{__('general.Edit')}} {{$name}}</h4>
        </div>
        <div class="modal-body">

          <!-- form-->
        <form class="form-horizontal" method="post" action="{{url('/editactInput')}}">
          @csrf
          <input type="hidden" name="table" value="{{$table}}">
          <input type="hidden" id="itemID" name="itemID" value="">
        <div class="box-body">
         <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">{{__('general.Name')}}</label>

          <div class="col-sm-10">
          <input type="text" class="form-control" value="" name="state" id="editName" placeholder="">
        </div>
       </div>

       <div class="form-group">
         <label for="inputEmail3" class="col-sm-2 control-label">{{__('general.Country')}}</label>
         <div class="col-sm-10">
         <select  name="country_id" id="editcountry_id" class="form-control" required>
           <option></option>
           @foreach ($countries as $value)
              <option value="{{$value->id}}">{{$value->country}}</option>
           @endforeach
         </select>
           </div>
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
