<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span></button>
          <h4 class="modal-title">{{__('general.Create')}} {{$name}}</h4>
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
          <input type="text" class="form-control" name="createName" id="createName" placeholder="">
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
