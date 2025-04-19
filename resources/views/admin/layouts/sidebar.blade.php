<!-- Page Sidebar Start-->
<div class="page-sidebar">
    <div class="main-header-left d-none d-lg-block">
        <div class="logo-wrapper">
            <a href="index.html">
                <img class="d-none d-lg-block blur-up lazyloaded"
                    src="{{ asset('assets/admin/images/dashboard/multikart-logo.png') }}" alt="">
            </a>
        </div>
    </div>
    <div class="sidebar custom-scrollbar">
        <a href="javascript:void(0)" class="sidebar-back d-lg-none d-block"><i class="fa fa-times"
                aria-hidden="true"></i></a>
        <div class="sidebar-user">
            <img class="img-60" src="{{ asset('assets/admin/images/dashboard/user3.jpg') }}" alt="#">
            <div>
                <h6 class="f-14">JOHN</h6>
                <p>general manager.</p>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li>
                <a class="sidebar-header" href="{{ route('admin.index') }}">
                    <i data-feather="home"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li>
                <a class="sidebar-header" href="javascript:void(0)">
                    <i data-feather="dollar-sign"></i>
                    <span>Event</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        {{-- <a href="{{ route('admin.event') }}">
                            <i class="fa fa-circle"></i>Event List
                        </a> --}}
                    </li>
                </ul>
            </li>

            <li>
                <a class="sidebar-header" href="javascript:void(0)">
                    <i data-feather="tag"></i>
                    <span>Members</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        {{-- <a href="{{ route('admin.member') }}">
                            <i class="fa fa-circle"></i>List Member
                        </a> --}}
                    </li>
                </ul>
            </li>
            <li class="disabled">
                <a class="sidebar-header disabled" href="media.html">
                    <i data-feather="camera"></i>
                    <span>Galery</span>
                </a>
            </li>

            <li class="disabled">
                <a class="sidebar-header disabled" href="javascript:void(0)">
                    <i data-feather="align-left"></i>
                    <span>Blog</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="menu-list.html">
                            <i class="fa fa-circle"></i>Menu Lists
                        </a>
                    </li>
                    <li>
                        <a href="create-menu.html">
                            <i class="fa fa-circle"></i>Create Menu
                        </a>
                    </li>
                </ul>
            </li>

            <li class="disabled">
                <a class="sidebar-header disabled" href="support-ticket.html"><i data-feather="phone"></i><span>Support
                        Ticket</span>
                </a>
            </li>

            <li class="disabled">
                <a class="sidebar-header disabled" href="reports.html"><i
                        data-feather="bar-chart"></i><span>Reports</span>
                </a>
            </li>

            <li class="disabled">
                <a class="sidebar-header disabled" href="javascript:void(0)"><i
                        data-feather="settings"></i><span>Settings</span><i
                        class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="profile.html"><i class="fa fa-circle"></i>Profile
                        </a>
                    </li>
                </ul>
            </li>

            <li class="disabled">
                <a class="sidebar-header disabled" href="forgot-password.html">
                    <i data-feather="key"></i>
                    <span>Forgot Password</span>
                </a>
            </li>

        </ul>
    </div>
</div>
<!-- Page Sidebar Ends-->
