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
    </style>
    <div class="auth-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="auth-card p-4 p-md-5">
                        <div class="success-message">
                            <svg class="success-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <h3>Password Reset Successfully!</h3>
                            <p class="text-muted">Your password has been changed successfully.</p>
                            <a href="{{ url('/') }}" class="btn btn-success mt-3">
                                Back to Website
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
