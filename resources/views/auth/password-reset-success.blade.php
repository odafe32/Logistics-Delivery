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

        .success-message {
            text-align: center;
            padding: 2rem;
        }

        .success-icon {
            color: #dc3545;
            width: 64px;
            height: 64px;
            margin-bottom: 1rem;
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
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background: #c82333;
            color: white;
            text-decoration: none;
        }

        h3 {
            color: #2c3e50;
            margin-bottom: 1rem;
        }

        .text-muted {
            color: #6c757d;
            margin-bottom: 2rem;
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
                            <a href="{{ route('login') }}" class="btn btn-primary">
                                Back to Login
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
