@extends('layout.admin_layout')
@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }

        /* Stats Cards */
        .stat-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            height: 100%;
            transition: transform 0.2s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-icon {
            font-size: 2rem;
            margin-bottom: 15px;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .stat-label {
            color: #6c757d;
            font-size: 0.9rem;
        }

        .email-icon {
            color: #4a90a3;
        }

        .timeline-icon {
            color: #3e8249;
        }

        .code-icon {
            color: #996633;
        }

        .admin-icon {
            color: #b85d5d;
        }

        table {
            padding: 20px;
        }

        /* Table Styles */
        .tracking-table {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            margin-top: 30px;
            overflow: hidden;
        }

        .tracking-table .table {
            margin-bottom: 0;
        }

        .tracking-table th {
            background-color: #f8f9fa;
            border-bottom: 2px solid #dee2e6;
            white-space: nowrap;
        }

        .btn-view {
            background-color: #17a2b8;
            color: white;
        }

        .btn-timeline {
            background-color: #ffc107;
            color: #000;
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
        }

        .btn-view:hover,
        .btn-timeline:hover,
        .btn-delete:hover {
            transform: translateY(-1px);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            white-space: nowrap;
        }

        .status-cleared {
            background-color: #e8f5e9;
            color: #2e7d32;
        }

        .status-pending {
            background-color: #fff3e0;
            color: #ef6c00;
        }

        /* Timeline Styles */
        .timeline {
            position: relative;
            padding: 20px 0;
        }

        .timeline-item {
            padding: 20px;
            border-left: 2px solid #dee2e6;
            position: relative;
            margin-left: 20px;
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            left: -8px;
            top: 24px;
            width: 14px;
            height: 14px;
            border-radius: 50%;
            background: #ffc107;
            border: 2px solid white;
        }

        .btn-group {
            display: flex;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .table-responsive {
                border-radius: 10px;
            }

            .stat-card {
                margin-bottom: 15px;
            }

            .btn-group {
                display: flex;
                margin: 0px 20px;
                gap: 10px;
                flex-wrap: wrap;
            }

            .btn {
                padding: 0.375rem 0.75rem;
                font-size: 0.875rem;
            }

            td {
                min-width: 150px;
            }

            .tracking-table td:not(:last-child) {
                white-space: normal;
                word-break: break-word;
            }
        }

        /* Modal Styles */
        .modal-header {
            background-color: #f8f9fa;
            border-bottom: 2px solid #dee2e6;
        }

        .modal-content {
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
    </style>

    <div class="container-fluid">
        <!-- Stats Cards -->
        <div class="row g-4 mb-4">
        <div class="col-12 col-md-6 col-lg-3">
            <div class="stat-card">
                <i class="fas fa-boxes stat-icon email-icon"></i>
                <div class="stat-number">{{ $totalShipments }}</div>
                <div class="stat-label">Total Shipments</div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
            <div class="stat-card">
                <i class="fas fa-clock stat-icon timeline-icon"></i>
                <div class="stat-number">{{ $pendingShipments }}</div>
                <div class="stat-label">Pending Shipments</div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
            <div class="stat-card">
                <i class="fas fa-truck stat-icon code-icon"></i>
                <div class="stat-number">{{ $inTransitShipments }}</div>
                <div class="stat-label">In Transit</div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
            <div class="stat-card">
                <i class="fas fa-check-circle stat-icon admin-icon"></i>
                <div class="stat-number">{{ $deliveredShipments }}</div>
                <div class="stat-label">Delivered</div>
            </div>
        </div>
    </div>


        <!-- Tracking Table -->
        <div class="tracking-table">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Recent Shipments</h5>
            <a href="{{ route('timelines') }}" class="btn btn-sm btn-outline-primary">View All</a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Tracking Number</th>
                        <th>Sender</th>
                        <th>Recipient</th>
                        <th>Service</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($shipments as $shipment)
                        <tr>
                            <td>{{ $shipment->tracking_number }}</td>
                            <td>{{ $shipment->sender_name }}</td>
                            <td>{{ $shipment->recipient_name }}</td>
                            <td>
                                <span class="badge bg-{{ $shipment->service_type === 'express' ? 'danger' : ($shipment->service_type === 'standard' ? 'primary' : 'success') }}">
                                    {{ ucfirst($shipment->service_type) }}
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-{{
                                    $shipment->current_status === 'delivered' ? 'success' :
                                    ($shipment->current_status === 'pending' ? 'warning' : 'info')
                                }}">
                                    {{ ucfirst(str_replace('_', ' ', $shipment->current_status)) }}
                                </span>
                            </td>
                            <td>{{ $shipment->created_at->format('M d, Y') }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.shipments.details', $shipment->id) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('add-timeline', ['tracking_number' => $shipment->tracking_number]) }}"
                                        class="btn btn-sm btn-warning">
                                            <i class="fas fa-plus"></i> Add Timeline
                                        </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No shipments found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $shipments->links() }}
    </div>
    </div>

    <!-- View Modal -->
    <div class="modal fade" id="viewModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tracking Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <h6 class="fw-bold">Tracking Code</h6>
                        <p id="modalTrackingCode"></p>
                    </div>
                    <div class="mb-3">
                        <h6 class="fw-bold">Origin</h6>
                        <p id="modalOrigin"></p>
                    </div>
                    <div class="mb-3">
                        <h6 class="fw-bold">Destination</h6>
                        <p id="modalDestination"></p>
                    </div>
                    <div class="mb-3">
                        <h6 class="fw-bold">Status</h6>
                        <p id="modalStatus"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete tracking code: <span id="deleteTrackingCode"></span>?</p>
                    <p class="text-danger">This action cannot be undone.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <script>
        // Handle View Modal
        const viewModal = document.getElementById('viewModal');
        viewModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const trackingCode = button.getAttribute('data-tracking');
            const row = button.closest('tr');

            document.getElementById('modalTrackingCode').textContent = trackingCode;
            document.getElementById('modalOrigin').textContent = row.cells[1].textContent;
            document.getElementById('modalDestination').textContent = row.cells[2].textContent;
            document.getElementById('modalStatus').textContent = row.cells[6].textContent;
        });

        // Handle Delete Modal
        const deleteModal = document.getElementById('deleteModal');
        deleteModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const trackingCode = button.getAttribute('data-tracking');
            document.getElementById('deleteTrackingCode').textContent = trackingCode;
        });

        // Handle Timeline Modal
        const timelineModal = document.getElementById('timelineModal');
        timelineModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const trackingCode = button.getAttribute('data-tracking');

            // You can fetch and display different timelines based on the tracking code
            // For now, we're using the static timeline in the HTML
        });

        // Add hover effects to buttons
        document.querySelectorAll('.btn').forEach(button => {
            button.addEventListener('mouseover', function() {
                this.style.transform = 'translateY(-1px)';
                this.style.transition = 'transform 0.2s';
            });

            button.addEventListener('mouseout', function() {
                this.style.transform = 'translateY(0)';
            });
        });

        // Add animation to stat cards
        document.querySelectorAll('.stat-card').forEach(card => {
            card.addEventListener('mouseover', function() {
                this.style.transform = 'translateY(-5px)';
                this.style.transition = 'transform 0.3s';
            });

            card.addEventListener('mouseout', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    </script>
@endsection
