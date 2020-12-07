<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">

    <!-- LOGO -->
    <div class="topbar-left">
        <div class="">
            <!--<a href="index.html" class="logo text-center">Fonik</a>-->
            <a href="index.html" class="logo">
                <img style="padding-top: 20px;padding-bottom: 10px" width="90%" src="{{url('/public/pic/logo.png')}}"
                    height="90px" alt="logo"></a>
        </div>
    </div>

    <div class="sidebar-inner slimscrollleft">
        <div id="sidebar-menu">
            <ul>

                <li class="menu-title">
                @if(Auth::user()->user_type == 3)
                Moderation
                @elseif(Auth::user()->user_type == 5)
                    Moderation Manager
                </li>
                @endif

                <li>
                    <a href="{{url('/moderation')}}" class="waves-effect"><i class="dripicons-device-desktop"></i><span> Dashboard
                        </span></a>
                </li>



                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-pie-chart "></i> <span> Lead
                            <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></span> </a>
                    <ul class="list-unstyled">
                        <li><a href="{{url('/moderation/addnewlead')}}">Add Lead</a></li>
                        @if(Auth::user()->user_type == 5)
                        <li><a href="{{url('/moderation/manageleads')}}">Manage Leads</a></li>
                        @endif

                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-file "></i> Static<span> Reports
                            <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></span> </a>
                    <ul class="list-unstyled">
                        <li><a href="{{url('/moderation/gettodayreport')}}">Today Report</a></li>
                        <li><a href="{{url('/moderation/getcurrentmonth')}}">Current Month Report</a></li>
                        <li><a href="{{url('/moderation/getcurrentyear')}}">Current Year Report</a></li>
                        <li><a href="{{url('/moderation/allleads')}}">All Leads Report</a></li>

                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-cogs "></i><span>Dynamic Reports
                            <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></span> </a>
                    <ul class="list-unstyled">
                        <li><a href="{{url('/moderation/monthlyreport_main')}}">Monthly Report</a></li>
                        <li><a href="{{url('/moderation/datemain')}}">Date Report</a></li>
                        <li><a href="{{url('/moderation/daterange')}}">Date Range Report</a></li>
                        <li><a href="{{url('/moderation/timemain')}}">Time Range Report</a></li>

                    </ul>
                </li>


                
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-users "></i> <span> Shift Reports <span
                                class="float-right"><i class="mdi mdi-chevron-right"></i></span></span> </a>
                    <ul class="list-unstyled">
                        <li><a href="{{url('/moderation/normalshiftper')}}">Normal Shift (Per Client)</a></li>
                        <li><a href="{{url('/moderation/nightshiftper')}}">Night Shift (Per Client)</a></li>
                        <li><a href="{{url('/moderation/normalallclients')}}">Normal Shift (All Clients)</a></li>
                        <li><a href="{{url('/moderation/nightallclients')}}">Night Shift (All Clients)</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-building "></i> <span> Cities <span
                                class="float-right"><i class="mdi mdi-chevron-right"></i></span></span> </a>
                    <ul class="list-unstyled">
                        <li><a href="{{url('/moderation/addnewcity')}}">Add New City</a></li>
                        <li><a href="{{url('/moderation/citylist')}}">City List</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-indent "></i> <span> Clients Categories <span
                                class="float-right"><i class="mdi mdi-chevron-right"></i></span></span> </a>
                    <ul class="list-unstyled">
                        <li><a href="{{url('/moderation/addnewclientcat')}}">Add New Category</a></li>
                        <li><a href="{{url('/moderation/catlist')}}">Category List</a></li>
                    </ul>
                </li>
            
            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
</div>
<!-- Left Sidebar End -->


<!-- Start right Content here -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">

        <!-- Top Bar Start -->
        <div class="topbar">

            <nav class="navbar-custom">
                <!-- Search input -->
                <div class="search-wrap" id="search-wrap">
                    <div class="search-bar">
                        <input class="search-input" type="search" placeholder="Search" />
                        <a href="#" class="close-search toggle-search" data-target="#search-wrap">
                            <i class="mdi mdi-close-circle"></i>
                        </a>
                    </div>
                </div>

                <ul class="list-inline float-right mb-0">

                    <!-- Fullscreen -->
                    <li class="list-inline-item dropdown notification-list hidden-xs-down">
                        <a class="nav-link waves-effect" href="#" id="btn-fullscreen">
                            <i class="mdi mdi-fullscreen noti-icon"></i>
                        </a>
                    </li>
                   
                    <!-- User-->
                    <li class="list-inline-item dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown"
                            href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="{{url('/public/pic/user.png')}}" alt="user" class="rounded-circle">
                            {{Auth::user()->name}}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <a class="dropdown-item" href="{{url('/moderation/addnewlead')}}"><i class="dripicons-wallet text-muted"></i> Add New Lead</a>
                            <a class="dropdown-item" href="{{url('/moderation/allleads')}}"><span
                                    class="badge badge-success float-right m-t-5">5</span><i
                                    class="dripicons-gear text-muted"></i> All Leads</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{url('/logout')}}"><i
                                    class="dripicons-exit text-muted"></i> Logout</a>
                        </div>
                    </li>
                </ul>

                <!-- Page title -->
                <ul class="list-inline menu-left mb-0">
                    <li class="list-inline-item">
                        <button type="button" class="button-menu-mobile open-left waves-effect">
                            <i class="ion-navicon"></i>
                        </button>
                    </li>
                    <li class="hide-phone list-inline-item app-search">
                        <h3 class="page-title"></h3>
                    </li>
                    <li class="hide-phone list-inline-item app-search">
                        <h3 class="page-title">Dashboard</h3>
                        </li>
                </ul>

                <div class="clearfix"></div>
            </nav>

        </div>
        <!-- Top Bar End -->