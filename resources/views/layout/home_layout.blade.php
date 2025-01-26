<!DOCTYPE html>
<html lang="en" data-wf-page="{{ $data_wf_page ?? '' }}" data-wf-site="63b261b248057c80966627">

<head>
    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-BFB4N0D1JW"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-BFB4N0D1JW');
    </script>


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- SEO Meta Tags -->
    <title>{{ $meta_title ?? config('website.name') . ' Logistics' }}</title>
    <meta name="description"
        content="{{ $meta_desc ?? config('website.name') . ' Logistics Shipping & Logistics: Reliable Courier  & Delivery Services, ' . config('website.name') . ' Logistics offers fast & reliable shipping, courier, & logistics services for domestic & international shipments. Choose ' . config('website.name') . ' Logistics for efficient freight shipping & logistics' }}">
    <meta name="author" content="{{ $meta_author ?? config('website.name') . ' Logistics' }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $meta_title ?? config('website.name') . ' Logistics' }}">
    <meta property="og:description"
        content="{{ $meta_desc ?? config('website.name') . ' Logistics offers fast & reliable shipping, courier, & logistics services for domestic & international shipments. Choose ' . config('website.name') . ' Logistics for efficient freight shipping & logistics' }}">
    <meta property="og:image" content="{{ $meta_image ?? url('assets/images/logo/favicon.png') }}">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $meta_title ?? config('website.name') . ' Logistics' }}">
    <meta name="twitter:description"
        content="{{ $meta_desc ?? config('website.name') . ' Logistics offers fast & reliable shipping, courier, & logistics services for domestic & international shipments. Choose ' . config('website.name') . ' Logistics for efficient freight shipping & logistics' }}">
    <meta name="twitter:image" content="{{ $meta_image ?? url('assets/images/logo/favicon.png') }}">

    <!-- PWA Assets -->
    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ url('assets/images/logo/favicon.png?v=' . env('CACHE_VERSION')) }}">
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ url('assets/images/logo/favicon.png?v=' . env('CACHE_VERSION')) }}">
    <link rel="icon" type="image/png" sizes="194x194"
        href="{{ url('assets/images/logo/favicon.png?v=' . env('CACHE_VERSION')) }}">
    <link rel="icon" type="image/png" sizes="192x192"
        href="{{ url('assets/images/logo/favicon.png?v=' . env('CACHE_VERSION')) }}">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ url('assets/images/logo/favicon.png?v=' . env('CACHE_VERSION')) }}">


    <link rel="shortcut icon" href="{{ url('assets/images/logo/favicon.png?v=' . env('CACHE_VERSION')) }}">

    <!-- PWA Meta Tags -->
    <meta name="apple-mobile-web-app-title" content=" config('website.name') . ' Logistics '">
    <meta name="application-name" content="{{ config('website.name') }} Logistics">
    <meta name="msapplication-TileColor" content="#ffffff">

    <meta name="theme-color" content="#ffffff">


    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css?v=' . env('CACHE_VERSION')) }}">
    <link rel="stylesheet" href="{{ url('assets/css/satoshi.css?v=' . env('CACHE_VERSION')) }}">
    <link rel="stylesheet" href="{{ url('assets/css/swiper-bundle.min.css?v=' . env('CACHE_VERSION')) }}">
    <link rel="stylesheet" href="{{ url('assets/css/aos.css?v=' . env('CACHE_VERSION')) }}">
    <link rel="stylesheet" href="{{ url('assets/css/animated-radial-progress.css?v=' . env('CACHE_VERSION')) }}">
    <link rel="stylesheet" href="{{ url('assets/css/magnific-popup.css?v=' . env('CACHE_VERSION')) }}">
    <link rel="stylesheet" href="{{ url('assets/css/main.css?v=' . env('CACHE_VERSION')) }}">

    <style>
        /* Mobile Navigation Styles */
        @media (max-width: 867px) {

            /* Override Tailwind blue classes directly */
            .mobile-menu .nav-submenu__link.tw-text-[#DF1118],
            .mobile-menu .nav-menu__item .nav-submenu__link.tw-text-[#DF1118],
            .mobile-menu .nav-submenu__item .nav-submenu__link.tw-text-[#DF1118] {
                background-color: transparent !important;
                color: #DF1118 !important;
            }

            /* Override active states */
            .mobile-menu .nav-menu__item.activePage>.nav-menu__link,
            .mobile-menu .nav-submenu__link[aria-current="page"],
            .mobile-menu .nav-submenu__link.active {
                color: #DF1118 !important;
                background-color: transparent !important;
            }

            /* Target specific active link states */
            .mobile-menu .nav-menu__item .nav-submenu__link[aria-current="page"],
            .mobile-menu .nav-menu__item.activePage .nav-submenu__link,
            .mobile-menu .nav-submenu__item.active .nav-submenu__link {
                color: #DF1118 !important;
                background-color: transparent !important;
            }

            /* Override any white text */
            .mobile-menu .nav-submenu__link.tw-text-white,
            .mobile-menu .nav-submenu__link.tw-text-white[aria-current="page"] {
                color: #DF1118 !important;
            }

            /* Override hover states */
            .mobile-menu .nav-submenu__link:hover {
                color: #DF1118 !important;
                background-color: #f7f7f7 !important;
            }

            /* Target the exact class combinations from the HTML */
            .mobile-menu .nav-menu__item .nav-submenu__link,
            .mobile-menu .nav-submenu__item .nav-submenu__link {

                &.tw-text-[#DF1118],
                &.tw-text-white,
                &[aria-current="page"],
                &.active {
                    background-color: transparent !important;
                    color: #DF1118 !important;
                }
            }

            /* Ensure main menu items also show red when active */
            .mobile-menu .nav-menu__item.activePage>.nav-menu__link {
                color: #DF1118 !important;
            }
        }

        /* Keep desktop styles unchanged */
        @media (min-width: 868px) {
            .nav-menu__item.activePage>.nav-menu__link {
                color: #DF1118 !important;
            }

            .nav-submenu__link.active,
            .nav-submenu__link[aria-current="page"],
            .nav-menu__item.activePage .nav-submenu__link[aria-current="page"] {
                background-color: white !important;
                color: #DF1118 !important;
            }

            .nav-submenu__link:hover {
                background-color: #f7f7f7;
                color: #DF1118;
            }
        }
    </style>
</head>

<body>

    <!-- Your content here -->
    {{ csrf_field() }}
    <!--====== PRELOADER PART START ======-->
    {{-- 
    <div
        class="preloader bg-white tw-h-screen justify-content-center align-items-center tw-z-999 position-fixed top-0 tw-start-0 w-100 h-100">
        <div class="car-road">
            <div class="car">
                <div class="car-top">
                    <div class="window">
                    </div>
                </div>
                <div class="car-base">
                </div>
                <div class="wheel-left wheel">
                    <div class="wheel-spike">
                    </div>
                    <div class="wheel-center">
                    </div>
                </div>
                <div class="wheel-right wheel">
                    <div class="wheel-spike">
                    </div>
                    <div class="wheel-center">
                    </div>
                </div>
                <div class="head-light"></div>
            </div>
            <div class="road">
            </div>
        </div>
    </div> --}}

    <!--====== PRELOADER PART START ======-->


    <!--==================== Overlay Start ====================-->
    <div class="overlay"></div>
    <!--==================== Overlay End ====================-->

    <!-- ==================== Scroll to Top End Here ==================== -->
    <div class="progress-wrap cursor-big">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- ==================== Scroll to Top End Here ==================== -->

    <!-- Custom Cursor Start -->
    <div class="cursor"></div>
    <span class="dot"></span>
    <!-- Custom Cursor End -->




    <!-- ======================= Offcanvas sidebar popup start ================================= -->
    <div
        class="offcanvas-sidebar tw-p-8 bg-white position-fixed top-0 end-0 tw-max-h-screen tw-z-999 max-w-400-px w-100 tw-translate-x-full overflow-y-auto">
        <button type="button"
            class="cursor-small offcanvas-sidebar__close border border-main-600 tw-w-10 tw-h-10 text-main-600 rounded-circle d-flex justify-content-center align-items-center tw-text-xl hover-bg-main-600 hover-text-white position-absolute tw-mt-8 top-0 tw-end-0 tw-me-8 z-1">
            <i class="ph-bold ph-x"></i>
        </button>

        <div class="d-flex flex-column tw-gap-8 overflow-hidden">
            <div class="animate-item">
                <a href="{{ url('/') }}" class="cursor-big">
                    <img src="assets/images/logo/logo2.png" alt="Logo" class="max-w-200-px">
                </a>
            </div>
            <div>
                <h4 class="cursor-big tw-mb-5 animate-item">About Us </h4>
                <p class="cursor-small text-neutral-950 animate-item">Temperate ocean-bass sea chub unicorn fish
                    treefish eulachon tidewater goby. Flier, bighe carp Devario shortnose sucker platy smalleye</p>
            </div>
            <div>
                <h4 class="cursor-big tw-mb-5 animate-item">Contact Us </h4>
                <div class="d-flex flex-column tw-gap-6">
                    <div class="cursor-small animate-item d-flex align-items-center tw-gap-5">
                        <span
                            class="tw-w-10 tw-h-10 flex-shrink-0 bg-main-600 rounded-circle text-white tw-text-xl d-flex justify-content-center align-items-center">
                            <i class="ph ph-phone"></i>
                        </span>
                        <a href="tel:+880(123)45688"
                            class="text-main-two-600 hover-text-main-600 hover--translate-x-1 fw-medium tw-text-lg">+880
                            (123) 456 88</a>
                    </div>
                    <div class="cursor-small animate-item d-flex align-items-center tw-gap-5">
                        <span
                            class="tw-w-10 tw-h-10 flex-shrink-0 bg-main-600 rounded-circle text-white tw-text-xl d-flex justify-content-center align-items-center">
                            <i class="ph ph-map-pin"></i>
                        </span>
                        <a href="mailto:support@gmail.com"
                            class="text-main-two-600 hover-text-main-600 hover--translate-x-1 fw-medium tw-text-lg">support@gmail.com</a>
                    </div>
                    <div class="cursor-small animate-item d-flex align-items-start tw-gap-5">
                        <span
                            class="tw-w-10 tw-h-10 flex-shrink-0 bg-main-600 rounded-circle text-white tw-text-xl d-flex justify-content-center align-items-center">
                            <i class="ph ph-phone"></i>
                        </span>
                        <p class="text-main-two-600 fw-medium tw-text-lg">55 Main Street, 2nd block
                            Malborne, Australia</p>
                    </div>
                </div>
            </div>
            <div class="">
                <h4 class="cursor-big tw-mb-5 animate-item">Contact Us </h4>
                <ul class="cursor-small d-flex align-items-center tw-gap-3 animate-item">
                    <li>
                        <a href="https://www.facebook.com/"
                            class="tw-w-11 tw-h-11 border border-neutral-200 rounded-circle text-main-two-600 tw-text-xl d-flex justify-content-center align-items-center hover-bg-main-600 hover-text-white hover-border-main-600 active-scale-09 tw-duration-200">
                            <i class="ph ph-facebook-logo"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.twitter.com/"
                            class="tw-w-11 tw-h-11 border border-neutral-200 rounded-circle text-main-two-600 tw-text-xl d-flex justify-content-center align-items-center hover-bg-main-600 hover-text-white hover-border-main-600 active-scale-09 tw-duration-200">
                            <i class="ph ph-x-logo"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/"
                            class="tw-w-11 tw-h-11 border border-neutral-200 rounded-circle text-main-two-600 tw-text-xl d-flex justify-content-center align-items-center hover-bg-main-600 hover-text-white hover-border-main-600 active-scale-09 tw-duration-200">
                            <i class="ph ph-instagram-logo"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.youtube.com/"
                            class="tw-w-11 tw-h-11 border border-neutral-200 rounded-circle text-main-two-600 tw-text-xl d-flex justify-content-center align-items-center hover-bg-main-600 hover-text-white hover-border-main-600 active-scale-09 tw-duration-200">
                            <i class="ph ph-youtube-logo"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
    <!-- ======================= Offcanvas sidebar popup End ================================= -->

    <!-- ==================== Mobile Menu Start Here ==================== -->
    <div
        class="mobile-menu d-lg-none d-block scroll-sm position-fixed bg-white tw-w-300-px tw-h-screen overflow-y-auto tw-p-6 tw-z-999 tw--translate-x-full tw-pb-68 ">

        <button type="button"
            class="close-button position-absolute tw-end-0 top-0 tw-me-2 tw-mt-2 tw-w-605 tw-h-605 rounded-circle d-flex justify-content-center align-items-center text-main-two-600 bg-neutral-200 hover-bg-main-two-600 hover-text-white">
            <i class="ph ph-x"></i>
        </button>

        <div class="mobile-menu__inner">
            <a href="{{ url('/') }}" class="mobile-menu__logo">
                <img src="{{ url('assets/images/logo/logo2.png') }}" alt="Logo">
            </a>
            <div class="mobile-menu__menu">
                <!-- Nav menu Start -->
                <ul class="nav-menu cursor-small d-lg-flex align-items-center nav-menu--mobile d-block tw-mt-8">
                    <li
                        class="nav-menu__item has-submenu position-relative {{ request()->is('send-shipment*', 'shipping-rates*', 'track-shipment*') ? 'activePage' : '' }}">
                        <a href="javascript:void(0)"
                            class="nav-menu__link hover--translate-y-1 text-main-two-600 tw-py-9 fw-medium w-100 tw-pe-4">Ship
                            & Track</a>
                        <ul
                            class="nav-submenu scroll-sm position-absolute start-0 top-100 tw-w-max bg-white tw-rounded-md overflow-hidden tw-p-2 tw-mt-4 tw-duration-200 tw-z-99">
                            <li class="nav-menu__item {{ request()->is('send-shipment*') ? 'activePage' : '' }}">
                                <a href="{{ url('/send-shipment') }}"
                                    class="nav-submenu__link {{ request()->is('send-shipment*') ? 'tw-text-[#DF1118] tw-text-white' : 'hover-bg-neutral-100 text-black' }} fw-medium w-100 d-block tw-py-2 tw-px-305 tw-rounded">
                                    Send a Shipment
                                </a>
                            </li>
                            <li class="nav-menu__item {{ request()->is('shipping-rates*') ? 'activePage' : '' }}">
                                <a href="{{ url('/shipping-rates') }}"
                                    class="nav-submenu__link {{ request()->is('shipping-rates*') ? 'tw-text-[#DF1118] tw-text-white' : 'hover-bg-neutral-100 text-black' }} fw-medium w-100 d-block tw-py-2 tw-px-305 tw-rounded">
                                    Calculate Shipping Rates
                                </a>
                            </li>
                            <li class="nav-menu__item {{ request()->is('track-shipment*') ? 'activePage' : '' }}">
                                <a href="{{ url('/track-shipment') }}"
                                    class="nav-submenu__link {{ request()->is('track-shipment*') ? 'tw-text-[#DF1118] tw-text-white' : 'hover-bg-neutral-100 text-black' }} fw-medium w-100 d-block tw-py-2 tw-px-305 tw-rounded">
                                    Track a Shipment
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li
                        class="nav-menu__item has-submenu position-relative {{ request()->is('project*', 'team*') ? 'activePage' : '' }}">
                        <a href="javascript:void(0)"
                            class="nav-menu__link hover--translate-y-1 text-main-two-600 tw-py-9 fw-medium w-100 tw-pe-4">
                            Logistics Solution
                        </a>
                        <ul class="nav-submenu scroll-sm position-absolute start-0 top-100 bg-white tw-rounded-md overflow-hidden tw-p-6 tw-mt-4 tw-duration-200 tw-z-99"
                            style="min-width: 800px;">
                            <div class="row g-4">
                                <!-- Business Solutions Column -->
                                <div class="col-md-4">
                                    <h6 class="text-dark mb-3 fw-bold">Business Solutions</h6>
                                    <ul class="list-unstyled">
                                        <li class="nav-submenu__item mb-2">
                                            <a href="{{ url('/about') }}"
                                                class="nav-submenu__link {{ request()->is('about*') ? 'tw-bg-main-600 tw-text-white' : 'hover-bg-neutral-100 text-black' }} fw-medium d-block tw-py-2 tw-px-3 tw-rounded">
                                                About
                                            </a>
                                        </li>
                                        <li class="nav-submenu__item mb-2">
                                            <a href="{{ url('/freight') }}"
                                                class="nav-submenu__link {{ request()->is('freight*') ? 'tw-bg-main-600 tw-text-white' : 'hover-bg-neutral-100 text-black' }} fw-medium d-block tw-py-2 tw-px-3 tw-rounded">
                                                Freight
                                            </a>
                                        </li>
                                        <li class="nav-submenu__item mb-2">
                                            <a href="{{ url('/express') }}"
                                                class="nav-submenu__link {{ request()->is('express*') ? 'tw-bg-main-600 tw-text-white' : 'hover-bg-neutral-100 text-black' }} fw-medium d-block tw-py-2 tw-px-3 tw-rounded">
                                                Express
                                            </a>
                                        </li>
                                        <li class="nav-submenu__item mb-2">
                                            <a href="{{ url('/fuel-surcharge') }}"
                                                class="nav-submenu__link {{ request()->is('fuel-surcharge*') ? 'tw-bg-main-600 tw-text-white' : 'hover-bg-neutral-100 text-black' }} fw-medium d-block tw-py-2 tw-px-3 tw-rounded">
                                                Fuel Surcharge
                                            </a>
                                        </li>
                                        <li class="nav-submenu__item mb-2">
                                            <a href="{{ url('/logistics-warehousing') }}"
                                                class="nav-submenu__link {{ request()->is('logistics-warehousing*') ? 'tw-bg-main-600 tw-text-white' : 'hover-bg-neutral-100 text-black' }} fw-medium d-block tw-py-2 tw-px-3 tw-rounded">
                                                Logistics & Warehousing
                                            </a>
                                        </li>
                                        <li class="nav-submenu__item mb-2">
                                            <a href="{{ url('/signature-surcharge') }}"
                                                class="nav-submenu__link {{ request()->is('signature-surcharge*') ? 'tw-bg-main-600 tw-text-white' : 'hover-bg-neutral-100 text-black' }} fw-medium d-block tw-py-2 tw-px-3 tw-rounded">
                                                Signature Surcharge
                                            </a>
                                        </li>
                                        <li class="nav-submenu__item">
                                            <a href="{{ url('/service-rate-guide') }}"
                                                class="nav-submenu__link {{ request()->is('service-rate-guide*') ? 'tw-bg-main-600 tw-text-white' : 'hover-bg-neutral-100 text-black' }} fw-medium d-block tw-py-2 tw-px-3 tw-rounded">
                                                Service & Rate Guide
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <!-- Industry Solutions Column -->
                                <div class="col-md-4">
                                    <h6 class="text-dark mb-3 fw-bold">Industry Solutions</h6>
                                    <ul class="list-unstyled">
                                        <li class="nav-submenu__item mb-2">
                                            <a href="{{ url('/e-commerce-smes') }}"
                                                class="nav-submenu__link {{ request()->is('e-commerce-smes*') ? 'tw-bg-main-600 tw-text-white' : 'hover-bg-neutral-100 text-black' }} fw-medium d-block tw-py-2 tw-px-3 tw-rounded">
                                                E-commerce & SMEs
                                            </a>
                                        </li>
                                        <li class="nav-submenu__item mb-2">
                                            <a href="{{ url('/oil-gas') }}"
                                                class="nav-submenu__link {{ request()->is('oil-gas*') ? 'tw-bg-main-600 tw-text-white' : 'hover-bg-neutral-100 text-black' }} fw-medium d-block tw-py-2 tw-px-3 tw-rounded">
                                                Oil & Gas
                                            </a>
                                        </li>
                                        <li class="nav-submenu__item mb-2">
                                            <a href="{{ url('/chemicals-dangerous-goods') }}"
                                                class="nav-submenu__link {{ request()->is('chemicals-dangerous-goods*') ? 'tw-bg-main-600 tw-text-white' : 'hover-bg-neutral-100 text-black' }} fw-medium d-block tw-py-2 tw-px-3 tw-rounded">
                                                Chemicals & Dangerous Goods
                                            </a>
                                        </li>
                                        <li class="nav-submenu__item mb-2">
                                            <a href="{{ url('/healthcare') }}"
                                                class="nav-submenu__link {{ request()->is('healthcare*') ? 'tw-bg-main-600 tw-text-white' : 'hover-bg-neutral-100 text-black' }} fw-medium d-block tw-py-2 tw-px-3 tw-rounded">
                                                Healthcare
                                            </a>
                                        </li>
                                        <li class="nav-submenu__item">
                                            <a href="{{ url('/fashion-retail') }}"
                                                class="nav-submenu__link {{ request()->is('fashion-retail*') ? 'tw-bg-main-600 tw-text-white' : 'hover-bg-neutral-100 text-black' }} fw-medium d-block tw-py-2 tw-px-3 tw-rounded">
                                                Fashion & Retail
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <!-- Products Column -->
                                <div class="col-md-4">
                                    <h6 class="text-dark mb-3 fw-bold">Products</h6>
                                    <ul class="list-unstyled">
                                        <li class="nav-submenu__item mb-2">
                                            <a href="{{ url('/drop-ship') }}"
                                                class="nav-submenu__link {{ request()->is('drop-ship*') ? 'tw-bg-main-600 tw-text-white' : 'hover-bg-neutral-100 text-black' }} fw-medium d-block tw-py-2 tw-px-3 tw-rounded">
                                                Drop & Ship
                                            </a>
                                        </li>
                                        <li class="nav-submenu__item mb-2">
                                            <a href="{{ url('/pickup-points') }}"
                                                class="nav-submenu__link {{ request()->is('pickup-points*') ? 'tw-bg-main-600 tw-text-white' : 'hover-bg-neutral-100 text-black' }} fw-medium d-block tw-py-2 tw-px-3 tw-rounded">
                                                Aramex Pickup Points
                                            </a>
                                        </li>
                                        <li class="nav-submenu__item mb-2">
                                            <a href="{{ url('/click-to-ship') }}"
                                                class="nav-submenu__link {{ request()->is('click-to-ship*') ? 'tw-bg-main-600 tw-text-white' : 'hover-bg-neutral-100 text-black' }} fw-medium d-block tw-py-2 tw-px-3 tw-rounded">
                                                ClickToShip
                                            </a>
                                        </li>
                                        <li class="nav-submenu__item mb-2">
                                            <a href="{{ url('/pick-drop-partner') }}"
                                                class="nav-submenu__link {{ request()->is('pick-drop-partner*') ? 'tw-bg-main-600 tw-text-white' : 'hover-bg-neutral-100 text-black' }} fw-medium d-block tw-py-2 tw-px-3 tw-rounded">
                                                Pick & Drop Partner Program
                                            </a>
                                        </li>
                                        <li class="nav-submenu__item">
                                            <a href="{{ url('/shop-ship') }}"
                                                class="nav-submenu__link {{ request()->is('shop-ship*') ? 'tw-bg-main-600 tw-text-white' : 'hover-bg-neutral-100 text-black' }} fw-medium d-block tw-py-2 tw-px-3 tw-rounded">
                                                Shop & Ship
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </ul>
                    </li>

                    <li
                        class="nav-menu__item has-submenu position-relative {{ request()->is('nearest-office*', 'support*', 'faqs*') ? 'activePage' : '' }}">
                        <a href="javascript:void(0)"
                            class="nav-menu__link hover--translate-y-1 text-main-two-600 tw-py-9 fw-medium w-100 tw-pe-4">Contact</a>
                        <ul
                            class="nav-submenu scroll-sm position-absolute start-0 top-100 tw-w-max bg-white tw-rounded-md overflow-hidden tw-p-2 tw-mt-4 tw-duration-200 tw-z-99">
                            <li class="nav-submenu__item d-block tw-rounded tw-duration-200 position-relative">
                                <a href="{{ url('/nearest-office') }}"
                                    class="nav-submenu__link {{ request()->is('nearest-office*') ? 'tw-text-[#DF1118] tw-bg-white' : 'hover-bg-neutral-100 text-black' }} fw-medium w-100 d-block tw-py-2 tw-px-305 tw-rounded">
                                    Find Nearest Office
                                </a>
                            </li>
                            <li class="nav-submenu__item d-block tw-rounded tw-duration-200 position-relative">
                                <a href="{{ url('/support') }}"
                                    class="nav-submenu__link {{ request()->is('support*') ? 'tw-text-[#DF1118] tw-bg-white' : 'hover-bg-neutral-100 text-black' }} fw-medium w-100 d-block tw-py-2 tw-px-305 tw-rounded">
                                    Help & Support Center
                                </a>
                            </li>
                            <li class="nav-submenu__item d-block tw-rounded tw-duration-200 position-relative">
                                <a href="{{ url('/faqs') }}"
                                    class="nav-submenu__link {{ request()->is('faqs*') ? 'tw-text-[#DF1118] tw-bg-white' : 'hover-bg-neutral-100 text-black' }} fw-medium w-100 d-block tw-py-2 tw-px-305 tw-rounded">
                                    Frequently Asked Questions
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- languages --}}
                    <div class="cursor-small mt-5 nav-menu__item has-submenu position-relative">
                        <div class="d-flex align-items-center tw-gap-2">
                            <a href="javascript:void(0)"
                                class="selected-text text-black py-lg-4 d-flex align-items-center gap-2">
                                <span
                                    class="tw-w-25-px tw-h-25-px border border-white border-2 rounded-circle common-shadow d-flex justify-content-center align-items-center">
                                    <img src="{{ url('assets/images/thumbs/flag1.png') }}" alt="English"
                                        class="w-100 h-100 object-fit-cover rounded-circle">
                                </span>
                                English
                            </a>
                            <span class="text-neutral-700">
                                <i class="ph-bold ph-caret-down"></i>
                            </span>
                        </div>
                        <ul
                            class="nav-submenu scroll-sm position-absolute start-0 top-100 tw-w-max bg-white tw-rounded-md overflow-hidden tw-p-4 tw-mt-4 tw-duration-200 tw-z-99">
                            <li class="mb-3">
                                <a href="javascript:void(0)" data-lang="en-US"
                                    class="text-black d-flex align-items-center gap-2 hover-text-main-600 active--translate-y-1 tw-duration-150">
                                    <span
                                        class="tw-w-25-px tw-h-25-px border border-white border-2 rounded-circle d-flex justify-content-center align-items-center">
                                        <img src="{{ url('assets/images/thumbs/flag1.png') }}" alt="English"
                                            class="w-100 h-100 object-fit-cover rounded-circle">
                                    </span>
                                    English
                                </a>
                            </li>
                            <li class="mb-3">
                                <a href="javascript:void(0)" data-lang="ja-JP"
                                    class="text-black d-flex align-items-center gap-2 hover-text-main-600 active--translate-y-1 tw-duration-150">
                                    <span
                                        class="tw-w-25-px tw-h-25-px border border-white border-2 rounded-circle d-flex justify-content-center align-items-center">
                                        <img src="{{ url('assets/images/thumbs/flag2.png') }} " alt="Japanese"
                                            class="w-100 h-100 object-fit-cover rounded-circle">
                                    </span>
                                    Japanese
                                </a>
                            </li>
                            <li class="mb-3">
                                <a href="javascript:void(0)" data-lang="fr-FR"
                                    class="text-black d-flex align-items-center gap-2 hover-text-main-600 active--translate-y-1 tw-duration-150">
                                    <span
                                        class="tw-w-25-px tw-h-25-px border border-white border-2 rounded-circle d-flex justify-content-center align-items-center">
                                        <img src="assets/images/thumbs/flag3.png" alt="French"
                                            class="w-100 h-100 object-fit-cover rounded-circle">
                                    </span>
                                    French
                                </a>
                            </li>
                            <li class="mb-3">
                                <a href="javascript:void(0)" data-lang="de-DE"
                                    class="text-black d-flex align-items-center gap-2 hover-text-main-600 active--translate-y-1 tw-duration-150">
                                    <span
                                        class="tw-w-25-px tw-h-25-px border border-white border-2 rounded-circle d-flex justify-content-center align-items-center">
                                        <img src="assets/images/thumbs/flag4.png" alt="German"
                                            class="w-100 h-100 object-fit-cover rounded-circle">
                                    </span>
                                    German
                                </a>
                            </li>
                            <li class="mb-3">
                                <a href="javascript:void(0)" data-lang="bn-BD"
                                    class="text-black d-flex align-items-center gap-2 hover-text-main-600 active--translate-y-1 tw-duration-150">
                                    <span
                                        class="tw-w-25-px tw-h-25-px border border-white border-2 rounded-circle d-flex justify-content-center align-items-center">
                                        <img src="assets/images/thumbs/flag6.png" alt="Bengali"
                                            class="w-100 h-100 object-fit-cover rounded-circle">
                                    </span>
                                    Bengali
                                </a>
                            </li>
                            <li class="mb-3">
                                <a href="javascript:void(0)" data-lang="ko-KR"
                                    class="text-black d-flex align-items-center gap-2 hover-text-main-600 active--translate-y-1 tw-duration-150">
                                    <span
                                        class="tw-w-25-px tw-h-25-px border border-white border-2 rounded-circle d-flex justify-content-center align-items-center">
                                        <img src="assets/images/thumbs/flag5.png" alt="Korean"
                                            class="w-100 h-100 object-fit-cover rounded-circle">
                                    </span>
                                    Korean
                                </a>
                            </li>
                        </ul>
                    </div>
                </ul>
                <!-- Nav menu End  -->

            </div>
        </div>
    </div>
    <!-- ==================== Mobile Menu End Here ==================== -->


    <!-- ============================ Header Top Start ==================================== -->
    <div class="bg-neutral-50 position-relative z-1 d-sm-block d-none header-top-bg">
        <div class="container tw-container-1554-px">
            <div class="d-flex align-items-center justify-content-between tw-gap-6">

                <div class="d-flex align-items-center tw-gap-6">
                    <div class="cursor-small d-flex align-items-center tw-gap-2 tw-py-205">
                        <span class="text-main-600 d-flex"><i class="ph-bold ph-map-pin"></i></span>
                        <span class="text-black xl-tw-text-sm tw-text-xs fw-medium">55 Main Street, 2nd block,
                            Malborne, Australia</span>
                    </div>
                    <div class="cursor-small d-flex align-items-center tw-gap-2 tw-py-205">
                        <span class="text-main-600 d-flex"><i class="ph-bold ph-phone"></i></span>
                        <a href="mailto:support@example.com"
                            class="text-black xl-tw-text-sm tw-text-xs fw-medium hover--translate-x-05 hover-text-main-600 tw-transition-all">support@example.com</a>
                    </div>
                </div>
                <div class="d-md-flex d-none align-items-center tw-gap-6">
                    <div class="cursor-small d-flex align-items-center tw-gap-2 tw-py-205">
                        <span class="text-main-600 d-flex"><i class="ph-bold ph-chat-circle"></i></span>
                        <a href="mailto:contact@gmail.com"
                            class="text-black xl-tw-text-sm tw-text-xs fw-medium hover--translate-x-05 hover-text-main-600 tw-transition-all">contact@gmail.com</a>
                    </div>
                    <div
                        class="cursor-small d-lg-flex d-none align-items-center tw-py-205 tw-gap-6 tw-ps-10 clip-path position-relative">
                        <span class="text-white d-flex"><i class="ph-bold ph-map-trifold"></i></span>
                        <span class="text-white xl-tw-text-sm tw-text-xs fw-medium">734 H, Bryan Burlington, NC 27215
                        </span>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- ============================ Header Top End ==================================== -->

    <!-- ==================== Header Start Here ==================== -->
    <header class="header bg-white transition-all">
        <div class="tw-container-1742-px tw-ps-4 pe-lg-0 pe-3 tw-ms-auto">
            <nav class="header-inner bg-white d-flex justify-content-between">

                <div class="d-flex align-items-center ">
                    <!-- Logo Start -->
                    <div
                        class="logo-mask-bg cursor-big position-relative d-lg-flex d-none z-1 tw-w-156-px d-flex justify-content-center align-items-center">
                        <a href="{{ url('/') }}" class="tw-mt-7">
                            <img src="assets/images/logo/logo.png" alt="Logo" class="max-w-200-px">
                        </a>
                    </div>
                    <div class="position-relative d-lg-none d-inline-block z-1">
                        <a href="{{ url('/') }}" class="cursor-big">
                            <img src="assets/images/logo/logo2.png" alt="Logo" class="max-w-100-px">
                        </a>
                    </div>
                    <!-- Logo End  -->

                    <!-- Menu Start  -->
                    <div class="header-menu d-lg-block d-none ps-108-px">
                        <!-- Nav menu Start -->
                        <ul class="nav-menu cursor-small d-lg-flex align-items-center xl-tw-gap-12 tw-gap-6">
                            <li
                                class="nav-menu__item has-submenu position-relative {{ request()->is('send-shipment*', 'shipping-rates*', 'track-shipment*') ? 'activePage' : '' }}">
                                <a href="javascript:void(0)"
                                    class="nav-menu__link hover--translate-y-1 text-main-two-600 tw-py-9 fw-medium w-100 tw-pe-4">Ship
                                    & Track</a>
                                <ul
                                    class="nav-submenu scroll-sm position-absolute start-0 top-100 tw-w-max bg-white tw-rounded-md overflow-hidden tw-p-2 tw-mt-4 tw-duration-200 tw-z-99">
                                    <li
                                        class="nav-menu__item {{ request()->is('send-shipment*') ? 'activePage' : '' }}">
                                        <a href="{{ url('/send-shipment') }}"
                                            class="nav-submenu__link {{ request()->is('send-shipment*') ? 'tw-bg-main-600 tw-text-white' : 'hover-bg-neutral-100 text-black' }} fw-medium w-100 d-block tw-py-2 tw-px-305 tw-rounded">
                                            Send a Shipment
                                        </a>
                                    </li>
                                    <li
                                        class="nav-menu__item {{ request()->is('shipping-rates*') ? 'activePage' : '' }}">
                                        <a href="{{ url('/shipping-rates') }}"
                                            class="nav-submenu__link {{ request()->is('shipping-rates*') ? 'tw-bg-main-600 tw-text-white' : 'hover-bg-neutral-100 text-black' }} fw-medium w-100 d-block tw-py-2 tw-px-305 tw-rounded">
                                            Calculate Shipping Rates
                                        </a>
                                    </li>
                                    <li
                                        class="nav-menu__item {{ request()->is('track-shipment*') ? 'activePage' : '' }}">
                                        <a href="{{ url('/track-shipment') }}"
                                            class="nav-submenu__link {{ request()->is('track-shipment*') ? 'tw-bg-main-600 tw-text-white' : 'hover-bg-neutral-100 text-black' }} fw-medium w-100 d-block tw-py-2 tw-px-305 tw-rounded">
                                            Track a Shipment
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li
                                class="nav-menu__item has-submenu position-relative {{ request()->is('project*', 'team*') ? 'activePage' : '' }}">
                                <a href="javascript:void(0)"
                                    class="nav-menu__link hover--translate-y-1 text-main-two-600 tw-py-9 fw-medium w-100 tw-pe-4">
                                    Logistics Solution
                                </a>
                                <ul class="nav-submenu scroll-sm position-absolute start-0 top-100 bg-white tw-rounded-md overflow-hidden tw-p-6 tw-mt-4 tw-duration-200 tw-z-99"
                                    style="min-width: 800px;">
                                    <div class="row g-4">
                                        <!-- Business Solutions Column -->
                                        <div class="col-md-4">
                                            <h6 class="text-dark mb-3 fw-bold">Business Solutions</h6>
                                            <ul class="list-unstyled">
                                                <li class="nav-submenu__item mb-2">
                                                    <a href="{{ url('/freight') }}"
                                                        class="nav-submenu__link {{ request()->is('freight*') ? 'tw-bg-main-600 tw-text-white' : 'hover-bg-neutral-100 text-black' }} fw-medium d-block tw-py-2 tw-px-3 tw-rounded">
                                                        Freight
                                                    </a>
                                                </li>
                                                <li class="nav-submenu__item mb-2">
                                                    <a href="{{ url('/express') }}"
                                                        class="nav-submenu__link {{ request()->is('express*') ? 'tw-bg-main-600 tw-text-white' : 'hover-bg-neutral-100 text-black' }} fw-medium d-block tw-py-2 tw-px-3 tw-rounded">
                                                        Express
                                                    </a>
                                                </li>
                                                <li class="nav-submenu__item mb-2">
                                                    <a href="{{ url('/fuel-surcharge') }}"
                                                        class="nav-submenu__link {{ request()->is('fuel-surcharge*') ? 'tw-bg-main-600 tw-text-white' : 'hover-bg-neutral-100 text-black' }} fw-medium d-block tw-py-2 tw-px-3 tw-rounded">
                                                        Fuel Surcharge
                                                    </a>
                                                </li>
                                                <li class="nav-submenu__item mb-2">
                                                    <a href="{{ url('/logistics-warehousing') }}"
                                                        class="nav-submenu__link {{ request()->is('logistics-warehousing*') ? 'tw-bg-main-600 tw-text-white' : 'hover-bg-neutral-100 text-black' }} fw-medium d-block tw-py-2 tw-px-3 tw-rounded">
                                                        Logistics & Warehousing
                                                    </a>
                                                </li>
                                                <li class="nav-submenu__item mb-2">
                                                    <a href="{{ url('/signature-surcharge') }}"
                                                        class="nav-submenu__link {{ request()->is('signature-surcharge*') ? 'tw-bg-main-600 tw-text-white' : 'hover-bg-neutral-100 text-black' }} fw-medium d-block tw-py-2 tw-px-3 tw-rounded">
                                                        Signature Surcharge
                                                    </a>
                                                </li>
                                                <li class="nav-submenu__item">
                                                    <a href="{{ url('/service-rate-guide') }}"
                                                        class="nav-submenu__link {{ request()->is('service-rate-guide*') ? 'tw-bg-main-600 tw-text-white' : 'hover-bg-neutral-100 text-black' }} fw-medium d-block tw-py-2 tw-px-3 tw-rounded">
                                                        Service & Rate Guide
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>

                                        <!-- Industry Solutions Column -->
                                        <div class="col-md-4">
                                            <h6 class="text-dark mb-3 fw-bold">Industry Solutions</h6>
                                            <ul class="list-unstyled">
                                                <li class="nav-submenu__item mb-2">
                                                    <a href="{{ url('/e-commerce-smes') }}"
                                                        class="nav-submenu__link {{ request()->is('e-commerce-smes*') ? 'tw-bg-main-600 tw-text-white' : 'hover-bg-neutral-100 text-black' }} fw-medium d-block tw-py-2 tw-px-3 tw-rounded">
                                                        E-commerce & SMEs
                                                    </a>
                                                </li>
                                                <li class="nav-submenu__item mb-2">
                                                    <a href="{{ url('/oil-gas') }}"
                                                        class="nav-submenu__link {{ request()->is('oil-gas*') ? 'tw-bg-main-600 tw-text-white' : 'hover-bg-neutral-100 text-black' }} fw-medium d-block tw-py-2 tw-px-3 tw-rounded">
                                                        Oil & Gas
                                                    </a>
                                                </li>
                                                <li class="nav-submenu__item mb-2">
                                                    <a href="{{ url('/chemicals-dangerous-goods') }}"
                                                        class="nav-submenu__link {{ request()->is('chemicals-dangerous-goods*') ? 'tw-bg-main-600 tw-text-white' : 'hover-bg-neutral-100 text-black' }} fw-medium d-block tw-py-2 tw-px-3 tw-rounded">
                                                        Chemicals & Dangerous Goods
                                                    </a>
                                                </li>
                                                <li class="nav-submenu__item mb-2">
                                                    <a href="{{ url('/healthcare') }}"
                                                        class="nav-submenu__link {{ request()->is('healthcare*') ? 'tw-bg-main-600 tw-text-white' : 'hover-bg-neutral-100 text-black' }} fw-medium d-block tw-py-2 tw-px-3 tw-rounded">
                                                        Healthcare
                                                    </a>
                                                </li>
                                                <li class="nav-submenu__item">
                                                    <a href="{{ url('/fashion-retail') }}"
                                                        class="nav-submenu__link {{ request()->is('fashion-retail*') ? 'tw-bg-main-600 tw-text-white' : 'hover-bg-neutral-100 text-black' }} fw-medium d-block tw-py-2 tw-px-3 tw-rounded">
                                                        Fashion & Retail
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>

                                        <!-- Products Column -->
                                        <div class="col-md-4">
                                            <h6 class="text-dark mb-3 fw-bold">Products</h6>
                                            <ul class="list-unstyled">
                                                <li class="nav-submenu__item mb-2">
                                                    <a href="{{ url('/drop-ship') }}"
                                                        class="nav-submenu__link {{ request()->is('drop-ship*') ? 'tw-bg-main-600 tw-text-white' : 'hover-bg-neutral-100 text-black' }} fw-medium d-block tw-py-2 tw-px-3 tw-rounded">
                                                        Drop & Ship
                                                    </a>
                                                </li>
                                                <li class="nav-submenu__item mb-2">
                                                    <a href="{{ url('/pickup-points') }}"
                                                        class="nav-submenu__link {{ request()->is('pickup-points*') ? 'tw-bg-main-600 tw-text-white' : 'hover-bg-neutral-100 text-black' }} fw-medium d-block tw-py-2 tw-px-3 tw-rounded">
                                                        Aramex Pickup Points
                                                    </a>
                                                </li>
                                                <li class="nav-submenu__item mb-2">
                                                    <a href="{{ url('/click-to-ship') }}"
                                                        class="nav-submenu__link {{ request()->is('click-to-ship*') ? 'tw-bg-main-600 tw-text-white' : 'hover-bg-neutral-100 text-black' }} fw-medium d-block tw-py-2 tw-px-3 tw-rounded">
                                                        ClickToShip
                                                    </a>
                                                </li>
                                                <li class="nav-submenu__item mb-2">
                                                    <a href="{{ url('/pick-drop-partner') }}"
                                                        class="nav-submenu__link {{ request()->is('pick-drop-partner*') ? 'tw-bg-main-600 tw-text-white' : 'hover-bg-neutral-100 text-black' }} fw-medium d-block tw-py-2 tw-px-3 tw-rounded">
                                                        Pick & Drop Partner Program
                                                    </a>
                                                </li>
                                                <li class="nav-submenu__item">
                                                    <a href="{{ url('/shop-ship') }}"
                                                        class="nav-submenu__link {{ request()->is('shop-ship*') ? 'tw-bg-main-600 tw-text-white' : 'hover-bg-neutral-100 text-black' }} fw-medium d-block tw-py-2 tw-px-3 tw-rounded">
                                                        Shop & Ship
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </ul>
                            </li>

                            <li
                                class="nav-menu__item has-submenu position-relative {{ request()->is('nearest-office*', 'support*', 'faqs*') ? 'active' : '' }}">
                                <a href="javascript:void(0)"
                                    class="nav-menu__link hover--translate-y-1 text-main-two-600 tw-py-9 fw-medium w-100 tw-pe-4">Contact</a>
                                <ul
                                    class="nav-submenu scroll-sm position-absolute start-0 top-100 tw-w-max bg-white tw-rounded-md overflow-hidden tw-p-2 tw-mt-4 tw-duration-200 tw-z-99">
                                    <li class="nav-submenu__item d-block tw-rounded tw-duration-200 position-relative">
                                        <a href="{{ url('/nearest-office') }}"
                                            class="nav-submenu__link {{ request()->is('nearest-office') ? 'active' : '' }} hover-bg-neutral-100 text-black fw-medium w-100 d-block tw-py-2 tw-px-305 tw-rounded">
                                            Find Nearest Office
                                        </a>
                                    </li>
                                    <li class="nav-submenu__item d-block tw-rounded tw-duration-200 position-relative">
                                        <a href="{{ url('/support') }}"
                                            class="nav-submenu__link hover-bg-neutral-100 text-black fw-medium w-100 d-block tw-py-2 tw-px-305 tw-rounded">
                                            Help & Support Center
                                        </a>
                                    </li>
                                    <li class="nav-submenu__item d-block tw-rounded tw-duration-200 position-relative">
                                        <a href="{{ url('/faqs') }}"
                                            class="nav-submenu__link hover-bg-neutral-100 text-black fw-medium w-100 d-block tw-py-2 tw-px-305 tw-rounded">
                                            Frequently Asked Questions
                                        </a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                        <!-- Nav menu End  -->

                    </div>
                    <!-- Menu End  -->
                </div>

                <!-- Header Right start -->
                <div class="d-flex gap-xxl-5 gap-3">
                    <div class="d-flex align-items-center xl-tw-gap-7 tw-gap-6 flex-shrink-0">

                        <!-- Language Start -->
                        <div class="cursor-small position-relative group-item hover-mt-0 d-none d-lg-block">
                            <div class="d-flex align-items-center  tw-gap-2">
                                <a href="javascript:void(0)"
                                    class="selected-text text-black py-lg-4 d-flex align-items-center gap-2">
                                    <span
                                        class="tw-w-25-px tw-h-25-px border border-white border-2 rounded-circle common-shadow d-flex justify-content-center align-items-center">
                                        <img src="assets/images/thumbs/flag1.png" alt=""
                                            class="w-100 h-100 object-fit-cover rounded-circle">
                                    </span>
                                    English
                                </a>
                                <span class="text-neutral-700">
                                    <i class="ph-bold ph-caret-down"></i>
                                </span>
                            </div>
                            <ul
                                class="lang-dropdown tw-max-h-300-px overflow-y-auto scroll-sm bg-white common-shadow tw-px-4 tw-py-3 position-absolute tw-end-0 top-100 min-w-max tw-rounded-lg d-flex flex-column tw-gap-3 tw-invisible opacity-0 group-hover-item-visible group-hover-item-opacity-1 tw-duration-200 group-hover-item-mt-0 tw-mt-4 tw-z-99">
                                <li>
                                    <a href="javascript:void(0)"
                                        class="text-black d-flex align-items-center gap-2 hover-text-main-600 active--translate-y-1 tw-duration-150">
                                        <span
                                            class="tw-w-25-px tw-h-25-px border border-white border-2 rounded-circle d-flex justify-content-center align-items-center">
                                            <img src="assets/images/thumbs/flag1.png" alt=""
                                                class="w-100 h-100 object-fit-cover rounded-circle">
                                        </span>
                                        English
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"
                                        class="text-black d-flex align-items-center gap-2 hover-text-main-600 active--translate-y-1 tw-duration-150">
                                        <span
                                            class="tw-w-25-px tw-h-25-px border border-white border-2 rounded-circle d-flex justify-content-center align-items-center">
                                            <img src="assets/images/thumbs/flag2.png" alt=""
                                                class="w-100 h-100 object-fit-cover rounded-circle">
                                        </span>
                                        Japan
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"
                                        class="text-black d-flex align-items-center gap-2 hover-text-main-600 active--translate-y-1 tw-duration-150">
                                        <span
                                            class="tw-w-25-px tw-h-25-px border border-white border-2 rounded-circle d-flex justify-content-center align-items-center">
                                            <img src="assets/images/thumbs/flag3.png" alt=""
                                                class="w-100 h-100 object-fit-cover rounded-circle">
                                        </span>
                                        French
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"
                                        class="text-black d-flex align-items-center gap-2 hover-text-main-600 active--translate-y-1 tw-duration-150">
                                        <span
                                            class="tw-w-25-px tw-h-25-px border border-white border-2 rounded-circle d-flex justify-content-center align-items-center">
                                            <img src="assets/images/thumbs/flag4.png" alt=""
                                                class="w-100 h-100 object-fit-cover rounded-circle">
                                        </span>
                                        Germany
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"
                                        class="text-black d-flex align-items-center gap-2 hover-text-main-600 active--translate-y-1 tw-duration-150">
                                        <span
                                            class="tw-w-25-px tw-h-25-px border border-white border-2 rounded-circle d-flex justify-content-center align-items-center">
                                            <img src="assets/images/thumbs/flag6.png" alt=""
                                                class="w-100 h-100 object-fit-cover rounded-circle">
                                        </span>
                                        Bangladesh
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"
                                        class="text-black d-flex align-items-center gap-2 hover-text-main-600 active--translate-y-1 tw-duration-150">
                                        <span
                                            class="tw-w-25-px tw-h-25-px border border-white border-2 rounded-circle d-flex justify-content-center align-items-center">
                                            <img src="assets/images/thumbs/flag5.png" alt=""
                                                class="w-100 h-100 object-fit-cover rounded-circle">
                                        </span>
                                        Sought Kores
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- Language End -->
                        <li class="nav-submenu__item d-block tw-rounded tw-duration-200 position-relative">
                            <button type="button" class="btn btn-danger rounded fw-bold" data-bs-toggle="modal"
                                data-bs-target="#loginModal">
                                Login
                            </button>

                        </li>

                        <!-- Line Start -->
                        <span class="line h-100"></span>
                        <!-- Line End -->

                        <!-- Bar icon -->
                        <button type="button"
                            class="offcanvas-bar-icon cursor-small hover--translate-y-1 active--translate-y-05 tw-duration-150">
                            <img src="assets/images/icons/bars.svg" alt="">
                        </button>
                        <!-- Bar icon End -->
                    </div>

                    <!-- Social icons Start -->
                    <ul class=" d-lg-grid d-none grid-cols-2 bg-main-two-600 h-100 tw-w-200-px">
                        <li class="border-bottom border-neutral-1100 border-end">
                            <a href="https://www.twitter.com/"
                                class="hover-scale-20 cursor-small text-white tw-text-base w-100 h-100 d-flex justify-content-center align-items-center">
                                <i class="ph-fill ph-twitter-logo"></i>
                            </a>
                        </li>
                        <li class="border-bottom border-neutral-1100">
                            <a href="https://www.facebook.com/"
                                class="hover-scale-20 cursor-small text-white tw-text-base w-100 h-100 d-flex justify-content-center align-items-center">
                                <i class="ph-fill ph-facebook-logo"></i>
                            </a>
                        </li>
                        <li class="border-end border-neutral-1100">
                            <a href="https://www.instagram.com/"
                                class="hover-scale-20 cursor-small text-white tw-text-base w-100 h-100 d-flex justify-content-center align-items-center">
                                <i class="ph-bold ph-instagram-logo"></i>
                            </a>
                        </li>
                        <li class="">
                            <a href="https://www.youtube.com/"
                                class="hover-scale-20 cursor-small text-white tw-text-base w-100 h-100 d-flex justify-content-center align-items-center">
                                <i class="ph-fill ph-youtube-logo"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- Social icons End -->

                    <button type="button"
                        class="toggle-mobileMenu leading-none d-lg-none text-main-two-600 tw-text-9">
                        <i class="ph ph-list"></i>
                    </button>
                </div>

                <!-- Header Right End  -->
            </nav>
        </div>
    </header>

    {{-- login section --}}
    @include('auth.login')

    @yield('content')
    <!--====== FOOTER PART START ======-->

    <!-- ============================ Footer Two start ============================== -->
    <footer class="footer bg-main-two-900 position-relative z-1 mt-auto pt-140">
        <div class="container">
            <div class="tw-pb-84-px">
                <div class="row gy-5">
                    <div class="col-xl-6 pe-xxl-5 aos-init" data-aos="fade-up" data-aos-duration="1000"
                        data-aos-delay="100">
                        <div class="bg-white-01 tw-rounded-xl p-lg-5 tw-p-6 position-relative z-1">
                            <img src="{{ url('assets/images/shapes/contact-box-shape.png') }} " alt=""
                                class="position-absolute top-0 tw-end-0 h-100 z-n1">

                            <h4 class="tw-mb-7 text-white cursor-big splitTextStyleTwo">Subscribe Newsletter</h4>
                            <p class="text-neutral-50 fw-semibold cursor-small">We understand that every challenge is
                                an opportunity </p>

                            <div class="tw-mt-15">
                                <form action="#" class="d-flex flex-sm-row flex-column tw-gap-5">
                                    <div class="position-relative flex-grow-1">
                                        <input type="text"
                                            class="tw-h-14 tw-rounded-lg bg-white-01 tw-ps-12 border border-neutral-1100 focus-border-main-600 text-white focus-outline-0 w-100 cursor-big tw-pe-6"
                                            placeholder="Email Address">
                                        <span
                                            class="text-white tw-text-lg position-absolute top-50 tw-start-0 tw--translate-y-50 tw-ms-5 d-flex">
                                            <i class="ph ph-envelope-simple"></i>
                                        </span>
                                    </div>
                                    <button type="submit"
                                        class="cursor-small btn btn-main hover-style-two button--stroke d-inline-flex align-items-center justify-content-center tw-gap-2 group active--translate-y-2 fw-semibold flex-grow-1 flex-shrink-0"
                                        data-block="button">
                                        <span class="button__flair"></span>
                                        <span class="button__label">Sign Up</span>
                                        <span
                                            class="text-white tw-text-sm tw-rounded d-flex justify-content-center align-items-center position-relative group-hover-text-main-600 tw-duration-500">
                                            <i class="ph-bold ph-caret-right"></i>
                                        </span>
                                    </button>
                                </form>
                            </div>

                            <div class="d-flex align-items-center tw-gap-4 tw-mt-7">
                                <span
                                    class="tw-w-6 tw-h-6 rounded-circle border border-neutral-1100 d-flex justify-content-center align-items-center text-main-600">
                                    <i class="ph-bold ph-check"></i>
                                </span>
                                <p class="text-neutral-500 fw-bold cursor-small">By subscribing, you're accept
                                    <a href="{{ url('/privacy-policy') }}"
                                        class="text-white text-decoration-underline hover-text-main-600 hover--translate-y-1">Privacy
                                        Policy</a>
                                </p>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-3 ps-xxl-5 aos-init" data-aos="fade-up" data-aos-duration="1000"
                        data-aos-delay="200">
                        <h5 class="text-white tw-mb-6 cursor-big splitTextStyleTwo">Logistics Solution</h5>
                        <ul class="d-flex flex-column tw-gap-6">
                            <li>
                                <a href="{{ url('/e-commerce-smes') }}"
                                    class="hover-arrow cursor-small position-relative text-neutral-500 hover-text-main-600 fw-semibold">
                                    E-commerce & SMEs</a>
                            </li>
                            <li>
                                <a href="{{ url('/oil-gas') }}"
                                    class="hover-arrow cursor-small position-relative text-neutral-500 hover-text-main-600 fw-semibold">Our
                                    Oil & Gas</a>
                            </li>
                            <li>
                                <a href="{{ url('/chemicals-dangerous-goods') }}"
                                    class="hover-arrow cursor-small position-relative text-neutral-500 hover-text-main-600 fw-semibold">
                                    Chemicals & Dangerous Goods</a>
                            </li>
                            <li>
                                <a href="{{ url('/healthcare') }}"
                                    class="hover-arrow cursor-small position-relative text-neutral-500 hover-text-main-600 fw-semibold">Healthcare
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/fashion-retail') }}"
                                    class="hover-arrow cursor-small position-relative text-neutral-500 hover-text-main-600 fw-semibold">
                                    Fashion & Retail</a>
                            </li>
                            <li>
                                <a href="{{ url('/drop-ship') }}"
                                    class="hover-arrow cursor-small position-relative text-neutral-500 hover-text-main-600 fw-semibold">
                                    Drop & Ship</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xl-3 ps-xxl-5 aos-init" data-aos="fade-up" data-aos-duration="1000"
                        data-aos-delay="300">
                        <div class="d-flex flex-column flex-wrap tw-gap-10">
                            <div class="">
                                <h5 class="text-white tw-mb-6 cursor-big splitTextStyleTwo">Locations</h5>
                                <p class="position-relative text-neutral-500 fw-semibold cursor-small">55 Main Street,
                                    2nd block Malborne, Australia</p>
                            </div>
                            <div class="">
                                <h5 class="text-white tw-mb-6 cursor-big">Contact</h5>
                                <a href="mailto:support@gmail.com"
                                    class="cursor-small hover--translate-x-2 position-relative text-neutral-500 hover-text-main-600 fw-semibold">support@gmail.com</a>
                                <a href="tel:+880(123)45688"
                                    class="cursor-big hover--translate-x-2 tw-mt-2 fw-bold position-relative text-main-600 tw-text-2xl hover-text-main-700 fw-semibold">+880
                                    (123) 456 88</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container">
            <!-- bottom Footer -->
            <div class="border-top border-dashed border-neutral-1100 border-0 tw-py-8">
                <div class="container container-two">
                    <div class="d-flex align-items-center justify-content-between tw-gap-6 flex-wrap">
                        <div class="mb-0">
                            <a href="{{ url('/') }}" class="cursor-big"> <img
                                    src="{{ url('assets/images/logo/logo3.png') }}" alt=""></a>
                        </div>
                        <p class="text--white text-line-1 fw-normal cursor-small">{{ date('Y') }} ©
                            <a href="{{ url('') }}"
                                class="text-main-600 hover--translate-y-1 fw-bold hover-underline hover-text-main-600 cursor-big">{{ config('website.name') }}</a>
                            - Logistic Service. All rights reserved.
                        </p>
                    </div>
                    <div class="d-flex align-items-center tw-gap-6">
                        <a href="{{ url('/about') }}"
                            class="fw-semibold text-neutral-500 hover-text-white hover-underline cursor-small hover--translate-y-1">Company</a>
                        <a href="{{ url('/support') }}"
                            class="fw-semibold text-neutral-500 hover-text-white hover-underline cursor-small hover--translate-y-1">Support</a>
                        <a href="{{ url('/privacy-policy') }}"
                            class="fw-semibold text-neutral-500 hover-text-white hover-underline cursor-small hover--translate-y-1">Privacy</a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </footer>
    <!-- ============================ Footer Two End ============================== -->

    <!--====== FOOTER PART ENDS ======-->


    <!--====== BACK TO TP PART ENDS ======-->
    <!-- Side Navigation Script -->

    <!-- Scripts -->
    <script src="{{ url('assets/js/jquery-3.7.1.min.js?v=' . env('CACHE_VERSION')) }}"></script>
    <script src="{{ url('assets/js/phosphor-icon.js?v=' . env('CACHE_VERSION')) }}"></script>
    <script src="{{ url('assets/js/boostrap.bundle.min.js?v=' . env('CACHE_VERSION')) }}"></script>
    <script src="{{ url('assets/js/swiper-bundle.min.js?v=' . env('CACHE_VERSION')) }}"></script>
    <script src="{{ url('assets/js/SplitText.min.js?v=' . env('CACHE_VERSION')) }}"></script>
    <script src="{{ url('assets/js/ScrollTrigger.min.js?v=' . env('CACHE_VERSION')) }}"></script>
    <script src="{{ url('assets/js/gsap.min.js?v=' . env('CACHE_VERSION')) }}"></script>
    <script src="{{ url('assets/js/custom-gsap.js?v=' . env('CACHE_VERSION')) }}"></script>
    <script src="{{ url('assets/js/aos.js?v=' . env('CACHE_VERSION')) }}"></script>
    <script src="{{ url('assets/js/animated-radial-progress.js?v=' . env('CACHE_VERSION')) }}"></script>
    <script src="{{ url('assets/js/counterup.min.js?v=' . env('CACHE_VERSION')) }}"></script>
    <script src="{{ url('assets/js/magnific-popup.min.js?v=' . env('CACHE_VERSION')) }}"></script>
    <script src="{{ url('assets/js/jquery.marquee.min.js?v=' . env('CACHE_VERSION')) }}"></script>
    <script src="{{ url('assets/js/main.js?v=' . env('CACHE_VERSION')) }}"></script>

</body>

</html>
