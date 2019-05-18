@php
  $contact= App\contact::first();
@endphp
<footer>
       <div class="container">
           <div class="row ">


          <!--     <div class="col-sm-4 hidden-xs">
                   <h4>روابط</h4>
                   <ul class="list-unstyled social-stream">
                     <li> <a href="#">الرئيسية</a> </li>
                     <li> <a href="#">من نحن</a> </li>

                   </ul>
               </div> -->
               <div class="col-sm-6 ">
                   <a href="#">
                       <img src="{{asset('images/ebrd.png')}}" alt="Coco Frontend Template" class="footer-logo">
                   </a>
                   <h5>تحت رعاية البنك الاوروبى</h5>

               </div>

               <div dir="rtl" class="col-sm-6 ">
                   <h4>اتصل بنا</h4>
                   <ul class="list-unstyled company-info ">
                       <li>{!!$contact->address_ar!!}<i class="icon-map-marker"></i></li>
                       <li><i class="icon-phone3"></i>{{$contact->phone1}}</li>
                       <li><i class="icon-envelope"></i> <a href="mailto:{{$contact->email}}">{{$contact->email}}</a></li>

                   </ul>
               </div>



           </div>
           <hr>
           <div class="row">
               <div class="col-sm-6 text-left">
                   <p>جميع الحقوق محفوظة &copy; 2019  <a href="http://www.hubancreative.com" target="_blank">Winhub</a></p>
               </div>
               <div class="col-sm-6 text-right">
                   <div class="social-links">
                       <a href="{{$contact->twitter}}">
                           <i class="icon-twitter4"></i>
                       </a>
                       <a href="{{$contact->facebook}}">
                           <i class="icon-facebook4"></i>
                       </a>
                       <a href="{{$contact->instagram}}">
                           <i class="icon-instagram3"></i>
                       </a>
                       <a href="{{$contact->linkedIn}}">
                           <i class="icon-linkedin4"></i>
                       </a>

                   </div>
               </div>
           </div>
       </div>
   </footer>
   <a class="tothetop" href="javascript:;"><i class="icon-angle-up"></i></a>
</div>

<script>
   var resizefunc = [];
</script>
<script src="{{asset('public/assets/frontend/assets/libs/less-js/less-1.7.5.min.js')}}"></script>
<script src="{{asset('public/assets/frontend/assets/libs/pace/pace.min.js')}}"></script>
<script src="{{asset('public/assets/frontend/assets/libs/jquery/jquery-1.11.1.min.js')}}"></script>
<script src="{{asset('public/assets/frontend/assets/libs/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/assets/frontend/assets/libs/jquery-browser/jquery.browser.min.js')}}"></script>
<script src="{{asset('public/assets/frontend/assets/libs/fastclick/fastclick.js')}}"></script>
<script src="{{asset('public/assets/frontend/assets/libs/stellarjs/jquery.stellar.min.js')}}"></script>
<script src="{{asset('public/assets/frontend/assets/libs/jquery-appear/jquery.appear.js')}}"></script>
<script src="{{asset('public/assets/frontend/assets/js/init.js')}}"></script>
<!-- Page Specific JS Libraries -->
<script src="{{asset('public/assets/frontend/assets/libs/owl-carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('public/assets/frontend/assets/libs/jquery-magnific/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('public/assets/frontend/assets/js/pages/index.js')}}"></script>
<!-- Page Specific JS Libraries End -->
