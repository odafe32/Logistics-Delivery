  @extends('layout.home_layout')
  @section('content')
      <!-- ================================== Banner Three Section start ============================= -->
      <section class="banner-three bg-img overflow-hidden position-relative z-1"
          data-background-image="assets/images/thumbs/banner-three-img.png">
          <img src="assets/images/thumbs/only-track.png" alt=""
              class="only-track position-absolute  tw-start-0 bottom-0 max-w-64-percent tw-z-2">
          <img src="assets/images/shapes/curve-road.png" alt=""
              class="curve-road position-absolute tw-end-0 bottom-0 tw-mb-142-px">
          <img src="assets/images/shapes/banner--three-plane.png" alt=""
              class="banner-three-plane position-absolute tw-end-0 top-0 tw-mt-254-px">


          <div class="circle-image before-bg-main-600 position-absolute max-w-430-px tw-max-h-430-px rounded-circle w-100 h-100 border border-white border-4 tw-start-0 tw-top-30-percent tw-ms-290-px d-lg-block d-none"
              data-aos="zoom-in" data-aos-duration="1500">
              <img src="assets/images/thumbs/plane-track-img.png" alt="" class="w-100 h-100 object-fit-cover">
              <a href=""
                  class="play-button bg-inherit-animation cursor-big tw-w-75-px tw-h-75-px d-inline-flex justify-content-center align-items-center bg-main-600 text-white hover-text-main-two-700 rounded-circle tw-text-xl position-absolute tw-start-50 tw--translate-middle top-50">
                  <i class="ph-fill ph-play"></i>
              </a>
          </div>


          <div class="container">
              <div class="row gy-4 justify-content-end">
                  <div class="col-lg-7 position-relative z-2">
                      <span
                          class="splitTextStyleTwo cursor-small text-white fw-bold fst-italic tw-text-lg text-decoration-underline tw-mb-5">Safe
                          Transportation & Logistics</span>
                      <h1 class="splitTextStyleOne cursor-big text-white tw-text-80-px">Flexible logistics Fast Delivery, &
                          secure package</h1>

                      <div class="d-flex tw-gap-11 tw-mt-13 flex-wrap">
                          <a href="{{ url('about') }}"
                              class="cursor-small btn btn-main hover-style-two button--stroke d-inline-flex align-items-center justify-content-center tw-gap-5 group active--translate-y-2"
                              data-block="button">
                              <span class="button__flair"></span>
                              <span class="button__label">View services</span>
                              <span
                                  class="tw-w-7 tw-h-7 bg-white text-main-600 tw-text-sm tw-rounded d-flex justify-content-center align-items-center position-relative group-hover-bg-main-600 group-hover-text-white tw-duration-500">
                                  <i class="ph-bold ph-check"></i>
                              </span>
                          </a>
                          <a href="{{ url('about') }}"
                              class="cursor-small d-inline-flex align-items-center tw-gap-2 text-white fw-semibold hover-text-main-600 group active--translate-y-2"
                              data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                              Who we are
                              <span class="text-main-600 d-flex group-hover-text-white tw-duration-200 tw-text-base">
                                  <i class="ph-fill ph-caret-circle-right"></i>
                              </span>
                          </a>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!-- ================================== Banner Three Section End ============================= -->

      <!-- Hero Section -->
      <section class="hero-section tw-mt-32 tw-mb-20">
          <div class="container">
              <div class="row align-items-center g-5">
                  <div class="col-lg-6">
                      <div class="pe-lg-5">
                          <span class="badge bg-main-600 text-white px-3 py-2 mb-3">About Us</span>
                          <h1 class="display-4 fw-bold text-main-two-600 mb-4">Leading the Future of Global Logistics</h1>
                          <p class="lead text-neutral-600 mb-4">Setting the standard in logistics excellence since 1995,
                              connecting businesses worldwide with reliable shipping solutions.</p>
                          <a href="{{ url('/contact') }}" class="btn btn-main hover-style-two">Get Started</a>
                      </div>
                  </div>
                  <div class="col-lg-6">
                      <div class="position-relative">
                          <img src="https://dotcomaramexprod.blob.core.windows.net/default/images/default-source/default-album/faq.png?sfvrsn=b884f419_0"
                              alt="About Us" class="img-fluid tw-rounded-2xl shadow-lg">
                          <div class="position-absolute bottom-0 start-0 bg-white p-4 m-4 tw-rounded-xl shadow-lg">
                              <div class="d-flex align-items-center gap-3">
                                  <i class="ph-fill ph-truck text-main-600 display-6"></i>
                                  <div>
                                      <h4 class="fw-bold mb-1">25+ Years</h4>
                                      <p class="mb-0 text-neutral-600">Of Excellence</p>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>

      <!-- Stats Section -->
      <section class="stats-section bg-neutral-50 tw-py-20 " style="margin-top: 80px; margin-bottom:80px;">
          <div class="container" style="padding: 80xpx 0;">
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <div class="row g-4">
                  <div class="col-lg-3 col-sm-6">
                      <div class="bg-white p-4 tw-rounded-xl text-center h-100 shadow-sm">
                          <h2 class="display-4 fw-bold text-main-600 mb-2">150+</h2>
                          <p class="mb-0 text-neutral-600 fw-medium">Countries Served</p>
                      </div>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <div class="bg-white p-4 tw-rounded-xl text-center h-100 shadow-sm">
                          <h2 class="display-4 fw-bold text-main-600 mb-2">5M+</h2>
                          <p class="mb-0 text-neutral-600 fw-medium">Shipments Delivered</p>
                      </div>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <div class="bg-white p-4 tw-rounded-xl text-center h-100 shadow-sm">
                          <h2 class="display-4 fw-bold text-main-600 mb-2">10K+</h2>
                          <p class="mb-0 text-neutral-600 fw-medium">Business Clients</p>
                      </div>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <div class="bg-white p-4 tw-rounded-xl text-center h-100 shadow-sm">
                          <h2 class="display-4 fw-bold text-main-600 mb-2">98%</h2>
                          <p class="mb-0 text-neutral-600 fw-medium">Customer Satisfaction</p>
                      </div>
                  </div>
              </div>
              <br>
              <br>
              <br>
              <br>
              <br>
          </div>
      </section>

      <br>

      <!-- Mission Section -->
      <section class="mission-section tw-py-20">
          <div class="container" style="padding-bottom: 60px;">
              <div class="row align-items-center g-5">
                  <div class="col-lg-6">
                      <img src="https://www.aramex.com/Sitefinity/WebsiteTemplates/aramex/App_Themes/aramex/Images/webp/Desktop/s-amp-s-one.webp"
                          alt="Our Mission" class="img-fluid tw-rounded-2xl shadow-lg">
                  </div>
                  <div class="col-lg-6">
                      <div class="ps-lg-5">
                          <span class="badge bg-main-600 text-white px-3 py-2 mb-3">Our Mission</span>
                          <h2 class="display-5 fw-bold text-main-two-600 mb-4">Revolutionizing Global Commerce</h2>
                          <p class="lead text-neutral-600 mb-5">Empowering businesses with seamless, efficient, and
                              sustainable logistics solutions that drive growth and success.</p>

                          <div class="row g-4">
                              <div class="col-sm-6">
                                  <div class="d-flex gap-3">
                                      <i class="ph-fill ph-rocket text-main-600 display-6"></i>
                                      <div>
                                          <h4 class="fw-bold mb-2">Innovation</h4>
                                          <p class="text-neutral-600 mb-0">Leading-edge solutions for modern logistics</p>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-sm-6">
                                  <div class="d-flex gap-3">
                                      <i class="ph-fill ph-leaf text-main-600 display-6"></i>
                                      <div>
                                          <h4 class="fw-bold mb-2">Sustainability</h4>
                                          <p class="text-neutral-600 mb-0">Committed to eco-friendly practices</p>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>

      <!-- Values Section -->
      <section class="values-section bg-neutral-50 tw-py-20">
          <div class="container" style="margin-top: 80px; margin-bottom:80px;">
              <div class="text-center mb-5">
                  <span class="badge bg-main-600 text-white px-3 py-2 mb-3">Our Values</span>
                  <h2 class="display-5 fw-bold text-main-two-600 mb-4">What Drives Us Forward</h2>
                  <p class="lead text-neutral-600 mx-auto" style="max-width: 700px;">Our core values shape every decision
                      and service we provide.</p>
              </div>

              <div class="row g-4">
                  <div class="col-lg-4">
                      <div class="bg-white p-5 tw-rounded-xl h-100 shadow-sm text-center">
                          <i class="ph-fill ph-handshake text-main-600 display-4 mb-4"></i>
                          <h3 class="fw-bold mb-3">Trust & Reliability</h3>
                          <p class="text-neutral-600 mb-0">Building lasting relationships through consistent, dependable
                              service.</p>
                      </div>
                  </div>
                  <div class="col-lg-4">
                      <div class="bg-white p-5 tw-rounded-xl h-100 shadow-sm text-center">
                          <i class="ph-fill ph-chart-line-up text-main-600 display-4 mb-4"></i>
                          <h3 class="fw-bold mb-3">Excellence</h3>
                          <p class="text-neutral-600 mb-0">Striving for perfection in every shipment and interaction.</p>
                      </div>
                  </div>
                  <div class="col-lg-4">
                      <div class="bg-white p-5 tw-rounded-xl h-100 shadow-sm text-center">
                          <i class="ph-fill ph-lightbulb text-main-600 display-4 mb-4"></i>
                          <h3 class="fw-bold mb-3">Innovation</h3>
                          <p class="text-neutral-600 mb-0">Continuously evolving to meet changing market needs.</p>
                      </div>
                  </div>
              </div>
          </div>
      </section>
  @endsection
