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
    </style>
    <div class="page-container" style="">
        <!-- Header Section -->
        <div class="d-flex justify-content-between align-items-center mb-4 page-title-section">
            <h2 class="h4 mb-0">Timelines</h2>
            <a href="{{ url('/admin/new-shipment') }}">
                <button class="btn btn-danger">
                    <i class="fas fa-plus me-2"></i>Create New Shipment
                </button>
            </a>
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
                            <th>Name</th>
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
                            <td>John doe</td>
                            <td>Dallas Fort Worth International Airport (DFW)</td>
                            <td>Thiruvananthapuram International Airport (TRV)</td>
                            <td>Air</td>

                            <td><span class="status-badge status-cleared">Cleared On Transit</span></td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ url('admin/shipment-details') }}">
                                        <button class="btn btn-view btn-sm">
                                            <i class="fas fa-eye"></i> View
                                        </button>
                                    </a>
                                    <a href="{{ url('admin/add-timeline') }}">
                                        <button class="btn btn-timeline btn-sm">
                                            <i class="fas fa-clock"></i> Add Timeline
                                        </button>
                                    </a>
                                    <button class="btn btn-delete btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal" data-tracking="TJCh-SCgg-wJjm-a4j">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
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
        </div>
    </div>
    <script>
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
    </script>
@endsection
