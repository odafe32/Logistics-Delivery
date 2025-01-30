@extends('layout.home_layout')
@section('content')
    <style>
        .loading-state {
         display: none;
        }
        .btn-submit:disabled {
            background: #dc3545;
            opacity: 0.7;
            cursor: not-allowed;
        }
        .signup-container {
            background: #f8f9fa;
            padding: 60px 0;
            min-height: 100vh;
        }

        .signup-card {
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

        .btn-toggle {
            border: 2px solid #dc3545;
            color: #495057;
            padding: 12px 24px;
            background: white;
            transition: all 0.3s ease;
            font-weight: 500;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-toggle.active {
            background: #dc3545;
            color: white;
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
            color: #f8f9fa
        }

        .section-title {
            color: #212529;
            font-size: 1.25rem;
            font-weight: 600;
            margin: 32px 0 24px;
            position: relative;
            padding-left: 15px;
        }

        .section-title::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 4px;
            height: 20px;
            background: #dc3545;
            border-radius: 2px;
        }

        .phone-input {
            display: flex;
            align-items: stretch;
            background: white;
        }

        .phone-prefix {
            background: #f8f9fa;
            padding: 12px 16px;
            color: #495057;
            font-weight: 500;
            border: 2px solid #eee;
            border-right: none;
            border-radius: 8px 0 0 8px;
            display: flex;
            align-items: center;
        }

        .phone-input .form-control {
            border: 2px solid #eee;
            border-radius: 0 8px 8px 0;
            flex: 1;
        }

        .phone-input .form-control:focus {
            border-color: #dc3545;
            box-shadow: 0 0 0 3px rgba(220, 53, 69, 0.1);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%23495057' viewBox='0 0 16 16'%3E%3Cpath d='M8 11l-7-7h14l-7 7z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            padding-right: 2.5rem;
        }

        .login-section {
        text-align: center;
        margin-top: 2rem;
        padding-top: 2rem;
        border-top: 1px solid #eee;
    }

    .login-link {
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

    .login-link:hover {
        background: rgba(220, 53, 69, 0.1);
        color: #c82333;
    }
    </style>

    <div class="signup-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-xl-7">
                    <div class="signup-card p-4 p-md-5">
                        <div class="d-flex align-items-center mb-4">
                            <svg class="text-danger me-3" width="32" height="32" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="8" r="5" />
                                <path d="M20 21v-2a7 7 0 0 0-14 0v2" />
                            </svg>
                            <h3 class="mb-0 fw-bold">Create Your {{ config('website.name') }} Account</h3>
                        </div>

                        <div class="btn-group w-100 mb-5">
                            <button class="btn btn-toggle active" data-type="personal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                                    class="me-2" viewBox="0 0 16 16">
                                    <path
                                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                                </svg>
                                Personal Account
                            </button>
                            <button class="btn btn-toggle" data-type="business">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                                    class="me-2" viewBox="0 0 16 16">
                                    <path
                                        d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022M6 8.694 1 10.36V15h5zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5z" />
                                    <path
                                        d="M2 11h1v1H2zm2 0h1v1H4zm-2 2h1v1H2zm2 0h1v1H4zm4-4h1v1H8zm2 0h1v1h-1zm-2 2h1v1H8zm2 0h1v1h-1zm2-2h1v1h-1zm0 2h1v1h-1zM8 7h1v1H8zm2 0h1v1h-1zm2 0h1v1h-1zM8 5h1v1H8zm2 0h1v1h-1zm2 0h1v1h-1zm0-2h1v1h-1z" />
                                </svg>
                                Business Account
                            </button>
                        </div>

                        <form method="POST" action="{{ route('register.submit') }}" id="registerForm">
                            @csrf
                            <input type="hidden" name="account_type" id="accountType" value="personal">

                            <div class="form-group">
                                <label class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Confirm Password</label>
                                        <input type="password" name="password_confirmation" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                            <h5 class="section-title">Personal Information</h5>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">First Name</label>
                                        <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror"
                                            value="{{ old('first_name') }}" required>
                                        @error('first_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror"
                                            value="{{ old('last_name') }}" required>
                                        @error('last_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Phone Number</label>
                                        <div class="phone-input">
                                            <span class="phone-prefix">+234</span>
                                            <input type="tel" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror"
                                                placeholder="0802 123 4567" value="{{ old('phone_number') }}" required>
                                            @error('phone_number')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Job Title</label>
                                        <input type="text" name="job_title" class="form-control @error('job_title') is-invalid @enderror"
                                            value="{{ old('job_title') }}" required>
                                        @error('job_title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div id="business-section" class="d-none">
                                <h5 class="section-title">Business Information</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Company Name</label>
                                            <input type="text" name="company_name" class="form-control @error('company_name') is-invalid @enderror"
                                                value="{{ old('company_name') }}">
                                            @error('company_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Industry</label>
                                            <select name="industry" class="form-control @error('industry') is-invalid @enderror">
                                                <option value="">Select Industry</option>
                                                <option value="E-commerce" {{ old('industry') == 'E-commerce' ? 'selected' : '' }}>E-commerce</option>
                                                <option value="Manufacturing" {{ old('industry') == 'Manufacturing' ? 'selected' : '' }}>Manufacturing</option>
                                                <option value="Retail" {{ old('industry') == 'Retail' ? 'selected' : '' }}>Retail</option>
                                                <option value="Other" {{ old('industry') == 'Other' ? 'selected' : '' }}>Other</option>
                                            </select>
                                            @error('industry')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-submit" id="submitBtn">
                                <span class="normal-state">
                                    Create Account
                                    <i class="fas fa-arrow-right ms-2"></i>
                                </span>
                                <span class="loading-state d-none">
                                    <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                                    Creating Account...
                                </span>
                            </button>


                        </form>

                        <div class="login-section">
                            <div class="d-flex align-items-center justify-content-center mb-3">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" class="text-danger">
                                    <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4M10 17l5-5-5-5M13.8 12H3" />
                                </svg>
                                <span class="ms-2">Already have an account?</span>
                            </div>
                            <a href="{{ route('login') }}" class="login-link">
                                Login to your account
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.querySelectorAll('.btn-toggle').forEach(btn => {
            btn.addEventListener('click', () => {
                document.querySelectorAll('.btn-toggle').forEach(b => b.classList.remove('active'));
                btn.classList.add('active');

                const type = btn.dataset.type;
                const businessSection = document.getElementById('business-section');
                if (type === 'business') {
                    businessSection.classList.remove('d-none');
                } else {
                    businessSection.classList.add('d-none');
                }
            });
        });
    </script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('registerForm');
    const submitBtn = document.getElementById('submitBtn');
    const accountType = document.getElementById('accountType');
    const businessSection = document.getElementById('business-section');

    // Handle account type toggle
    document.querySelectorAll('.btn-toggle').forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault(); // Prevent form submission
            document.querySelectorAll('.btn-toggle').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            const type = btn.dataset.type;
            accountType.value = type;

            if (type === 'business') {
                businessSection.classList.remove('d-none');
                businessSection.querySelectorAll('input, select').forEach(input => {
                    input.required = true;
                });
            } else {
                businessSection.classList.add('d-none');
                businessSection.querySelectorAll('input, select').forEach(input => {
                    input.required = false;
                });
            }
        });
    });

    // Handle form submission
    form.addEventListener('submit', function() {
        submitBtn.disabled = true;
        submitBtn.querySelector('.normal-state').classList.add('d-none');
        submitBtn.querySelector('.loading-state').classList.remove('d-none');
    });
});
</script>
@endsection
