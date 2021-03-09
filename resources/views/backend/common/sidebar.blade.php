<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">

                <li class="menu-title">MAIN NAVIGATION</li>

                <li>
                    <a href="{{route('admin.dashboard')}}">
                        <i class="dripicons-meter"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="dripicons-web"></i>
                        <span> Divisions </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="{{route('admin.divisions.index')}}">
                                <i class="icon-list mr-1"></i> 
                                <span>All Divisions</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.divisions.create')}}">
                                <i class="icon-plus mr-1"></i> 
                                <span>Add division</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="dripicons-web"></i>
                        <span> District </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="{{route('admin.districts.index')}}">
                                <i class="icon-list mr-1"></i> 
                                <span>All District</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.districts.create')}}">
                                <i class="icon-plus mr-1"></i> 
                                <span>Add District</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="dripicons-web"></i>
                        <span> Thana/Upazila </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="{{route('admin.thanas.index')}}">
                                <i class="icon-list mr-1"></i> 
                                <span>All Thana/Upazila</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.thanas.create')}}">
                                <i class="icon-plus mr-1"></i> 
                                <span>Add Thana/Upazila</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->