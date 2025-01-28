<!DOCTYPE html>
<html lang="en" data-wf-page="{{ $data_wf_page ?? '' }}" data-wf-site="63b261b248057c80966627">

<head>


    <!-- Title and Meta Description -->
    <title>{{ $meta_title ?? config('website.name') . ' Logistics' }}</title>
    <meta name="description"
        content="{{ $meta_desc ?? config('website.name') . ' Logistics: Fast & reliable shipping, courier, & logistics services for domestic & international shipments' }}">
    <meta name="author" content="{{ $meta_author ?? config('website.name') . ' Logistics' }}">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ url('assets/images/logo/favicon.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('assets/images/logo/favicon.png') }}">

    <!-- Apple Touch Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('assets/images/logo/favicon.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ url('assets/images/logo/favicon.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ url('assets/images/logo/favicon.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ url('assets/images/logo/favicon.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ url('assets/images/logo/favicon.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ url('assets/images/logo/favicon.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ url('assets/images/logo/favicon.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ url('assets/images/logo/favicon.png') }}">

    <!-- Android Icons -->
    <link rel="icon" type="image/png" sizes="192x192" href="{{ url('assets/images/logo/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ url('assets/images/logo/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('assets/images/logo/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('assets/images/logo/favicon.png') }}">

    <!-- Microsoft Tile -->
    <meta name="msapplication-TileImage" content="{{ url('assets/images/logo/favicon.png') }}">
    <meta name="msapplication-TileColor" content="#ffffff">

    <!-- PWA Meta Tags -->
    <meta name="apple-mobile-web-app-title" content="{{ config('website.name') }} Logistics">
    <meta name="application-name" content="{{ config('website.name') }} Logistics">
    <meta name="theme-color" content="#ffffff">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $meta_title ?? config('website.name') . ' Logistics' }}">
    <meta property="og:description"
        content="{{ $meta_desc ?? config('website.name') . ' Logistics offers fast & reliable shipping services' }}">
    <meta property="og:image" content="{{ $meta_image ?? url('assets/images/logo/favicon.png') }}">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="{{ $meta_title ?? config('website.name') . ' Logistics' }}">
    <meta name="twitter:description"
        content="{{ $meta_desc ?? config('website.name') . ' Logistics offers fast & reliable shipping services' }}">
    <meta name="twitter:image" content="{{ $meta_image ?? url('assets/images/logo/favicon.png') }}">

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

    <!-- CSS Dependencies -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css?v=' . env('CACHE_VERSION')) }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Custom Fonts -->
    <link rel="stylesheet" href="{{ url('assets/css/satoshi.css?v=' . env('CACHE_VERSION')) }}">
    <!-- Plugins -->
    <link rel="stylesheet" href="{{ url('assets/css/swiper-bundle.min.css?v=' . env('CACHE_VERSION')) }}">
    <link rel="stylesheet" href="{{ url('assets/css/aos.css?v=' . env('CACHE_VERSION')) }}">
    <link rel="stylesheet" href="{{ url('assets/css/animated-radial-progress.css?v=' . env('CACHE_VERSION')) }}">
    <link rel="stylesheet" href="{{ url('assets/css/magnific-popup.css?v=' . env('CACHE_VERSION')) }}">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ url('assets/css/main.css?v=' . env('CACHE_VERSION')) }}">

    <!-- Preload Critical Resources -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

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

        /* Enhanced Profile Dropdown Styles */
        .user-profile {
            cursor: pointer;
            position: relative;
            padding: 15px;
            border-radius: 12px;
            transition: all 0.2s ease;
        }

        .user-profile:hover {
            background: #f1f5f9;
        }

        .profile-dropdown {
            position: absolute;
            top: calc(100% + 5px);
            left: 15px;
            right: 15px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
            z-index: 1000;
        }

        .profile-dropdown.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .profile-dropdown-item {
            padding: 12px 16px;
            color: #4b5563;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: all 0.2s;
            text-decoration: none;
            font-size: 14px;
        }

        .profile-dropdown-item:first-child {
            border-radius: 12px 12px 0 0;
        }

        .profile-dropdown-item:last-child {
            border-radius: 0 0 12px 12px;
        }

        .profile-dropdown-item:hover {
            background: #f8fafc;
            color: #dc2626;
            padding-left: 20px;
        }

        .profile-dropdown-divider {
            height: 1px;
            background: #e5e7eb;
            margin: 4px 0;
        }

        /* Enhanced Sidebar Dropdown Styles */
        .nav-item-dropdown {
            margin-bottom: 5px;
        }

        .nav-item.dropdown-toggle {
            position: relative;
            cursor: pointer;
        }

        .nav-item.dropdown-toggle::after {
            content: "\f107";
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            position: absolute;
            right: 20px;
            transition: transform 0.3s ease;
        }

        .nav-item.dropdown-toggle.active::after {
            transform: rotate(-180deg);
        }

        .dropdown-menu {
            background: #f8fafc;
            list-style: none;
            margin: 5px 0;
            padding: 5px;
            border-radius: 8px;
            max-height: 0;
            overflow: hidden;
            transition: all 0.3s ease-in-out;
        }

        .dropdown-menu.show {
            max-height: 1000px;
            padding: 5px;
        }

        .dropdown-item {
            padding: 12px 15px 12px 54px;
            color: #4b5563;
            text-decoration: none;
            list-style: none;
            display: flex;
            align-items: center;
            transition: all 0.2s;
            border-radius: 8px;
            margin-bottom: 2px;
            font-size: 14px;
            position: relative;
        }

        .dropdown-item::before {
            content: "";
            position: absolute;
            left: 35px;
            top: 50%;
            width: 5px;
            height: 5px;
            border-radius: 50%;
            background: #4b5563;
            transform: translateY(-50%);
            transition: all 0.2s;
        }

        .dropdown-item:hover {
            background: #f1f5f9;
            color: #dc2626;
            transform: translateX(5px);
        }

        .dropdown-item:hover::before {
            background: #dc2626;
        }

        .dropdown-item.active {
            background: #fef2f2;
            color: #dc2626;
            font-weight: 500;
        }

        .dropdown-item.active::before {
            background: #dc2626;
        }

        /* Enhanced Mobile Responsiveness */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                max-width: 300px;
            }

            .profile-dropdown {
                position: fixed;
                top: unset;
                bottom: 0;
                left: 0;
                right: 0;
                transform: translateY(100%);
                border-radius: 20px 20px 0 0;
                padding: 20px;
                background: white;
            }

            .profile-dropdown.show {
                transform: translateY(0);
            }

            .profile-dropdown-item {
                padding: 15px;
                font-size: 16px;
            }

            .dropdown-menu {
                background: white;
            }

            .nav-item.dropdown-toggle::after {
                right: 15px;
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
        <div class="user-profile" id="userProfile">
            <div class="user-avatar">JS</div>
            <div class="user-info">
                <div class="user-name">Joseph Sule</div>
                <div class="user-role">User</div>
            </div>
            <i class="fas fa-chevron-down ms-2"></i>

            <!-- Profile Dropdown -->
            <div class="profile-dropdown" id="profileDropdown">
                <a href="{{ url('profile') }}" class="profile-dropdown-item">
                    <i class="fas fa-user"></i>
                    View Profile
                </a>

                <div class="profile-dropdown-divider"></div>
                <a href="{{ url('logout') }}" class="profile-dropdown-item text-red-600">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                </a>
            </div>
        </div>
        <nav class="sidebar-nav">
            <!-- Dashboard Link -->
            <a href="{{ url('dashboard') }}" class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
                <span class="nav-icon"><i class="fas fa-home"></i></span>
                <span class="nav-text">Dashboard</span>
                <span class="nav-arrow">→</span>
            </a>

            <!-- Account Management Dropdown -->


            <!-- Shipment Management Dropdown -->
            <div class="nav-item-dropdown">
                <div class="nav-item dropdown-toggle">
                    <span class="nav-icon"><i class="fas fa-box"></i></span>
                    <span class="nav-text">Shipments</span>
                </div>
                <div class="dropdown-menu">

                    <a href="{{ url('new-shipment') }}" style="list-style: none;"
                        class="dropdown-item {{ request()->is('new-shipment') ? 'active' : '' }}">
                        Create Shipment
                    </a>
                    <a href="{{ url('shipment-history') }}"
                        class="dropdown-item {{ request()->is('shipment-history') ? 'active' : '' }}">
                        Shipment History
                    </a>
                </div>
            </div>

            <a href="{{ url('profile') }}" class="nav-item {{ request()->is('profile') ? 'active' : '' }}">
                <span class="nav-icon">
                    <i class="fas fa-user"></i>
                </span>
                <span class="nav-text">My Profile</span>
                <span class="nav-arrow">→</span>
            </a>


            <div class="sidebar-divider"></div>



            <a href="{{ url('support') }}" class="nav-item {{ request()->is('support') ? 'active' : '' }}">
                <span class="nav-icon">
                    <i class="fas fa-headset"></i>
                </span>
                <span class="nav-text">Support Requests</span>
                <span class="nav-arrow">→</span>
            </a>

            <a href="{{ url('logout') }}" class="nav-item {{ request()->is('logout') ? 'active' : '' }}">
                <span class="nav-icon">
                    <i class="fas fa-sign-out-alt"></i>
                </span>
                <span class="nav-text">Logout</span>
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
            // Profile Dropdown Toggle
            const userProfile = document.getElementById('userProfile');
            const profileDropdown = document.getElementById('profileDropdown');

            function toggleProfileDropdown(event) {
                event.stopPropagation();
                profileDropdown.classList.toggle('show');

                // Close any open sidebar dropdowns when profile dropdown is opened
                if (profileDropdown.classList.contains('show')) {
                    document.querySelectorAll('.dropdown-menu.show').forEach(menu => {
                        menu.classList.remove('show');
                        menu.previousElementSibling.classList.remove('active');
                    });
                }
            }

            userProfile.addEventListener('click', toggleProfileDropdown);

            // Sidebar Dropdowns
            const dropdownToggles = document.querySelectorAll('.nav-item.dropdown-toggle');

            dropdownToggles.forEach(toggle => {
                toggle.addEventListener('click', function(e) {
                    e.stopPropagation();

                    // Close profile dropdown if open
                    profileDropdown.classList.remove('show');

                    // Close other dropdowns
                    dropdownToggles.forEach(otherToggle => {
                        if (otherToggle !== this) {
                            otherToggle.classList.remove('active');
                            otherToggle.nextElementSibling.classList.remove('show');
                        }
                    });

                    // Toggle current dropdown
                    this.classList.toggle('active');
                    const dropdownMenu = this.nextElementSibling;
                    dropdownMenu.classList.toggle('show');

                    // Smooth scroll into view if needed
                    if (this.classList.contains('active')) {
                        setTimeout(() => {
                            dropdownMenu.scrollIntoView({
                                behavior: 'smooth',
                                block: 'nearest'
                            });
                        }, 300);
                    }
                });
            });

            // Close all dropdowns when clicking outside
            document.addEventListener('click', function(event) {
                if (!event.target.closest('.user-profile') && !event.target.closest('.nav-item-dropdown')) {
                    profileDropdown.classList.remove('show');
                    dropdownToggles.forEach(toggle => {
                        toggle.classList.remove('active');
                        toggle.nextElementSibling.classList.remove('show');
                    });
                }
            });

            // Enhanced Mobile Support
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            const sidebarToggle = document.getElementById('sidebarToggle');

            function toggleSidebar(event) {
                event.stopPropagation();
                sidebar.classList.toggle('active');

                // Close all dropdowns when sidebar is toggled
                profileDropdown.classList.remove('show');
                dropdownToggles.forEach(toggle => {
                    toggle.classList.remove('active');
                    toggle.nextElementSibling.classList.remove('show');
                });
            }

            sidebarToggle.addEventListener('click', toggleSidebar);

            // Handle window resize
            let resizeTimer;
            window.addEventListener('resize', function() {
                clearTimeout(resizeTimer);
                resizeTimer = setTimeout(function() {
                    if (window.innerWidth > 768) {
                        sidebar.classList.remove('active');
                        // Reset all dropdowns
                        profileDropdown.classList.remove('show');
                        dropdownToggles.forEach(toggle => {
                            toggle.classList.remove('active');
                            toggle.nextElementSibling.classList.remove('show');
                        });
                    }
                }, 250);
            });

            // Add touch support for mobile
            let touchStartX = 0;
            let touchEndX = 0;

            document.addEventListener('touchstart', e => {
                touchStartX = e.changedTouches[0].screenX;
            }, false);

            document.addEventListener('touchend', e => {
                touchEndX = e.changedTouches[0].screenX;
                handleSwipe();
            }, false);

            function handleSwipe() {
                const swipeThreshold = 50;
                const swipeDistance = touchEndX - touchStartX;

                if (Math.abs(swipeDistance) > swipeThreshold) {
                    if (swipeDistance > 0 && !sidebar.classList.contains('active')) {
                        // Swipe right to open sidebar
                        sidebar.classList.add('active');
                    } else if (swipeDistance < 0 && sidebar.classList.contains('active')) {
                        // Swipe left to close sidebar
                        sidebar.classList.remove('active');
                    }
                }
            }
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
