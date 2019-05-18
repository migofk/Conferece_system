<div class="modal fade" id="modal-delete">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span></button>
          <h4 class="modal-title">{{__('general.Delete')}} {{$name}}</h4>
        </div>
        <div class="modal-body">

          <!-- form-->
        <form class="form-horizontal" method="post" action="{{url('/deleteactInput')}}">
          @csrf
          <input type="hidden" name="table" value="{{$table}}">
          <input type="hidden" id="itemIDdel" name="itemIDdel" value="">
        <div class="box-body">
         <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">{{__('general.Name')}}</label>

          <div class="col-sm-10">
          <input type="text" disabled class="form-control" value="" name="delName" id="delName" placeholder="">
        </div>
       </div>
      </div>
       <!-- /.box-footer -->

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">{{__('general.Close')}}</button>
          <button type="submit" class="btn btn-success">{{__('general.Delete')}}</button>
        </div>
       </form>
          <!-- ./ form-->
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
