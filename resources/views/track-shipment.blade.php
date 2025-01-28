@extends('layout.home_layout')
@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #E31837;
            --primary-dark: #d31730;
            --secondary-color: #2A2A2A;
            --accent-color: #FFD700;
        }

        a {
            text-decoration: none
        }

        body {
            background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
        }

        .tracking-section {
            min-height: 100vh;
            padding: 3rem 0;
            position: relative;
            overflow: hidden;
        }

        /* Animated Background */
        .animated-bg {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 0;
            opacity: 0.5;
        }

        .animated-bg::before {
            content: '';
            position: absolute;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg,
                    rgba(227, 24, 55, 0.1) 0%,
                    rgba(255, 215, 0, 0.1) 25%,
                    rgba(227, 24, 55, 0.1) 50%,
                    rgba(255, 215, 0, 0.1) 75%,
                    rgba(227, 24, 55, 0.1) 100%);
            animation: gradient-move 15s linear infinite;
        }

        @keyframes gradient-move {
            0% {
                transform: translate(-50%, -50%) rotate(0deg);
            }

            100% {
                transform: translate(-50%, -50%) rotate(360deg);
            }
        }

        .tracking-content {
            position: relative;
            z-index: 2;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 24px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            padding: 3rem;
            transform: translateY(0);
            transition: transform 0.3s ease;
        }

        .tracking-content:hover {
            transform: translateY(-5px);
        }

        .tracking-title {
            font-size: 3.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 2rem;
            position: relative;
        }

        .tracking-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 100px;
            height: 4px;
            background: var(--accent-color);
            border-radius: 2px;
        }

        .tracking-form {
            position: relative;
            margin-bottom: 2rem;
        }

        .input-group {
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
        }

        .tracking-input {
            padding: 1.5rem;
            border: 2px solid #eee;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            background: white;
        }

        .tracking-input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(227, 24, 55, 0.1);
        }

        .btn-track {
            padding: 0.8rem 2rem;
            background: var(--primary-color);
            border: none;
            color: white;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
        }

        .btn-track:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(227, 24, 55, 0.2);
        }

        .btn-track i {
            margin-left: 8px;
            transition: transform 0.3s ease;
        }

        .btn-track:hover i {
            transform: translateX(5px);
        }

        .stats-container {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            margin-top: 3rem;
        }

        .stat-item {
            text-align: center;
            padding: 1.5rem;
            transition: all 0.3s ease;
        }

        .stat-item:hover {
            transform: translateY(-5px);
        }

        .stat-icon {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--secondary-color);
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: #6c757d;
            font-size: 1rem;
            font-weight: 500;
        }

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
            transition: transform 0.6s ease;
        }

        .gallery-image:hover img {
            transform: scale(1.1);
        }

        @media (max-width: 992px) {
            .tracking-title {
                font-size: 2.5rem;
            }

            .tracking-content {
                padding: 2rem;
                margin-bottom: 2rem;
            }

            .images-gallery {
                height: 400px;
            }
        }

        @media (max-width: 768px) {
            .stat-item {
                border-bottom: 1px solid #eee;
                padding: 1rem;
            }

            .stat-item:last-child {
                border-bottom: none;
            }
        }

        /* Loading Animation */
        .loading {
            display: none;
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
        }

        .loading.active {
            display: block;
        }

        .loading span {
            display: inline-block;
            width: 8px;
            height: 8px;
            background-color: var(--primary-color);
            border-radius: 50%;
            margin: 0 2px;
            animation: bounce 0.6s infinite alternate;
        }

        .loading span:nth-child(2) {
            animation-delay: 0.2s;
        }

        .loading span:nth-child(3) {
            animation-delay: 0.4s;
        }

        @keyframes bounce {
            to {
                transform: translateY(-8px);
            }
        }
    </style>
    </head>

    <body>
        <section class="tracking-section mt-8">
            <div class="animated-bg"></div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="tracking-content">
                            <h1 class="tracking-title">Track Your Shipment</h1>

                            <div class="tracking-form">
                                <div class="input-group">
                                    <input type="text" class="form-control tracking-input"
                                        placeholder="Enter tracking number" id="trackingInput">
                                    <button class="btn btn-track" onclick="handleTracking()">
                                        Track Now <i class="fas fa-arrow-right"></i>
                                    </button>
                                </div>
                                <div class="loading">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>

                            <div class="stats-container">
                                <div class="row">
                                    <div class="col-md-4 stat-item">
                                        <i class="fas fa-clock stat-icon"></i>
                                        <div class="stat-number" data-value="98">0</div>
                                        <div class="stat-label">On-time Delivery</div>
                                    </div>
                                    <div class="col-md-4 stat-item">
                                        <i class="fas fa-globe stat-icon"></i>
                                        <div class="stat-number" data-value="220">0</div>
                                        <div class="stat-label">Countries Served</div>
                                    </div>
                                    <div class="col-md-4 stat-item">
                                        <i class="fas fa-headset stat-icon"></i>
                                        <div class="stat-number">24/7</div>
                                        <div class="stat-label">Customer Support</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </section>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
        <script>
            // Animate numbers
            function animateNumber(element, target) {
                let current = 0;
                const duration = 2000;
                const step = target / (duration / 16);

                function update() {
                    current += step;
                    if (current < target) {
                        element.textContent = Math.round(current) + (target === 98 ? '%' : '+');
                        requestAnimationFrame(update);
                    } else {
                        element.textContent = target + (target === 98 ? '%' : '+');
                    }
                }

                update();
            }

            // Animate stats when they come into view
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const statsNumbers = document.querySelectorAll('.stat-number[data-value]');
                        statsNumbers.forEach(stat => {
                            animateNumber(stat, parseInt(stat.dataset.value));
                        });
                        observer.disconnect();
                    }
                });
            });

            observer.observe(document.querySelector('.stats-container'));

            // Handle tracking
            function handleTracking() {
                const input = document.getElementById('trackingInput');
                const loading = document.querySelector('.loading');
                const trackingNumber = input.value.trim();

                if (!trackingNumber) {
                    input.classList.add('is-invalid');
                    return;
                }

                input.classList.remove('is-invalid');
                loading.classList.add('active');

                // Simulate API call
                setTimeout(() => {
                    loading.classList.remove('active');
                    alert(`Tracking number ${trackingNumber} is being processed`);
                }, 2000);
            }

            // Handle Enter key
            document.getElementById('trackingInput').addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    handleTracking();
                }
            });
        </script>
    @endsection
