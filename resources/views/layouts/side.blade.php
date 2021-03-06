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

                <li class="menu-title">Basic Data</li>

                <li>
                    <a href="{{url('/basicdata/homebasic')}}" class="waves-effect"><i class="dripicons-device-desktop"></i><span> Dashboard
                        </span></a>
                </li>


                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-cogs "></i> <span> Modules <span
                                class="float-right"><i class="mdi mdi-chevron-right"></i></span></span> </a>
                    <ul class="list-unstyled">
                        <li><a href="{{url('/courses/homecourse_admin')}}">Courses</a></li>
                        <li><a href="{{url('/product/producthome')}}">Products</a></li>
                        <li><a href="{{url('/blog/homeblog')}}">Blog</a></li>

                    </ul>
                </li>


                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-pie-chart "></i> <span> Sections
                            <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></span> </a>
                    <ul class="list-unstyled">
                        <li><a href="{{url('/basicdata/addnewsection')}}">Add Section</a></li>
                        <li><a href="{{url('/basicdata/sectionlist')}}">Manage Sections</a></li>

                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-list "></i> <span> Categories
                            <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></span> </a>
                    <ul class="list-unstyled">
                        <li><a href="{{url('/basicdata/addnewcategory')}}">Add Category</a></li>
                        <li><a href="{{url('/basicdata/categorylist')}}">Manage Categories</a></li>

                    </ul>
                </li>


                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-indent "></i> <span>
                            Subcategories <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></span>
                    </a>
                    <ul class="list-unstyled">
                        <li><a href="{{url('/basicdata/addnewsubcategory')}}">Add Subcategories</a></li>
                        <li><a href="{{url('/basicdata/sublist')}}">Manage Subcategories</a></li>

                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-tag "></i> <span> Brands <span
                                class="float-right"><i class="mdi mdi-chevron-right"></i></span></span> </a>
                    <ul class="list-unstyled">
                        <li><a href="{{url('/basicdata/addnewbrand')}}">Add Brand</a></li>
                        <li><a href="{{url('/basicdata/brandlist')}}">Manage Brands</a></li>

                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-users "></i> <span> Users <span
                                class="float-right"><i class="mdi mdi-chevron-right"></i></span></span> </a>
                    <ul class="list-unstyled">
                        <li><a href="{{url('/basicdata/addnewuser')}}">Add User</a></li>
                        <li><a href="{{url('/basicdata/userlist')}}">Manage User</a></li>

                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-image"></i> <span> Sliders
                            <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></span> </a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('sliders') }}">Sliders</a></li>
                        <li><a href="{{ route('viewSliderForm')}}">Add new Slider</a></li>
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
                    <!-- Search -->
                    <li class="list-inline-item dropdown notification-list">
                        <a class="nav-link waves-effect toggle-search" href="#" data-target="#search-wrap">
                            <i class="mdi mdi-magnify noti-icon"></i>
                        </a>
                    </li>
                    <!-- Fullscreen -->
                    <li class="list-inline-item dropdown notification-list hidden-xs-down">
                        <a class="nav-link waves-effect" href="#" id="btn-fullscreen">
                            <i class="mdi mdi-fullscreen noti-icon"></i>
                        </a>
                    </li>
                    <!-- notification-->
                    <li class="list-inline-item dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#"
                            role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="ion-ios7-bell noti-icon"></i>
                            <span class="badge badge-danger noti-icon-badge">3</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg">
                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h5>Notification (3)</h5>
                            </div>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
                                <p class="notify-details"><b>Your order is placed</b><small class="text-muted">Dummy
                                        text of the printing and typesetting industry.</small></p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-warning"><i class="mdi mdi-message"></i></div>
                                <p class="notify-details"><b>New Message received</b><small class="text-muted">You have
                                        87 unread messages</small></p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-info"><i class="mdi mdi-martini"></i></div>
                                <p class="notify-details"><b>Your item is shipped</b><small class="text-muted">It is a
                                        long established fact that a reader will</small></p>
                            </a>

                            <!-- All-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                View All
                            </a>

                        </div>
                    </li>
                    <!-- User-->
                    <li class="list-inline-item dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown"
                            href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="{{url('/public/pic/user.png')}}" alt="user" class="rounded-circle">
                            {{Auth::user()->name}}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <a class="dropdown-item" href="#"><i class="dripicons-user text-muted"></i> Profile</a>
                            <a class="dropdown-item" href="#"><i class="dripicons-wallet text-muted"></i> My Wallet</a>
                            <a class="dropdown-item" href="#"><span
                                    class="badge badge-success float-right m-t-5">5</span><i
                                    class="dripicons-gear text-muted"></i> Settings</a>
                            <a class="dropdown-item" href="#"><i class="dripicons-lock text-muted"></i> Lock screen</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{url('/basicdata/logout')}}"><i
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
                        <h3 class="page-title"><img src="{{url('/public/pic/sublogo.png')}}" height="60px"
                                width="100px"></h3>
                    </li>
                </ul>

                <div class="clearfix"></div>
            </nav>

        </div>
        <!-- Top Bar End -->