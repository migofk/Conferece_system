
    <!-- BOF Footer -->

    <footer class="jx-footer-section jx-default-bg jx-container">
      	<div class="container">
        	<div class="sixteen columns">
                <div class="jx-footer-social">
                    <ul>
                        <li><a href="https://www.facebook.com/MisrTravel1934/"><i class="fa fa-facebook"></i></a></li>
                                                            <li><a href="https://twitter.com/MisrTravelEgypt"><i class="fa fa-twitter"></i></a></li>
                                                            <li><a href="https://www.youtube.com/channel/UCC-zk4gngEQViHSiwgQ4ZQg?view_as=subscriber"><i class="fa fa-youtube"></i></a></li>

                                                            <li><a href="https://www.instagram.com/misrtravelegypt/"><i class="fa fa-instagram"></i></a></li>
                                                            <li><a href="https://www.pinterest.com/misrtraveltv/"><i class="fa fa-pinterest"></i></a></li>
                    </ul>
                </div>

                <div class="jx-footer-copyright ">
                        Copyrights &copy; 2019 - Powered by <a class="de-color" style="color:white" href="https://www.digitalexperts.ae/">Digital Experts</a>
                    </div>
            </div>
        </div>
    </footer>

    <!-- EOF Footer -->


    <!-- Footer -->

	<script type="text/javascript" src="{{asset('public/assets/nec2019/vendor/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/assets/nec2019/js/plugins.js')}}"></script>
	<script type="text/javascript" src="{{asset('public/assets/nec2019/vendor/respond.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/assets/nec2019/vendor/jquery.appear.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/assets/nec2019/vendor/prettyPhoto/jquery.prettyPhoto.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/assets/nec2019/vendor/isotope/jquery.isotope.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/assets/nec2019/vendor/owl/owl.carousel.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/assets/nec2019/vendor/flexslider/jquery.flexslider.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/assets/nec2019/vendor/twitterjs/twitter.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/assets/nec2019/vendor/jquery.validate.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/assets/nec2019/vendor/rs-plugin/js/jquery.themepunch.tools.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/assets/nec2019/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>


    <script src="{{asset('public/assets/nec2019/js/main.js')}}"></script>
	<!-- Pricing Table -->

    <!-- Home JS -->
	<script src="{{asset('public/assets/nec2019/js/custom/home.js')}}"></script>

    <!-- Theme Initializer -->
	<script src="{{asset('public/assets/nec2019/js/theme.js')}}"></script>
 @yield('scripts')
    <!-- Google Map -->
    <script type="text/javascript">
            // When the window has finished loading create our google map below
            google.maps.event.addDomListener(window, 'load', init);

            function init() {
                // Basic options for a simple Google Map
                // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions

				var mapOptions = {
                    scrollwheel: false,
					// How zoomed in you want the map to start at (always required)
                    zoom: 11,
                    // The latitude and longitude to center the map (always required)
                    center: new google.maps.LatLng(40.6700, -73.9400), // New York
                    // How you would like to style the map.
                    // This is where you would paste any style found on Snazzy Maps.
                    styles: [{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#d3d3d3"}]},{"featureType":"transit","stylers":[{"color":"#808080"},{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"visibility":"on"},{"color":"#b3b3b3"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"weight":1.8}]},{"featureType":"road.local","elementType":"geometry.stroke","stylers":[{"color":"#d7d7d7"}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#ebebeb"}]},{"featureType":"administrative","elementType":"geometry","stylers":[{"color":"#a7a7a7"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"landscape","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#efefef"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#696969"}]},{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"visibility":"on"},{"color":"#737373"}]},{"featureType":"poi","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.arterial","elementType":"geometry.stroke","stylers":[{"color":"#d6d6d6"}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"color":"#dadada"}]}]
                };
                // Get the HTML DOM element that will contain your map
                // We are using a div with id="map" seen below in the <body>

                var mapElement = document.getElementById('map');
                // Create the Google Map using our element and options defined above
                var map = new google.maps.Map(mapElement, mapOptions);
                // Let's also add a marker while we're at it
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(40.6700, -73.8400),
                    icon: '{{asset('public/assets/nec2019/images/map-marker.png')}}',
					map: map,
                    title: 'iEVENT'
                });
            }
      </script>


</body>
</html>
