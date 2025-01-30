@extends('layout.admin_layout')

@section('content')
<style>
          /* Base Styles */
          body {
              background: #f8f9fa;
              font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
          }

          .page-container {
              padding: 20px;
              max-width: 1400px;
              margin: 0 auto;
          }

          /* Card Styles */
          .data-card {
              background: white;
              border-radius: 10px;
              box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
              padding: 20px;
              margin-bottom: 20px;
          }

          /* Table Styles */
          .custom-table {
              width: 100%;
              background: white;
              border-radius: 10px;
              overflow: hidden;
          }

          @media (max-width: 768px) {

              .custom-table,
              .custom-table tbody,
              .custom-table tr,
              .custom-table td {
                  display: block;
              }

              .custom-table thead {
                  display: none;
              }

              .custom-table tr {
                  margin-bottom: 15px;
                  border-bottom: 2px solid #e9ecef;
                  padding: 10px;
              }

              .custom-table td {
                  display: flex;
                  align-items: center;
                  justify-content: space-between;
                  padding: 10px 0;
                  border: none !important;
              }

              .custom-table td::before {
                  content: attr(data-label);
                  font-weight: 600;
                  margin-right: 10px;
              }

              .user-info {
                  flex-direction: column;
                  align-items: flex-start;
              }

              .action-buttons {
                  justify-content: flex-start !important;
                  margin-top: 10px;
              }
          }

          /* User Info Styles */
          .user-info {
              display: flex;
              align-items: center;
              gap: 15px;
          }

          .user-avatar {
              width: 40px;
              height: 40px;
              background: #f8f9fa;
              border-radius: 8px;
              display: flex;
              align-items: center;
              justify-content: center;
              font-weight: bold;
              color: #6c757d;
          }

          /* Button Styles */
          .btn {
              padding: 8px 16px;
              border-radius: 6px;
          }

          .action-btn {
              padding: 6px 12px;
              margin: 0 2px;
          }

          /* Status Badge Styles */
          .status-badge {
              padding: 6px 12px;
              border-radius: 20px;
              font-size: 0.85rem;
          }

          /* Filter Section */
          .filter-section {
              background: white;
              border-radius: 10px;
              padding: 20px;
              margin-bottom: 20px;
          }

          @media (max-width: 768px) {
              .filter-section .row>div {
                  margin-bottom: 15px;
              }
          }

          /* Modal Styles */
          .modal-content {
              border-radius: 15px;
          }

          .modal-header {
              background: #f8f9fa;
              border-radius: 15px 15px 0 0;
          }

          @media (max-width: 576px) {
              .modal-dialog {
                  margin: 10px;
              }

              .modal-body {
                  padding: 15px;
              }

              .modal-footer {
                  flex-direction: column;
                  gap: 10px;
              }

              .modal-footer .btn {
                  width: 100%;
              }
          }

          /* Form Controls */
          .form-control,
          .form-select {
              padding: 10px 15px;
              border-radius: 8px;
              border: 1px solid #dee2e6;
          }

          /* Action Buttons Container */
          .action-buttons {
              display: flex;
              gap: 5px;
              justify-content: flex-end;
          }

          @media (max-width: 576px) {
              .page-title-section {
                  flex-direction: column;
                  gap: 15px;
              }

              .page-title-section .btn {
                  width: 100%;
              }

              .data-card {
                  padding: 15px;
              }
          }
      </style>
<div class="page-container">
    <div class="d-flex justify-content-between align-items-center mb-4 page-title-section">
        <h2 class="h4 mb-0">Edit User</h2>
        <a href="{{ route('users') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back to Users
        </a>
    </div>

    <div class="data-card">
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">First Name</label>
                    <input type="text" class="form-control" name="first_name"
                           value="{{ old('first_name', $user->first_name) }}" required>
                    @error('first_name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Last Name</label>
                    <input type="text" class="form-control" name="last_name"
                           value="{{ old('last_name', $user->last_name) }}" required>
                    @error('last_name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email"
                           value="{{ old('email', $user->email) }}" required>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Phone Number</label>
                    <input type="text" class="form-control" name="phone_number"
                           value="{{ old('phone_number', $user->phone_number) }}" required>
                    @error('phone_number')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Job Title</label>
                    <input type="text" class="form-control" name="job_title"
                           value="{{ old('job_title', $user->job_title) }}" required>
                    @error('job_title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Account Type</label>
                    <select class="form-select" name="account_type" required>
                        <option value="personal" {{ old('account_type', $user->account_type) == 'personal' ? 'selected' : '' }}>Personal</option>
                        <option value="business" {{ old('account_type', $user->account_type) == 'business' ? 'selected' : '' }}>Business</option>
                    </select>
                    @error('account_type')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Role</label>
                    <select class="form-select" name="role" required>
                        <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User</option>
                        <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                    @error('role')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3" id="business-fields" style="display: {{ $user->account_type == 'business' ? 'block' : 'none' }}">
                    <label class="form-label">Company Name</label>
                    <input type="text" class="form-control" name="company_name"
                           value="{{ old('company_name', $user->company_name) }}">
                    @error('company_name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3" id="business-industry" style="display: {{ $user->account_type == 'business' ? 'block' : 'none' }}">
                    <label class="form-label">Industry</label>
                    <input type="text" class="form-control" name="industry"
                           value="{{ old('industry', $user->industry) }}">
                    @error('industry')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Password (Optional)</label>
                    <input type="password" class="form-control" name="password"
                           placeholder="Leave blank if no change">
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="active" {{ old('status', $user->status ?? '') == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ old('status', $user->status ?? '') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
            </div>

            <div class="text-end mt-5">
                <button type="submit" class="btn btn-primary">Update User</button>
            </div>
        </form>
    </div>
</div>

<script>
document.querySelector('select[name="account_type"]').addEventListener('change', function() {
    const businessFields = document.getElementById('business-fields');
    const businessIndustry = document.getElementById('business-industry');

    if (this.value === 'business') {
        businessFields.style.display = 'block';
        businessIndustry.style.display = 'block';
    } else {
        businessFields.style.display = 'none';
        businessIndustry.style.display = 'none';
    }
});
</script>
@endsection
