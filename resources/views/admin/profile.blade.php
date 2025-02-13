@extends('layout.admin_layout')
@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #ef4444;
            --primary-light: #eff6ff;
            --success: #22c55e;
            --warning: #f59e0b;
            --danger: #ef4444;
            --gray-50: #f8fafc;
            --gray-100: #f1f5f9;
            --gray-200: #e2e8f0;
            --gray-300: #cbd5e0;
            --gray-400: #94a3b8;
            --gray-500: #64748b;
            --gray-600: #475569;
            --gray-700: #334155;
            --gray-800: #1e293b;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
        }

        body {
            background: var(--gray-50);
            min-height: 100vh;
            padding: 1.5rem;
            color: var(--gray-800);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .profile-header {
            background: white;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            margin-bottom: 1.5rem;
            position: relative;
        }

        .header-content {
            display: flex;
            align-items: center;
            gap: 2rem;
        }

        .avatar-wrapper {
            position: relative;
            width: 120px;
            height: 120px;
        }

        .avatar {
            width: 100%;
            height: 100%;
            border-radius: 12px;
            object-fit: cover;
        }

        .avatar-upload {
            position: absolute;
            bottom: -0.5rem;
            right: -0.5rem;
            background: white;
            border: 1px solid var(--gray-200);
            border-radius: 8px;
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gray-500);
            cursor: pointer;
            transition: all 0.2s;
        }

        .avatar-upload:hover {
            color: var(--primary);
            border-color: var(--primary);
        }

        .profile-info {
            flex: 1;
        }

        .name-section {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 0.5rem;
        }

        .profile-name {
            font-size: 1.5rem;
            font-weight: 600;
        }

        .role-badge {
            background: var(--primary-light);
            color: var(--primary);
            padding: 0.25rem 0.75rem;
            border-radius: 999px;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .profile-meta {
            display: flex;
            gap: 2rem;
            color: var(--gray-500);
            font-size: 0.875rem;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .edit-button {
            position: absolute;
            top: 2rem;
            right: 2rem;
            padding: 0.5rem 1rem;
            background: white;
            border: 1px solid var(--gray-200);
            border-radius: 8px;
            color: var(--gray-600);
            cursor: pointer;
            font-size: 0.875rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.2s;
        }

        .edit-button:hover {
            border-color: var(--primary);
            color: var(--primary);
        }

        .tab-nav {
            display: flex;
            gap: 1rem;
            border-bottom: 1px solid var(--gray-200);
            margin-bottom: 1.5rem;
        }

        .tab-button {
            padding: 1rem 1.5rem;
            background: none;
            border: none;
            border-bottom: 2px solid transparent;
            color: var(--gray-500);
            cursor: pointer;
            font-size: 0.875rem;
            font-weight: 500;
            transition: all 0.2s;
        }

        .tab-button:hover {
            color: var(--gray-800);
        }

        .tab-button.active {
            color: var(--primary);
            border-bottom-color: var(--primary);
        }

        .tab-content {
            background: white;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .form-section {
            padding: 2rem;
            border-bottom: 1px solid var(--gray-200);
        }

        .form-section:last-child {
            border-bottom: none;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .section-title {
            font-size: 1rem;
            font-weight: 600;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .form-label {
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--gray-700);
        }

        .form-input {
            padding: 0.625rem 1rem;
            border: 1px solid var(--gray-200);
            border-radius: 8px;
            font-size: 0.875rem;
            transition: all 0.2s;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .security-grid {
            display: grid;
            gap: 1rem;
        }

        .security-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
            border: 1px solid var(--gray-200);
            border-radius: 8px;
        }

        .security-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .security-icon {
            width: 40px;
            height: 40px;
            background: var(--primary-light);
            color: var(--primary);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .security-text h4 {
            font-size: 0.875rem;
            font-weight: 500;
            margin-bottom: 0.25rem;
        }

        .security-text p {
            font-size: 0.75rem;
            color: var(--gray-500);
        }

        .btn {
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-size: 0.875rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
            border: none;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
        }

        .btn-secondary {
            background: white;
            border: 1px solid var(--gray-200);
            color: var(--gray-600);
        }

        .btn-secondary:hover {
            border-color: var(--primary);
            color: var(--primary);
        }

        .mfa-status {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.875rem;
        }

        .status-icon {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
        }

        .status-icon.enabled {
            background: #dcfce7;
            color: var(--success);
        }

        .status-icon.disabled {
            background: #fee2e2;
            color: var(--danger);
        }

        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                text-align: center;
                gap: 1rem;
            }

            .profile-meta {
                justify-content: center;
                flex-wrap: wrap;
            }

            .edit-button {
                position: static;
                margin-top: 1rem;
                width: 100%;
                justify-content: center;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .tab-nav {
                overflow-x: auto;
                padding-bottom: 1px;
            }

            .tab-button {
                white-space: nowrap;
            }
        }

        .sessions-list {
            display: grid;
            gap: 1rem;
        }

        .session-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
            border: 1px solid var(--gray-200);
            border-radius: 8px;
        }

        .device-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .device-info i {
            font-size: 1.5rem;
            color: var(--gray-500);
        }

        .device-info h4 {
            font-size: 0.875rem;
            font-weight: 500;
            margin-bottom: 0.25rem;
        }

        .device-info p {
            font-size: 0.75rem;
            color: var(--gray-500);
        }

        .btn-text {
            background: none;
            border: none;
            color: var(--danger);
            font-size: 0.875rem;
            cursor: pointer;
        }

        .btn-text:hover {
            text-decoration: underline;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .modal.show {
            display: flex;
            opacity: 1;
        }

        .modal-content {
            background: white;
            border-radius: 12px;
            width: 100%;
            max-width: 500px;
            transform: translateY(-20px);
            transition: transform 0.3s ease;
        }

        .modal.show .modal-content {
            transform: translateY(0);
        }

        .modal-backdrop {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        .password-input {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--gray-500);
            cursor: pointer;
            padding: 4px;
        }

        .toggle-password:hover {
            color: var(--gray-700);
        }

        /* Password strength indicator */
        .password-strength {
            height: 4px;
            background: #e2e8f0;
            border-radius: 2px;
            margin-top: 8px;
            overflow: hidden;
        }

        .password-strength::before {
            content: '';
            display: block;
            height: 100%;
            width: 0;
            background: var(--danger);
            transition: all 0.3s;
        }

        .password-strength.weak::before {
            width: 33%;
            background: var(--danger);
        }

        .password-strength.medium::before {
            width: 66%;
            background: var(--warning);
        }

        .password-strength.strong::before {
            width: 100%;
            background: var(--success);
        }
    </style>

<div class="container">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

        <!-- Profile Header -->
        <div class="profile-header">
            <div class="header-content">
                <div class="avatar-wrapper">
                            <img src="{{ $user->profile_image ? Storage::url($user->profile_image) : '/api/placeholder/120/120' }}"
                    alt="Profile" class="avatar" id="profileImage">
                <form id="avatarForm" action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="first_name" value="{{ $user->first_name }}">
                    <input type="hidden" name="last_name" value="{{ $user->last_name }}">
                    <input type="hidden" name="phone_number" value="{{ $user->phone_number }}">
                    <input type="hidden" name="job_title" value="{{ $user->job_title }}">
                    @if($user->account_type === 'business')
                        <input type="hidden" name="company_name" value="{{ $user->company_name }}">
                        <input type="hidden" name="industry" value="{{ $user->industry }}">
                    @endif
                    <input type="file" id="profileImageInput" name="profile_image" class="d-none" accept="image/*">
                    <button type="button" class="avatar-upload" onclick="document.getElementById('profileImageInput').click()">
                        <i class="fas fa-camera"></i>
                    </button>
                </form>
                </div>
                <div class="profile-info">
                    <div class="name-section">
                        <h1 class="profile-name">{{ $user->first_name }} {{ $user->last_name }}</h1>
                        <span class="role-badge">{{ ucfirst($user->role) }}</span>
                    </div>
                    <div class="profile-meta">
                        <div class="meta-item">
                            <i class="fas fa-envelope"></i>
                            {{ $user->email }}
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-phone"></i>
                            {{ $user->phone_number }}
                        </div>
                        @if($user->company_name)
                        <div class="meta-item">
                            <i class="fas fa-building"></i>
                            {{ $user->company_name }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <button class="edit-button" onclick="toggleEditMode()">
                <i class="fas fa-pen"></i>
                Edit Profile
            </button>
        </div>

        <!-- Profile Navigation -->
        <div class="tab-nav">
            <button class="tab-button active" data-tab="personal">Personal Information</button>

        </div>

        <form id="profileForm" action="{{ route('admin.profile.update') }}" method="POST">
            @csrf
            <div class="tab-content">
                <div class="form-section">
                    <div class="section-header">
                        <h2 class="section-title">Personal Information</h2>
                    </div>
                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label">First Name</label>
                            <input type="text" name="first_name" class="form-input" value="{{ $user->first_name }}" disabled>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Last Name</label>
                            <input type="text" name="last_name" class="form-input" value="{{ $user->last_name }}" disabled>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-input" value="{{ $user->email }}" disabled readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Phone Number</label>
                            <input type="tel" name="phone_number" class="form-input" value="{{ $user->phone_number }}" disabled>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Job Title</label>
                            <input type="text" name="job_title" class="form-input" value="{{ $user->job_title }}" disabled>
                        </div>
                        @if($user->account_type === 'business')
                            <div class="form-group">
                                <label class="form-label">Company Name</label>
                                <input type="text" name="company_name" class="form-input" value="{{ $user->company_name }}" disabled>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Industry</label>
                                <input type="text" name="industry" class="form-input" value="{{ $user->industry }}" disabled>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </form>

        <!-- Security Settings Section -->
        <div class="form-section">
            <div class="section-header">
                <h2 class="section-title">Security Settings</h2>
            </div>
            <div class="security-grid">
                <div class="security-item">
                    <div class="security-info">
                        <div class="security-icon">
                            <i class="fas fa-key"></i>
                        </div>
                        <div class="security-text">
                            <h4>Change Password</h4>
                        </div>
                    </div>
                    <button class="btn btn-secondary" onclick="openModal('passwordModal')">Update</button>
                </div>
            </div>
        </div>

        <!-- Password Modal -->
        <div class="modal" id="passwordModal">
            <div class="modal-content">
                <form action="{{ route('admin.profile.password') }}" method="POST" id="passwordForm">
                    @csrf
                    <div class="modal-header">
                        <h3>Change Password</h3>
                        <button type="button" class="close" onclick="closeModal('passwordModal')">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="form-label">Current Password</label>
                            <div class="password-input">
                                <input type="password" name="current_password" class="form-input" required>
                                <button type="button" class="toggle-password">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">New Password</label>
                            <div class="password-input">
                                <input type="password" name="password" class="form-input" required>
                                <button type="button" class="toggle-password">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <div class="password-strength"></div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Confirm New Password</label>
                            <div class="password-input">
                                <input type="password" name="password_confirmation" class="form-input" required>
                                <button type="button" class="toggle-password">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="closeModal('passwordModal')">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

        <script>
            // Tab switching
            document.querySelectorAll('.tab-button').forEach(button => {
                button.addEventListener('click', () => {
                    document.querySelectorAll('.tab-button').forEach(btn => {
                        btn.classList.remove('active');
                    });
                    button.classList.add('active');
                });
            });

            // Edit mode toggle
            function toggleEditMode() {
                const editButton = document.querySelector('.edit-button');
                const inputs = document.querySelectorAll('.form-input:not([readonly])');
                const profileForm = document.getElementById('profileForm');

                if (editButton.innerHTML.includes('Save')) {
                    // If saving, submit the form
                    profileForm.submit();
                } else {
                    // If enabling edit mode
                    inputs.forEach(input => {
                        input.disabled = false;
                        input.classList.add('editing');
                    });
                    editButton.innerHTML = '<i class="fas fa-save"></i> Save Changes';
                }
            }

            // Image upload handling
            document.getElementById('profileImageInput').addEventListener('change', function(e) {
                if (this.files && this.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('profileImage').src = e.target.result;
                        // Add loading state to the upload button
                        const uploadButton = document.querySelector('.avatar-upload');
                        uploadButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
                        uploadButton.style.pointerEvents = 'none';
                        // Submit the form
                        document.getElementById('avatarForm').submit();
                    };
                    reader.readAsDataURL(this.files[0]);
                }
            });

            // Password visibility toggle
            document.querySelectorAll('.toggle-password').forEach(button => {
                button.addEventListener('click', () => {
                    const input = button.parentElement.querySelector('input');
                    const type = input.type === 'password' ? 'text' : 'password';
                    input.type = type;
                    button.innerHTML = type === 'password' ?
                        '<i class="fas fa-eye"></i>' :
                        '<i class="fas fa-eye-slash"></i>';
                });
            });

            // Modal functionality
            document.querySelectorAll('[data-modal]').forEach(trigger => {
                trigger.addEventListener('click', () => {
                    const modalId = trigger.dataset.modal;
                    const modal = document.querySelector(modalId);
                    modal.classList.add('active');
                });
            });

            document.querySelectorAll('.modal-close').forEach(button => {
                button.addEventListener('click', () => {
                    const modal = button.closest('.modal');
                    modal.classList.remove('active');
                });
            });

            // Additional interactivity
            const avatarUpload = document.querySelector('.avatar-upload');
            const fileInput = document.createElement('input');
            fileInput.type = 'file';
            fileInput.accept = 'image/*';

            avatarUpload.addEventListener('click', () => {
                fileInput.click();
            });

            fileInput.addEventListener('change', (e) => {
                if (e.target.files && e.target.files[0]) {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        document.querySelector('.avatar').src = e.target.result;
                    };
                    reader.readAsDataURL(e.target.files[0]);
                }
            });

            // Modal functions
            function openModal(modalId) {
                const modal = document.getElementById(modalId);
                modal.classList.add('show');
                // Reset form
                modal.querySelector('form')?.reset();
                // Focus first input
                const firstInput = modal.querySelector('input');
                if (firstInput) {
                    setTimeout(() => firstInput.focus(), 100);
                }
            }

            function closeModal(modalId) {
                const modal = document.getElementById(modalId);
                modal.classList.remove('show');
            }

            // Close modal on backdrop click
            document.querySelectorAll('.modal').forEach(modal => {
                modal.addEventListener('click', (e) => {
                    if (e.target === modal) {
                        modal.classList.remove('show');
                    }
                });
            });

            // Password visibility toggle
            document.querySelectorAll('.toggle-password').forEach(button => {
                button.addEventListener('click', () => {
                    const input = button.parentElement.querySelector('input');
                    const type = input.type === 'password' ? 'text' : 'password';
                    input.type = type;
                    button.innerHTML = type === 'password' ?
                        '<i class="fas fa-eye"></i>' :
                        '<i class="fas fa-eye-slash"></i>';
                });
            });

            // Password strength checker
            const passwordInput = document.querySelector('.modal-body .form-group:nth-child(2) input');
            const strengthIndicator = document.querySelector('.password-strength');

            if (passwordInput) {
                passwordInput.addEventListener('input', (e) => {
                    const password = e.target.value;
                    let strength = 0;

                    // Length check
                    if (password.length >= 8) strength += 1;
                    // Contains number
                    if (/\d/.test(password)) strength += 1;
                    // Contains special char
                    if (/[!@#$%^&*]/.test(password)) strength += 1;
                    // Contains uppercase and lowercase
                    if (/[a-z]/.test(password) && /[A-Z]/.test(password)) strength += 1;

                    strengthIndicator.className = 'password-strength';
                    if (strength >= 4) strengthIndicator.classList.add('strong');
                    else if (strength >= 2) strengthIndicator.classList.add('medium');
                    else if (strength >= 1) strengthIndicator.classList.add('weak');
                });
            }

            // Password update function
            function updatePassword() {
                const modal = document.getElementById('passwordModal');
                const currentPassword = modal.querySelector('.form-group:nth-child(1) input').value;
                const newPassword = modal.querySelector('.form-group:nth-child(2) input').value;
                const confirmPassword = modal.querySelector('.form-group:nth-child(3) input').value;

                // Validation
                if (!currentPassword || !newPassword || !confirmPassword) {
                    alert('Please fill in all password fields');
                    return;
                }

                if (newPassword !== confirmPassword) {
                    alert('New passwords do not match');
                    return;
                }

                // Here you would typically make an API call to update the password
                // For demo purposes, we'll just show a success message
                alert('Password updated successfully!');
                closeModal('passwordModal');
            }

            // Escape key closes modal
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') {
                    document.querySelectorAll('.modal.show').forEach(modal => {
                        modal.classList.remove('show');
                    });
                }
            });
        </script>
    @endsection
