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
                    <i class="fas fa-envelope stat-icon email-icon"></i>
                    <div class="stat-number">0</div>
                    <div class="stat-label">Total Contact Messages</div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="stat-card">
                    <i class="fas fa-history stat-icon timeline-icon"></i>
                    <div class="stat-number">5</div>
                    <div class="stat-label">Total Timeline Created</div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="stat-card">
                    <i class="fas fa-code stat-icon code-icon"></i>
                    <div class="stat-number">2</div>
                    <div class="stat-label">Total Tracking Codes Created</div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="stat-card">
                    <i class="fas fa-users stat-icon admin-icon"></i>
                    <div class="stat-number">1</div>
                    <div class="stat-label">Total Number of Admin</div>
                </div>
            </div>
        </div>

        <!-- Tracking Table -->
        <div class="tracking-table">
            <div class="card-header">
                <h5 class="mb-0">Update Tracker Code Timeline</h5>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Tracking Code</th>
                            <th>Origin</th>
                            <th>Destination</th>
                            <th>Mode</th>



                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>TJCh-SCgg-wJjm-a4j</td>
                            <td>Dallas Fort Worth International Airport (DFW)</td>
                            <td>Thiruvananthapuram International Airport (TRV)</td>
                            <td>Air</td>

                            <td><span class="status-badge status-cleared">Cleared On Transit</span></td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-view btn-sm" data-bs-toggle="modal" data-bs-target="#viewModal"
                                        data-tracking="TJCh-SCgg-wJjm-a4j">
                                        <i class="fas fa-eye"></i> View
                                    </button>
                                    <a href="{{ url('') }}"></a>
                                    <button class="btn btn-timeline btn-sm">
                                        <i class="fas fa-clock"></i> Add Timeline
                                    </button>
                                    <button class="btn btn-delete btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal" data-tracking="TJCh-SCgg-wJjm-a4j">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>TJCx-Bsqd-XWSj-rvJ</td>
                            <td>Los Angeles International Airport (LAX)</td>
                            <td>Toronto Pearson International Airport (YYZ)</td>
                            <td>Air</td>

                            <td><span class="status-badge status-pending">Pending</span></td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-view btn-sm" data-bs-toggle="modal" data-bs-target="#viewModal"
                                        data-tracking="TJCx-Bsqd-XWSj-rvJ">
                                        <i class="fas fa-eye"></i> View
                                    </button>
                                    <button class="btn btn-timeline btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#timelineModal" data-tracking="TJCx-Bsqd-XWSj-rvJ">
                                        <i class="fas fa-clock"></i> Timeline
                                    </button>
                                    <button class="btn btn-delete btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal" data-tracking="TJCx-Bsqd-XWSj-rvJ">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
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
