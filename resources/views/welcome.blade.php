@php
  $sliders = App\slider::all();
@endphp
@extends('layouts.frontend.layout')
@section('body')




  <div id="myCarousel" class="carousel slide" data-ride="carousel">


    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      @foreach ($sliders as $slider)
        @php
          $active ="";
          if($loop->index == 0){
            $active = "active";
          }
        @endphp
      <div class="item {{$active}} ">
        <img width="100%"  src="{{asset($slider->featureImage)}}" alt="{{$slider->name}}">
      </div>

       @endforeach

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>


@endsection
