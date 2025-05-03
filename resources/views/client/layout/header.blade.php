  <!-- Main Header-->
  <header class="main-header header-style-one header-style-home5">
      <div class="outer-box">
          <!-- Header Top -->
          <div class="header-top">
              <div class="inner-container">

                  <div class="top-left">
                      <!-- Info List -->
                      <ul class="list-style-one">
                          <li><a
                                  href="https://html.kodesolution.com/cdn-cgi/l/email-protection#fe929f898d9190be9b869f938e929bd09d9193"><span
                                      class="__cf_email__"
                                      data-cfemail="d2b3bebfb3fcbeb3a5a1bdbc92b7aab3bfa2beb7fcb1bdbf">[email&#160;protected]</span></a>
                          </li>
                      </ul>
                  </div>

                  <div class="top-right">
                      <ul class="list-style-two">
                          <li>Mon to Sat: 9:00am – 6:00pm Sun: <a class="active" href="#">Closed</a></li>
                      </ul>
                      <ul class="social-icon-one">
                          <li><a href="#"><span class="icon fa fa-x"></span></a></li>
                          <li><a href="#"><span class="icon fab fa-facebook-f"></span></a></li>
                          <li><a href="#"><span class="icon fab fa-pinterest-p"></span></a></li>
                          <li><a href="#"><span class="icon fab fa-vimeo-v"></span></a></li>
                      </ul>
                  </div>
              </div>
          </div>
          <!-- Header Top -->

          <div class="header-lower">
              <!-- Main box -->
              <div class="main-box">
                  <div class="logo-box">
                      <div class="logo"><a href="/"><img
                                  src="{{ asset('assets/client/images/resource/logo/logo-black-transparent.png') }}"
                                  alt="Logo"></a></div>
                  </div>

                  <!--Nav Box-->
                  <div class="nav-outer">
                      <nav class="nav main-menu">
                          <ul class="navigation">
                              <li><a href="/">Home</a></li>
                              <li class="dropdown"><a href="#">Services</a>
                                  <ul>
                                      <li><a href="#">Personal Color</a></li>
                                      <li><a href="#">Beauty Consultation</a></li>
                                      <li><a href="#">Self Make-up For Daily</a></li>
                                      <li><a href="#">Online Analysis</a></li>
                                  </ul>
                              </li>
                              <li class="dropdown"><a href="#">Products</a>
                                  <ul>
                                      <li><a href="{{ route('product-recommendation.index') }}">Product Recommendation
                                          </a></li>
                                  </ul>
                              </li>
                              <li><a href="/">About</a></li>
                              <li><a href="/">Testimonials</a></li>
                              <li><a href="/">Contact</a></li>
                          </ul>
                      </nav>
                  </div>

                  <!-- Outer Box -->
                  <div class="outer-box">

                      <!-- Header Search -->
                      <button class="ui-btn search-btn">
                          <i class="icon fal fa-search"></i>
                      </button>

                      <div class="divider"></div>

                      <!-- Button -->
                      <div class="btn-box d-none d-xl-block">
                          <a href="#" class="theme-btn btn-style-one"><span class="btn-title">Book
                                  Now</span></a>
                      </div>

                      <!-- Mobile Nav toggler -->
                      <div class="mobile-nav-toggler ms-0 ms-sm-4"><span class="icon lnr-icon-bars"></span></div>
                  </div>
              </div>
          </div>
      </div>

      <!-- Mobile Menu  -->
      <div class="mobile-menu">
          <div class="menu-backdrop"></div>
          <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
          <nav class="menu-box">
              <div class="upper-box">
                  <div class="nav-logo"><a href="/"><img
                              src="{{ asset('assets/client/images/resource/logo/logo-black-transparent.png') }}"
                              alt=""></a></div>
                  <div class="close-btn"><i class="icon fa fa-times"></i></div>
              </div>
              <ul class="navigation clearfix">
                  <!--Keep This Empty / Menu will come through Javascript-->
              </ul>
              <ul class="contact-list-one">
                  <li>
                      <i class="icon lnr-icon-envelope1"></i>
                      <span class="title">Send Email</span>
                      <div class="text"><a href="javascript:void(0);"><span class="__cf_email__"
                                  data-cfemail="d2b3bebfb3fcbeb3a5a1bdbc92b7aab3bfa2beb7fcb1bdbf">amandashadeology@gmail.com
                              </span></a>
                      </div>
                  </li>
              </ul>
              <ul class="social-links">
                  <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                  {{-- <li><a href="#"><i class="icon fab fa-facebook-f"></i></a></li>
                  <li><a href="#"><i class="icon fab fa-pinterest-p"></i></a></li>
                  <li><a href="#"><i class="icon fab fa-vimeo-v"></i></a></li> --}}
              </ul>
          </nav>
      </div><!-- End Mobile Menu -->

      <!-- Header Search -->
      <div class="search-popup">
          <span class="search-back-drop"></span>
          <button class="close-search"><span class="fa fa-times"></span></button>

          <div class="search-inner">
              <form method="post" action="#">
                  <div class="form-group">
                      <input type="search" name="search-field" value="" placeholder="Search..." required="">
                      <button type="submit"><i class="fa fa-search"></i></button>
                  </div>
              </form>
          </div>
      </div>
      <!-- End Header Search -->

      <!-- Sticky Header  -->
      <div class="sticky-header">
          <div class="auto-container">
              <div class="inner-container">
                  <!--Logo-->
                  <div class="logo">
                      <a href="/"><img
                              src="{{ asset('assets/client/images/resource/logo/logo-black-transparent.png') }}"
                              alt=""></a>
                  </div>

                  <!--Right Col-->
                  <div class="nav-outer">
                      <!-- Main Menu -->
                      <nav class="main-menu">
                          <div class="navbar-collapse show collapse clearfix">
                              <ul class="navigation clearfix">
                                  <!--Keep This Empty / Menu will come through Javascript-->
                              </ul>
                          </div>
                      </nav><!-- Main Menu End-->

                      <!--Mobile Navigation Toggler-->
                      <div class="mobile-nav-toggler"><span class="icon lnr-icon-bars"></span></div>
                  </div>
              </div>
          </div>
      </div>
      <!-- End Sticky Menu -->
  </header>
  <!--End Main Header -->
