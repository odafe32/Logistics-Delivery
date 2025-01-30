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
        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            white-space: nowrap;
        }

        .status-pending { background-color: #fff3e0; color: #ef6c00; }
        .status-picked_up { background-color: #e3f2fd; color: #1976d2; }
        .status-processing { background-color: #f3e5f5; color: #7b1fa2; }
        .status-in_transit { background-color: #e8f5e9; color: #2e7d32; }
        .status-out_for_delivery { background-color: #e0f7fa; color: #0097a7; }
        .status-delivered { background-color: #e8f5e9; color: #2e7d32; }
    </style>

    <div class="page-container">
        <!-- Header Section -->
        <div class="d-flex justify-content-between align-items-center mb-4 page-title-section">
            <h2 class="h4 mb-0">All Shipments</h2>
            <a href="{{ route('new-shipment') }}" class="btn btn-danger">
                <i class="fas fa-plus me-2"></i>Create New Shipment
            </a>
        </div>

        <!-- Filters -->
        <div class="data-card mb-4">
            <form action="{{ route('admin.shipments.index') }}" method="GET" class="row g-3">
                <div class="col-12 col-md-3">
                    <input type="text" name="search" class="form-control"
                        placeholder="Search tracking number..."
                        value="{{ request('search') }}">
                </div>
                <div class="col-6 col-md-2">
                    <select name="status" class="form-select">
                        <option value="">All Status</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="picked_up" {{ request('status') == 'picked_up' ? 'selected' : '' }}>Picked Up</option>
                        <option value="processing" {{ request('status') == 'processing' ? 'selected' : '' }}>Processing</option>
                        <option value="in_transit" {{ request('status') == 'in_transit' ? 'selected' : '' }}>In Transit</option>
                        <option value="out_for_delivery" {{ request('status') == 'out_for_delivery' ? 'selected' : '' }}>Out for Delivery</option>
                        <option value="delivered" {{ request('status') == 'delivered' ? 'selected' : '' }}>Delivered</option>
                    </select>
                </div>
                <div class="col-12 col-md-2">
                    <button type="submit" class="btn btn-secondary w-100">Apply Filters</button>
                </div>
            </form>
        </div>

        <!-- Shipments Table -->
        <div class="tracking-table">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Tracking Number</th>
                            <th>Sender</th>
                            <th>Recipient</th>
                            <th>Service Type</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($shipments as $shipment)
                            <tr>
                                <td>{{ $shipment->tracking_number }}</td>
                                <td>
                                    {{ $shipment->sender_name }}<br>
                                    <small class="text-muted">{{ $shipment->sender_address }}</small>
                                </td>
                                <td>
                                    {{ $shipment->recipient_name }}<br>
                                    <small class="text-muted">{{ $shipment->recipient_address }}</small>
                                </td>
                                <td>
                                    <span class="badge bg-{{ $shipment->service_type === 'express' ? 'danger' : ($shipment->service_type === 'standard' ? 'primary' : 'success') }}">
                                        {{ ucfirst($shipment->service_type) }}
                                    </span>
                                </td>
                                <td>
                                    <span class="status-badge status-{{ $shipment->current_status }}">
                                        {{ ucfirst(str_replace('_', ' ', $shipment->current_status)) }}
                                    </span>
                                </td>
                                <td>{{ $shipment->created_at->format('M d, Y') }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.shipments.details', $shipment->id) }}"
                                           class="btn btn-info btn-sm me-2">
                                            <i class="fas fa-eye"></i> View
                                        </a>
                                        <a href="{{ route('add-timeline', $shipment->tracking_number) }}"
                                           class="btn btn-warning btn-sm">
                                            <i class="fas fa-clock"></i> Timeline
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4">
                                    <div class="text-muted">
                                        <i class="fas fa-box fa-2x mb-3"></i>
                                        <p>No shipments found</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-end mt-4">
                {{ $shipments->links() }}
            </div>
        </div>
    </div>
@endsection
