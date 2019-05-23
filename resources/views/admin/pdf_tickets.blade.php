<!doctype html>

    <html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Attendants Tickets</title>
    </head>
    <body>


    <style>
    .box{
      border:solid 1px gray;
      -webkit-border: solid 1px gray;
      padding: 5px 15px;
    }
    .width25{
      width:25%;
      float:left
    }
    .img100{
      width:75%;
    }
    .width75{
      width:100%;

    }
    .floatRight{
      float:right
    }
    .page-break {
    page-break-after: always;
}
    </style>
    <br>
    <div class="box">
          <div class="width25">
              <br>
                <img class="img100" src="{{url('public/images/logo_450.png')}}" alt="">
          </div>
          <div class="width75">
              <h3 class="floatRight">#00{{$attendant->ticket->id}}</h3>
            <h3 class="text-bold"> National Evaluation Capacity NEC 2019 </h3>
            <h3>#00{{$attendant->id}}-{{$attendant->name}}-{{$countTickets}}</h3>
            <h3>   <span>Free</span> </h3>
          </div>
            <br>
    </div>
    <!-- /.box -->

@foreach ($attendant->tickets as $value)
<div class="page-break"></div>

    <div class="box">
          <div class="width25">
            <br>
                <img class="img100" src="{{url('public/images/logo_450.png')}}" alt="">

          </div>
          <div class="width75">
          <h3 class="floatRight">#00{{$value->id}}</h3>
            <h3 class="text-bold"> National Evaluation Capacity NEC 2019 </h3>
            <h3>#00{{$attendant->id}}-{{$attendant->name}}-{{$countTickets}}</h3>
            <h3>   <span>Free</span> </h3>
          </div>
          <br>
    </div>
    <!-- /.box -->
@endforeach
     </body>
    </html>
