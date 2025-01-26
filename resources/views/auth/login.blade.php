  <style>
      .modal-content {
          background: linear-gradient(135deg, #E31837 0%, #522E5B 50%, #241C5C 100%) !important;
          border-radius: 8px;
      }

      .form-control {
          background: white;
          border: none;
          padding: 12px;
          border-radius: 4px;
          height: 48px;
      }

      .form-control:focus {
          background: white;
          box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.2);
      }

      .form-label {
          color: white;
          margin-bottom: 8px;
      }

      .btn-danger {
          background: #E31837;
          border: none;
          border-radius: 4px;
          padding: 12px;
          font-weight: 600;
      }

      .btn-outline-danger {
          border: 1px solid #E31837;
          color: white;
          background: transparent;
          border-radius: 4px;
      }

      .btn-outline-danger:hover {
          background: rgba(255, 255, 255, 0.1);
          border-color: white;
          color: white;
      }

      hr {
          border-color: rgba(255, 255, 255, 0.2);
          margin: 24px 0;
      }

      .text-warning {
          color: #FFD700 !important;
      }

      .modal-header {
          border: none;
      }
  </style>
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

                  <form>
                      <div class="mb-3">
                          <label class="form-label text-white">Email<span class="text-white">*</span></label>
                          <input type="email" class="form-control border" required>
                      </div>

                      <div class="mb-4">
                          <label class="form-label text-white">Password<span class="text-white">*</span></label>
                          <input type="password" class="form-control border" required>
                      </div>

                      <button type="submit" class="btn btn-danger w-100 py-2 fw-bold">Log In</button>

                      <div class="text-end mt-3">
                          <a href="{{ url('/forgot-password') }}" class="text-warning text-decoration-none small">Forgot
                              your
                              password?</a>
                      </div>

                      <hr class="my-4">

                      <div class="text-center">
                          <div class="d-flex align-items-center justify-content-center mb-3">
                              <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"
                                  class="text-danger">
                                  <circle cx="12" cy="12" r="10" fill="none" stroke="currentColor"
                                      stroke-width="2" />
                                  <path d="M12 7v7M12 16v1" stroke="currentColor" stroke-width="2" />
                              </svg>
                              <span class="ms-2 text-white">New to {{ config('website.name') }}</span>
                          </div>
                          <a href="{{ url('/register') }}" class="btn btn-outline-danger w-100 py-2 fw-bold">Create an
                              account</a>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>


  <script>
      // Initialize Bootstrap modal
      document.addEventListener('DOMContentLoaded', function() {
          var myModal = new bootstrap.Modal(document.getElementById('loginModal'));
      });
  </script>
