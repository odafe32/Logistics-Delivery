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
          <div class="page-container">
              <!-- Header Section -->
              <div class="d-flex justify-content-between align-items-center mb-4 page-title-section">
                  <h2 class="h4 mb-0">Users Management</h2>
                  <button class="btn btn-danger" onclick="openAddModal()">
                      <i class="fas fa-plus me-2"></i>Add New User
                  </button>
              </div>

              <!-- Filters -->
              <div class="filter-section">
                  <div class="row g-3">
                      <div class="col-12 col-md-4">
                          <input type="text" class="form-control" placeholder="Search users...">
                      </div>
                      <div class="col-6 col-md-2">
                          <select class="form-select">
                              <option value="">Status</option>
                              <option>Active</option>
                              <option>Inactive</option>
                          </select>
                      </div>

                      <div class="col-12 col-md-2">
                          <button class="btn btn-secondary w-100">Apply Filters</button>
                      </div>
                  </div>
              </div>

              <!-- Users Table -->
              <div class="table-responsive">
                  <table class="table custom-table">
                      <thead class="table-light">
                          <tr>
                              <th>User</th>
                              <th>Contact</th>
                              <th>Location</th>
                              <th>Status</th>
                              <th>Role</th>
                              <th>Actions</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td data-label="User">
                                  <div class="user-info">
                                      <div class="user-avatar">JD</div>
                                      <div>
                                          <div class="fw-bold">John Doe</div>
                                          <div class="text-muted small">john@example.com</div>
                                      </div>
                                  </div>
                              </td>
                              <td data-label="Contact">+1 234-567-8900</td>
                              <td data-label="Location">New York, USA</td>
                              <td data-label="Status">
                                  <span class="status-badge bg-success-subtle text-success">Active</span>
                              </td>
                              <td data-label="Role">
                                  <span class="badge bg-danger">Admin</span>
                              </td>
                              <td data-label="Actions">
                                  <div class="action-buttons">
                                      <button class="btn btn-sm btn-outline-danger action-btn" onclick="viewUser(1)">
                                          <i class="fas fa-eye"></i>
                                      </button>
                                      <button class="btn btn-sm btn-outline-secondary action-btn" onclick="editUser(1)">
                                          <i class="fas fa-edit"></i>
                                      </button>
                                  </div>
                              </td>
                          </tr>
                          <!-- Add more rows as needed -->
                      </tbody>
                  </table>
              </div>
          </div>

          <!-- Add User Modal -->
          <div class="modal fade" id="addUserModal" tabindex="-1">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title">Add New User</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                      </div>
                      <div class="modal-body">
                          <form id="addUserForm" class="row g-3">
                              <div class="col-md-6">
                                  <label class="form-label">First Name</label>
                                  <input type="text" class="form-control" required>
                              </div>
                              <div class="col-md-6">
                                  <label class="form-label">Last Name</label>
                                  <input type="text" class="form-control" required>
                              </div>
                              <div class="col-md-6">
                                  <label class="form-label">Email</label>
                                  <input type="email" class="form-control" required>
                              </div>
                              <div class="col-md-6">
                                  <label class="form-label">Phone</label>
                                  <input type="tel" class="form-control" required>
                              </div>
                              <div class="col-12">
                                  <label class="form-label">Location</label>
                                  <input type="text" class="form-control" required>
                              </div>
                              <div class="col-md-6">
                                  <label class="form-label">Time Zone</label>
                                  <select class="form-select" required>
                                      <option value="">Select timezone</option>
                                      <option>UTC-5 (EST)</option>
                                      <option>UTC-8 (PST)</option>
                                  </select>
                              </div>
                              <div class="col-md-6">
                                  <label class="form-label">Role</label>
                                  <select class="form-select" required>
                                      <option value="">Select role</option>
                                      <option>Admin</option>
                                      <option>User</option>
                                  </select>
                              </div>
                          </form>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                          <button type="button" class="btn btn-danger" onclick="saveUser()">Add User</button>
                      </div>
                  </div>
              </div>
          </div>

          <!-- View User Modal -->
          <div class="modal fade" id="viewUserModal" tabindex="-1">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title">User Details</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                      </div>
                      <div class="modal-body">
                          <div class="row g-4">
                              <div class="col-md-12 text-center mb-3">
                                  <div class="user-avatar mx-auto" style="width: 80px; height: 80px; font-size: 2em;">
                                      JD
                                  </div>
                                  <h5 class="mt-3 mb-1">John Doe</h5>
                                  <span class="status-badge bg-success-subtle text-success">Active</span>
                              </div>
                              <div class="col-md-6">
                                  <h6 class="mb-3">Personal Information</h6>
                                  <div class="mb-2">
                                      <strong>Email:</strong> john@example.com
                                  </div>
                                  <div class="mb-2">
                                      <strong>Phone:</strong> +1 234-567-8900
                                  </div>
                                  <div class="mb-2">
                                      <strong>Location:</strong> New York, USA
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <h6 class="mb-3">Account Information</h6>
                                  <div class="mb-2">
                                      <strong>Role:</strong> Admin
                                  </div>
                                  <div class="mb-2">
                                      <strong>Time Zone:</strong> UTC-5 (EST)
                                  </div>
                                  <div class="mb-2">
                                      <strong>Last Login:</strong> 2 hours ago
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-danger" onclick="editUser(1)">Edit User</button>
                      </div>
                  </div>
              </div>
          </div>

          <!-- Edit User Modal -->
          <div class="modal fade" id="editUserModal" tabindex="-1">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title">Edit User</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                      </div>
                      <div class="modal-body">
                          <form id="editUserForm" class="row g-3">
                              <div class="col-md-6">
                                  <label class="form-label">First Name</label>
                                  <input type="text" class="form-control" value="John" required>
                              </div>
                              <div class="col-md-6">
                                  <label class="form-label">Last Name</label>
                                  <input type="text" class="form-control" value="Doe" required>
                              </div>
                              <div class="col-md-6">
                                  <label class="form-label">Email</label>
                                  <input type="email" class="form-control" value="john@example.com" required>
                              </div>
                              <div class="col-md-6">
                                  <label class="form-label">Phone</label>
                                  <input type="tel" class="form-control" value="+1 234-567-8900" required>
                              </div>
                              <div class="col-12">
                                  <label class="form-label">Location</label>
                                  <input type="text" class="form-control" value="New York, USA" required>
                              </div>
                              <div class="col-md-6">
                                  <label class="form-label">Time Zone</label>
                                  <select class="form-select" required>
                                      <option selected>UTC-5 (EST)</option>
                                      <option>UTC-8 (PST)</option>
                                  </select>
                              </div>
                              <div class="col-md-6">
                                  <label class="form-label">Role</label>
                                  <select class="form-select" required>
                                      <option selected>Admin</option>
                                      <option>User</option>
                                      <option>Manager</option>
                                  </select>
                              </div>
                              <div class="col-12">
                                  <label class="form-label">Status</label>
                                  <select class="form-select" required>
                                      <option selected>Active</option>
                                      <option>Inactive</option>
                                      <option>Suspended</option>
                                  </select>
                              </div>

                          </form>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-danger me-auto" onclick="confirmDelete()">Delete
                              User</button>
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                          <button type="button" class="btn btn-danger" onclick="updateUser()">Save Changes</button>
                      </div>
                  </div>
              </div>
          </div>

          <!-- Delete Confirmation Modal -->
          <div class="modal fade" id="deleteModal" tabindex="-1">
              <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title">Confirm Delete</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                      </div>
                      <div class="modal-body">
                          <p>Are you sure you want to delete this user? This action cannot be undone.</p>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                          <button type="button" class="btn btn-danger" onclick="deleteUser()">Delete</button>
                      </div>
                  </div>
              </div>
          </div>

          <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
          <script>
              // Modal instances
              let currentUserId = null;
              const modals = {
                  add: new bootstrap.Modal(document.getElementById('addUserModal')),
                  view: new bootstrap.Modal(document.getElementById('viewUserModal')),
                  edit: new bootstrap.Modal(document.getElementById('editUserModal')),
                  delete: new bootstrap.Modal(document.getElementById('deleteModal'))
              };

              // Open modals
              function openAddModal() {
                  modals.add.show();
              }

              function viewUser(userId) {
                  currentUserId = userId;
                  modals.view.show();
              }

              function editUser(userId) {
                  currentUserId = userId;
                  modals.view.hide();
                  modals.edit.show();
              }

              function confirmDelete() {
                  modals.edit.hide();
                  modals.delete.show();
              }

              // Form handling
              function saveUser() {
                  const form = document.getElementById('addUserForm');
                  if (form.checkValidity()) {
                      // Add your save logic here
                      modals.add.hide();
                      showToast('User added successfully');
                      form.reset();
                  } else {
                      form.reportValidity();
                  }
              }

              function updateUser() {
                  const form = document.getElementById('editUserForm');
                  if (form.checkValidity()) {
                      // Add your update logic here
                      modals.edit.hide();
                      showToast('User updated successfully');
                  } else {
                      form.reportValidity();
                  }
              }

              function deleteUser() {
                  // Add your delete logic here
                  modals.delete.hide();
                  showToast('User deleted successfully');
              }

              // Search functionality
              document.querySelector('input[type="text"]').addEventListener('input', function(e) {
                  const searchTerm = e.target.value.toLowerCase();
                  const rows = document.querySelectorAll('tbody tr');

                  rows.forEach(row => {
                      const text = row.textContent.toLowerCase();
                      row.style.display = text.includes(searchTerm) ? '' : 'none';
                  });
              });

              // Filter functionality
              document.querySelectorAll('.filter-section select').forEach(select => {
                  select.addEventListener('change', function() {
                      applyFilters();
                  });
              });

              function applyFilters() {
                  const status = document.querySelector('select[name="status"]')?.value;
                  const role = document.querySelector('select[name="role"]')?.value;

                  const rows = document.querySelectorAll('tbody tr');
                  rows.forEach(row => {
                      let show = true;

                      if (status && !row.querySelector(`[data-status="${status}"]`)) {
                          show = false;
                      }
                      if (role && !row.querySelector(`[data-role="${role}"]`)) {
                          show = false;
                      }

                      row.style.display = show ? '' : 'none';
                  });
              }

              // Toast notification (you can replace with your preferred notification system)
              function showToast(message) {
                  alert(message); // Replace with a proper toast notification
              }

              // Mobile responsiveness enhancements
              function adjustModalHeight() {
                  if (window.innerWidth <= 576) {
                      const modals = document.querySelectorAll('.modal-dialog');
                      modals.forEach(modal => {
                          const windowHeight = window.innerHeight;
                          modal.style.height = windowHeight * 0.9 + 'px';
                      });
                  }
              }

              window.addEventListener('resize', adjustModalHeight);
              document.addEventListener('DOMContentLoaded', adjustModalHeight);
          </script>
      @endsection
