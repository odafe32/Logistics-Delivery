<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        a {
            text-decoration: none
        }

        .alert-list {
    margin: 2rem 0;
}

.alert-item {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    background: rgba(255, 255, 255, 0.1);
    padding: 1rem;
    border-radius: 12px;
    margin-bottom: 1rem;
    animation: fadeInLeft 0.6s ease-out;
    backdrop-filter: blur(10px);
}

.alert-item i {
    font-size: 1.5rem;
    color: #FFD700;
    flex-shrink: 0;
    margin-top: 0.2rem;
}

.alert-item p {
    margin: 0;
    font-size: 0.95rem;
    line-height: 1.5;
}

.alert-item strong {
    color: #FFD700;
}

.safety-tips {
    background: rgba(0, 0, 0, 0.2);
    padding: 1.5rem;
    border-radius: 12px;
    animation: fadeInUp 0.8s ease-out;
}

.safety-tips h3 {
    color: #FFD700;
    font-size: 1.2rem;
    margin-bottom: 1rem;
}

.safety-tips ul {
    padding-left: 1.5rem;
    margin-bottom: 0;
}

.safety-tips li {
    margin-bottom: 0.5rem;
    font-size: 0.9rem;
}

.safety-tips li:last-child {
    margin-bottom: 0;
}

.contact-info {
    animation: fadeInUp 1s ease-out;
}

.btn {
    padding: 0.8rem 1.5rem;
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
}

.image-wrapper {
    display: flex;
    align-items: center;
    justify-content: center;
}

.security-image {
    max-width: 300px;
    margin: 0 auto;
    filter: drop-shadow(0 10px 20px rgba(0, 0, 0, 0.2));
}

.security-image svg {
    width: 100%;
    height: auto;
}

@media (max-width: 768px) {
    .security-image {
        max-width: 200px;
        margin-top: 2rem;
    }
}

@media (max-width: 768px) {
    .alert-item {
        padding: 0.8rem;
    }

    .alert-item i {
        font-size: 1.2rem;
    }

    .alert-item p {
        font-size: 0.85rem;
    }

    .safety-tips {
        padding: 1rem;
    }

    .contact-info {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .contact-info .btn {
        width: 100%;
    }

    .security-image {
        max-width: 300px;
        margin-top: 2rem;
    }
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
    <!--<div id="debugPanel">-->
    <!--    Next popup in: <span id="countdown">calculating...</span>-->
    <!--</div>-->

    <div class="modal fade" id="welcomePopup" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                <div class="container-fluid">
    <div class="row align-items-center">
        <div class="col-md-6 content-wrapper text-white">
            <img src="{{ url('assets/images/logo/favicon.png') }}" alt="Aramex Logo" class="logo">

            <h1 class="heading-primary">BEWARE of</h1>
            <h2 class="heading-secondary">fraudsters pretending to be us</h2>

            <div class="alert-list">
                <div class="alert-item">
                    <i class="fas fa-shield-alt"></i>
                    <p>Track shipments through our official website</p>
                </div>

            </div>
        </div>
        <div class="col-md-6 image-wrapper">
            <div class="security-image">
                <svg viewBox="0 0 400 400" xmlns="http://www.w3.org/2000/svg">
    <!-- Background Shield -->
    <path d="M200 40 L350 90 L350 200 C350 300 200 360 200 360 C200 360 50 300 50 200 L50 90 Z"
          fill="rgba(255,255,255,0.1)"
          stroke="rgba(255,255,255,0.3)"
          stroke-width="4"/>

    <!-- Inner Shield -->
    <path d="M200 80 L310 115 L310 200 C310 275 200 320 200 320 C200 320 90 275 90 200 L90 115 Z"
          fill="rgba(227,24,55,0.2)"
          stroke="#E31837"
          stroke-width="3"/>

    <!-- Lock Body -->
    <rect x="160" y="180" width="80" height="70" rx="10"
          fill="#E31837"
          stroke="white"
          stroke-width="3"/>

    <!-- Lock Shackle -->
    <path d="M175 180 L175 140 C175 110 225 110 225 140 L225 180"
          fill="none"
          stroke="white"
          stroke-width="12"
          stroke-linecap="round"/>

    <!-- Check Mark -->
    <path d="M180 210 L195 225 L220 200"
          fill="none"
          stroke="white"
          stroke-width="8"
          stroke-linecap="round"
          stroke-linejoin="round"/>

    <!-- Alert Icons -->
    <g transform="translate(100,100)" class="alert-icon">
        <circle cx="0" cy="0" r="15" fill="#FFD700"/>
        <text x="0" y="7" font-size="20" fill="#E31837" text-anchor="middle">!</text>
    </g>

    <g transform="translate(300,100)" class="alert-icon">
        <circle cx="0" cy="0" r="15" fill="#FFD700"/>
        <text x="0" y="7" font-size="20" fill="#E31837" text-anchor="middle">!</text>
    </g>

    <style>
        @keyframes pulse {
            0% { transform: scale(1); opacity: 0.8; }
            50% { transform: scale(1.1); opacity: 1; }
            100% { transform: scale(1); opacity: 0.8; }
        }
        .alert-icon {
            animation: pulse 2s infinite;
        }
        .alert-icon:nth-child(2) {
            animation-delay: 1s;
        }
    </style>
</svg>
            </div>
        </div>
    </div>
</div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const POPUP_INTERVAL = 10 * 60 * 1000; // 10 minutes in milliseconds
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
        });
    </script>
</body>

</html>
