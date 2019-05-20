@extends('layouts.adminLayout')
@section($menuActive['menu'],'active')
@section($menuActive['submenu'],'active')
@section('title','Company')
@section('meta')

@endsection

@section('pageHeader',$name)
@section('headerDescription','Attendants Module')
@section('body')




      <button data-toggle="modal" data-target="#modal-default" type="button" class="btn btn-small btn-success ">{{__('general.Create')}}</button>

            <div class="box">

              <!-- /.box-header -->
              <div class="box-body ">

                  <div class="col-md-2">
                        <img class="img-responsive" src="{{url('public/images/logo_450.png')}}" alt="">
                  </div>
                  <div class="col-md-10">
                    <h3 class="text-bold"> National Evaluation Capacity NEC 2019 <span class="pull-right">#00{{$attendant->ticket->id}}</span></h3>
                    <h3>#00{{$attendant->id}}-{{$attendant->name}}-{{$countTickets}}</h3>
                    <h3>   <span>Free</span> </h3>
                  </div>



              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->

@foreach ($attendant->tickets as $value)
  <div class="box">

        <!-- /.box-header -->
        <div class="box-body ">
          <div class="col-md-2">
                <img class="img-responsive" src="{{url('public/images/logo_450.png')}}" alt="">
          </div>
          <div class="col-md-10">
            <h3 class="text-bold"> National Evaluation Capacity NEC 2019 <span class="pull-right">#00{{$value->id}}</span></h3>
            <h3>#00{{$attendant->id}}-{{$attendant->name}}-{{$countTickets}}</h3>
            <h3>   <span>Free</span> </h3>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
@endforeach

      <!-- models -->







      @endsection




      @section('scripts')

        <!-- DataTables -->


        <script>
        $(function () {




        });



        // #invitations








        //validate

      </script>




      @endsection
