@extends('layout.home_layout')

@section('content')
<div class="contact-section py-5 d-flex align-items-center min-vh-100">
    <div class="container my-auto">
        <!-- Contact Header -->
        <div class="text-center mb-5">
            <h1 class="fw-bold mb-3">Contact Us</h1>
            <p class="text-muted">We're here to help and answer any question you might have</p>
        </div>

        <!-- Alert Messages -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row justify-content-center">
            <!-- Contact Form -->
            <div class="col-lg-8 col-md-10">
            <div class="card shadow-lg border-0 rounded-4 p-4 p-md-5">
                    <form action="{{ route('contact.submit') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">First Name</label>
                                    <input type="text"
                                           name="first_name"
                                           class="form-control @error('first_name') is-invalid @enderror"
                                           placeholder="Enter your first name"
                                           value="{{ old('first_name') }}">
                                    @error('first_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Last Name</label>
                                    <input type="text"
                                           name="last_name"
                                           class="form-control @error('last_name') is-invalid @enderror"
                                           placeholder="Enter your last name"
                                           value="{{ old('last_name') }}">
                                    @error('last_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email"
                                   name="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   placeholder="Enter your email"
                                   value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Subject</label>
                            <input type="text"
                                   name="subject"
                                   class="form-control @error('subject') is-invalid @enderror"
                                   placeholder="How can we help you?"
                                   value="{{ old('subject') }}">
                            @error('subject')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Message</label>
                            <textarea name="message"
                                      class="form-control @error('message') is-invalid @enderror"
                                      rows="5"
                                      placeholder="Your message">{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-danger px-5">
                            <i class="fas fa-paper-plane me-2"></i>Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    :root {
        --bs-danger: #E31837;
    }

    .contact-section {
        background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
        min-height: calc(100vh - 100px); /* Adjust based on your header/footer height */
    }

    .form-control:focus {
        border-color: #E31837;
        box-shadow: 0 0 0 0.25rem rgba(227, 24, 55, 0.25);
    }

    .card {
        overflow: hidden;
        max-width: 800px;
        margin: 0 auto;
    }

    .alert {
        border: none;
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
    }

    @media (max-width: 768px) {
        .contact-section {
            padding-top: 2rem;
            padding-bottom: 2rem;
            min-height: auto;
        }

        .card {
            margin: 1rem;
        }
    }
</style>
@endsection
