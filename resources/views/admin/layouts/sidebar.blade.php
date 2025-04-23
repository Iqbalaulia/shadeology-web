<!-- Page Sidebar Start-->
<div class="page-sidebar">
    <div class="main-header-left d-none d-lg-block">
        <div class="logo-wrapper">
            <a href="javascript:void(0)">
                <img class="d-none d-lg-block blur-up lazyloaded"
                    src="{{ asset('assets/admin/images/dashboard/shadeology_logo.png') }}" alt="">
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
                <a class="sidebar-header" href="{{ route('admin.dashboard.index') }}">
                    <i data-feather="home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a class="sidebar-header" href="{{ route('admin.users.index') }}">
                    <i data-feather="users"></i>
                    <span>Users</span>
                </a>
            </li>
            <li>
                <a class="sidebar-header" href="{{ route('admin.skin-tone.index') }}">
                    <i data-feather="aperture"></i>
                    <span>Skin Tone</span>
                </a>
            </li>
            <li>
                <a class="sidebar-header" href="{{ route('admin.personal-color.index') }}">
                    <i data-feather="clipboard"></i>
                    <span>Personal Color</span>
                </a>
            </li>
            <li>
                <a class="sidebar-header" href="javascript:void(0)">
                    <i data-feather="archive"></i>
                    <span>Product</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('admin.product-brand.index') }}">
                            <i class="fa fa-circle"></i>Brand
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.product-type.index') }}">
                            <i class="fa fa-circle"></i>Type
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.product.index') }}">
                            <i class="fa fa-circle"></i>Product
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="sidebar-header" href="{{ route('admin.product-recommendation.index') }}">
                    <i data-feather="clipboard"></i>
                    <span>Product Recommendation</span>
                </a>
            </li>
            <li class="disabled">
                <a class="sidebar-header disabled" href="javascript:void(0)">
                    <i data-feather="key"></i>
                    <span>Forgot Password</span>
                </a>
            </li>
        </ul>
    </div>
    <hr />
    <div class="sidebar-footer">
        <div class="logout-section">
            <a class="sidebar-header d-flex align-items-center gap-2" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i data-feather="log-out" class="icon-logout"></i>
                <span>Logout</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
</div>
<!-- Page Sidebar Ends-->
