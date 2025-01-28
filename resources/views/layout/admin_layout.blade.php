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
    <!-- Add Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Add Sidebar CSS -->
    <style>
        /* Layout Styles */
        body {
            min-height: 100vh;
            background: #f6f9fc;
        }

        /* Sidebar Styles */
        .sidebar {
            height: 100vh;
            width: 300px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #ffffff;
            box-shadow: 4px 0 10px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            z-index: 1000;
            overflow-y: auto;
        }

        .sidebar::-webkit-scrollbar {
            width: 5px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: #dc2626;
            border-radius: 10px;
        }

        .sidebar.collapsed {
            width: 0;
            transform: translateX(-100%);
        }

        .sidebar-header {
            padding: 24px;
            background: linear-gradient(135deg, #dc2626, #ef4444);
            color: white;
            margin-bottom: 10px;
        }

        .sidebar-logo {
            font-size: 24px;
            font-weight: bold;
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .sidebar-logo:hover {
            color: white;
            text-decoration: none;
        }

        .sidebar-logo img {
            max-height: 45px;
            border-radius: 8px;
        }

        .nav-section {
            padding: 0 15px;
            margin-bottom: 15px;
        }

        .nav-section-title {
            font-size: 12px;
            text-transform: uppercase;
            color: #6b7280;
            font-weight: 600;
            padding: 0 15px;
            margin-bottom: 10px;
            letter-spacing: 0.5px;
        }

        .nav-item {
            position: relative;
            display: flex;
            align-items: center;
            padding: 16px 20px;
            color: #4b5563;
            text-decoration: none;
            transition: all 0.2s ease;
            border-radius: 12px;
            margin-bottom: 5px;
            font-weight: 500;
        }

        .nav-item:hover {
            background-color: #f8fafc;
            color: #dc2626;
            transform: translateX(5px);
        }

        .nav-item.active {
            background-color: #fef2f2;
            color: #dc2626;
            font-weight: 600;
        }

        .nav-icon {
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
            font-size: 18px;
        }

        .nav-text {
            flex-grow: 1;
        }

        .nav-arrow {
            margin-left: auto;
            opacity: 0;
            transition: all 0.2s ease;
        }

        .nav-item:hover .nav-arrow {
            opacity: 1;
            transform: translateX(5px);
        }

        /* Main Content Styles */
        .main-content {
            margin-left: 270px;
            padding: 30px;
            transition: all 0.3s ease;
            min-height: 100vh;
        }

        .main-content.expanded {
            margin-left: 0;
        }

        /* Toggle Button */
        .sidebar-toggle {
            position: fixed;
            left: 20px;
            top: 20px;
            z-index: 1001;
            background: #dc2626;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 10px;
            cursor: pointer;
            display: none;
            box-shadow: 0 2px 10px rgba(220, 38, 38, 0.2);
            transition: all 0.2s ease;
        }

        .sidebar-toggle:hover {
            background: #b91c1c;
            transform: scale(1.05);
        }

        /* Divider */
        .sidebar-divider {
            height: 1px;
            background-color: #e5e7eb;
            margin: 15px 0;
            opacity: 0.7;
        }

        /* User Profile Section */
        .user-profile {
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 10px 15px 20px;
            background: #f8fafc;
            border-radius: 12px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: #dc2626;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .user-info {
            flex-grow: 1;
        }

        .user-name {
            font-weight: 600;
            color: #1f2937;
            font-size: 14px;
        }

        .user-role {
            color: #6b7280;
            font-size: 12px;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .sidebar {
                width: 280px;
            }

            .main-content {
                margin-left: 280px;
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .sidebar-toggle {
                display: block;
            }
        }
    </style>
</head>

<body>

    <!-- Your content here -->
    {{ csrf_field() }}
    <!--====== PRELOADER PART START ======-->
    <!-- Toggle Button -->
    <button class="sidebar-toggle" id="sidebarToggle">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <a href="{{ url('dashboard') }}" class="sidebar-logo">
                <img src="{{ asset('assets/images/logo/logo.png') }}" alt="{{ config('website.name') }}">
                {{ config('website.name') }}
            </a>
        </div>
        <!-- User Profile -->
        <div class="user-profile">
            <div class="user-avatar">
                JS
            </div>
            <div class="user-info">
                <div class="user-name">Joseph Sule</div>
                <div class="user-role">Administrator</div>
            </div>
        </div>

        <nav class="sidebar-nav">
            <a href="{{ url('dashboard') }}" class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
                <span class="nav-icon">
                    <i class="fas fa-home"></i>
                </span>
                <span class="nav-text">My Dashboard</span>
                <span class="nav-arrow">→</span>
            </a>

            <a href="{{ url('profile') }}" class="nav-item {{ request()->is('profile') ? 'active' : '' }}">
                <span class="nav-icon">
                    <i class="fas fa-user"></i>
                </span>
                <span class="nav-text">My Profile</span>
                <span class="nav-arrow">→</span>
            </a>

            <a href="{{ url('accounts') }}" class="nav-item {{ request()->is('accounts') ? 'active' : '' }}">
                <span class="nav-icon">
                    <i class="fas fa-users"></i>
                </span>
                <span class="nav-text">My Accounts</span>
                <span class="nav-arrow">→</span>
            </a>

            <div class="sidebar-divider"></div>

            <a href="{{ url('shipments') }}" class="nav-item {{ request()->is('shipments') ? 'active' : '' }}">
                <span class="nav-icon">
                    <i class="fas fa-box"></i>
                </span>
                <span class="nav-text">My Shipments</span>
                <span class="nav-arrow">→</span>
            </a>

            <a href="{{ url('address-book') }}"
                class="nav-item {{ request()->is('address-book') ? 'active' : '' }}">
                <span class="nav-icon">
                    <i class="fas fa-book"></i>
                </span>
                <span class="nav-text">Address Book</span>
                <span class="nav-arrow">→</span>
            </a>

            <a href="{{ url('support') }}" class="nav-item {{ request()->is('support') ? 'active' : '' }}">
                <span class="nav-icon">
                    <i class="fas fa-headset"></i>
                </span>
                <span class="nav-text">Support Requests</span>
                <span class="nav-arrow">→</span>
            </a>

            <a href="{{ url('supplies') }}" class="nav-item {{ request()->is('supplies') ? 'active' : '' }}">
                <span class="nav-icon">
                    <i class="fas fa-shopping-cart"></i>
                </span>
                <span class="nav-text">Order Supplies</span>
                <span class="nav-arrow">→</span>
            </a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        @yield('content')
    </div>


    <!--====== BACK TO TP PART ENDS ======-->
    <!-- Side Navigation Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            const sidebarToggle = document.getElementById('sidebarToggle');

            sidebarToggle.addEventListener('click', function(e) {
                e.stopPropagation();
                sidebar.classList.toggle('active');
            });

            // Close sidebar when clicking outside on mobile
            document.addEventListener('click', function(event) {
                const isClickInside = sidebar.contains(event.target) ||
                    sidebarToggle.contains(event.target);

                if (!isClickInside && window.innerWidth <= 768) {
                    sidebar.classList.remove('active');
                }
            });

            // Handle window resize
            window.addEventListener('resize', function() {
                if (window.innerWidth > 768) {
                    sidebar.classList.remove('active');
                }
            });
        });
    </script>
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
