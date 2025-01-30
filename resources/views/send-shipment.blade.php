@extends('layout.home_layout')

@section('content')
<div class="d-flex align-items-center py-5" style="min-height: 600px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="card shadow-lg border-0 rounded-4 p-4 p-md-5 mx-3 mx-md-0">
                    <!-- Icon -->
                    <div class="text-center mb-4">
                        <i class="fas fa-shipping-fast fs-1 text-danger"></i>
                    </div>

                    <!-- Title -->
                    <h2 class="text-center fw-bold mb-3">Send a Shipment</h2>

                    <!-- Description and Buttons -->
                    @auth
                        <p class="text-center text-muted mb-4">
                            Access your dashboard to send a shipment.
                        </p>
                        <div class="text-center">
                            <a href="{{ route('dashboard') }}" class="btn btn-danger px-4">
                                <i class="fas fa-columns me-2"></i>Go to Dashboard
                            </a>
                        </div>
                    @else
                        <p class="text-center text-muted mb-4">
                            To send a shipment, you need to be logged in or create an account.
                        </p>
                        <div class="d-flex justify-content-center gap-3">
                            <a href="{{ route('login') }}" class="btn btn-danger px-4">
                                <i class="fas fa-sign-in-alt me-2"></i>Login
                            </a>
                            <a href="{{ route('register') }}" class="btn btn-outline-danger px-4">
                                <i class="fas fa-user-plus me-2"></i>Sign Up
                            </a>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    :root {
        --bs-danger: #E31837;
    }

    body {
        background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
        min-height: 100%;
    }

    .btn-danger {
        background-color: var(--bs-danger);
        border-color: var(--bs-danger);
    }

    .btn-danger:hover {
        background-color: #d31730;
        border-color: #d31730;
    }

    .btn-outline-danger {
        color: var(--bs-danger);
        border-color: var(--bs-danger);
    }

    .btn-outline-danger:hover {
        background-color: #fff5f5;
        color: var(--bs-danger);
        border-color: var(--bs-danger);
    }

    .text-danger {
        color: var(--bs-danger) !important;
    }

    @media (max-width: 768px) {
        .card {
            margin-top: 2rem;
            margin-bottom: 2rem;
        }
    }
</style>
@endsection
