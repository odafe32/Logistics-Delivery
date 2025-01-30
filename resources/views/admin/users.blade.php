  @extends('layout.admin_layout')
  @section('content')
      <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
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
      </head>

      <body>
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
          <div class="page-container">
              <!-- Header Section -->
              <div class="d-flex justify-content-between align-items-center mb-4 page-title-section">
                  <h2 class="h4 mb-0">Users Management</h2>
                  <a href="{{ route('users.new') }}" class="btn btn-danger">
                        <i class="fas fa-plus me-2"></i>Add New User
                    </a>
              </div>

              <!-- Filters -->
              <div class="filter-section">
        <form action="{{ route('users') }}" method="GET" class="row g-3">
            <div class="col-12 col-md-4">
                <input type="text" class="form-control" name="search" placeholder="Search users..." value="{{ request('search') }}">
            </div>
                <div class="col-6 col-md-2">
                    <select class="form-select" name="role">
                        <option value="">All Roles</option>
                        <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="user" {{ request('role') == 'user' ? 'selected' : '' }}>User</option>
                    </select>
                </div>
                <div class="col-6 col-md-2">
                    <select class="form-select" name="account_type">
                        <option value="">Account Type</option>
                        <option value="personal" {{ request('account_type') == 'personal' ? 'selected' : '' }}>Personal</option>
                        <option value="business" {{ request('account_type') == 'business' ? 'selected' : '' }}>Business</option>
                    </select>
                </div>
                <div class="col-12 col-md-2">
                    <button type="submit" class="btn btn-secondary w-100">Apply Filters</button>
                </div>
            </form>
        </div>
              <!-- Users Table -->
              <div class="table-responsive">
                  <table class="table custom-table">
                      <thead class="table-light">
                          <tr>
                              <th>User</th>
                              <th>Contact</th>
                              <th>Account Type</th>
                              <th>Role</th>
                              <th>Status</th>
                              <th>Actions</th>
                          </tr>
                      </thead>
                      <tbody>
                        @forelse($users as $user)
                        <tr>
                            <td data-label="User">
                                <div class="user-info">
                                    <div class="user-avatar">{{ substr($user->first_name, 0, 1) }}{{ substr($user->last_name, 0, 1) }}</div>
                                    <div>
                                        <div class="fw-bold">{{ $user->first_name }} {{ $user->last_name }}</div>
                                        <div class="text-muted small">{{ $user->email }}</div>
                                    </div>
                                </div>
                            </td>
                            <td data-label="Contact">
                                <div>{{ $user->phone_number }}</div>
                                @if($user->account_type === 'business')
                                    <div class="text-muted small">{{ $user->company_name }}</div>
                                @endif
                            </td>
                            <td data-label="Account Type">
                                <span class="badge {{ $user->account_type === 'business' ? 'bg-primary' : 'bg-info' }}">
                                    {{ ucfirst($user->account_type) }}
                                </span>
                            </td>
                            <td data-label="Role">
                                <span class="badge {{ $user->role === 'admin' ? 'bg-danger' : 'bg-success' }}">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>
                            <td data-label="Role">
                                <span class="badge {{ $user->status === 'inactive' ? 'bg-danger' : 'bg-success' }}">
                                    {{ ucfirst($user->status) }}
                                </span>
                            </td>
                            <td data-label="Actions">
                                <div class="action-buttons">
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-outline-secondary action-btn">
                                    <i class="fas fa-edit"></i>
                                </a>
                                                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-4">No users found</td>
                        </tr>
                        @endforelse
                    </tbody>
                  </table>
              </div>
              <!-- Pagination -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $users->withQueryString()->links() }}
                </div>
          </div>
      @endsection
