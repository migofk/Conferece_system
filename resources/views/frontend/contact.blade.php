@extends('layouts.frontend.layout')
@section('body')

  <section class="hero-banner">
      <div class="container text-center">
          <div class="row">
              <div class="col-sm-10 col-sm-offset-1">
                  <h2>تواصل معانا</h2><hr>
                  <div class="row">
                      <div class="col-sm-12">
                          تسعدنا مساعدتك تواصل  معانا اذا كان لديك اى استفسار او مشكلة.
                      </div>
                  </div>
              </div>
          </div>

      </div>
  </section>

  <section id="contact-form" class="contact-form block">
      <div class="container">
          <div class="row">
              <div class="col-sm-6">
                  <form name="sentMessage" id="contactForm" novalidate>
                      <legend>اتصل بنا</legend>
                      <div id="success"></div> <!-- For success/fail messages -->
                      <div class="form-group">
                          <div class="controls">
                              <input type="text" class="form-control" placeholder="Name" id="name" name="name">
                              <p class="help-block"></p>
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="controls">
                              <input type="email" class="form-control" placeholder="Email" id="email" name="email">
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="controls">
                              <textarea rows="10" cols="100" class="form-control" id="message" name="message" style="resize:none"></textarea>
                          </div>
                      </div>

                      <div class="text-right">
                          <button type="reset" class="btn btn-danger">RESET</button>
                          <button type="submit" class="btn btn-primary">SEND</button>
                      </div>
                  </form>
              </div>
              <div class="col-sm-6">
                  <div class="row">
                      <div class="col-sm-12">
                          <div class="well transparent">
                              <h4>المركز الرئيسى</h4>
                              <b>العنوان</b>
                              <p>{!!$data->address_ar!!}</p>
                              <b>التليفون</b>
                              <p>{{$data->phone1}} <br> {{$data->phone2}}</p>
                          </div>


                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <section class="contact-map">
      <div id="gmap" style="height:500px"></div>
  </section>
<br>
<br>




@endsection
