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
              <a href="https://www.youtube.com/watch?v=MFLVmAE4cqg"
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
                          <a href="service.html"
                              class="cursor-small btn btn-main hover-style-two button--stroke d-inline-flex align-items-center justify-content-center tw-gap-5 group active--translate-y-2"
                              data-block="button">
                              <span class="button__flair"></span>
                              <span class="button__label">View services</span>
                              <span
                                  class="tw-w-7 tw-h-7 bg-white text-main-600 tw-text-sm tw-rounded d-flex justify-content-center align-items-center position-relative group-hover-bg-main-600 group-hover-text-white tw-duration-500">
                                  <i class="ph-bold ph-check"></i>
                              </span>
                          </a>
                          <a href="about.html"
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
  @endsection
