@extends('client.layout.main')
@section('content')
    <!-- Banner Start -->
    @include('client.components.banner.banner')
    <!-- End Banner End -->

    <!-- Service Section -->
    @include('client.components.services.service')
    <!-- End Service Section -->

    <!-- Color Pallate Section -->
    @include('client.components.color-pallate.color-pallate')
    <!-- End Color Pallate Section -->

    <!-- Brand Section -->
    @include('client.components.brand.brand')
    <!-- End Brand Section -->

    <!-- About Section -->
    @include('client.components.about.about')
    <!-- About Section -->

    <!-- Product Section -->
    @include('client.components.gallery.gallery')
    <!-- End Product Section -->

    <!-- Fun Fact Section -->
    @include('client.components.fun-fact.fun-fact')
    <!-- End Fun Fact Section -->

    <!-- Package Section -->
    @include('client.components.package.package')
    <!-- End Package Section-->

    <!-- Testimonial Section -->
    @include('client.components.testimonials.testimonials')
    <!-- End Testimonial Section-->

    <!-- Contact Section -->
    <section class="contact-section-two home7-style pt-90 pb-90">
        <div class="bg bg-image" style="background-image: url(images/background/home7-contact-bg.jpg)"></div>
        <div class="shape-1 bounce-x"></div>
        <div class="auto-container">
            <div class="outer-box">
                <div class="row">

                    <!-- Content Column -->
                    <div class="content-column col-lg-5 pr-md-10 pl-md--0 pe-0">
                        <div class="inner-column wow fadeInRight">
                            <div class="inner-content">
                                <div class="bg bg-image"
                                    style="background-image: url(images/background/home7-contact-content-bg.png)"></div>
                                <h2 class="title">Come and immerse yourself in genuine delight.</h2>
                                <a href="#" class="theme-btn btn-style-one">Book Now</a>
                            </div>
                        </div>
                    </div>

                    <!-- Form Column -->
                    <div class="form-column col-lg-7 ps-0">
                        <div class="inner-column">
                            <!-- Contact Form -->
                            <div class="contact-form-two wow fadeInLeft">
                                <h3 class="title text-start mb-10">Make Appointment</h3>
                                <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed <br
                                        class="d-none d-xl-block" /> do eiusmod tempor incididunt</p>

                                <!--Contact Form-->
                                <form method="post" action="#" id="contact-form">
                                    <div class="row gx-3">
                                        <div class="form-group col-md-6">
                                            <input type="text" name="first_name" placeholder="First Name" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" name="email" placeholder="Email" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" name="phone" placeholder="Phone Number" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" name="company" placeholder="Select Subject" required>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <input type="date" name="address" placeholder="Select Date & Time" required>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <textarea name="form_message" class="form-control required" rows="4" placeholder="Message"></textarea>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <button type="submit" class="theme-btn btn-style-one w-auto"
                                                name="submit-form"><span class="btn-title">SUBMIT REQUEST</span></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--End Contact Form -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Section -->
@endsection
