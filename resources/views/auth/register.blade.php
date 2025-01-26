@extends('layout.home_layout')
@section('content')
    <style>
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
                                <i class="fas fa-user me-2"></i>Personal Account
                            </button>
                            <button class="btn btn-toggle" data-type="business">
                                <i class="fas fa-building me-2"></i>Business Account
                            </button>
                        </div>

                        <form>
                            <div class="form-group">
                                <label class="form-label">Email address</label>
                                <input type="email" class="form-control" required>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                            <h5 class="section-title">Personal Information</h5>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">First Name</label>
                                        <input type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Phone Number</label>
                                        <div class="phone-input">
                                            <span class="phone-prefix">+234</span>
                                            <input type="tel" class="form-control" placeholder="0802 123 4567" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Job Title</label>
                                        <input type="text" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                            <div id="business-section" class="d-none">
                                <h5 class="section-title">Business Information</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Company Name</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Industry</label>
                                            <select class="form-control">
                                                <option value="">Select Industry</option>
                                                <option>E-commerce</option>
                                                <option>Manufacturing</option>
                                                <option>Retail</option>
                                                <option>Other</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="g-recaptcha" data-sitekey="your-site-key"></div>
                            </div>

                            <button type="submit" class="btn btn-submit">
                                Create Account
                                <i class="fas fa-arrow-right ms-2"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
@endsection
