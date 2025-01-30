@extends('layout.home_layout')
@section('content')
    <style>
        :root {
            --aramex-red: #E31837;
            --aramex-dark: #d31730;
        }

        body {
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            min-height: 100vh;
            overflow-x: hidden;
        }

        .tracking-section {
            min-height: 100vh;
            padding: 4rem 0;
            position: relative;
        }

        /* Background Elements */
        .bg-circle {
            position: absolute;
            border-radius: 50%;
            z-index: 0;
        }

        /* .bg-circle-1 {
            width: 400px;
            height: 400px;
            background: linear-gradient(45deg, rgba(227, 24, 55, 0.05) 0%, rgba(227, 24, 55, 0.02) 100%);
            top: -100px;
            right: -100px;
        } */

        .bg-circle-2 {
            width: 300px;
            height: 300px;
            border: 2px dashed rgba(227, 24, 55, 0.1);
            bottom: -50px;
            left: -50px;
        }

        /* Left Side Content */
        .tracking-content {
            position: relative;
            z-index: 1;
        }

        .tracking-title {
            font-size: 4rem;
            font-weight: 800;
            color: var(--aramex-red);
            line-height: 1.2;
            margin-bottom: 2rem;
            animation: slideIn 1s ease-out;
        }

        .tracking-form {
            background: white;
            padding: 2rem;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.05);
            animation: fadeIn 1s ease-out;
        }

        .input-container {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .tracking-input {
            width: 100%;
            padding: 1.2rem 1.2rem 1.2rem 3.5rem;
            border: 2px solid #eee;
            border-radius: 12px;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }

        .tracking-input:focus {
            outline: none;
            border-color: var(--aramex-red);
            background: white;
            box-shadow: 0 0 0 4px rgba(227, 24, 55, 0.1);
        }

        .input-icon {
            position: absolute;
            left: 1.2rem;
            top: 50%;
            transform: translateY(-50%);
            color: #adb5bd;
        }

        .btn-track {
            background: var(--aramex-red);
            color: white;
            border: none;
            padding: 1.2rem 2.5rem;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            width: 100%;
        }

        .btn-track:hover {
            background: var(--aramex-dark);
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(227, 24, 55, 0.2);
        }

        .helper-text {
            color: #6c757d;
            margin-top: 1rem;
            font-size: 0.9rem;
        }

        /* Right Side Images */
        .images-gallery {
            position: relative;
            height: 600px;
            perspective: 1500px;
        }

        .gallery-image {
            position: absolute;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .gallery-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .image-main {
            width: 80%;
            height: 450px;
            right: 0;
            top: 0;
            z-index: 3;
            transform: rotate(2deg);
        }

        .image-top {
            width: 60%;
            height: 300px;
            left: 0;
            top: 50px;
            z-index: 2;
            transform: rotate(-4deg) translateX(-30px);
        }

        .image-bottom {
            width: 70%;
            height: 350px;
            right: 50px;
            bottom: 0;
            z-index: 1;
            transform: rotate(6deg) translateY(20px);
        }

        .gallery-image:hover {
            transform: scale(1.05) rotate(0deg) !important;
            z-index: 4;
        }

        /* Animated Elements */
        .floating {
            animation: float 6s infinite ease-in-out;
        }

        .dot-pattern {
            position: absolute;
            right: -20px;
            bottom: -20px;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 8px;
            z-index: 5;
        }

        .dot {
            width: 8px;
            height: 8px;
            background: var(--aramex-red);
            border-radius: 50%;
            opacity: 0.2;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0) rotate(var(--rotation));
            }

            50% {
                transform: translateY(-20px) rotate(var(--rotation));
            }
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Stats Section */
        .stats-container {
            margin-top: 4rem;
            padding: 2rem;
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.05);
        }

        .stat-item {
            text-align: center;
            padding: 1.5rem;
            border-right: 1px solid #eee;
        }

        .stat-item:last-child {
            border-right: none;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--aramex-red);
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: #6c757d;
            font-size: 0.9rem;
        }

        @media (max-width: 992px) {
            .tracking-title {
                font-size: 3rem;
            }

            .images-gallery {
                height: 500px;
                margin-top: 3rem;
            }

            .image-main {
                width: 90%;
                height: 350px;
            }

            .image-top {
                width: 70%;
                height: 250px;
            }

            .image-bottom {
                width: 80%;
                height: 300px;
            }

            .stat-item {
                border-right: none;
                border-bottom: 1px solid #eee;
                padding: 1rem;
            }

            .stat-item:last-child {
                border-bottom: none;
            }
        }
    </style>
    {{-- track shipment --}}
    <section class="tracking-section">
        <!-- Background Elements -->
        <div class="bg-circle bg-circle-1"></div>
        <div class="bg-circle bg-circle-2"></div>

        <div class="container">
            <div class="row align-items-center">
                <!-- Left Column -->
                <div class="col-lg-5 tracking-content">
                    <h1 class="tracking-title">Track your shipment</h1>

                    <div class="tracking-form">
                        <form action="{{ route('track-shipment.submit') }}" method="POST">
                            @csrf
                            <div class="input-container">
                                <span class="input-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z" />
                                    </svg>
                                </span>
                                <input type="text"
                                    name="tracking_number"
                                    class="tracking-input"
                                    placeholder="Enter your tracking number"
                                    id="trackingInput"
                                    required>
                            </div>

                            <button type="submit" class="btn-track">
                                Track Shipment
                            </button>
                        </form>
                    </div>

                    @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <!-- Stats Section -->
                    <div class="stats-container">
                        <div class="row">
                            <div class="col-md-4 stat-item">
                                <div class="stat-number">98%</div>
                                <div class="stat-label">On-time Delivery</div>
                            </div>
                            <div class="col-md-4 stat-item">
                                <div class="stat-number">220+</div>
                                <div class="stat-label">Countries Served</div>
                            </div>
                            <div class="col-md-4 stat-item">
                                <div class="stat-number">24/7</div>
                                <div class="stat-label">Customer Support</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Image Gallery -->
                <div class="col-lg-7">
                    <div class="images-gallery">
                        <div class="gallery-image image-main floating" style="--rotation: 2deg;">
                            <img src="{{ url('assets/images/thumbs/banner-img3.png') }}"
                                alt="{{ config('website.name') }} Delivery Service">
                        </div>
                        <div class="gallery-image image-top floating" style="--rotation: -4deg;">
                            <img src="{{ url('assets/images/thumbs/blog-page-img3.png') }}"
                                alt="{{ config('website.name') }} Global Network">
                        </div>
                        <div class="gallery-image image-bottom floating" style="--rotation: 6deg;">
                            <img src="{{ url('assets/images/thumbs/blog-two-img3.png') }}"
                                alt="{{ config('website.name') }} Shipping">
                        </div>

                        <!-- Dot Pattern -->
                        <div class="dot-pattern">
                            <!-- 4x4 grid of dots -->
                            <div class="dot"></div>
                            <div class="dot"></div>
                            <div class="dot"></div>
                            <div class="dot"></div>
                            <div class="dot"></div>
                            <div class="dot"></div>
                            <div class="dot"></div>
                            <div class="dot"></div>
                            <div class="dot"></div>
                            <div class="dot"></div>
                            <div class="dot"></div>
                            <div class="dot"></div>
                            <div class="dot"></div>
                            <div class="dot"></div>
                            <div class="dot"></div>
                            <div class="dot"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- end tracking --}}
    <!-- ======================================== Section Features section start ===================================== -->
    <section class="features bg-neutral-50 bg-img" data-background-image="assets/images/shapes/features-bg.png">
        <div class="row g-0 features-item-wrapper">
            <div class="col-lg-3 col-sm-6 col-xs-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                <div class="features-item animation-item p-80-px tw-duration-300 position-relative h-100">
                    <span
                        class="fw-bold tw-text-xl text-main-two-600 position-absolute top-0 tw-end-0 tw-mt-12 tw-me-12 font-heading cursor-small">01</span>
                    <span class="pb-60-px cursor-big animate__wobble">
                        <img src="assets/images/icons/features-icon1.svg" alt="image">
                    </span>
                    <h5 class="tw-mb-7 cursor-big splitTextStyleTwo">Warehouse Facility</h5>
                    <p class="text-neutral-1000 cursor-small">Temperate ocean-bass sea chub unicorn treefish eulachon
                        tidewater goby.</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                <div
                    class="features-item animation-item p-80-px tw-duration-300 position-relative h-100 bg-white common-shadow-two">
                    <span
                        class="fw-bold tw-text-xl text-main-two-600 position-absolute top-0 tw-end-0 tw-mt-12 tw-me-12 font-heading cursor-small">02</span>
                    <span class="pb-60-px cursor-big animate__wobble">
                        <img src="assets/images/icons/features-icon2.svg" alt="image">
                    </span>
                    <h5 class="tw-mb-7 cursor-big splitTextStyleTwo">Cost Effective Pricing</h5>
                    <p class="text-neutral-1000 cursor-small">Temperate ocean-bass sea chub unicorn treefish eulachon
                        tidewater goby.</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                <div class="features-item animation-item p-80-px tw-duration-300 position-relative h-100">
                    <span
                        class="fw-bold tw-text-xl text-main-two-600 position-absolute top-0 tw-end-0 tw-mt-12 tw-me-12 font-heading cursor-small">03</span>
                    <span class="pb-60-px cursor-big animate__wobble">
                        <img src="assets/images/icons/features-icon3.svg" alt="image">
                    </span>
                    <h5 class="tw-mb-7 cursor-big splitTextStyleTwo">Air Freight Facility</h5>
                    <p class="text-neutral-1000 cursor-small">Temperate ocean-bass sea chub unicorn treefish eulachon
                        tidewater goby.</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                <div class="features-item animation-item p-80-px tw-duration-300 position-relative h-100">
                    <span
                        class="fw-bold tw-text-xl text-main-two-600 position-absolute top-0 tw-end-0 tw-mt-12 tw-me-12 font-heading cursor-small">04</span>
                    <span class="pb-60-px cursor-big animate__wobble">
                        <img src="assets/images/icons/features-icon4.svg" alt="image">
                    </span>
                    <h5 class="tw-mb-7 cursor-big splitTextStyleTwo">Container Delivery</h5>
                    <p class="text-neutral-1000 cursor-small">Temperate ocean-bass sea chub unicorn treefish eulachon
                        tidewater goby.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- ======================================== Section Features section End ===================================== -->

    <!-- ================================== About Section Start ======================================= -->
    <section class="about py-140 position-relative max-lg-overflow-hidden">
        <img src="{{ url('assets/images/shapes/about-plane.png') }} " alt="image"
            class="cursor-big about-plane position-absolute tw-start-0 top-50">
        <img src="{{ url('assets/images/thumbs/truck-head.png') }} " alt="image"
            class="truck-head cursor-big position-absolute tw-end-0 d-xxl-block d-none">

        <div class="container">
            <div class="row gy-5 flex-wrap-reverse">
                <div class="col-lg-5 pe-xl-5">
                    <div class="position-relative tw-pb-11 h-100">
                        <div class="position-relative" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="200">
                            <img src="{{ url('assets/images/thumbs/about-img.png') }}" alt="image"
                                class="w-100 h-100 object-fit-cover">
                            <span
                                class="cursor-big tw-w-75-px tw-h-75-px bg-main-600 d-flex justify-content-center align-items-center rounded-circle position-absolute tw-end-0 bottom-0 tw-me-305 tw-mb-305 d-lg-flex d-none">
                                <img src="{{ url('assets/images/icons/play-bar.svg') }}" alt="image">
                            </span>
                        </div>

                        <div class="positioned-image bg-white cursor-big common-shadow-four rounded-circle d-flex justify-content-center align-items-center position-absolute top-0 tw-start-0 tw-p-9"
                            data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="200">
                            <img src="{{ url('assets/images/thumbs/glob-track.png') }} " alt="image">
                        </div>

                        <div class="tw-p-10 tw-pe-130-px tw--translate-x-30-px bg-main-600 position-absolute tw-start-0 bottom-0 tw--ms-30-px"
                            data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="200">
                            <h1 class="text-white tw-mb-4 cursor-big">25+</h1>
                            <div class="d-flex flex-column tw-gap-1 align-items-start">
                                <span class="text-white fw-medium cursor-small">Years Of Experience</span>
                                <img src="{{ url('assets/images/shapes/line-shape.png') }} " alt="image">
                            </div>
                            <div
                                class="cursor-small before-border position-relative tw-p-205 bg-white d-inline-flex align-items-start tw-gap-1 position-absolute top-0 tw-end-0 tw-mt-205 tw-me-205 z-1">
                                <span class="tw-text-xl fw-semibold text-main-600">4.9</span>
                                <span class="tw-text-xl fw-semibold text-main-600 d-flex tw--translate-y-4-px"><i
                                        class="ph-fill ph-star"></i></span>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-7 ps-lg-5">
                    <div class="">
                        <span
                            class="splitTextStyleTwo cursor-small tw-text-xl fw-bold fst-italic text-decoration-underline text-main-600 tw-mb-305">Safe
                            Transportation & Logistics</span>
                        <h1 class="splitTextStyleOne cursor-big tw-mb-8">Modern transport system & secure packaging</h1>
                        <p class="cursor-small text-neutral-900 tw-ps-205 border-start border-main-600 border-2">Temperate
                            ocean-bass sea chub unicorn fish treefish eulachon tidewater goby. Flier, bighe carp Devario
                            shortnose sucker platy smalleye</p>

                        <div class="tw-mt-9">
                            <div class="row gy-4">
                                <div class="col-sm-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                                    <div class="animation-item d-flex align-items-center tw-gap-6">
                                        <span class="cursor-big animate__heartBeat">
                                            <img src="assets/images/icons/about-icon1.svg" alt="">
                                        </span>
                                        <h6 class="cursor-big">Air Freight <br> Transportation</h6>
                                    </div>
                                    <p class="cursor-small text-neutral-1000 tw-mt-605 line-clamp-2">Temperate ocean-bass
                                        sea chub bass sea chub treefish eulachon tidewater goby.</p>
                                </div>
                                <div class="col-sm-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                                    <div class="animation-item d-flex align-items-center tw-gap-6">
                                        <span class="cursor-big animate__heartBeat">
                                            <img src="assets/images/icons/about-icon2.svg" alt="">
                                        </span>
                                        <h6 class="cursor-big">Ocean Freight
                                            Transportation</h6>
                                    </div>
                                    <p class="cursor-small text-neutral-1000 tw-mt-605 line-clamp-2">Temperate ocean-bass
                                        sea chub bass sea chub
                                        treefish eulachon tidewater goby.</p>
                                </div>
                            </div>
                        </div>

                        <span class="tw-my-7 border-bottom border-neutral-100 d-block"></span>

                        <ul class="cursor-small d-flex flex-column tw-gap-2">
                            <li class="d-flex align-items-center tw-gap-4" data-aos="fade-up" data-aos-duration="1000"
                                data-aos-delay="200">
                                <span class="text-main-600 d-flex"><i class="ph-bold ph-check"></i></span>
                                <span class="text-neutral-1000 fw-medium">We approached WiaTech with complex project
                                    deliver</span>
                            </li>
                            <li class="d-flex align-items-center tw-gap-4" data-aos="fade-up" data-aos-duration="1000"
                                data-aos-delay="400">
                                <span class="text-main-600 d-flex"><i class="ph-bold ph-check"></i></span>
                                <span class="text-neutral-1000 fw-medium">Awards Winning IT Solutions Company</span>
                            </li>
                        </ul>

                        <div class="d-flex align-items-center tw-gap-56-px tw-mt-10 flex-wrap">
                            <a href="{{ url('/service') }}"
                                class="cursor-small btn btn-main-two hover-style-three button--stroke d-inline-flex align-items-center justify-content-center tw-gap-5 group rounded-0"
                                data-block="button" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                                <span class="button__flair"></span>
                                <span class="button__label">View services</span>
                                <span
                                    class="tw-w-7 tw-h-7 bg-white text-main-600 tw-text-sm tw-rounded d-flex justify-content-center align-items-center position-relative tw-duration-500">
                                    <i class="ph-bold ph-check"></i>
                                </span>
                            </a>

                            <div class="d-flex align-items-center tw-gap-205" data-aos="fade-up" data-aos-duration="1000"
                                data-aos-delay="400">
                                <span
                                    class="tw-w-15 tw-h-15 rounded-circle tw-p-2 bg-white common-shadow-three flex-shrink-0">
                                    <img src="assets/images/thumbs/user-img.png" alt="">
                                </span>
                                <div class="d-flex flex-column tw-gap-1 cursor-small">
                                    <img src="{{ url('assets/images/thumbs/signature.png') }}" alt="">
                                    <span class="fw-semibold tw-text-sm text-main-600">Ceo & Founder</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================================== About Section End ======================================= -->
    <!-- ============================== service Section Start ================================= -->
    <!-- Service Section Start -->
    <section class="{{ $service_section['background']['class'] }}">
        <img src="{{ $service_section['background']['pattern_image']['src'] }}" alt=""
            class="{{ $service_section['background']['pattern_image']['class'] }}">

        <div class="container">
            <div class="{{ $service_section['header']['container_class'] }}">
                <span class="{{ $service_section['header']['subtitle']['class'] }}">
                    {{ $service_section['header']['subtitle']['text'] }}
                </span>
                <h1 class="{{ $service_section['header']['title']['class'] }}">
                    {{ $service_section['header']['title']['text'] }}
                </h1>
            </div>
        </div>

        <div class="{{ $service_section['content']['container_class'] }}">
            <div class="{{ $service_section['content']['main_content']['class'] }}">
                <img src="{{ $service_section['content']['main_content']['background_image']['src'] }}" alt=""
                    class="{{ $service_section['content']['main_content']['background_image']['class'] }}">

                <div class="container">
                    <div class="row gy-4 align-items-end">
                        <!-- Navigation Pills -->
                        <div class="col-xl-5" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="200">
                            <div class="pt-120">
                                <div class="bg-neutral-50 px-lg-5 tw-px-6 tw-pt-76-px tw-pb-15 rectangle-shape">
                                    <ul class="common-tab nav nav-pills d-flex flex-column tw-gap-8" id="pills-tab"
                                        role="tablist">
                                        @foreach ($service_section['content']['tabs']['navigation'] as $tab)
                                            <li class="nav-item" role="presentation">
                                                <button
                                                    class="nav-link cursor-big tw-text-xl animation-item text-main-two-600 hover-text-main-600 active-scale-094 tw-duration-300 fw-semibold tw-px-8 tw-py-4 tw-rounded-lg bg-white w-100 {{ $tab['active'] ? 'active' : '' }}"
                                                    id="{{ $tab['id'] }}" data-bs-toggle="pill"
                                                    data-bs-target="#{{ $tab['target'] }}" type="button" role="tab"
                                                    aria-controls="{{ $tab['target'] }}"
                                                    aria-selected="{{ $tab['active'] ? 'true' : 'false' }}">
                                                    <span class="d-flex align-items-center gap-xxl-5 tw-gap-6 text-start">
                                                        <img src="{{ $tab['icon'] }}" alt=""
                                                            class="d-sm-flex d-none animate__swing">
                                                        <span>{{ $tab['text'] }}</span>
                                                    </span>
                                                </button>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Tab Content -->
                        <div class="col-xl-7 ps-xl-5">
                            <div class="tab-content py-120" id="pills-tabContent">
                                @foreach ($service_section['content']['tabs']['navigation'] as $tab)
                                    <div class="tab-pane fade {{ $tab['active'] ? 'show active' : '' }}"
                                        id="{{ $tab['target'] }}" role="tabpanel" aria-labelledby="{{ $tab['id'] }}"
                                        tabindex="0">
                                        <div class="">
                                            <p class="bg-main-two-900 tw-py-8 tw-pe-8 tw-ps-14 tw-text-lg text-white fw-semibold border-start border-main-600 border-5 tw-mb-11 cursor-small"
                                                data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                                                {{ $service_section['content']['tabs']['content']['common_features']['description'] }}
                                            </p>

                                            <div class="d-flex align-items-center position-relative max-w-620-px"
                                                data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                                                <span
                                                    class="tw-w-90-px tw-h-90-px bg-white rounded-circle d-flex justify-content-center align-items-center position-absolute top-50 tw--translate-y-50 z-2 tw-start-48">
                                                    <img src="{{ $service_section['content']['tabs']['content']['service_image']['icon'] }}"
                                                        alt="">
                                                </span>
                                                <div class="tw--me-32-px d-sm-flex d-none position-relative">
                                                    <img src="{{ $service_section['content']['tabs']['content']['service_image']['main_image'] }}"
                                                        alt="">
                                                </div>

                                                <!-- Features List -->
                                                <div
                                                    class="bg-main-600 tw-h-280-px d-flex justify-content-center align-items-center tw-pe-6 tw-ps-8 position-relative z-1 rectangle-shape-two max-w-286-px w-100">
                                                    <ul class="cursor-small d-flex flex-column tw-gap-2">
                                                        @foreach ($service_section['content']['tabs']['content']['common_features']['features'] as $feature)
                                                            <li class="d-flex align-items-center tw-gap-4">
                                                                <span class="text-white d-flex"><i
                                                                        class="ph-bold ph-check"></i></span>
                                                                <span
                                                                    class="text-white fw-medium">{{ $feature }}</span>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>

                                            <!-- Additional Features -->
                                            <ul class="cursor-small d-flex flex-row flex-wrap tw-gap-8 tw-mt-14">
                                                @foreach ($service_section['content']['tabs']['content']['common_features']['additional_features'] as $feature)
                                                    <li class="d-flex align-items-center tw-gap-4">
                                                        <span class="text-main-600 d-flex"><i
                                                                class="ph-bold ph-check"></i></span>
                                                        <span class="text-white fw-medium">{{ $feature }}</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Service Section End -->
    <!-- ============================== service Section End ================================= -->

    <!-- ================================= Counter Section Start ==================================== -->
    <section class="counter d-lg-flex">

        <div class="w-100 lg-w-50 position-relative">
            <img src="assets/images/shapes/counter-shape.png" alt="" class="position-absolute top-0 tw-start-0">
            <img src="assets/images/thumbs/counter-img.png" alt="" class="w-100 h-100 object-fit-cover">
            <div class="bg-main-two-600 tw-p-10 position-absolute tw-start-0 bottom-0 tw-end-0 z-1">
                <div class="row gy-4">
                    <div class="col-sm-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                        <div class="d-flex align-items-center tw-gap-8">
                            <div>
                                <svg class="radial-progress cursor-big" data-percentage="90" viewBox="0 0 80 80">
                                    <circle class="incomplete" cx="40" cy="40" r="35"></circle>
                                    <circle class="complete" cx="40" cy="40" r="35"
                                        style="stroke-dashoffset: 39.58406743523136;"></circle>
                                    <text class="percentage bg-white" x="50%" y="57%"
                                        transform="matrix(0, 1, -1, 0, 80, 0)">
                                        90%
                                    </text>
                                </svg>
                            </div>
                            <div class="">
                                <h6 class="tw-text-xl text-white tw-mb-4 cursor-big">Container Delivery</h6>
                                <p class="text-white line-clamp-2 max-w-210-px cursor-small">End to end fiber optic cable
                                    nnectivity for stable</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                        <div class="d-flex align-items-center tw-gap-8">
                            <div>
                                <svg class="radial-progress cursor-big" data-percentage="70" viewBox="0 0 80 80">
                                    <circle class="incomplete" cx="40" cy="40" r="35"></circle>
                                    <circle class="complete" cx="40" cy="40" r="35"
                                        style="stroke-dashoffset: 39.58406743523136;"></circle>
                                    <text class="percentage bg-white" x="50%" y="57%"
                                        transform="matrix(0, 1, -1, 0, 80, 0)">
                                        70%
                                    </text>
                                </svg>
                            </div>
                            <div class="">
                                <h6 class="tw-text-xl text-white tw-mb-4 cursor-big">Good Packaging</h6>
                                <p class="text-white line-clamp-2 max-w-210-px cursor-small">End to end fiber optic cable
                                    nnectivity for stable</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-100 tw-ps-110-px lg-w-50 bg-img py-120 position-relative z-1 h-auto d-flex flex-column justify-content-center overflow-hidden"
            data-background-image="{{ url('assets/images/shapes/counter-bg.png') }}">
            <img src="{{ url('assets/images/thumbs/counter-bg-img.png') }}" alt="image"
                class="counter-bg-img position-absolute bottom-0 tw-end-0 z-n1">
            <img src="{{ url('assets/images/thumbs/biman-blue.png') }}" alt="image"
                class="blue-biman position-absolute top-0 tw-end-0 z-n1">

            <div class="max-w-632-px">
                <div class="">
                    <span
                        class="splitTextStyleTwo cursor-small tw-text-xl fw-bold fst-italic text-decoration-underline text-main-600 tw-mb-305">Safe
                        Transportation & Logistics</span>
                    <h1 class="splitTextStyleOne cursor-big tw-mb-8">We Provide Full Assistance in Freight & Warehousing
                    </h1>
                    <p class="cursor-small text-neutral-900">Temperate ocean-bass sea chub unicorn fish treefish eulachon
                        tidewater. Flier, bighe carp Devario shortnose sucker platy smalleye </p>
                </div>
                <div class="tw-mt-10 d-flex flex-wrap tw-gap-5">
                    <div class="text-center flex-grow-1 max-w-190-px w-100 bg-main-600 tw-rounded-lg tw-px-8 tw-py-10"
                        data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                        <h2 class="cursor-big counter font-body text-white tw-mb-2">35+</h2>
                        <p class="cursor-small text-white tw-text-lg">Countries Represented</p>
                    </div>
                    <div class="text-center flex-grow-1 max-w-190-px w-100 bg-main-two-600 tw-rounded-lg tw-px-8 tw-py-10"
                        data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                        <h2 class="cursor-big counter font-body text-white tw-mb-2">853+</h2>
                        <p class="cursor-small text-white tw-text-lg">Projects completed</p>
                    </div>
                    <div class="text-center flex-grow-1 max-w-190-px w-100 bg-main-three-600 tw-rounded-lg tw-px-8 tw-py-10"
                        data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                        <h2 class="cursor-big counter font-body text-main-two-600 tw-mb-2">35+</h2>
                        <p class="cursor-small text-main-two-600 tw-text-lg">Total Revuneue</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================================= Counter Section End ==================================== -->

    <!-- ============================== Key Features section Start ================================== -->
    <section class="key-features py-140 position-relative">
        <img src="assets/images/thumbs/ship.png" alt=""
            class="curve-animation position-absolute top-0 tw-mt-16 tw-end-0 tw-me-14">
        <img src="{{ url('assets/images/shapes/key-features-dotted.png') }}" alt="image"
            class="position-absolute bottom-0 tw-end-0">

        <div class="position-relative z-1">
            <img src="{{ url('assets/images/shapes/key-features-shape.png') }}" alt="image"
                class="position-absolute bottom-0 tw-start-0 w-100 z-n1">

            <div class="container">
                <div class="max-w-840-px mx-auto text-center tw-mb-15">
                    <span
                        class="splitTextStyleTwo cursor-small tw-text-xl fw-bold fst-italic text-decoration-underline text-main-600 tw-mb-305">Safe
                        Transportation & Logistics</span>
                    <h1 class="splitTextStyleOne cursor-big tw-mb-8">Why we are considered the best in business</h1>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-xs-6">
                        <div class="d-flex flex-column tw-gap-56-px">
                            <div class="animation-item" data-aos="fade-up" data-aos-duration="1000"
                                data-aos-delay="100">
                                <span class="tw-mb-6 cursor-small animate__flipInY">
                                    <img src="{{ url('assets/images/icons/key-features-icon1.svg') }}" alt="image">
                                </span>
                                <h5 class="splitTextStyleTwo tw-mb-5 cursor-big">Decentralized Trade</h5>
                                <p class="text-neutral-1000 cursor-small fw-medium">Temperate ocean-bass sea chub treefish
                                    eulachon tidewater goby.</p>
                            </div>
                            <div class="animation-item" data-aos="fade-up" data-aos-duration="1000"
                                data-aos-delay="300">
                                <span class="tw-mb-6 cursor-small animate__flipInY">
                                    <img src="{{ url('assets/images/icons/key-features-icon2.svg') }}" alt="image">
                                </span>
                                <h5 class="splitTextStyleTwo tw-mb-5 cursor-big">Direct Transport</h5>
                                <p class="text-neutral-1000 cursor-small fw-medium">Temperate ocean-bass sea chub treefish
                                    eulachon tidewater goby.</p>
                            </div>
                            <div class="animation-item" data-aos="fade-up" data-aos-duration="1000"
                                data-aos-delay="500">
                                <span class="tw-mb-6 cursor-small animate__flipInY">
                                    <img src="{{ url('assets/images/icons/key-features-icon3.svg') }}" alt="image">
                                </span>
                                <h5 class="splitTextStyleTwo tw-mb-5 cursor-big">Good Packaging</h5>
                                <p class="text-neutral-1000 cursor-small fw-medium">Temperate ocean-bass sea chub treefish
                                    eulachon tidewater goby.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 d-lg-block d-none">
                        <div
                            class="bg-neutral-50 tw-py-8 tw-px-3 border tw-border-dashed border-neutral-200 tw-rounded-3xl position-relative h-100">
                            <img src="{{ url('assets/images/thumbs/kay-features-img.png') }}" alt=""
                                data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="200">

                            <div
                                class="bg-blur-two tw-py-10 px-lg-5 tw-px-6 position-absolute bottom-0 tw-start-50 translate-50-rotate-10 tw-rounded-32-px min-w-max tw-mb-14">
                                <h1 class="cursor-big">Since <span class="text-main-600">1998</span> </h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-xs-6 ps-xxl-5">
                        <div class="d-flex flex-column tw-gap-56-px">
                            <div class="animation-item" data-aos="fade-up" data-aos-duration="1000"
                                data-aos-delay="200">
                                <span class="tw-mb-6 cursor-small animate__flipInY">
                                    <img src="{{ url('assets/images/icons/key-features-icon4.svg') }}" alt="">
                                </span>
                                <h5 class="splitTextStyleTwo tw-mb-5 cursor-big">Highly Flexible</h5>
                                <p class="text-neutral-1000 cursor-small fw-medium">Temperate ocean-bass sea chub treefish
                                    eulachon tidewater goby.</p>
                            </div>
                            <div class="animation-item" data-aos="fade-up" data-aos-duration="1000"
                                data-aos-delay="400">
                                <span class="tw-mb-6 cursor-small animate__flipInY">
                                    <img src="{{ url('assets/images/icons/key-features-icon5.svg') }}" alt="">
                                </span>
                                <h5 class="splitTextStyleTwo tw-mb-5 cursor-big">Secure Delivery</h5>
                                <p class="text-neutral-1000 cursor-small fw-medium">Temperate ocean-bass sea chub treefish
                                    eulachon tidewater goby.</p>
                            </div>
                            <div class="animation-item" data-aos="fade-up" data-aos-duration="1000"
                                data-aos-delay="600">
                                <span class="tw-mb-6 cursor-small animate__flipInY">
                                    <img src="{{ url('assets/images/icons/key-features-icon6.svg') }}" alt="">
                                </span>
                                <h5 class="splitTextStyleTwo tw-mb-5 cursor-big">Air Freight Facility</h5>
                                <p class="text-neutral-1000 cursor-small fw-medium">Temperate ocean-bass sea chub treefish
                                    eulachon tidewater goby.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ============================== Key Features section End ================================== -->


    <!-- =============================== Transport Way Section Start ================================ -->
    <section class="py-140 bg-img position-relative overflow-hidden"
        data-background-image="{{ url('assets/images/shapes/how-it-work-bg.png') }}">
        <img src="{{ url('assets/images/shapes/plane-down.png') }}" alt="image"
            class="plan-down position-absolute tw-start-0 top-0">
        <img src="{{ url('assets/images/shapes/biman-line.png') }}" alt="image"
            class="cursor-small d-lg-block d-none position-absolute tw-end-0 top-50 tw--translate-y-50 tw-me-15">

        <div class="container">
            <div class="max-w-840-px mx-auto text-center tw-mb-15">
                <span
                    class="splitTextStyleTwo cursor-small tw-text-xl fw-bold fst-italic text-decoration-underline text-main-600 tw-mb-305">Safe
                    Transportation & Logistics</span>
                <h1 class="splitTextStyleOne cursor-big tw-mb-8">Introducing The most Modern way of Transportation</h1>
            </div>

            <div class="how-it-work-item-wrapper">
                <div class="row gy-4">
                    <div class="col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                        <div class="transport-card position-relative">
                            <div class="how-it-work-item animation-item position-relative">
                                <div class="half-bg-white z-1 position-relative">
                                    <span
                                        class="how-it-work-item__icon cursor-big bg-main-600 tw-w-114-px tw-h-114-px d-flex justify-content-center align-items-center rounded-circle tw-ms-10 tw-duration-300">
                                        <img src="{{ url('assets/images/icons/tranport-way-icon1.svg') }}" alt=""
                                            class="animate__heartBeat">
                                    </span>
                                </div>
                                <div class="bg-white tw-px-10 tw-py-15 tw-pt-8 position-relative">
                                    <img src="{{ url('assets/images/shapes/curve-arrow-right.png') }}" alt=""
                                        class="position-absolute top-0 tw-end-0 tw-me-15 animate__wobble__two z-1">
                                    <h5 class="splitTextStyleTwo tw-mb-5 cursor-big max-w-200-px">Replenishment and picking
                                    </h5>
                                    <p class="text-neutral-1000 cursor-small">Temperate ocean-bass sea chub bass sea chub
                                        treefish eulachon tidewater goby.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                        <div class="transport-card position-relative">
                            <div class="how-it-work-item animation-item position-relative">
                                <div class="half-bg-white z-1 position-relative">
                                    <span
                                        class="how-it-work-item__icon cursor-big bg-main-600 tw-w-114-px tw-h-114-px d-flex justify-content-center align-items-center rounded-circle tw-ms-10 tw-duration-300 bg-main-two-600">
                                        <img src="{{ url('assets/images/icons/tranport-way-icon2.svg') }}" alt=""
                                            class="animate__heartBeat">
                                    </span>
                                </div>
                                <div class="bg-white tw-px-10 tw-py-15 tw-pt-8 position-relative">
                                    <img src="assets/images/shapes/curve-arrow-right.png" alt=""
                                        class="position-absolute top-0 tw-end-0 tw-me-15 animate__wobble__two z-1">
                                    <h5 class="splitTextStyleTwo tw-mb-5 cursor-big max-w-200-px">Warehousing operation
                                    </h5>
                                    <p class="text-neutral-1000 cursor-small">Temperate ocean-bass sea chub bass sea chub
                                        treefish eulachon tidewater goby.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                        <div class="transport-card position-relative">
                            <div class="how-it-work-item animation-item position-relative">
                                <div class="half-bg-white z-1 position-relative">
                                    <span
                                        class="how-it-work-item__icon cursor-big bg-main-600 tw-w-114-px tw-h-114-px d-flex justify-content-center align-items-center rounded-circle tw-ms-10 tw-duration-300">
                                        <img src="{{ url('assets/images/icons/tranport-way-icon3.svg') }}" alt=""
                                            class="animate__heartBeat">
                                    </span>
                                </div>
                                <div class="bg-white tw-px-10 tw-py-15 tw-pt-8 position-relative">
                                    <h5 class="splitTextStyleTwo tw-mb-5 cursor-big max-w-200-px">Transportation Processing
                                    </h5>
                                    <p class="text-neutral-1000 cursor-small">Temperate ocean-bass sea chub bass sea chub
                                        treefish eulachon tidewater goby.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- =============================== Transport Way Section End ================================ -->

    <!-- ========================== Contact us section start =============================== -->
    <section class="d-xl-flex">
        <div class="w-100 xl-w-50 position-relative">
            <div class="d-flex h-100">
                <img src="{{ url('assets/images/thumbs/contact-us-img1.png') }}" alt=""
                    class="d-sm-block d-none">
                <div class="text-center animation-item bg-main-two-600 tw-py-12 tw-px-6 flex-grow-1">
                    <span class="cursor-big">
                        <img src="{{ url('assets/images/icons/conact-us-icon1.svg') }}" alt=""
                            class="animate__wobble">
                    </span>
                    <h2 class="splitTextStyleOne text-white tw-mb-8 tw-mt-6 cursor-big">Need Our Services?</h2>
                    <a href="{{ url('/contact') }}"
                        class="cursor-small fw-bold text-white d-inline-flex align-items-center tw-gap-5 hover-text-main-600">
                        Contact With us
                        <img src="{{ url('assets/images/icons/arrow-right.svg') }}" alt="">
                    </a>
                </div>
            </div>
        </div>
        <div class="w-100 xl-w-50 position-relative">
            <div class="d-sm-flex">
                <div class="position-relative">
                    <img src="{{ url('assets/images/thumbs/contact-us-img2.png') }}" alt=""
                        class="w-100 h-100 object-fit-cover">
                    <a href="https://www.youtube.com/watch?v=MFLVmAE4cqg"
                        class="play-button circle-border bg-inherit-animation cursor-big tw-w-75-px tw-h-75-px d-flex justify-content-center align-items-center bg-main-three-600 text-main-two-600 hover-text-main-two-700 active-scale-094 rounded-circle tw-text-xl position-absolute top-50 tw-start-50 translate-middle">
                        <i class="ph-fill ph-play"></i>
                    </a>
                </div>
                <div class="text-center animation-item bg-main-600 tw-py-12 tw-px-6 flex-grow-1">
                    <span class="cursor-big">
                        <img src="{{ url('assets/images/icons/conact-us-icon2.svg') }}" alt=""
                            class="animate__wobble">
                    </span>
                    <h2 class="splitTextStyleOne text-white tw-mb-8 tw-mt-6 cursor-big">Discuss With Agents</h2>
                    <a href="{{ url('/contact') }}"
                        class="cursor-small fw-bold text-white d-inline-flex align-items-center tw-gap-5 hover-text-main-two-600">
                        Contact With us
                        <img src="{{ url('assets/images/icons/arrow-right.svg') }}" alt="">
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- ========================== Contact us section End =============================== -->

    <!-- ============================ Get in touch section start =============================== -->
    <section class="get-in-touch py-140 position-relative overflow-hidden">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-6">
                    <div class="">
                        <span
                            class="splitTextStyleTwo cursor-small tw-text-xl fw-bold fst-italic text-decoration-underline text-main-600 tw-mb-305">Safe
                            Transportation & Logistics</span>
                        <h1 class="splitTextStyleOne cursor-big tw-mb-8">Get In Touch</h1>
                        <p class="cursor-small text-neutral-900 tw-ps-205 border-start border-main-600 border-3">Temperate
                            ocean-bass sea chub unicorn fish treefish eulachon Flier, bighe carp Devario shortnose sucker
                            platy smalleye</p>

                        <div class="tw-mt-10 tw-mb-13">
                            <span class="text-main-two-600 fw-bold cursor-small">24/7 Support center</span>
                            <h2 class="tw-mt-3 cursor-big">
                                <a href="tel:+1718-904-4450"
                                    class="text-main-600 hover--translate-y-1 tw-duration-200 font-body">+1
                                    718-904-4450</a>
                            </h2>
                        </div>

                        <div class="d-flex flex-sm-nowrap flex-wrap tw-gap-7">
                            <div class="bg-neutral-50 tw-rounded-lg tw-py-7 tw-px-6 max-w-280-px" data-aos="fade-up"
                                data-aos-duration="1000" data-aos-delay="100">
                                <h5 class="tw-mb-3 cursor-big">Headquater -</h5>
                                <p class="text-main-two-600 fw-medium cursor-small">4517 Washington Ave. Manchester,
                                    Kentucky 39495</p>
                            </div>
                            <div class="border border-main-two-600 tw-rounded-lg tw-py-7 tw-px-6 max-w-280-px"
                                data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                                <h5 class="tw-mb-3 cursor-big">Email Us -</h5>
                                <p class="text-main-two-600 fw-medium cursor-small">4517 Washington Ave. Manchester,
                                    Kentucky 39495</p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="location">
                        <div class="">
                            <img src="{{ url('assets/images/shapes/map-img.png') }}" alt="">
                        </div>
                        <div class="location-item position-relative d-inline-block">
                            <span
                                class="location-item__point tw-w-3 tw-h-3 rounded-circle bg-main-600 cursor-pointer scalable-animation position-relative cursor-small hover-scale-30 tw-duration-500"></span>

                            <div
                                class="location-item__card bg-white tw-rounded-md tw-p-2 common-shadow-four d-inline-block max-w-148-px position-absolute bottom-100 tw-start-50 tw--translate-x-50 min-w-max tw-duration-300 z-2 invisible opacity-0">
                                <div class="tw-rounded-md overflow-hidden tw-max-h-88-px mx-auto">
                                    <img src="{{ url('assets/images/thumbs/map-img1.png') }}" alt=""
                                        class="w-100 h-100 object-fit-cover">
                                </div>
                                <div class="tw-px-2 tw-pt-5 tw-pb-3">
                                    <span class="fw-bold text-main-two-600 tw-text-sm max-w-130-px cursor-small">198 West
                                        21th Street, New York</span>
                                </div>
                            </div>
                        </div>
                        <div class="location-item position-relative d-inline-block">
                            <span
                                class="location-item__point tw-w-3 tw-h-3 rounded-circle bg-main-600 cursor-pointer scalable-animation position-relative cursor-small hover-scale-30 tw-duration-500"></span>

                            <div
                                class="location-item__card bg-white tw-rounded-md tw-p-2 common-shadow-four d-inline-block max-w-148-px position-absolute bottom-100 tw-start-50 tw--translate-x-50 min-w-max tw-duration-300 z-2 invisible opacity-0">
                                <div class="tw-rounded-md overflow-hidden tw-max-h-88-px mx-auto">
                                    <img src="{{ url('assets/images/thumbs/map-img1.png') }}" alt=""
                                        class="w-100 h-100 object-fit-cover">
                                </div>
                                <div class="tw-px-2 tw-pt-5 tw-pb-3">
                                    <span class="fw-bold text-main-two-600 tw-text-sm max-w-130-px cursor-small">198 West
                                        21th Street, New York</span>
                                </div>
                            </div>
                        </div>
                        <div class="location-item position-relative d-inline-block">
                            <span
                                class="location-item__point tw-w-3 tw-h-3 rounded-circle bg-main-600 cursor-pointer scalable-animation position-relative cursor-small hover-scale-30 tw-duration-500"></span>

                            <div
                                class="location-item__card bg-white tw-rounded-md tw-p-2 common-shadow-four d-inline-block max-w-148-px position-absolute bottom-100 tw-start-50 tw--translate-x-50 min-w-max tw-duration-300 z-2 invisible opacity-0">
                                <div class="tw-rounded-md overflow-hidden tw-max-h-88-px mx-auto">
                                    <img src="{{ url('assets/images/thumbs/map-img1.png') }}" alt=""
                                        class="w-100 h-100 object-fit-cover">
                                </div>
                                <div class="tw-px-2 tw-pt-5 tw-pb-3">
                                    <span class="fw-bold text-main-two-600 tw-text-sm max-w-130-px cursor-small">198 West
                                        21th Street, New York</span>
                                </div>
                            </div>
                        </div>
                        <div class="location-item position-relative d-inline-block">
                            <span
                                class="location-item__point tw-w-3 tw-h-3 rounded-circle bg-main-600 cursor-pointer scalable-animation position-relative cursor-small hover-scale-30 tw-duration-500"></span>

                            <div
                                class="location-item__card bg-white tw-rounded-md tw-p-2 common-shadow-four d-inline-block max-w-148-px position-absolute bottom-100 tw-start-50 tw--translate-x-50 min-w-max tw-duration-300 z-2">
                                <div class="tw-rounded-md overflow-hidden tw-max-h-88-px mx-auto">
                                    <img src="{{ url('assets/images/thumbs/map-img1.png') }} " alt=""
                                        class="w-100 h-100 object-fit-cover">
                                </div>
                                <div class="tw-px-2 tw-pt-5 tw-pb-3">
                                    <span class="fw-bold text-main-two-600 tw-text-sm max-w-130-px cursor-small">198 West
                                        21th Street, New York</span>
                                </div>
                            </div>
                        </div>
                        <div class="location-item position-relative d-inline-block">
                            <span
                                class="location-item__point tw-w-3 tw-h-3 rounded-circle bg-main-600 cursor-pointer scalable-animation position-relative cursor-small hover-scale-30 tw-duration-500"></span>

                            <div
                                class="location-item__card bg-white tw-rounded-md tw-p-2 common-shadow-four d-inline-block max-w-148-px position-absolute bottom-100 tw-start-50 tw--translate-x-50 min-w-max tw-duration-300 z-2 invisible opacity-0">
                                <div class="tw-rounded-md overflow-hidden tw-max-h-88-px mx-auto">
                                    <img src="{{ url('assets/images/thumbs/map-img1.png') }} " alt=""
                                        class="w-100 h-100 object-fit-cover">
                                </div>
                                <div class="tw-px-2 tw-pt-5 tw-pb-3">
                                    <span class="fw-bold text-main-two-600 tw-text-sm max-w-130-px cursor-small">198 West
                                        21th Street, New York</span>
                                </div>
                            </div>
                        </div>
                        <div class="location-item position-relative d-inline-block">
                            <span
                                class="location-item__point tw-w-3 tw-h-3 rounded-circle bg-main-600 cursor-pointer scalable-animation position-relative cursor-small hover-scale-30 tw-duration-500"></span>

                            <div
                                class="location-item__card bg-white tw-rounded-md tw-p-2 common-shadow-four d-inline-block max-w-148-px position-absolute bottom-100 tw-start-50 tw--translate-x-50 min-w-max tw-duration-300 z-2 invisible opacity-0">
                                <div class="tw-rounded-md overflow-hidden tw-max-h-88-px mx-auto">
                                    <img src="{{ url('assets/images/thumbs/map-img1.png') }} " alt=""
                                        class="w-100 h-100 object-fit-cover">
                                </div>
                                <div class="tw-px-2 tw-pt-5 tw-pb-3">
                                    <span class="fw-bold text-main-two-600 tw-text-sm max-w-130-px cursor-small">198 West
                                        21th Street, New York</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ============================ Get in touch section end =============================== -->

    <!-- ================================ Quate Section Start ========================== -->
    <section class="quate bg-img tw-mb-9 position-relative"
        data-background-image="{{ url('assets/images/shapes/quate-bg-img.png') }} ">
        <img src="{{ url('assets/images/thumbs/karen.png') }}" alt=""
            class="updown-animation position-absolute bottom-0 tw-end-0">

        <div class="sgsdgsdg">

        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="py-120">
                        <div class="">
                            <span
                                class="splitTextStyleTwo cursor-small tw-text-xl fw-bold fst-italic text-decoration-underline text-main-600 tw-mb-305">Safe
                                Transportation & Logistics</span>
                            <h2 class="splitTextStyleOne cursor-big text-white tw-mb-8">Transport & Logistics Services We
                                are the best</h2>
                            <p class="cursor-small text-white">Transmds is the world's driving worldwide coordinations
                                supplier — we uphold industry and exchange the</p>
                        </div>
                        <ul class="cursor-small d-flex flex-column tw-gap-3 tw-mt-14">
                            <li class="d-flex align-items-center tw-gap-4 aos-init aos-animate" data-aos="fade-up"
                                data-aos-duration="1000" data-aos-delay="200">
                                <span class="text-main-600 d-flex"><i class="ph-bold ph-check"></i></span>
                                <span class="text-neutral-400 tw-text-lg">Preaching Worship An Online Family</span>
                            </li>
                            <li class="d-flex align-items-center tw-gap-4 aos-init aos-animate" data-aos="fade-up"
                                data-aos-duration="1000" data-aos-delay="400">
                                <span class="text-main-600 d-flex"><i class="ph-bold ph-check"></i></span>
                                <span class="text-neutral-400 tw-text-lg">Preaching Worship An Online Family</span>
                            </li>
                        </ul>
                        <div class="tw-mt-15 d-flex align-items-center tw-gap-5">
                            <div class="tw-rounded-md overflow-hidden cursor-big" data-aos="fade-up"
                                data-aos-duration="1000" data-aos-delay="200">
                                <img src="{{ url('assets/images/thumbs/quate-img.png') }}" alt=""
                                    class="w-100 h-100 object-fit-cover">
                            </div>
                            <p class="tw-text-lg text-white fw-bold max-w-310-px cursor-small" data-aos="fade-up"
                                data-aos-duration="1000" data-aos-delay="400">Leading global logistic and transport agency
                                since <span class="text-main-600">1990</span> </p>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="400">
                    <div
                        class="clip-path-short position-relative tw-translate-y-35-px bg-main-600 tw-py-15 px-lg-5 tw-px-56 tw-mt-16 max-w-468-px ms-auto">
                        <h4 class="text-white tw-mb-8 cursor-big">Request a quote form</h4>
                        <form action="#">
                            <div class="row gy-4">
                                <div class="col-sm-12">
                                    <label for="personalInfo" class="cursor-small text-white tw-text-sm tw-mb-4">Personal
                                        information</label>
                                    <input type="text"
                                        class="cursor-big tw-px-5 tw-py-3 bg-white tw-placeholder-text-main-two-600 border-0 focus-outline-0 w-100 tw-placeholder-transition-2 focus-tw-placeholder-text-hidden rounded-0 shadow-none"
                                        id="personalInfo" placeholder="Your Name">
                                </div>
                                <div class="col-sm-6">
                                    <label for="Email" class="cursor-small text-white tw-text-sm tw-mb-4">Email</label>
                                    <input type="email"
                                        class="cursor-big tw-px-5 tw-py-3 bg-white tw-placeholder-text-main-two-600 border-0 focus-outline-0 w-100 tw-placeholder-transition-2 focus-tw-placeholder-text-hidden rounded-0 shadow-none"
                                        id="Email" placeholder="Email">
                                </div>
                                <div class="col-sm-6">
                                    <label for="Phone" class="cursor-small text-white tw-text-sm tw-mb-4">Phone</label>
                                    <input type="text"
                                        class="cursor-big tw-px-5 tw-py-3 bg-white tw-placeholder-text-main-two-600 border-0 focus-outline-0 w-100 tw-placeholder-transition-2 focus-tw-placeholder-text-hidden rounded-0 shadow-none"
                                        id="Phone" placeholder="Phone">
                                </div>
                                <div class="col-sm-12">
                                    <label for="deliveryInfo" class="cursor-small text-white tw-text-sm tw-mb-4">Delivery
                                        information</label>
                                    <select id="deliveryInfo"
                                        class="cursor-big tw-px-5 tw-py-3 bg-white tw-placeholder-text-main-two-600 border-0 focus-outline-0 w-100 tw-placeholder-transition-2 focus-tw-placeholder-text-hidden rounded-0 shadow-none form-select">
                                        <option value="" selected hidden>Delivery City</option>
                                        <option value="">Dhaka</option>
                                        <option value="">Chandpur</option>
                                        <option value="">Sylhet</option>
                                        <option value="">Ranngpur</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label for="FreightType" class="cursor-small text-white tw-text-sm tw-mb-4">Freight
                                        Type</label>
                                    <select id="FreightType"
                                        class="cursor-big tw-px-5 tw-py-3 bg-white tw-placeholder-text-main-two-600 border-0 focus-outline-0 w-100 tw-placeholder-transition-2 focus-tw-placeholder-text-hidden rounded-0 shadow-none form-select">
                                        <option value="" selected hidden>Freight Type</option>
                                        <option value="">Freight Type</option>
                                        <option value="">Freight Type</option>
                                        <option value="">Freight Type</option>
                                        <option value="">Freight Type</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label for="Incoterms"
                                        class="cursor-small text-white tw-text-sm tw-mb-4">Incoterms</label>
                                    <select id="Incoterms"
                                        class="cursor-big tw-px-5 tw-py-3 bg-white tw-placeholder-text-main-two-600 border-0 focus-outline-0 w-100 tw-placeholder-transition-2 focus-tw-placeholder-text-hidden rounded-0 shadow-none form-select">
                                        <option value="" selected hidden>Incoterms</option>
                                        <option value="">Incoterms</option>
                                        <option value="">Incoterms</option>
                                        <option value="">Incoterms</option>
                                        <option value="">Incoterms</option>
                                    </select>
                                </div>
                                <div class="col-sm-12">
                                    <div class="d-flex align-items-center tw-gap-6 flex-wrap tw-mt-4">
                                        <div class="form-check common-check cursor-small d-flex tw-gap-205 mb-0">
                                            <input class="form-check-input border-white" type="checkbox" value=""
                                                id="Fragile">
                                            <label class="form-check-label text-white tw-text-sm fw-bold"
                                                for="Fragile">Fragile</label>
                                        </div>
                                        <div class="form-check common-check cursor-small d-flex tw-gap-205 mb-0">
                                            <input class="form-check-input border-white" type="checkbox" value=""
                                                id="Expressdelivery">
                                            <label class="form-check-label text-white tw-text-sm fw-bold"
                                                for="Expressdelivery">Express delivery</label>
                                        </div>
                                        <div class="form-check common-check cursor-small d-flex tw-gap-205 mb-0">
                                            <input class="form-check-input border-white" type="checkbox" value=""
                                                id="Insurance">
                                            <label class="form-check-label text-white tw-text-sm fw-bold"
                                                for="Insurance">Insurance</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <button type="submit"
                                        class="cursor-small btn btn-main-two hover-style-two button--stroke d-inline-flex align-items-center justify-content-center tw-gap-5 group active--translate-y-2 rounded-0 tw-px-13 tw-py-505 w-100 tw-h-15 tw-mt-6"
                                        data-block="button">
                                        <span class="button__flair"></span>
                                        <span class="button__label">Get A Quate</span>
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================================ Quate Section End ========================== -->
    <!-- ============================= Facility Section Start ================================ -->
    <section class="facility pt-140">
        <div class="container">
            <div class="tw-pb-12 border-bottom border-neutral-100">
                <div class="row gy-5">
                    <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                        <div class="d-flex flex-sm-row flex-column align-items-sm-center tw-gap-7 animation-item">
                            <span
                                class="cursor-big flex-shrink-0 tw-w-108-px tw-h-108-px bg-main-50 rounded-circle d-flex justify-content-center align-items-center">
                                <img src="{{ url('assets/images/icons/facility-icon1.svg') }}" alt=""
                                    class="animate__bounce">
                            </span>
                            <div class="flex-grow-1">
                                <h5 class="tw-mb-4 cursor-big">Get Compensation</h5>
                                <p class="text-neutral-1000 cursor-small">Temperate ocean-bass seachub treefish eulachon.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                        <div class="d-flex flex-sm-row flex-column align-items-sm-center tw-gap-7 animation-item">
                            <span
                                class="cursor-big flex-shrink-0 tw-w-108-px tw-h-108-px bg-main-50 rounded-circle d-flex justify-content-center align-items-center">
                                <img src="{{ url('assets/images/icons/facility-icon2.svg') }}" alt=""
                                    class="animate__bounce">
                            </span>
                            <div class="flex-grow-1">
                                <h5 class="tw-mb-4 cursor-big">No Spend Your Time</h5>
                                <p class="text-neutral-1000 cursor-small">Temperate ocean-bass seachub treefish eulachon.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                        <div class="d-flex flex-sm-row flex-column align-items-sm-center tw-gap-7 animation-item">
                            <span
                                class="cursor-big flex-shrink-0 tw-w-108-px tw-h-108-px bg-main-50 rounded-circle d-flex justify-content-center align-items-center">
                                <img src="{{ url('assets/images/icons/facility-icon3.svg') }}" alt=""
                                    class="animate__bounce">
                            </span>
                            <div class="flex-grow-1">
                                <h5 class="tw-mb-4 cursor-big">Warehouse Facilities</h5>
                                <p class="text-neutral-1000 cursor-small">Temperate ocean-bass seachub treefish eulachon.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ============================= Facility Section End ================================ -->

    <!-- ================================ Testimonials and brand section start =================================  -->
    <section class="testimonials-brand pb-140 tw-mt-9 position-relative z-1">
        <img src="{{ url('assets/images/shapes/testimonials-brand-bg.png') }}" alt=""
            class="position-absolute bottom-0 tw-start-0 tw-end-0 z-n1 w-100 h-75">
        <img src="{{ url('assets/images/shapes/moon-shape.png') }}" alt=""
            class="moon-shape position-absolute bottom-0 tw-start-0 z-n1 tw-mb-17">

        <!-- Testimonials start -->
        <div class="tw-container-1380-px tw-px-4 mx-auto">
            <div class="testimonials-box bg-white">

                <div class="testimonials-slider swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide bg-white">
                            <div class="row gy-4">
                                <div class="col-md-4 xs-d-block d-none">
                                    <div class="position-relative max-w-318-px tw-me-11 tw-mt-11">
                                        <div class="mask-shape d-flex position-relative">
                                            <img src="{{ url('assets/images/thumbs/about-img.png') }} "
                                                alt="Testimonials Image">
                                        </div>
                                        <span
                                            class="tw-w-90-px tw-h-90-px bg-main-600 rounded-circle d-flex justify-content-center align-items-center position-absolute top-0 tw-end-0 tw--me-45-px tw--mt-45-px cursor-big">
                                            <img src="{{ url('assets/images/icons/quate-icon.svg') }} " alt="">
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="ps-xxl-5">
                                        <p class="xl-tw-text-3xl tw-text-xl fw-bold text-main-two-600 cursor-big">Climb the
                                            mountain not to plant your flag but to embrace the ways challenge, enjoy the
                                            air, and behold the. Climb it see the world, not so the world can see you. This
                                            is due to their excellent service competitive pricing</p>
                                        <span class="tw-my-10 border-bottom border-neutral-100 d-block"></span>

                                        <div class="d-flex align-items-center justify-content-between flex-wrap tw-gap-2">
                                            <div class="">
                                                <h5 class="tw-mb-2 cursor-big">Robert J. Hare</h5>
                                                <span class="text-neutral-900 cursor-small">Sr. Product Manager</span>
                                            </div>
                                            <ul class="d-flex align-items-center tw-gap-2 cursor-small">
                                                <li class="text-star tw-text-base"><i class="ph-fill ph-star"></i></li>
                                                <li class="text-star tw-text-base"><i class="ph-fill ph-star"></i></li>
                                                <li class="text-star tw-text-base"><i class="ph-fill ph-star"></i></li>
                                                <li class="text-star tw-text-base"><i class="ph-fill ph-star"></i></li>
                                                <li class="text-star tw-text-base"><i class="ph-fill ph-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide bg-white">
                            <div class="row gy-4">
                                <div class="col-md-4 xs-d-block d-none">
                                    <div class="position-relative max-w-318-px tw-me-11 tw-mt-11">
                                        <div class="mask-shape d-flex position-relative">
                                            <img src="{{ url('assets/images/thumbs/about-img.png') }}"
                                                alt="Testimonials Image">
                                        </div>
                                        <span
                                            class="tw-w-90-px tw-h-90-px bg-main-600 rounded-circle d-flex justify-content-center align-items-center position-absolute top-0 tw-end-0 tw--me-45-px tw--mt-45-px cursor-big">
                                            <img src="{{ url('assets/images/icons/quate-icon.svg') }}" alt="">
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="ps-xxl-5">
                                        <p class="xl-tw-text-3xl tw-text-xl fw-bold text-main-two-600 cursor-big">Climb the
                                            mountain not to plant your flag but to embrace the ways challenge, enjoy the
                                            air, and behold the. Climb it see the world, not so the world can see you. This
                                            is due to their excellent service competitive pricing</p>
                                        <span class="tw-my-10 border-bottom border-neutral-100 d-block"></span>

                                        <div class="d-flex align-items-center justify-content-between flex-wrap tw-gap-2">
                                            <div class="">
                                                <h5 class="tw-mb-2 cursor-big">Robert J. Hare</h5>
                                                <span class="text-neutral-900 cursor-small">Sr. Product Manager</span>
                                            </div>
                                            <ul class="d-flex align-items-center tw-gap-2 cursor-small">
                                                <li class="text-star tw-text-base"><i class="ph-fill ph-star"></i></li>
                                                <li class="text-star tw-text-base"><i class="ph-fill ph-star"></i></li>
                                                <li class="text-star tw-text-base"><i class="ph-fill ph-star"></i></li>
                                                <li class="text-star tw-text-base"><i class="ph-fill ph-star"></i></li>
                                                <li class="text-star tw-text-base"><i class="ph-fill ph-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Testimonials End -->


        <!-- Brand Start -->
        <div class="container">
            <div class="tw-mt-17">
                <div class="left-right-line text-center position-relative z-1">
                    <p class="d-inline-block tw-text-xl fw-bold text-main-two-600 tw-px-10 bg-bg-color cursor-small">
                        Trusted and funded by more then <span class="text-main-600">900</span> companies</p>
                </div>

                <div class="tw-mt-12">
                    <div class="brand-slider swiper">
                        <div class="swiper-wrapper align-items-center">
                            <div class="swiper-slide me-0" data-aos="fade-up" data-aos-duration="1000"
                                data-aos-delay="100">
                                <div class="text-center cursor-big">
                                    <img src="{{ url('assets/images/thumbs/brand-img1.png') }}" alt=""
                                        class="max-w-175-px">
                                </div>
                            </div>
                            <div class="swiper-slide me-0" data-aos="fade-up" data-aos-duration="1000"
                                data-aos-delay="200">
                                <div class="text-center cursor-big">
                                    <img src="{{ url('assets/images/thumbs/brand-img2.png') }}" alt=""
                                        class="max-w-175-px">
                                </div>
                            </div>
                            <div class="swiper-slide me-0" data-aos="fade-up" data-aos-duration="1000"
                                data-aos-delay="300">
                                <div class="text-center cursor-big">
                                    <img src="{{ url('assets/images/thumbs/brand-img3.png') }} " alt=""
                                        class="max-w-175-px">
                                </div>
                            </div>
                            <div class="swiper-slide me-0" data-aos="fade-up" data-aos-duration="1000"
                                data-aos-delay="400">
                                <div class="text-center cursor-big">
                                    <img src="{{ url('assets/images/thumbs/brand-img4.png') }} " alt=""
                                        class="max-w-175-px">
                                </div>
                            </div>
                            <div class="swiper-slide me-0" data-aos="fade-up" data-aos-duration="1000"
                                data-aos-delay="500">
                                <div class="text-center cursor-big">
                                    <img src="{{ url('assets/images/thumbs/brand-img5.png') }} " alt=""
                                        class="max-w-175-px">
                                </div>
                            </div>
                            <div class="swiper-slide me-0" data-aos="fade-up" data-aos-duration="1000"
                                data-aos-delay="500">
                                <div class="text-center cursor-big">
                                    <img src=" {{ url('assets/images/thumbs/brand-img2.png') }}" alt=""
                                        class="max-w-175-px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Brand End -->
    </section>
    <!-- ================================ Testimonials and brand section End =================================  -->

    <!-- ================================== Blog section start =============================== -->
    <section class="blog py-140">
        <div class="container">
            <div class="max-w-632-px mx-auto text-center tw-mb-15">
                <span
                    class="splitTextStyleTwo cursor-small tw-text-xl fw-bold fst-italic text-decoration-underline text-main-600 tw-mb-305">Safe
                    Transportation & Logistics</span>
                <h2 class="splitTextStyleOne cursor-big tw-mb-8 h1">Read All Our Logistics News & Blogs</h2>
            </div>

            <div class="row gy-4">
                <div class="col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                    <div class="blog-item">
                        <div class="position-relative overflow-hidden">
                            <a href="blog-details.html" class="w-100 d-block">
                                <img src="{{ url('assets/images/thumbs/blog-img1.png') }}" alt=""
                                    class="hover-scale-108 tw-duration-300 w-100 h-100 object-fit-cover">
                            </a>
                            <h5
                                class="blog-date cursor-big tw-duration-300 tw-py-4 text-white d-flex justify-content-center align-items-center max-w-82-px w-100 tw-px-4 text-center tw-rounded-md fw-medium position-absolute top-0 tw-start-0 tw-mt-2 tw-ms-2 bg-main-600">
                                25 Dec
                            </h5>
                            <div
                                class="blog-tag tw-duration-300 tw-px-4 tw-py-205 text-white fw-semibold tw-text-xs d-flex align-items-center tw-gap-2 cursor-big position-absolute tw-start-0 bottom-0 bg-main-two-600">
                                <span class="d-flex"><i class="ph-fill ph-tag"></i></span>
                                Transport
                            </div>
                        </div>
                        <div class="tw-mt-505">
                            <div class="tw-mb-505 d-flex align-items-center tw-gap-6 flex-wrap">
                                <div class="d-flex align-items-center tw-gap-2 cursor-small">
                                    <span class="text-main-600 tw-text-lg"><i class="ph-bold ph-user-circle"></i></span>
                                    <span class="text-neutral-600 tw-text-sm">Mehedii .H</span>
                                </div>
                                <div class="d-flex align-items-center tw-gap-2 cursor-small">
                                    <span class="text-main-600 tw-text-lg"><i class="ph-bold ph-chats-circle"></i></span>
                                    <span class="text-neutral-600 tw-text-sm">Comments (03)</span>
                                </div>
                            </div>
                            <h5 class="tw-mb-10">
                                <a href="blog-details.html"
                                    class="splitTextStyleTwo line-clamp-2 hover-text-main-600 cursor-big">IT Service Case
                                    Studies Accelerating Business Fly Success Tech</a>
                            </h5>
                            <a href="blog-details.html"
                                class="text-neutral-900 fw-semibold hover-text-main-600 cursor-small hover--translate-y-1 tw-duration-150 d-flex align-items-center tw-gap-2">
                                <span class=" text-decoration-underline">Read More</span>
                                <i class="ph-bold ph-caret-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="250">
                    <div class="blog-item">
                        <div class="position-relative overflow-hidden">
                            <a href="blog-details.html" class="w-100 d-block">
                                <img src="assets/images/thumbs/blog-img2.png" alt=""
                                    class="hover-scale-108 tw-duration-300 w-100 h-100 object-fit-cover">
                            </a>
                            <h5
                                class="blog-date cursor-big tw-duration-300 tw-py-4 text-white d-flex justify-content-center align-items-center max-w-82-px w-100 tw-px-4 text-center tw-rounded-md fw-medium position-absolute top-0 tw-start-0 tw-mt-2 tw-ms-2 bg-main-two-600">
                                20 Dec
                            </h5>
                            <div
                                class="blog-tag tw-duration-300 tw-px-4 tw-py-205 text-white fw-semibold tw-text-xs d-flex align-items-center tw-gap-2 cursor-big position-absolute tw-start-0 bottom-0 bg-main-600">
                                <span class="d-flex"><i class="ph-fill ph-tag"></i></span>
                                Transport
                            </div>
                        </div>
                        <div class="tw-mt-505">
                            <div class="tw-mb-505 d-flex align-items-center tw-gap-6 flex-wrap">
                                <div class="d-flex align-items-center tw-gap-2 cursor-small">
                                    <span class="text-main-600 tw-text-lg"><i class="ph-bold ph-user-circle"></i></span>
                                    <span class="text-neutral-600 tw-text-sm">Mehedii .H</span>
                                </div>
                                <div class="d-flex align-items-center tw-gap-2 cursor-small">
                                    <span class="text-main-600 tw-text-lg"><i class="ph-bold ph-chats-circle"></i></span>
                                    <span class="text-neutral-600 tw-text-sm">Comments (03)</span>
                                </div>
                            </div>
                            <h5 class="tw-mb-10">
                                <a href="blog-details.html"
                                    class="splitTextStyleTwo line-clamp-2 hover-text-main-600 cursor-big">IT Service Case
                                    Studies Accelerating Business Fly Success Tech</a>
                            </h5>
                            <a href="blog-details.html"
                                class="text-neutral-900 fw-semibold hover-text-main-600 cursor-small hover--translate-y-1 tw-duration-150 d-flex align-items-center tw-gap-2">
                                <span class=" text-decoration-underline">Read More</span>
                                <i class="ph-bold ph-caret-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="250">
                    <div class="blog-item">
                        <div class="position-relative overflow-hidden">
                            <a href="blog-details.html" class="w-100 d-block">
                                <img src="assets/images/thumbs/blog-img3.png" alt=""
                                    class="hover-scale-108 tw-duration-300 w-100 h-100 object-fit-cover">
                            </a>
                            <h5
                                class="blog-date cursor-big tw-duration-300 tw-py-4 text-white d-flex justify-content-center align-items-center max-w-82-px w-100 tw-px-4 text-center tw-rounded-md fw-medium position-absolute top-0 tw-start-0 tw-mt-2 tw-ms-2 bg-main-600">
                                30 Dec
                            </h5>
                            <div
                                class="blog-tag tw-duration-300 tw-px-4 tw-py-205 text-white fw-semibold tw-text-xs d-flex align-items-center tw-gap-2 cursor-big position-absolute tw-start-0 bottom-0 bg-main-two-600">
                                <span class="d-flex"><i class="ph-fill ph-tag"></i></span>
                                Transport
                            </div>
                        </div>
                        <div class="tw-mt-505">
                            <div class="tw-mb-505 d-flex align-items-center tw-gap-6 flex-wrap">
                                <div class="d-flex align-items-center tw-gap-2 cursor-small">
                                    <span class="text-main-600 tw-text-lg"><i class="ph-bold ph-user-circle"></i></span>
                                    <span class="text-neutral-600 tw-text-sm">Mehedii .H</span>
                                </div>
                                <div class="d-flex align-items-center tw-gap-2 cursor-small">
                                    <span class="text-main-600 tw-text-lg"><i
                                            class="ph-bold ph-chats-circle"></i></span>
                                    <span class="text-neutral-600 tw-text-sm">Comments (03)</span>
                                </div>
                            </div>
                            <h5 class="tw-mb-10">
                                <a href="blog-details.html"
                                    class="splitTextStyleTwo line-clamp-2 hover-text-main-600 cursor-big">IT Service Case
                                    Studies Accelerating Business Fly Success Tech</a>
                            </h5>
                            <a href="blog-details.html"
                                class="text-neutral-900 fw-semibold hover-text-main-600 cursor-small hover--translate-y-1 tw-duration-150 d-flex align-items-center tw-gap-2">
                                <span class=" text-decoration-underline">Read More</span>
                                <i class="ph-bold ph-caret-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================================== Blog section End =============================== -->

    <!-- ========================== map Start ============================ -->
    <div class="map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5591642.125572935!2d-118.45027922609367!3d46.81821123121407!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5343f19fafa367dd%3A0xe0a08a08122c4da1!2sHelena-Lewis%20and%20Clark%20National%20Forest!5e0!3m2!1sen!2sbd!4v1731480188813!5m2!1sen!2sbd"
            class="w-100" height="355" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <!-- ========================== map End ============================ -->


    @include('components.popup')
    <script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('.tracking-form form');
    const input = document.getElementById('trackingInput');

    form.addEventListener('submit', function(e) {
        if (!input.value.trim()) {
            e.preventDefault();
            input.classList.add('error');
            input.focus();
            return;
        }
    });

    input.addEventListener('input', function() {
        this.classList.remove('error');
    });

    input.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            if (input.value.trim()) {
                form.submit();
            } else {
                input.classList.add('error');
                input.focus();
            }
        }
    });
});
    </script>
@endsection
