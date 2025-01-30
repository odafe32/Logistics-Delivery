@extends('layout.home_layout')
@section('content')
    <style>
        .auth-container {
            background: #f8f9fa;
            padding: 60px 0;
            min-height: 100vh;
        }

        .auth-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            margin: 20px;
        }

        .form-control {
            border: 2px solid #eee;
            border-radius: 8px;
            padding: 12px 16px;
            height: auto;
            font-size: 0.95rem;
            background: white;
        }

        .form-control:focus {
            border-color: #dc3545;
            box-shadow: 0 0 0 3px rgba(220, 53, 69, 0.1);
        }

        .form-label {
            font-weight: 500;
            color: #495057;
            margin-bottom: 8px;
        }

        .btn-primary {
            background: #dc3545;
            color: white;
            border-radius: 30px;
            padding: 14px 36px;
            font-weight: 500;
            letter-spacing: 0.5px;
            border: none;
            width: 100%;
            margin-top: 20px;
        }

        .btn-primary:hover {
            background: #c82333;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .auth-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .auth-icon {
            width: 64px;
            height: 64px;
            margin-bottom: 1rem;
        }

        .back-link {
            color: #6c757d;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .back-link:hover {
            color: #dc3545;
        }

        .success-message {
            text-align: center;
            padding: 2rem;
        }

        .success-icon {
            color: #28a745;
            width: 64px;
            height: 64px;
            margin-bottom: 1rem;
        }

        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 16px 24px;
            border-radius: 8px;
            background: white;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            display: flex;
            align-items: center;
            gap: 12px;
            z-index: 1000;
            transform: translateY(-100px);
            opacity: 0;
            transition: all 0.3s ease;
        }

        .notification.show {
            transform: translateY(0);
            opacity: 1;
        }

        .notification-success {
            border-left: 4px solid #28a745;
        }

        .notification-icon {
            width: 24px;
            height: 24px;
            color: #28a745;
        }

        .notification-message {
            color: #2c3e50;
            font-weight: 500;
            margin: 0;
        }

        .spinner {
        display: none;
        width: 20px;
        height: 20px;
        border: 2px solid rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        border-top-color: #fff;
        animation: spin 0.8s linear infinite;
        margin-right: 8px;
    }

    @keyframes spin {
        to {
            transform: rotate(360deg);
        }
    }

    .btn-loading {
        position: relative;
        cursor: not-allowed;
        opacity: 0.8;
    }

    .btn-loading .spinner {
        display: inline-block;
    }

    .btn-loading .btn-text {
        margin-left: 8px;
    }

    .btn-content {
        display: flex;
        align-items: center;
        justify-content: center;
    }
    </style>

    {{-- Success Notification --}}
    @if(session('status'))
        <div class="notification notification-success" id="successNotification">
            <svg class="notification-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <p class="notification-message">Password reset link sent successfully!</p>
        </div>
    @endif

    {{-- Forgot Password Page --}}
    <div class="auth-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="auth-card p-4 p-md-5">

                        <div class="auth-header">
                            <svg class="auth-icon text-danger" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                            </svg>
                            <h3>Forgot Password?</h3>
                            <p class="text-muted">Enter your email address to receive a password reset link</p>
                        </div>

                        <form action="{{ route('password.email') }}" method="POST" id="resetForm">
                            @csrf
                            <div class="form-group">
                                <label class="form-label">Email Address</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>

                            <button type="submit" class="btn btn-primary" id="submitBtn">
                                <div class="btn-content">
                                    <div class="spinner"></div>
                                    <span class="btn-text">Send Reset Link</span>
                                </div>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const notification = document.getElementById('successNotification');
            if (notification) {
                // Show notification
                setTimeout(() => {
                    notification.classList.add('show');
                }, 100);

                // Hide notification after 5 seconds
                setTimeout(() => {
                    notification.classList.remove('show');
                }, 5000);
            }
        });
    </script>

    <script>
        document.getElementById('resetForm').addEventListener('submit', function(e) {
            const button = document.getElementById('submitBtn');
            button.classList.add('btn-loading');
            button.disabled = true;
        });
    </script>
@endsection
