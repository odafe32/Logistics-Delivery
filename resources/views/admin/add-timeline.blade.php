@extends('layout.admin_layout')
@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #dc3545;
            --primary-hover: #c82333;
            --background-color: #f8f9fa;
            --card-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        body {
            background-color: var(--background-color);
            min-height: 100vh;
            padding: 2rem 0;
        }

        .header {
            background: #E93A3A;
            color: white;
            padding: 1.5rem;
            margin-bottom: 2rem;
            border-radius: 10px;
            box-shadow: var(--card-shadow);
        }

        .header h5 {
            font-weight: 600;
            letter-spacing: 1px;
        }

        .form-container {
            max-width: 100%;
            margin: 0 auto;
            padding: 2rem;
            background: white;
            border-radius: 15px;
            box-shadow: var(--card-shadow);
        }

        .tracking-code-container {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1.5rem;
        }

        .tracking-code {
            font-family: monospace;
            font-size: 1.2rem;
            color: var(--primary-color);
            letter-spacing: 2px;
        }

        .form-label {
            font-weight: 500;
            color: #495057;
            margin-bottom: 0.5rem;
        }

        .form-control {
            border: 2px solid #dee2e6;
            border-radius: 8px;
            padding: 0.75rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
        }

        .form-control.is-valid {
            border-color: #28a745;
            padding-right: calc(1.5em + 0.75rem);
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3e%3cpath fill='%2328a745' d='M2.3 6.73L.6 4.53c-.4-1.04.46-1.4 1.1-.8l1.1 1.4 3.4-3.8c.6-.63 1.6-.27 1.2.7l-4 4.6c-.43.5-.8.4-1.1.1z'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right calc(0.375em + 0.1875rem) center;
            background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
        }

        .update-btn {
            background: linear-gradient(45deg, #dc3545, #ff6b6b);
            border: none;
            padding: 1rem 2rem;
            font-weight: 600;
            letter-spacing: 1px;
            border-radius: 8px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 4px rgba(220, 53, 69, 0.4);
        }

        .update-btn:hover {
            background: linear-gradient(45deg, #c82333, #ff5252);
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(220, 53, 69, 0.6);
        }

        .update-btn:active {
            transform: translateY(0);
        }

        .status-badge {
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-weight: 500;
            margin-top: 0.5rem;
        }

        .form-floating {
            margin-bottom: 1.5rem;
        }

        .success-message {
            display: none;
            background: #d4edda;
            color: #155724;
            padding: 1rem;
            border-radius: 8px;
            margin-top: 1rem;
            animation: fadeInUp 0.5s ease;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

    <div class="container">
        <div class="form-container animate__animated animate__fadeIn">
            <div class="header">
                <h5 class="mb-0">CREATE TRACKING INFO TIMELINE</h5>
            </div>

            <form id="trackingForm">
                <div class="tracking-code-container">
                    <label class="form-label">TRACKING CODE</label>
                    <div class="tracking-code" id="trackingCode">TJCh-SCgg-wJjm-a4j</div>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="currentLocation" placeholder="Enter current location"
                        required>
                    <label for="currentLocation">Current Location</label>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="deliveryDate" required>
                            <label for="deliveryDate">Delivery Date</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="time" class="form-control" id="deliveryTime" required>
                            <label for="deliveryTime">Delivery Time</label>
                        </div>
                    </div>
                </div>

                <div class="form-floating mb-4">
                    <select class="form-control" id="status" required>
                        <option value="">Select Status</option>
                        <option value="processing">Processing</option>
                        <option value="in-transit">In Transit</option>
                        <option value="out-for-delivery">Out for Delivery</option>
                        <option value="delivered">Delivered</option>
                        <option value="delayed">Delayed</option>
                        <option value="failed-attempt">Failed Delivery Attempt</option>
                    </select>
                    <label for="status">Status</label>
                </div>

                <button type="submit" class="btn btn-danger update-btn w-100">
                    Update Tracking Information
                </button>

                <div class="success-message" id="successMessage">
                    <div class="d-flex align-items-center">
                        <svg class="bi bi-check-circle-fill me-2" width="24" height="24" viewBox="0 0 16 16"
                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                        </svg>
                        Tracking information updated successfully!
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('trackingForm').addEventListener('submit', function(e) {
            e.preventDefault();

            // Add loading state to button
            const submitButton = this.querySelector('button[type="submit"]');
            submitButton.disabled = true;
            submitButton.innerHTML = `
                <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                Updating...
            `;

            // Simulate API call
            setTimeout(() => {
                const formData = {
                    trackingCode: document.getElementById('trackingCode').textContent,
                    currentLocation: document.getElementById('currentLocation').value,
                    deliveryDate: document.getElementById('deliveryDate').value,
                    status: document.getElementById('status').value,
                    deliveryTime: document.getElementById('deliveryTime').value
                };

                console.log('Form Data:', formData);

                // Show success message
                const successMessage = document.getElementById('successMessage');
                successMessage.style.display = 'block';

                // Reset button state
                submitButton.disabled = false;
                submitButton.innerHTML = 'Update Tracking Information';

                // Add validation styles
                document.querySelectorAll('.form-control').forEach(input => {
                    input.classList.add('is-valid');
                });

                // Hide success message after 3 seconds
                setTimeout(() => {
                    successMessage.style.display = 'none';
                }, 3000);
            }, 1500);
        });

        // Add real-time validation
        document.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('input', function() {
                if (this.checkValidity()) {
                    this.classList.add('is-valid');
                    this.classList.remove('is-invalid');
                } else {
                    this.classList.remove('is-valid');
                    this.classList.add('is-invalid');
                }
            });
        });
    </script>
@endsection
