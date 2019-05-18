<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span></button>
          <h4 class="modal-title">{{__('general.Create')}}</h4>
        </div>
        <div class="modal-body">

          <!-- form-->
        <form class="form-horizontal" method="post" action="{{url('/createactInput')}}">
          @csrf
          <input type="hidden" name="table" value="{{$table}}">
        <div class="box-body">
         <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">{{__('general.Name')}}</label>

          <div class="col-sm-10">
          <input type="text" class="form-control" name="city" id="createName" placeholder="">
        </div>
       </div>

       <div class="form-group">
         <label for="inputEmail3" class="col-sm-2 control-label">{{__('general.Country')}}</label>
         <div class="col-sm-10">
         <select  name="" id="country_id" class="form-control" required>
           <option></option>
           @foreach ($countries as $value)
              <option value="{{$value->id}}">{{$value->country}}</option>
           @endforeach
         </select>
           </div>
       </div>

       <div class="form-group">
         <label for="inputEmail3" class="col-sm-2 control-label">{{__('general.State')}}</label>
         <div class="col-sm-10">
         <select  name="state_id" id="state_id" class="form-control" required>
           <option></option>
           @foreach ($states as $value)
              <option value="{{$value->id}}">{{$value->state}}</option>
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
