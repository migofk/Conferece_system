<ul class="sidebar-menu" data-widget="tree">
  <li class="header">MENU</li>
  <!-- Optionally, you can add icons to the links -->
  <li class="@yield('l1')"><a href="{{url('/adminLink')}}"><i class="fa fa-dashboard"></i> <span>{{__('general.Dashboard')}}</span></a></li>




  <li class="treeview  @yield('c2') ">
    <a href="#"><i class="fa fa-users"></i> <span>{{__('general.Conferance')}}</span>
      <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu " style="display:@yield('c2-0')">

      <li class="@yield('c2-l1')"><a href="{{url('/adminLink/attendants')}}">{{__('general.Attendants')}}</a></li>
    <li class="@yield('c2-l4')"><a href="{{url('/adminLink/reviewattendants')}}">{{__('general.waiting review')}}</a></li>
    <li class="@yield('c2-l2')"><a href="{{url('/adminLink/rejectedattendants')}}">{{__('general.Rejected Attendants')}}</a></li>

    </ul>
  </li>


  <li class="treeview  @yield('c1') ">
    <a href="#"><i class="fa fa-sliders"></i> <span>{{__('general.Setting')}}</span>
      <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu " style="display:@yield('c1-0')">

    <!--  <li class="@yield('c1-l12')"><a href="{{url('/info')}}">{{__('general.Company Info')}}</a></li> -->

      <li class="@yield('c1-l1')"><a href="{{url('/user')}}">{{__('general.Users')}}</a></li>
      <li class="@yield('c1-l15')"><a href="{{url('get/roles')}}">{{__('general.User Permissions')}}</a></li>


      <li class="@yield('c1-l7')"><a href="{{url('get/countries')}}">{{__('general.Countries')}}</a></li>
      
      <li class="@yield('c1-l14')"><a href="{{url('/adminLink/slider')}}">{{__('general.sliders')}}</a></li>

    </ul>
  </li>

</ul>
