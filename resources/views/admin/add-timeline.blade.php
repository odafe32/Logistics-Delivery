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
        .timeline {
        position: relative;
        padding: 20px 0;
    }

    .timeline-item {
        padding: 20px;
        border-left: 2px solid #dee2e6;
        position: relative;
        margin-left: 20px;
        margin-bottom: 15px;
    }

    .timeline-badge {
        position: absolute;
        left: -9px;
        top: 25px;
        width: 16px;
        height: 16px;
        border-radius: 50%;
        text-align: center;
        color: white;
        line-height: 16px;
        font-size: 8px;
    }

    .status-badge {
        display: inline-block;
        padding: 8px 16px;
        border-radius: 20px;
        font-weight: 500;
        text-transform: uppercase;
        font-size: 0.875rem;
    }

    .status-pending { background: #fff3cd; color: #856404; }
    .status-picked_up { background: #cce5ff; color: #004085; }
    .status-processing { background: #d4edda; color: #155724; }
    .status-in_transit { background: #e2efff; color: #004085; }
    .status-out_for_delivery { background: #d1ecf1; color: #0c5460; }
    .status-delivered { background: #d4edda; color: #155724; }
    </style>

    <div class="container">
        <div class="form-container animate__animated animate__fadeIn">
            <div class="header">
                <h5 class="mb-0">UPDATE TRACKING TIMELINE</h5>
            </div>

            <!-- Shipment Info Summary -->
            <div class="shipment-summary mb-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="tracking-code-container">
                            <label class="form-label">TRACKING NUMBER</label>
                            <div class="tracking-code">{{ $shipment->tracking_number }}</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="current-status-container">
                            <label class="form-label">CURRENT STATUS</label>
                            <div class="status-badge status-{{ $shipment->current_status }}">
                                {{ ucfirst(str_replace('_', ' ', $shipment->current_status)) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Update Form -->
            <form id="trackingForm">
                @csrf
                <input type="hidden" name="tracking_number" value="{{ $shipment->tracking_number }}">

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="currentLocation" name="location" placeholder="Enter current location" required>
                    <label for="currentLocation">Current Location</label>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="deliveryDate" name="delivery_date" required value="{{ date('Y-m-d') }}">
                            <label for="deliveryDate">Date</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="time" class="form-control" id="deliveryTime" name="delivery_time" required value="{{ date('H:i') }}">
                            <label for="deliveryTime">Time</label>
                        </div>
                    </div>
                </div>

                <div class="form-floating mb-3">
                    <select class="form-control" id="status" name="status" required>
                        <option value="">Select Status</option>
                        <option value="pending" {{ $shipment->current_status === 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="picked_up" {{ $shipment->current_status === 'picked_up' ? 'selected' : '' }}>Picked Up</option>
                        <option value="processing" {{ $shipment->current_status === 'processing' ? 'selected' : '' }}>Processing</option>
                        <option value="in_transit" {{ $shipment->current_status === 'in_transit' ? 'selected' : '' }}>In Transit</option>
                        <option value="out_for_delivery" {{ $shipment->current_status === 'out_for_delivery' ? 'selected' : '' }}>Out for Delivery</option>
                        <option value="delivered" {{ $shipment->current_status === 'delivered' ? 'selected' : '' }}>Delivered</option>
                    </select>
                    <label for="status">Status</label>
                </div>

                <div class="form-floating mb-4">
                    <textarea class="form-control" id="notes" name="notes" style="height: 100px" placeholder="Enter notes"></textarea>
                    <label for="notes">Notes (Optional)</label>
                </div>

                <button type="submit" class="btn btn-danger update-btn w-100">
                    Update Timeline
                </button>

                <div class="alert alert-success mt-3" id="successMessage" style="display: none;">
                    Timeline updated successfully!
                </div>
            </form>

            <!-- Previous Updates -->
            <div class="previous-updates mt-4">
                <h6 class="mb-3">Previous Updates</h6>
                <div class="timeline">
                    @foreach($shipment->statuses as $status)
                        <div class="timeline-item">
                            <div class="timeline-badge bg-{{ $status->status === 'delivered' ? 'success' : 'info' }}">
                                <i class="fas fa-circle"></i>
                            </div>
                            <div class="timeline-content">
                                <h6 class="mb-1">{{ ucfirst(str_replace('_', ' ', $status->status)) }}</h6>
                                <p class="mb-1">{{ $status->location }}</p>
                                <p class="mb-1">{{ $status->notes }}</p>
                                <small class="text-muted">{{ $status->status_date->format('M d, Y H:i') }}</small>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script>
    document.getElementById('trackingForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const submitBtn = this.querySelector('button[type="submit"]');
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Updating...';

        const formData = new FormData(this);
        formData.append('status_date', formData.get('delivery_date') + ' ' + formData.get('delivery_time'));

        fetch('/admin/shipments/{{ $shipment->id }}/status', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json',
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById('successMessage').style.display = 'block';
                setTimeout(() => {
                    window.location.reload();
                }, 2000);
            } else {
                throw new Error(data.message || 'Update failed');
            }
        })
        .catch(error => {
            alert('Error: ' + error.message);
        })
        .finally(() => {
            submitBtn.disabled = false;
            submitBtn.innerHTML = 'Update Timeline';
        });
    });
    </script>
@endsection
