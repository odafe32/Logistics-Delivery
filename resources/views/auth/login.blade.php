<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg border-0">
            <div class="p-4">
                <div class="d-flex align-items-center mb-4">
                    <svg class="text-white" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2">
                        <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4M10 17l5-5-5-5M13.8 12H3" />
                    </svg>
                    <h5 class="mb-0 ms-2 fw-bold text-white">Log into your account</h5>
                </div>

                @if($errors->any())
                    <div class="alert alert-danger">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login.submit') }}" id="loginForm">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label text-white">Email<span class="text-white">*</span></label>
                        <input type="email" name="email" class="form-control border @error('email') is-invalid @enderror"
                               value="{{ old('email') }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label text-white">Password<span class="text-white">*</span></label>
                        <input type="password" name="password" class="form-control border @error('password') is-invalid @enderror" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label text-white" for="remember">
                                Remember me
                            </label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-danger w-100 py-2 fw-bold" id="loginBtn">
                        <span class="normal-state">Log In</span>
                        <span class="loading-state d-none">
                            <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                            Logging in...
                        </span>
                    </button>

                    <div class="text-end mt-3">
                        <a href="{{ route('password.request') }}" class="text-warning text-decoration-none small">
                            Forgot your password?
                        </a>
                    </div>

                    <hr class="my-4">

                    <div class="text-center">
                        <div class="d-flex align-items-center justify-content-center mb-3">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" class="text-danger">
                                <circle cx="12" cy="12" r="10" fill="none" stroke="currentColor" stroke-width="2" />
                                <path d="M12 7v7M12 16v1" stroke="currentColor" stroke-width="2" />
                            </svg>
                            <span class="ms-2 text-white">New to {{ config('website.name') }}</span>
                        </div>
                        <a href="{{ route('register') }}" class="btn btn-outline-danger w-100 py-2 fw-bold">
                            Create an account
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
/* Login Modal Specific Styles */
#loginModal .modal-content {
    background: linear-gradient(135deg, #E31837 0%, #522E5B 50%, #241C5C 100%) !important;
    border-radius: 8px;
}

#loginModal .form-control {
    background: white;
    border: none;
    padding: 12px;
    border-radius: 4px;
    height: 48px;
}

#loginModal .form-control:focus {
    background: white;
    box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.2);
}

#loginModal .form-label {
    color: white;
    margin-bottom: 8px;
}

#loginModal .btn-danger {
    background: #E31837;
    border: none;
    border-radius: 4px;
    padding: 5px;
    font-weight: 600;
}

#loginModal .btn-outline-danger {
    border: 1px solid #E31837;
    color: white;
    background: transparent;
    border-radius: 4px;
}

#loginModal .btn-outline-danger:hover {
    background: rgba(255, 255, 255, 0.1);
    border-color: white;
    color: white;
}

#loginModal hr {
    border-color: rgba(255, 255, 255, 0.2);
    margin: 24px 0;
}

#loginModal .text-warning {
    color: #FFD700 !important;
}

#loginModal .modal-header {
    border: none;
}

#loginModal .loading-state {
    display: none;
}

#loginModal .alert-danger {
    background: rgba(220, 53, 69, 0.1);
    border: 1px solid #dc3545;
    color: white;
}

#loginModal .form-check-input:checked {
    background-color: #E31837;
    border-color: #E31837;
}

#loginModal .form-check-label {
    color: white;
}

/* Ensure modal form controls don't inherit signup styles */
#loginModal .form-group {
    margin-bottom: 1rem;
}

#loginModal .form-control {
    border: none;
    height: auto;
    font-size: 1rem;
}

#loginModal .form-control:focus {
    border: none;
    box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.2);
}
</style>

<style>
    .loading-state {
        display: none;
    }
    .btn-danger:disabled {
        opacity: 0.7;
        cursor: not-allowed;
    }
    .alert-danger {
        background: rgba(220, 53, 69, 0.1);
        border: 1px solid #dc3545;
        color: white;
    }
    .form-check-input:checked {
        background-color: #E31837;
        border-color: #E31837;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('loginForm');
    const submitBtn = document.getElementById('loginBtn');
    var myModal = new bootstrap.Modal(document.getElementById('loginModal'));

    // Handle form submission
    form.addEventListener('submit', function() {
        submitBtn.disabled = true;
        submitBtn.querySelector('.normal-state').classList.add('d-none');
        submitBtn.querySelector('.loading-state').classList.remove('d-none');
    });

    // Show modal if there are validation errors
    @if($errors->any())
        myModal.show();
    @endif
});
</script>
