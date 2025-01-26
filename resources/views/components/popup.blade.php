<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        a {
            text-decoration: none
        }

        /* Enhanced base styles */
        .modal-dialog {
            max-width: 900px !important;
            margin: 1.75rem auto;
            transform: scale(0.8);
            opacity: 0;
            transition: all 0.3s ease-out;
        }

        .modal.show .modal-dialog {
            transform: scale(1);
            opacity: 1;
        }

        .modal-content {
            border: none;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            background: linear-gradient(135deg, #E31837 0%, #522E5B 50%, #241C5C 100%);
        }

        /* Enhanced close button */
        .btn-close {
            position: absolute;
            right: 1.5rem;
            top: 1.5rem;
            opacity: 0.8;
            transition: all 0.2s ease;
            background-color: white;
            padding: 0.75rem;
            border-radius: 50%;
            z-index: 100;
        }

        .btn-close:hover {
            transform: rotate(90deg);
            opacity: 1;
        }

        /* Enhanced content styling */
        .content-wrapper {
            padding: 3rem;
        }

        .logo {
            height: 45px;
            margin-bottom: 2rem;
            animation: fadeInDown 0.6s ease-out;
        }

        .heading-primary {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
            animation: fadeInLeft 0.6s ease-out;
        }

        .heading-secondary {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 2rem;
            animation: fadeInLeft 0.8s ease-out;
        }

        .alert-section {
            background: rgba(255, 255, 255, 0.1);
            padding: 1.5rem;
            border-radius: 15px;
            margin-bottom: 2rem;
            animation: fadeInUp 0.8s ease-out;
        }

        .store-button {
            transition: all 0.3s ease;
            display: inline-block;
            animation: fadeInUp 1s ease-out;
        }

        .store-button:hover {
            transform: translateY(-5px) scale(1.02);
            filter: brightness(1.1);
        }

        .store-button img {
            height: 52px;
            filter: drop-shadow(0 4px 6px rgba(0, 0, 0, 0.1));
        }

        .app-preview {
            animation: float 6s ease-in-out infinite;
            filter: drop-shadow(0 10px 20px rgba(0, 0, 0, 0.2));
        }

        /* Debug Panel */
        #debugPanel {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 15px;
            border-radius: 8px;
            font-family: monospace;
            z-index: 9999;
        }

        /* Animations */
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .modal-dialog {
                margin: 1rem;
            }

            .content-wrapper {
                padding: 2rem;
            }

            .heading-primary {
                font-size: 2rem;
            }

            .heading-secondary {
                font-size: 1.5rem;
            }

            .store-buttons {
                flex-direction: column;
                align-items: center;
                gap: 1rem;
            }
        }
    </style>
</head>

<body>
    <!-- Debug Panel -->
    <div id="debugPanel">
        Next popup in: <span id="countdown">calculating...</span>
    </div>

    <div class="modal fade" id="welcomePopup" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-md-6 content-wrapper text-white">
                            <img src="{{ url('assets/images/logo/favicon.png') }}" alt="Aramex Logo" class="logo">

                            <h1 class="heading-primary">BEWARE of</h1>
                            <h2 class="heading-secondary">fraudsters pretending to be Noname!</h2>

                            <div class="alert-section">
                                <h3 class="h5 fw-bold mb-2">Help us beat the scam</h3>
                                <p class="lead mb-0">Pay through the App</p>
                            </div>

                            <div class="store-buttons d-flex gap-3">
                                <a href="#" class="store-button">
                                    <img src="{{ url('assets/images/googleplay.png') }}" alt="Get it on Google Play">
                                </a>
                                <a href="#" class="store-button">
                                    <img src="{{ url('assets/images/applestore.png') }}" alt="Download on App Store">
                                </a>
                            </div>
                        </div>

                        <div class="col-md-6 p-4 text-center">
                            <img src="{{ url('assets/images/aramex-app.png') }}" alt="App Interface"
                                class="img-fluid app-preview">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const POPUP_INTERVAL = 5 * 60 * 1000; // 5 minutes in milliseconds
            const welcomePopupEl = document.getElementById('welcomePopup');
            const countdownEl = document.getElementById('countdown');

            function showPopup() {
                const welcomePopup = new bootstrap.Modal(welcomePopupEl, {
                    backdrop: 'static'
                });
                welcomePopup.show();
                sessionStorage.setItem('lastPopupTime', Date.now().toString());
            }

            function updateCountdown() {
                const lastPopupTime = parseInt(sessionStorage.getItem('lastPopupTime') || '0');
                const currentTime = Date.now();
                const timeSinceLastPopup = currentTime - lastPopupTime;
                const timeUntilNextPopup = Math.max(0, POPUP_INTERVAL - timeSinceLastPopup);

                const minutes = Math.floor(timeUntilNextPopup / 60000);
                const seconds = Math.floor((timeUntilNextPopup % 60000) / 1000);

                countdownEl.textContent = `${minutes}:${seconds.toString().padStart(2, '0')}`;

                if (timeUntilNextPopup <= 0 && !welcomePopupEl.classList.contains('show')) {
                    showPopup();
                }
            }

            // Initial check
            const lastPopupTime = parseInt(sessionStorage.getItem('lastPopupTime') || '0');
            const timeSinceLastPopup = Date.now() - lastPopupTime;

            if (timeSinceLastPopup >= POPUP_INTERVAL) {
                showPopup();
            }

            // Update countdown every second
            setInterval(updateCountdown, 1000);

            // Handle close button
            document.querySelector('.btn-close').addEventListener('click', function() {
                const welcomePopup = bootstrap.Modal.getInstance(welcomePopupEl);
                welcomePopup.hide();
            });

            // Reset popup for testing (remove in production)
            document.addEventListener('keydown', function(e) {
                if (e.key === 'r' && e.ctrlKey) {
                    sessionStorage.removeItem('lastPopupTime');
                    location.reload();
                }
            });
        });
    </script>
</body>

</html>
