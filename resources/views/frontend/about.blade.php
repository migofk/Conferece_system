@extends('layouts.frontend.layout')
@section('body')

  <section class="hero-banner bg-success">
      <div class="container text-center">

          <div class="row">
              <div class="col-sm-10 col-sm-offset-1">
                  <h2 class="text-white-1"></h2><hr>
                  <div class="row">
                      <div class="col-sm-12 text-white-1">
                          {!!$data->description!!}
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
<br>
<br>




@endsection
