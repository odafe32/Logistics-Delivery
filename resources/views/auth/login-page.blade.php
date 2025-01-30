@extends('layout.home_layout')
@section('content')
    <style>
        .login-container {
            background: #f8f9fa;
            padding: 60px 0;
            min-height: 100vh;
        }

        .login-card {
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

        .btn-submit {
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

        .btn-submit:hover {
            background: #c82333;
            color: #f8f9fa;
        }

        .btn-submit:disabled {
            opacity: 0.7;
            cursor: not-allowed;
        }

        .form-check-input:checked {
            background-color: #E31837;
            border-color: #E31837;
        }

        .loading-state {
            display: none;
        }

        .forgot-password {
            color: #dc3545;
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s;
        }

        .forgot-password:hover {
            color: #c82333;
            text-decoration: underline;
        }

        .create-account-section {
            text-align: center;
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid #eee;
        }

        .create-account-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            background: transparent;
            border: 2px solid #dc3545;
            color: #dc3545;
            border-radius: 30px;
            padding: 12px 24px;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s;
            width: 100%;
            margin-top: 1rem;
        }

        .create-account-btn:hover {
            background: rgba(220, 53, 69, 0.1);
            color: #c82333;
        }
    </style>

    <div class="login-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="login-card p-4 p-md-5">
                        <div class="d-flex align-items-center mb-4">
                            <svg class="text-danger me-3" width="32" height="32" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2">
                                <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4M10 17l5-5-5-5M13.8 12H3" />
                            </svg>
                            <h3 class="mb-0 fw-bold">Log into your account</h3>
                        </div>

                        @if($errors->any())
                            <div class="alert alert-danger">
                                {{ $errors->first() }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login.submit') }}" id="loginForm">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Email address<span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                       value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Password<span class="text-danger">*</span></label>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                           {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        Remember me
                                    </label>
                                </div>
                                <a href="{{ route('password.request') }}" class="forgot-password">
                                    Forgot password?
                                </a>
                            </div>

                            <button type="submit" class="btn btn-submit" id="loginBtn">
                                <span class="normal-state">Log In</span>
                                <span class="loading-state d-none">
                                    <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                                    Logging in...
                                </span>
                            </button>

                            <div class="create-account-section">
                                <div class="d-flex align-items-center justify-content-center mb-3">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" class="text-danger">
                                        <circle cx="12" cy="12" r="10" fill="none" stroke="currentColor" stroke-width="2" />
                                        <path d="M12 7v7M12 16v1" stroke="currentColor" stroke-width="2" />
                                    </svg>
                                    <span class="ms-2">New to {{ config('website.name') }}?</span>
                                </div>
                                <a href="{{ route('register') }}" class="create-account-btn">
                                    Create an account
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('loginForm');
        const submitBtn = document.getElementById('loginBtn');

        form.addEventListener('submit', function() {
            submitBtn.disabled = true;
            submitBtn.querySelector('.normal-state').classList.add('d-none');
            submitBtn.querySelector('.loading-state').classList.remove('d-none');
        });
    });
    </script>
@endsection
