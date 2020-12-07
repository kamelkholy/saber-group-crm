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

                <li class="menu-title">Sales</li>

                <li>
                    <a href="{{url('/sales')}}" class="waves-effect"><i class="dripicons-device-desktop"></i><span> Dashboard
                        </span></a>
                </li>

>
                
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-file "></i> Static<span> Reports
                            <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></span> </a>
                    <ul class="list-unstyled">
                        <li><a href="{{url('/sales/gettodayreport')}}">Today Report</a></li>
                        <li><a href="{{url('/sales/getcurrentmonth')}}">Current Month Report</a></li>
                        <li><a href="{{url('/sales/getcurrentyear')}}">Current Year Report</a></li>

                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-exclamation "></i> No Action<span> Reports
                            <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></span> </a>
                    <ul class="list-unstyled">
                        <li><a href="{{url('/sales/noactions_today')}}">Today Report</a></li>
                        <li><a href="{{url('/sales/getcurrentmonth_noaction')}}">Current Month Report</a></li>
                        <li><a href="{{url('/sales/getcurrentyear_noaction')}}">Current Year Report</a></li>

                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-phone "></i> Done<span> Reports
                            <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></span> </a>
                    <ul class="list-unstyled">
                        <li><a href="{{url('/sales/done_today')}}">Today Report</a></li>
                        <li><a href="{{url('/sales/getcurrentmonth_done')}}">Current Month Report</a></li>
                        <li><a href="{{url('/sales/getcurrentyear_done')}}">Current Year Report</a></li>

                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-volume-control-phone "></i> On Hold<span> Reports
                            <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></span> </a>
                    <ul class="list-unstyled">
                        <li><a href="{{url('/sales/onhold_today')}}">Today Report</a></li>
                        <li><a href="{{url('/sales/getcurrentmonth_onhold')}}">Current Month Report</a></li>
                        <li><a href="{{url('/sales/getcurrentyear_onhold')}}">Current Year Report</a></li>

                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-check-square-o "></i> Deals<span> Reports
                            <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></span> </a>
                    <ul class="list-unstyled">
                        <li><a href="{{url('/sales/deal_today')}}">Today Report</a></li>
                        <li><a href="{{url('/sales/getcurrentmonth_deal')}}">Current Month Report</a></li>
                        <li><a href="{{url('/sales/getcurrentyear_deal')}}">Current Year Report</a></li>

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