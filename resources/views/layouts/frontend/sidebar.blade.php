                <!-- Widget 01 -->

                <div class="jx-sidebar-block mb40">

<h6 class="jx-uppercase jx-weight-600 mb20">
@if( $showSideSection == 3)
Packages
@else
Other Packages
@endif


</h6>
<!-- Heading -->

<div class="jx-sidebar-recentposts">

    <ul>
           @if($showSideSection == 1 || $showSideSection == 3)
           
            <li @if($hideSideLink == 1) style="display:none" @endif>
                <div class="jx-post-content">
                    <div class="title"><a href="{{url('package/standard_main')}}"><i class="fa fa-angle-right"></i> Standard Main Package</a></div>

                </div>
            </li>
            

            <li @if($hideSideLink == 2) style="display:none" @endif>
                <div class="jx-post-content">
                    <div class="title"><a href="{{url('package/standard_relax')}}"><i class="fa fa-angle-right"></i> Standard Relax Package</a></div>

                </div>
            </li>
            <li @if($hideSideLink == 3) style="display:none" @endif>
                <div class="jx-post-content">
                    <div class="title"><a href="{{url('package/standard_nile')}}"><i class="fa fa-angle-right"></i> Standard Nile Package</a></div>

                </div>
            </li>
            <li @if($hideSideLink == 4) style="display:none" @endif>
                <div class="jx-post-content">
                    <div class="title"><a href="{{url('package/standard_full')}}"><i class="fa fa-angle-right"></i> Standard Full Package</a></div>

                </div>
            </li>
            @endif

        </ul>

</div>
<!-- Categories -->
</div>
<!-- Widget 02 -->