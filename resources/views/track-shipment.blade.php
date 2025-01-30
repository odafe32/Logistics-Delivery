@extends('layout.home_layout')
@section('content')
    <style>
        :root {
            --primary: #E31837;
            --primary-dark: #d31730;
            --primary-light: #ff4d6d;
            --secondary: #2A2A2A;
            --accent: #FFD700;
            --gray-100: #f7fafc;
            --gray-200: #edf2f7;
            --gray-300: #e2e8f0;
            --gray-400: #cbd5e0;
            --gray-500: #a0aec0;
            --gray-600: #718096;
            --gray-700: #4a5568;
            --gray-800: #2d3748;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            --shadow-md: 0 6px 12px -2px rgba(0, 0, 0, 0.15);
            --shadow-lg: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .tracking-section {
            min-height: 100vh;
            padding: 2rem 1rem;
            position: relative;
            display: flex;
            align-items: center;
            background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
        }

        .animated-bg {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            overflow: hidden;
        }

        .animated-bg::before {
            content: '';
            position: absolute;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg,
                    rgba(227, 24, 55, 0.05) 0%,
                    rgba(255, 215, 0, 0.05) 25%,
                    rgba(227, 24, 55, 0.05) 50%,
                    rgba(255, 215, 0, 0.05) 75%,
                    rgba(227, 24, 55, 0.05) 100%);
            animation: gradient-move 20s linear infinite;
        }

        .tracking-wrapper {
            max-width: 1000px;
            margin: 0 auto;
            position: relative;
        }

        .tracking-content {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            border-radius: 24px;
            padding: 3rem 2rem;
            box-shadow: var(--shadow-lg);
            transform: translateY(0);
            transition: all 0.3s ease;
        }

        .tracking-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .tracking-title {
            font-size: clamp(2rem, 5vw, 3.5rem);
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 1rem;
        }

        .tracking-subtitle {
            color: var(--gray-600);
            font-size: 1.1rem;
        }

        .tracking-form {
            max-width: 700px;
            margin: 0 auto 3rem;
        }

        .input-wrapper {
            position: relative;
            margin-bottom: 1rem;
        }

        .input-icon {
            position: absolute;
            left: 1.5rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray-500);
            transition: color 0.3s ease;
        }

        .tracking-input {
            width: 100%;
            padding: 1.5rem 1.5rem 1.5rem 4rem;
            border: 2px solid var(--gray-300);
            border-radius: 16px;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            background: white;
        }

        .tracking-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(227, 24, 55, 0.1);
        }

        .tracking-input:focus+.input-icon {
            color: var(--primary);
        }

        .btn-track {
            width: 100%;
            padding: 1.5rem;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 16px;
            font-size: 1.1rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .btn-track:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .btn-track i {
            transition: transform 0.3s ease;
        }

        .btn-track:hover i {
            transform: translateX(5px);
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 3rem;
        }

        .feature-card {
            background: white;
            padding: 2rem;
            border-radius: 16px;
            box-shadow: var(--shadow);
            display: flex;
            align-items: center;
            gap: 1.5rem;
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-md);
        }

        .feature-icon {
            width: 60px;
            height: 60px;
            background: var(--gray-100);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: var(--primary);
        }

        .feature-number {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--secondary);
            line-height: 1.2;
        }

        .feature-label {
            color: var(--gray-600);
            font-size: 0.9rem;
        }

        .quick-links {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 1rem;
        }

        .quick-link {
            padding: 1rem;
            background: var(--gray-100);
            border-radius: 12px;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            color: var(--gray-700);
            font-weight: 500;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .quick-link:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-2px);
        }

        .loading {
            display: none;
            position: absolute;
            right: 1.5rem;
            top: 50%;
            transform: translateY(-50%);
        }

        .loading.active {
            display: flex;
            gap: 4px;
        }

        .loading span {
            width: 8px;
            height: 8px;
            background: var(--primary);
            border-radius: 50%;
            animation: bounce 0.5s infinite alternate;
        }

        .loading span:nth-child(2) {
            animation-delay: 0.15s;
        }

        .loading span:nth-child(3) {
            animation-delay: 0.3s;
        }

        @keyframes bounce {
            to {
                transform: translateY(-8px);
            }
        }

        @keyframes gradient-move {
            0% {
                transform: translate(-50%, -50%) rotate(0deg);
            }

            100% {
                transform: translate(-50%, -50%) rotate(360deg);
            }
        }

        @media (min-width: 768px) {
            .tracking-section {
                padding: 4rem 2rem;
            }

            .tracking-content {
                padding: 4rem;
            }

            .tracking-form {
                display: grid;
                grid-template-columns: 1fr auto;
                gap: 1rem;
            }

            .input-wrapper {
                margin-bottom: 0;
            }

            .btn-track {
                width: auto;
                padding: 1.5rem 3rem;
            }
        }

        @media (max-width: 768px) {
            .tracking-content {
                padding: 2rem 1.5rem;
            }

            .feature-card {
                padding: 1.5rem;
            }

            .feature-icon {
                width: 50px;
                height: 50px;
                font-size: 1.25rem;
            }

            .feature-number {
                font-size: 1.5rem;
            }

            .quick-links {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <section class="tracking-section">
        <div class="animated-bg"></div>
        <div class="container">
            <div class="tracking-wrapper">
                <div class="tracking-content">
                    <div class="tracking-header">
                        <h1 class="tracking-title">Track Your Shipment</h1>
                        <p class="tracking-subtitle">Real-time tracking for your deliveries</p>
                    </div>

                    <form action="{{ route('track-shipment.submit') }}" method="POST">
                    <div class="tracking-form">
                        @csrf
                        <div class="input-wrapper">
                            <div class="input-icon">
                                <i class="fas fa-search"></i>
                            </div>
                            <input type="text"
                                name="tracking_number"
                                class="tracking-input"
                                placeholder="Enter your tracking number"
                                id="trackingInput"
                                required>
                            <div class="loading">
                                <span></span><span></span><span></span>
                            </div>
                        </div>
                        <button type="submit" class="btn-track">
                            <span class="btn-text">Track Package</span>
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </form>

                    <div class="features-grid">
                        <div class="feature-card">
                            <div class="feature-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="feature-content">
                                <div class="feature-number" data-value="98">0%</div>
                                <div class="feature-label">On-time Delivery</div>
                            </div>
                        </div>
                        <div class="feature-card">
                            <div class="feature-icon">
                                <i class="fas fa-globe"></i>
                            </div>
                            <div class="feature-content">
                                <div class="feature-number" data-value="220">0+</div>
                                <div class="feature-label">Countries Served</div>
                            </div>
                        </div>
                        <div class="feature-card">
                            <div class="feature-icon">
                                <i class="fas fa-headset"></i>
                            </div>
                            <div class="feature-content">
                                <div class="feature-number">24/7</div>
                                <div class="feature-label">Customer Support</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Animate numbers
            function animateValue(element, start, end, duration) {
                let current = start;
                const range = end - start;
                const increment = range / (duration / 16);
                const suffix = element.textContent.includes('%') ? '%' : '+';

                function update() {
                    current += increment;
                    if (current < end) {
                        element.textContent = Math.round(current) + suffix;
                        requestAnimationFrame(update);
                    } else {
                        element.textContent = end + suffix;
                    }
                }

                update();
            }

            // Intersection Observer for features
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const numbers = entry.target.querySelectorAll(
                            '.feature-number[data-value]');
                        numbers.forEach(number => {
                            const value = parseInt(number.dataset.value);
                            animateValue(number, 0, value, 2000);
                        });
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.5
            });

            const features = document.querySelector('.features-grid');
            if (features) observer.observe(features);

            // Handle tracking
            document.querySelector('form').addEventListener('submit', function(e) {
                const input = document.getElementById('trackingInput');
                const loading = document.querySelector('.loading');
                const button = document.querySelector('.btn-track');

                if (!input.value.trim()) {
                    e.preventDefault();
                    input.classList.add('error');
                    input.focus();
                    return;
                }

                loading.classList.add('active');
                button.disabled = true;
            });
            // Handle Enter key
            const trackingInput = document.getElementById('trackingInput');
            trackingInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    handleTracking();
                }
            });

            // Remove error class on input
            trackingInput.addEventListener('input', function() {
                this.classList.remove('error');
            });
        });
    </script>
@endsection
