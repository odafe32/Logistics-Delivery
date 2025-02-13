@extends('layout.home_layout')
@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #E31837;
            --primary-dark: #cc1630;
            --secondary-color: #333;
            --accent-light: rgba(227, 24, 55, 0.1);
        }

        a {
            text-decoration: none
        }

        .office-finder {
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            padding: 80px 0;
            position: relative;
            overflow: hidden;
        }

        .office-title {
            font-size: 3.5rem;
            font-weight: 800;
            background: linear-gradient(45deg, var(--primary-color), var(--primary-dark));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 1.5rem;
            animation: slideInDown 1s ease-out;
        }

        .office-subtitle {
            font-size: 2rem;
            color: var(--secondary-color);
            font-weight: 500;
            margin-bottom: 3rem;
            opacity: 0.9;
            animation: slideInUp 1s ease-out;
        }

        .feature-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            padding: 1.5rem;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 1rem;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border-color: var(--primary-color);
        }

        .feature-icon {
            width: 48px;
            height: 48px;
            background: var(--accent-light);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
            color: var(--primary-color);
            transition: all 0.3s ease;
        }

        .feature-card:hover .feature-icon {
            background: var(--primary-color);
            color: white;
            transform: rotateY(180deg);
        }

        .search-container {
            background: white;
            border-radius: 24px;
            padding: 2rem;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            margin-top: -50px;
            position: relative;
            z-index: 10;
        }

        .form-control,
        .form-select {
            border: 2px solid #eee;
            border-radius: 12px;
            padding: 0.8rem 1rem;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px var(--accent-light);
        }

        .search-btn {
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 0.8rem 2rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .search-btn:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            color: #fff;
            box-shadow: 0 10px 20px rgba(227, 24, 55, 0.2);
        }

        .location-card {
            background: white;
            border-radius: 16px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            transition: all 0.3s ease;
            border: 1px solid #eee;
            cursor: pointer;
        }

        .location-card:hover {
            transform: translateX(10px);
            border-left: 4px solid var(--primary-color);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
        }

        .location-name {
            color: var(--primary-color);
            font-weight: 600;
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
        }

        .location-address {
            color: var(--secondary-color);
            font-size: 0.9rem;
        }

        .map-container {
            height: 600px;
            background: #f8f9fa;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }

        /* Animations */
        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        .floating {
            animation: float 6s ease-in-out infinite;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .office-title {
                font-size: 2.5rem;
            }

            .office-subtitle {
                font-size: 1.5rem;
            }

            .search-container {
                margin-top: 0;
                border-radius: 16px;
                padding: 1.5rem;
            }

            .map-container {
                height: 400px;
                margin-top: 2rem;
            }
        }
    </style>
    </head>

    <body>

        <div class="office-finder mt-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <h1 class="office-title">Find Your Nearest {{ config('website.name') }} Office</h1>
                        <h2 class="office-subtitle">Convenient Locations Near You</h2>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="feature-card">
                                    <div class="feature-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" viewBox="0 0 16 16">
                                            <path
                                                d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z" />
                                        </svg>
                                    </div>
                                    <h3 class="h5 mb-2">Easy Drop-off</h3>
                                    <p class="text-muted mb-0">Quick and convenient package drop-off at any location</p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="feature-card">
                                    <div class="feature-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" viewBox="0 0 16 16">
                                            <path
                                                d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                                        </svg>
                                    </div>
                                    <h3 class="h5 mb-2">Multiple Locations</h3>
                                    <p class="text-muted mb-0">Find pickup points near your location</p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="feature-card">
                                    <div class="feature-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" viewBox="0 0 16 16">
                                            <path
                                                d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm-8 0a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                                        </svg>
                                    </div>
                                    <h3 class="h5 mb-2">Expert Assistance</h3>
                                    <p class="text-muted mb-0">Professional shipping guidance at every office</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <img src="{{ url('assets/images/thumbs/banner-two-bg-2.png') }}"
                            alt="{{ config('website.name') }} Office" class="img-fluid rounded-4 floating shadow-lg">
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="search-container">
                <div class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label fw-medium">Country</label>
                        <select class="form-select">
                            <option value="nigeria">Nigeria</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label fw-medium">City</label>
                        <select class="form-select">
                            <option value="all">All Cities</option>
                            <option value="lagos">Lagos</option>
                            <option value="abuja">Abuja</option>
                            <option value="kano">Kano</option>
                            <option value="ibadan">Ibadan</option>
                            <option value="port-harcourt">Port Harcourt</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-medium">Search</label>
                        <input type="text" class="form-control" placeholder="Search by branch name or area">
                    </div>

                    <div class="col-md-2">
                        <label class="form-label">&nbsp;</label>
                        <button class="btn search-btn w-100">
                            Find Office
                        </button>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
    <div class="col-lg-4">
        <div class="location-card">
            <div class="location-name">{{ config('website.name') }} New York</div>
            <div class="location-address">350 Fifth Avenue, Empire State Building, New York, NY 10118</div>
        </div>

        <div class="location-card">
            <div class="location-name">{{ config('website.name') }} Los Angeles</div>
            <div class="location-address">777 South Figueroa Street, Downtown LA, Los Angeles, CA 90017</div>
        </div>

        <div class="location-card">
            <div class="location-name">{{ config('website.name') }} Chicago O'Hare Logistics Center</div>
            <div class="location-address">10000 West O'Hare Avenue, Chicago, IL 60666</div>
        </div>

        <div class="location-card">
            <div class="location-name">{{ config('website.name') }} Miami</div>
            <div class="location-address">801 Brickell Avenue, Miami, FL 33131</div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="map-container">
            <div class="w-100 h-100 d-flex align-items-center justify-content-center text-muted">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12087.440706340515!2d-73.99243645!3d40.75090975!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259a9b3117469%3A0xd134e199a405a163!2sEmpire%20State%20Building!5e0!3m2!1sen!2sus!4v1737909900800!5m2!1sen!2sus"
                    width="100%" height="650" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    @endsection
