<!DOCTYPE html>
<html lang="en">

@include('client.layout.setting-head')

<body>
    <div class="page-wrapper home7-style">
        <div class="preloader"></div>

        {{-- header --}}
        @include('client.layout.header')

        {{-- content --}}
        @yield('content')
        {{-- end content --}}

        @include('client.layout.footer')
    </div>


    <!-- Scroll To Top -->
    <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>

    @stack('scripts')

    <script src="{{ asset('assets/client/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/client/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('assets/client/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/client/js/mixitup.js') }}"></script>
    <script src="{{ asset('assets/client/js/gsap.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/ScrollTrigger.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/splitType.js') }}"></script>
    <script src="{{ asset('assets/client/js/wow.js') }}"></script>
    <script src="{{ asset('assets/client/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/appear.js') }}"></script>
    <script src="{{ asset('assets/client/js/swiper.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/owl.js') }}"></script>
    <script src="{{ asset('assets/client/js/script.js') }}"></script>
    <!-- form submit -->
    <script src="{{ asset('assets/client/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/jquery.form.min.js') }}"></script>
    <script>
        (function($) {
            $("#contact_form").validate({
                submitHandler: function(form) {
                    var form_btn = $(form).find('button[type="submit"]');
                    var form_result_div = '#form-result';
                    $(form_result_div).remove();
                    form_btn.before(
                        '<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>'
                    );
                    var form_btn_old_msg = form_btn.html();
                    form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
                    $(form).ajaxSubmit({
                        dataType: 'json',
                        success: function(data) {
                            if (data.status == 'true') {
                                $(form).find('.form-control').val('');
                            }
                            form_btn.prop('disabled', false).html(form_btn_old_msg);
                            $(form_result_div).html(data.message).fadeIn('slow');
                            setTimeout(function() {
                                $(form_result_div).fadeOut('slow')
                            }, 6000);
                        }
                    });
                }
            });
        })(jQuery);
    </script>
</body>

</html>
