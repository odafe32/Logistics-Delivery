@extends('layout.admin_layout')
@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --aramex-red: #E31837;
            --aramex-dark: #d31730;
            --gray-dark: #2D3748;
            --gray-medium: #4A5568;
            --gray-light: #E2E8F0;
            --success-green: #48BB78;
        }

        body {
            background: #fff;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif;
            min-height: 100vh;
            color: var(--gray-dark);
        }

        .hero-section {
            background: linear-gradient(135deg, #FFF5F5 0%, #FFF 100%);
            padding: 40px 0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            margin-top: 80px;
        }

        .page-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--gray-dark);
            margin-bottom: 1rem;
        }

        .form-container {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }

        .form-section {
            margin-bottom: 2rem;
            padding-bottom: 2rem;
            border-bottom: 1px solid var(--gray-light);
        }

        .form-section:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .section-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: var(--gray-dark);
        }

        .form-label {
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--gray-medium);
            margin-bottom: 0.5rem;
        }

        .form-control {
            padding: 0.75rem 1rem;
            border: 2px solid var(--gray-light);
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--aramex-red);
            box-shadow: 0 0 0 3px rgba(227, 24, 55, 0.1);
        }

        .btn {
            padding: 1rem 2rem;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: var(--aramex-red);
            border: none;
            color: white;
        }

        .btn-primary:hover {
            background: var(--aramex-dark);
            transform: translateY(-1px);
        }

        .btn-outline {
            border: 2px solid var(--aramex-red);
            color: var(--aramex-red);
            background: transparent;
        }

        .btn-outline:hover {
            background: var(--aramex-red);
            color: white;
        }

        .package-card {
            background: #F7FAFC;
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            position: relative;
        }

        .package-card .remove-package {
            position: absolute;
            top: 1rem;
            right: 1rem;
            color: var(--aramex-red);
            cursor: pointer;
        }

        .dimension-inputs {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
        }

        .service-option {
            border: 2px solid var(--gray-light);
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .service-option:hover {
            border-color: var(--aramex-red);
        }

        .service-option.selected {
            border-color: var(--aramex-red);
            background: rgba(227, 24, 55, 0.05);
        }

        .service-option .service-title {
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .service-option .service-description {
            font-size: 0.875rem;
            color: var(--gray-medium);
        }

        .price-tag {
            font-weight: 600;
            color: var(--aramex-red);
        }

        @media (max-width: 768px) {
            .dimension-inputs {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="hero-section" style="margin-top: -20px;">
        <div class="container">
            <h1 class="page-title">Create New Shipment</h1>

            <form id="shipmentForm">
                <div class="form-container">
                    <!-- Sender Information -->
                    <div class="form-section">
                        <h2 class="section-title">Sender Information</h2>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" class="form-control" name="sender_name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" name="sender_phone" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="email" class="form-control" name="sender_email" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label">Pickup Address</label>
                                <textarea class="form-control" name="sender_address" rows="3" required></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Recipient Information -->
                    <div class="form-section">
                        <h2 class="section-title">Recipient Information</h2>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" class="form-control" name="recipient_name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" name="recipient_phone" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="email" class="form-control" name="recipient_email" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label">Delivery Address</label>
                                <textarea class="form-control" name="recipient_address" rows="3" required></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Package Information -->
                    <div class="form-section">
                        <h2 class="section-title">Package Details</h2>
                        <div id="packagesContainer">
                            <div class="package-card">
                                <i class="fas fa-times remove-package"></i>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Weight (kg)</label>
                                        <input type="number" class="form-control" name="weight[]" step="0.1" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Dimensions (cm)</label>
                                        <div class="dimension-inputs">
                                            <input type="number" class="form-control" placeholder="Length" name="length[]"
                                                required>
                                            <input type="number" class="form-control" placeholder="Width" name="width[]"
                                                required>
                                            <input type="number" class="form-control" placeholder="Height" name="height[]"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label class="form-label">Package Contents</label>
                                        <textarea class="form-control" name="contents[]" rows="2" required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-outline" id="addPackage">
                            <i class="fas fa-plus me-2"></i>Add Another Package
                        </button>
                    </div>

                    <!-- Shipping Service -->
                    <div class="form-section">
                        <h2 class="section-title">Shipping Service</h2>
                        <div class="service-options">
                            <div class="service-option selected">
                                <div class="service-title">Express Delivery</div>
                                <div class="service-description">1-2 business days</div>
                                <div class="price-tag mt-2">$25.99</div>
                            </div>
                            <div class="service-option">
                                <div class="service-title">Standard Delivery</div>
                                <div class="service-description">3-5 business days</div>
                                <div class="price-tag mt-2">$15.99</div>
                            </div>
                            <div class="service-option">
                                <div class="service-title">Economy Delivery</div>
                                <div class="service-description">5-7 business days</div>
                                <div class="price-tag mt-2">$10.99</div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-3">
                        <button type="button" class="btn btn-outline" id="saveAsDraft">Save as Draft</button>
                        <button type="submit" class="btn btn-primary">Create Shipment</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Handle adding new packages
            const addPackageBtn = document.getElementById('addPackage');
            const packagesContainer = document.getElementById('packagesContainer');
            const packageTemplate = packagesContainer.querySelector('.package-card').cloneNode(true);

            addPackageBtn.addEventListener('click', function() {
                const newPackage = packageTemplate.cloneNode(true);
                // Clear input values
                newPackage.querySelectorAll('input, textarea').forEach(input => input.value = '');
                packagesContainer.appendChild(newPackage);
            });

            // Handle removing packages
            packagesContainer.addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-package')) {
                    const packageCard = e.target.closest('.package-card');
                    if (packagesContainer.querySelectorAll('.package-card').length > 1) {
                        packageCard.remove();
                    } else {
                        alert('At least one package is required');
                    }
                }
            });

            // Handle service selection
            const serviceOptions = document.querySelectorAll('.service-option');
            serviceOptions.forEach(option => {
                option.addEventListener('click', function() {
                    serviceOptions.forEach(opt => opt.classList.remove('selected'));
                    this.classList.add('selected');
                });
            });

            // Handle form submission
            const shipmentForm = document.getElementById('shipmentForm');
            shipmentForm.addEventListener('submit', function(e) {
                e.preventDefault();

                // Show loading state
                const submitBtn = this.querySelector('button[type="submit"]');
                const originalText = submitBtn.innerHTML;
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Creating Shipment...';

                // Collect form data
                const formData = new FormData(this);

                // Simulate API call
                setTimeout(() => {
                    // Reset button state
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalText;

                    // Show success message
                    alert('Shipment created successfully!');

                    // Redirect to tracking page (in real implementation)
                    // window.location.href = '/tracking/' + trackingNumber;
                }, 1500);
            });

            // Handle save as draft
            const saveAsDraftBtn = document.getElementById('saveAsDraft');
            saveAsDraftBtn.addEventListener('click', function() {
                const btn = this;
                const originalText = btn.innerHTML;
                btn.disabled = true;
                btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Saving...';

                setTimeout(() => {
                    btn.disabled = false;
                    btn.innerHTML = originalText;
                    alert('Draft saved successfully!');
                }, 1000);
            });
        });
    </script>
@endsection
