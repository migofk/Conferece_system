@extends('layouts.frontend.layout')
@section('body')
  <!-- BOF Main Content -->
  <div role="main" class="main">

    <div class="container with-sidebar">
          <div style="padding:2%;" class="sixteen columns left jx-padding">
              <div class="jx-blog">
                <div class="jx-section-title-1 jx-dark">

                    <div class="jx-pre-title jx-short-border">
                    <div class="jx-title-border left"></div>
                    <div class="jx-title-icon"><i class="line-icon icon-tag"></i></div>
                    <div class="jx-title-border right"></div>
                    </div>
                    <div class="jx-title jx-uppercase">Inquire Now</div>
                    <br>
                    <br>
                    <!-- Section Title -->

                </div>
                  <!-- item 01 -->

                  <div class="jx-blog-item">

                      <div class="appear&disappear-form"  >

                              <div class="row ">

                                @if ($errors->any())
                                  <div class="alert alert-danger">
                                    <ul>
                                      @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                      @endforeach
                                    </ul>
                                  </div>
                                @endif
                                       @isset($_GET['success'])
                                       <h3 style="text-align:center">Thank you, we will contact you as soon as possible</h3>
                                       @else
                                      <form class="form-horizontal" method="post" action="{{url('inquire_now')}}" enctype="multipart/form-data">
                                          <div class="row">
                                              <div class="three columns">
                                                  <label >Your name</label>
                                                  <input required class="u-full-width" type="text" placeholder="Name" name="name" id="name" value="{{ old('name') }}">
                                              </div>
                                              <div class="three columns">
                                                  <label >Your email</label>
                                                  <input required class="u-full-width" type="email" placeholder="example@example.com" name="email" id="email" value="{{ old('email') }}">
                                              </div>
                                              <div class="three columns">
                                                      <label >Your phone</label>
                                                      <input required class="u-full-width" type="text" placeholder="phone number" name="phone" id="phone" value="{{ old('phone') }}">

                                              </div>










                                              <br>
                                              <br>
                                              <div class="three columns" style="height:92px;">
                                                          <label>Your country</label>
                                                          <select name="country_id" required class="u-full-width size" id="exampleRecipientInput">
                                                                 @foreach ($countries as $country)
                                                                  <option value="{{$country->id}}">{{$country->country}}</option>
                                                                    @endforeach
                                                                </select>

                                              </div>




                                              <div class="three columns" style="height:92px;">
                                                      <label >Arrival Date</label>
                                                      <input name="arrival_date" class="u-full-width size timepicker" type="text" >
                                              </div>
                                              <div class="three columns" style="height:92px;">
                                                      <label >Departure Date *</label>
                                                      <input name="departure_date" class="u-full-width size timepicker" type="text"  >
                                              </div>


                                              <div class="three columns" style="height:92px;">
                                                      <label >Adult number</label>
                                                      <input min="0" name="adult_number" class="u-full-width same-grade size" type="number" placeholder="Enter number"   >
                                              </div>
                                              <div class="three columns" style="height:92px;">
                                                      <label >Children number</label>
                                                      <input min="0"  name="children_number"  class="u-full-width size" type="number" placeholder="Enter number"  >
                                              </div>
                                              <div class="three columns" style="height:92px;">
                                                      <label >Children Age</label>
                                                      <input min="0" name="children_age"  class="u-full-width size" type="number" placeholder="Enter number"  >
                                              </div>
                                              <div class="nine columns">
                                                      <label>Package type<span class="required">*</span></label>
                                                      <!--<input type="radio" name="gender" >-->
                                                      <input type="radio"  value="igotnone" onclick="show1();" /> Standard Package

                                                   <!--   <input type="radio" name="gender" >Deluxe Package<br><br>-->

                                                      <input type="radio"  value="igottwo" onclick="show2();" />Deluxe Package<br><br>
                                              </div>


                                              <div id="package-type-standred" class="nine columns" style="height:92px; display: none;">
                                                      <label>Choose your package</label>
                                                      <select name="package" class="u-full-width" id="ex">
                                                        <option value="Standard Main">Standard Main</option>
                                                        <option value="Standard Relax">Standard Relax</option>
                                                        <option value="Standard Nile">Standard Nile</option>
                                                        <option value="Standard Full">Standard Full</option>
                                                            </select>

                                              </div>

                                              <div id="package-type-dulex" class="nine columns" style="height:92px; display: none;">
                                                      <label>Choose your package</label>
                                                      <select name="package" class="u-full-width" id="ex">
                                                        <option value="Standard Main">Deluxe Main</option>
                                                        <option value="Standard Relax">Deluxe Relax</option>
                                                        <option value="Standard Nile">Deluxe Nile</option>
                                                        <option value="Standard Full">Deluxe Full</option>
                                                            </select>

                                              </div>
                                              <script>
                                                      function show1(){
                                                               document.getElementById('package-type-standred').style.display ='block';
                                                              document.getElementById('package-type-dulex').style.display = 'none';
                                                              }
                                                              function show2(){
                                                              document.getElementById('package-type-standred').style.display ='none';
                                                              document.getElementById('package-type-dulex').style.display = 'block';
                                                              }
                                              </script>

                                              <div class="three columns">
                                                      <label >Single room</label>
                                                      <input min="0" name="room_single" class="u-full-width size" type="text" placeholder="Enter No. of single room" id="exampleEmailInput">
                                              </div>
                                              <div class="three columns">

                                                      <label >Double room</label>
                                                      <input min="0" name="room_double" class="u-full-width size" type="text" placeholder="Enter No. of double room" id="exampleEmailInput">
                                              </div>

                                             <!-- <div class="nine columns">
                                                      <label>Your Language<span class="required">*</span></label>
                                                      <input type="radio" name="gender" >English
                                                      <input type="radio" name="gender" >French<br><br>
                                              </div>  -->





                                              </div>
                                              <label for="exampleMessage">Flight detalis</label>
                                              <textarea name="flight_details" class="u-full-width" placeholder="about your flight" ></textarea><br><br>
                                              <label for="exampleMessage">comments</label>
                                              <textarea  name="comment" class="u-full-width" placeholder="…" id="exampleMessage"></textarea><br><br>

                                              <input  class="button-primary" type="submit" value="Submit">

                                          </form>

                                      @endisset

                                </div>
                      </div>








                  </div>
                  <!-- item 02 -->

              </div>
          </div>
          <!-- EOF Body Content -->


                      <div style="padding-left:2%;" id="sidebar" class="four columns right jx-padding">


                              <!-- Widget 01 -->

                              <div class="jx-sidebar-block mb40">

                                  <h6 class="jx-uppercase jx-weight-600 mb20">Other Packages</h6>
                                  <!-- Heading -->

                                  <div class="jx-sidebar-recentposts">

                                      <ul>

                                              <li>
                                                  <div class="jx-post-content">
                                                      <div class="title"><a href="standard-Relax.html"><i class="fa fa-angle-right"></i> Standard Relax Package</a></div>

                                                  </div>
                                              </li>
                                              <li>
                                                  <div class="jx-post-content">
                                                      <div class="title"><a href="standard-Nile.html"><i class="fa fa-angle-right"></i> Standard Nile Package</a></div>

                                                  </div>
                                              </li>
                                              <li>
                                                  <div class="jx-post-content">
                                                      <div class="title"><a href="standard-Full.html"><i class="fa fa-angle-right"></i> Standard Full Package</a></div>

                                                  </div>
                                              </li>

                                          </ul>

                                  </div>
                                  <!-- Categories -->
                              </div>
                              <!-- Widget 02 -->



                          </div>
                      <!-- EOF Sidebar -->
      </div>


  </div>
  <!-- EOF Main Content -->
@endsection
@section('scripts')
  <link rel="stylesheet" href="{{asset('public/assets/plugins/datetimepicker/jquery.datetimepicker.min.css')}}">
    <script src="{{asset('public/assets/plugins/datetimepicker/jquery.datetimepicker.full.min.js')}}"></script>
<script type="text/javascript">
$('#timeStamp,.alertX,.timepicker').datetimepicker({
  ampm: true, // FOR AM/PM FORMAT
  format:'Y-m-d H:i:s',
  validateOnBlur: false,
  step:15
});
</script>
@endsection
