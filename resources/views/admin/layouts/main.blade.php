<!DOCTYPE html>
<html lang="id">

@include('admin.layouts.setting-head')

<div class="page-wrapper">

    <!-- Page Header Start-->
    @include('admin.layouts.header')
    <!-- Page Header Ends-->

    <!-- Page Body Start-->
    <div class="page-body-wrapper">

        <!-- Page Sidebar Start-->
        @include('admin.layouts.sidebar')
        <!-- Page Sidebar Ends-->

        <!-- Right sidebar Start-->
        @include('admin.layouts.right-sidebar')
        <!-- Right sidebar Ends-->

        <div class="page-body">

            {{-- content --}}
            @yield('content')
            {{-- end content --}}

        </div>

        <!-- footer start-->
        @include('admin.layouts.footer')
        <!-- footer end-->
    </div>
</div>

@stack('scripts')

<!-- latest jquery-->
<script src="{{ asset('assets/admin/js/jquery-3.3.1.min.js') }}"></script>

<!-- Bootstrap js-->
<script src="{{ asset('assets/admin/js/bootstrap.bundle.min.js') }}"></script>

<!-- feather icon js-->
<script src="{{ asset('assets/admin/js/icons/feather-icon/feather.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/icons/feather-icon/feather-icon.js') }}"></script>

<!-- Sidebar jquery-->
<script src="{{ asset('assets/admin/js/sidebar-menu.js') }}"></script>

<!--chartist js-->
<script src="{{ asset('assets/admin/js/chart/chartist/chartist.js') }}"></script>

<!--chartjs js-->
<script src="{{ asset('assets/admin/js/chart/chartjs/chart.min.js') }}"></script>

<!-- lazyload js-->
<script src="{{ asset('assets/admin/js/lazysizes.min.js') }}"></script>

<!--copycode js-->
<script src="{{ asset('assets/admin/js/prism/prism.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/clipboard/clipboard.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/custom-card/custom-card.js') }}"></script>

<!--counter js-->
<script src="{{ asset('assets/admin/js/counter/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/counter/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/counter/counter-custom.js') }}"></script>

<!--peity chart js-->
<script src="{{ asset('assets/admin/js/chart/peity-chart/peity.jquery.js') }}"></script>

<!-- Apex Chart Js -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<!--sparkline chart js-->
<script src="{{ asset('assets/admin/js/chart/sparkline/sparkline.js') }}"></script>

<!--Customizer admin-->
<script src="{{ asset('assets/admin/js/admin-customizer.js') }}"></script>

<!--dashboard custom js-->
<script src="{{ asset('assets/admin/js/dashboard/default.js') }}"></script>

<!--right sidebar js-->
<script src="{{ asset('assets/admin/js/chat-menu.js') }}"></script>

<!--height equal js-->
<script src="{{ asset('assets/admin/js/height-equal.js') }}"></script>

<!-- lazyload js-->
<script src="{{ asset('assets/admin/js/lazysizes.min.js') }}"></script>

<!--script admin-->
<script src="{{ asset('assets/admin/js/admin-script.js') }}"></script>

<!-- Datatables js-->
<script src="{{ asset('assets/admin/js/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/datatables/custom-basic.js') }}"></script>

<!--dropzone js-->
<script src="{{ asset('assets/admin/js/dropzone/dropzone.js') }}"></script>
<script src="{{ asset('assets/admin/js/dropzone/dropzone-script.js') }}"></script>

</html>
