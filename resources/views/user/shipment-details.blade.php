@extends('layout.user_layout')
@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .timeline {
            position: relative;
            padding-left: 3rem;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 1rem;
            top: 0;
            height: 100%;
            width: 2px;
            background: #e2e8f0;
        }

        .timeline-item {
            position: relative;
            padding-bottom: 1.5rem;
        }

        .timeline-marker {
            position: absolute;
            width: 2rem;
            height: 2rem;
            left: -3rem;
            background: white;
            border: 2px solid #3b82f6;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .timeline-marker i {
            font-size: 0.875rem;
            color: #3b82f6;
        }

        .timeline-content {
            background: #f8fafc;
            border-radius: 0.5rem;
            padding: 1rem;
            border: 1px solid #e2e8f0;
        }

        .table-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.05);
            overflow: hidden;
            margin-bottom: 1.5rem;
        }

        .card-header {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid #f1f5f9;
            background: #f8fafc;
        }

        .card-body {
            padding: 1.5rem;
        }

        .badge {
            padding: 0.5rem 1rem;
            border-radius: 9999px;
            font-weight: 500;
        }

        .container {
            max-width: 100%;
            margin: 0 auto;
            padding: 1.5rem;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.375rem;
            padding: 0.375rem 0.75rem;
            border-radius: 999px;
            font-size: 0.875rem;
            font-weight: 500;
            white-space: nowrap;
        }

        .status-badge i {
            font-size: 0.75rem;
        }

        .status-badge.in-transit {
            background: #fef3c7;
            color: #d97706;
        }

        .status-badge.delivered {
            background: #dcfce7;
            color: #15803d;
        }

        .status-badge.pending {
            background: #f1f5f9;
            color: #64748b;
        }
    </style>

    <div class="container">
    <div class="mb-4">
            <a href="{{ route('shipments.history') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Back to Shipments
            </a>
        </div>
        <div class="table-card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Tracking Number: {{ $shipment->tracking_number }}</h5>
                    <span class="status-badge {{ $shipment->current_status }}">
                        <i class="fas {{ getStatusIcon($shipment->current_status) }}"></i>
                        {{ ucfirst($shipment->current_status) }}
                    </span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="table-card h-100">
                    <div class="card-header">
                        <h6 class="mb-0">Sender Information</h6>
                    </div>
                    <div class="card-body">
                        <p class="mb-1"><strong>Name:</strong> {{ $shipment->sender_name }}</p>
                        <p class="mb-1"><strong>Phone:</strong> {{ $shipment->sender_phone }}</p>
                        <p class="mb-1"><strong>Email:</strong> {{ $shipment->sender_email }}</p>
                        <p class="mb-0"><strong>Address:</strong> {{ $shipment->sender_address }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="table-card h-100">
                    <div class="card-header">
                        <h6 class="mb-0">Recipient Information</h6>
                    </div>
                    <div class="card-body">
                        <p class="mb-1"><strong>Name:</strong> {{ $shipment->recipient_name }}</p>
                        <p class="mb-1"><strong>Phone:</strong> {{ $shipment->recipient_phone }}</p>
                        <p class="mb-1"><strong>Email:</strong> {{ $shipment->recipient_email }}</p>
                        <p class="mb-0"><strong>Address:</strong> {{ $shipment->recipient_address }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-card mb-4">
            <div class="card-header">
                <h6 class="mb-0">Package Details</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>Weight (kg)</th>
                                <th>Dimensions (cm)</th>
                                <th>Contents</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($shipment->packages as $package)
                            <tr>
                                <td>{{ $package->weight }}</td>
                                <td>{{ $package->length }} × {{ $package->width }} × {{ $package->height }}</td>
                                <td>{{ $package->contents }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="table-card">
            <div class="card-header">
                <h6 class="mb-0">Shipment Timeline</h6>
            </div>
            <div class="card-body">
                <div class="timeline">
                    @foreach($shipment->statuses as $status)
                    <div class="timeline-item">
                        <div class="timeline-marker">
                            <i class="fas {{ getStatusIcon($status->status) }}"></i>
                        </div>
                        <div class="timeline-content">
                            <h6 class="mb-1">{{ ucfirst($status->status) }}</h6>
                            <p class="small text-muted mb-0">{{ $status->status_date->format('M d, Y H:i') }}</p>
                            @if($status->notes)
                                <p class="small mb-0">{{ $status->notes }}</p>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @php
    function getStatusIcon($status) {
        return match($status) {
            'pending' => 'fa-clock',
            'picked_up' => 'fa-box',
            'processing' => 'fa-cog',
            'in_transit' => 'fa-truck',
            'out_for_delivery' => 'fa-shipping-fast',
            'delivered' => 'fa-check-circle',
            default => 'fa-circle'
        };
    }

    function getStatusColor($status) {
        return match($status) {
            'pending' => 'secondary',
            'in_transit' => 'warning',
            'delivered' => 'success',
            default => 'info'
        };
    }
    @endphp
@endsection
