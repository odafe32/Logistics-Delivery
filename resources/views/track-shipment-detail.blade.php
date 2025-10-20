@extends('layout.home_layout')
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

        a {
            text-decoration: none
        }

        body {
            background: #F7FAFC;
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

        .search-container {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }

        .search-input-group {
            display: flex;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .search-input {
            flex: 1;
            padding: 1rem 1.5rem;
            border: 2px solid var(--gray-light);
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .search-input:focus {
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

        .tracking-progress {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .progress-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 2rem;
            color: var(--gray-dark);
        }

        .progress-timeline {
            position: relative;
            padding: 2rem 0;
        }

        .timeline-track {
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--gray-light);
            transform: translateY(-50%);
        }

        .timeline-progress {
            position: absolute;
            top: 50%;
            left: 0;
            height: 4px;
            background: var(--aramex-red);
            transform: translateY(-50%);
            width: 60%;
            transition: width 1s ease;
        }

        .timeline-points {
            position: relative;
            display: flex;
            justify-content: space-between;
        }

        .timeline-point {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            width: 120px;
        }

        .point-indicator {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background: white;
            border: 3px solid var(--gray-light);
            margin-bottom: 1rem;
            position: relative;
            z-index: 1;
            transition: all 0.3s ease;
        }

        .point-indicator.active {
            border-color: var(--aramex-red);
            background: var(--aramex-red);
            box-shadow: 0 0 0 4px rgba(227, 24, 55, 0.2);
        }

        .point-indicator.completed {
            border-color: var(--aramex-red);
            background: var(--aramex-red);
        }

        .point-label {
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--gray-medium);
            margin-top: 0.5rem;
        }

        .point-date {
            font-size: 0.75rem;
            color: var(--gray-medium);
            margin-top: 0.25rem;
        }

        .shipment-details {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .details-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .detail-group {
            padding: 1.5rem;
            background: #F7FAFC;
            border-radius: 12px;
        }

        .detail-label {
            font-size: 0.875rem;
            color: var(--gray-medium);
            margin-bottom: 0.5rem;
        }

        .detail-value {
            font-size: 1rem;
            font-weight: 600;
            color: var(--gray-dark);
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.5rem 1rem;
            background: rgba(227, 24, 55, 0.1);
            color: var(--aramex-red);
            border-radius: 20px;
            font-size: 0.875rem;
            font-weight: 600;
            gap: 0.5rem;
        }

        .status-badge i {
            font-size: 0.75rem;
        }

        .activity-timeline {
            padding-left: 2rem;
            position: relative;
        }

        .activity-line {
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 2px;
            background: var(--gray-light);
        }

        .activity-item {
            position: relative;
            padding-bottom: 2rem;
            padding-left: 2rem;
        }

        .activity-point {
            position: absolute;
            left: -2.25rem;
            top: 0;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background: white;
            border: 2px solid var(--aramex-red);
        }

        .activity-content {
            background: #F7FAFC;
            padding: 1rem;
            border-radius: 12px;
        }

        .activity-date {
            font-size: 0.875rem;
            color: var(--gray-medium);
            margin-bottom: 0.5rem;
        }

        .activity-title {
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .activity-location {
            font-size: 0.875rem;
            color: var(--gray-medium);
        }

        @media (max-width: 768px) {
            .search-input-group {
                flex-direction: column;
            }

            .timeline-point {
                width: auto;
            }

            .point-label {
                font-size: 0.75rem;
            }
        }
    </style>
    </head>

    <body>
    <div class="hero-section">
        <div class="container">
            <h1 class="page-title">Track Your Shipment</h1>

            <div class="tracking-progress">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="progress-title mb-0">Shipment Progress</h2>
                    <div class="status-badge">
                        <i class="fas fa-truck"></i>
                        {{ ucfirst(str_replace('_', ' ', $shipment->current_status)) }}
                    </div>
                </div>

                <div class="progress-timeline">
                    <div class="timeline-track"></div>
                    <div class="timeline-progress"></div>
                    <div class="timeline-points">
                        @php
                            $statusOrder = ['pending', 'picked_up', 'processing', 'in_transit', 'out_for_delivery', 'delivered'];
                            $currentStatusIndex = array_search($shipment->current_status, $statusOrder);
                        @endphp

                        @foreach($statusOrder as $index => $status)
                            <div class="timeline-point">
                                <div class="point-indicator {{ $index <= $currentStatusIndex ? 'completed' : '' }} {{ $index == $currentStatusIndex ? 'active' : '' }}"></div>
                                <div class="point-label">{{ ucfirst(str_replace('_', ' ', $status)) }}</div>
                                <div class="point-date">
                                    @if($latestStatus = $shipment->statuses->where('status', $status)->first())
                                        {{ $latestStatus->status_date->format('M d, Y') }}
                                    @else
                                        Expected
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="shipment-details">
                <h2 class="progress-title mb-4">Shipment Details</h2>
                <div class="details-grid">
                    <div class="detail-group">
                        <div class="detail-label">Tracking Number</div>
                        <div class="detail-value">{{ $shipment->tracking_number }}</div>
                    </div>
                    <div class="detail-group">
                        <div class="detail-label">Service Type</div>
                        <div class="detail-value">{{ ucfirst($shipment->service_type) }}</div>
                    </div>
                    <div class="detail-group">
                        <div class="detail-label">Expected Delivery</div>
                        <div class="detail-value">
                            @if($shipment->current_status === 'delivered')
                                @if($latestStatus = $shipment->statuses->where('status', 'delivered')->first())
                                    {{ $latestStatus->status_date->format('M d, Y') }}
                                @endif
                            @elseif($shipment->delivery_date)
                                {{ \Carbon\Carbon::parse($shipment->delivery_date)->format('M d, Y') }}
                            @else
                                <span class="text-muted">Pending</span>
                            @endif
                        </div>
                    </div>
                    <div class="detail-group">
                        <div class="detail-label">Package Details</div>
                        <div class="detail-value">
                            @if($shipment->packages->count() > 0)
                                @php
                                    $package = $shipment->packages->first();
                                @endphp
                                {{ $package->weight }} kg, {{ $package->length }}×{{ $package->width }}×{{ $package->height }} cm
                            @else
                                No package details
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="shipment-details">
                <h2 class="progress-title mb-4">Activity History</h2>
                <div class="activity-timeline">
                    <div class="activity-line"></div>

                    @forelse($shipment->statuses->sortByDesc('status_date') as $status)
                        <div class="activity-item">
                            <div class="activity-point"></div>
                            <div class="activity-content">
                                <div class="activity-date">{{ $status->status_date->format('M d, Y - H:i') }}</div>
                                <div class="activity-title">{{ ucfirst(str_replace('_', ' ', $status->status)) }}</div>
                                <div class="activity-location">{{ $status->location ?? 'Location not specified' }}</div>
                                @if($status->notes)
                                    <div class="activity-notes mt-2 text-muted">{{ $status->notes }}</div>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="text-center text-muted">No activity history available</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Animate progress bar on page load
                setTimeout(() => {
                    document.querySelector('.timeline-progress').style.width = '60%';
                }, 500);

                 // Calculate progress percentage
            const statusOrder = ['pending', 'picked_up', 'processing', 'in_transit', 'out_for_delivery', 'delivered'];
            const currentStatus = '{{ $shipment->current_status }}';
            const currentStatusIndex = statusOrder.indexOf(currentStatus);
            const progressPercentage = (currentStatusIndex + 1) / statusOrder.length * 100;

            // Set progress bar width
            setTimeout(() => {
                document.querySelector('.timeline-progress').style.width = `${progressPercentage}%`;
            }, 500);

                // Handle tracking button click
                const trackButton = document.querySelector('.btn-primary');
                const searchInput = document.querySelector('.search-input');

                trackButton.addEventListener('click', function() {
                    const trackingNumber = searchInput.value.trim();

                    // Validate input
                    if (!trackingNumber) {
                        searchInput.classList.add('is-invalid');
                        searchInput.focus();
                        return;
                    }



                    // Remove invalid state if present
                    searchInput.classList.remove('is-invalid');

                    // Add loading state
                    trackButton.disabled = true;
                    trackButton.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Tracking...';

                    // Simulate API call
                    setTimeout(() => {
                        // Reset button state
                        trackButton.disabled = false;
                        trackButton.innerHTML = '<i class="fas fa-search me-2"></i>Track';

                        // Refresh tracking info (in real implementation, this would update with API data)
                        updateTrackingInfo();
                    }, 1500);
                });

                // Handle watchlist button
                const watchlistButton = document.querySelector('.btn-outline');
                watchlistButton.addEventListener('click', function() {
                    const trackingNumber = searchInput.value.trim();

                    if (!trackingNumber) {
                        searchInput.classList.add('is-invalid');
                        searchInput.focus();
                        return;
                    }

                    // Toggle watchlist state
                    const isWatched = watchlistButton.classList.contains('watched');

                    if (isWatched) {
                        watchlistButton.innerHTML = '<i class="fas fa-star me-2"></i>Add to Watchlist';
                        watchlistButton.classList.remove('watched');
                    } else {
                        watchlistButton.innerHTML = '<i class="fas fa-star me-2"></i>Added to Watchlist';
                        watchlistButton.classList.add('watched');
                    }
                });

                // Handle input validation
                searchInput.addEventListener('input', function() {
                    if (this.value.trim()) {
                        this.classList.remove('is-invalid');
                    }
                });

                // Function to update tracking information
                function updateTrackingInfo() {
                    // Animate timeline points
                    const points = document.querySelectorAll('.point-indicator');
                    points.forEach((point, index) => {
                        setTimeout(() => {
                            if (index <= 2) { // Assuming package is in transit (3rd stage)
                                point.classList.add('completed');
                            }
                        }, index * 300);
                    });

                    // Update status badge
                    const statusBadge = document.querySelector('.status-badge');
                    statusBadge.innerHTML = '<i class="fas fa-truck"></i>In Transit';

                    // Add hover effects for timeline points
                    points.forEach(point => {
                        point.addEventListener('mouseenter', function() {
                            if (this.classList.contains('completed') || this.classList.contains(
                                    'active')) {
                                this.style.transform = 'scale(1.2)';
                            }
                        });

                        point.addEventListener('mouseleave', function() {
                            this.style.transform = 'scale(1)';
                        });
                    });
                }

                // Initialize tooltip for tracking number
                const trackingNumberValue = document.querySelector('.detail-value');
                trackingNumberValue.style.cursor = 'pointer';
                trackingNumberValue.addEventListener('click', function() {
                    // Copy tracking number to clipboard
                    navigator.clipboard.writeText(this.textContent)
                        .then(() => {
                            // Show temporary copied message
                            const originalText = this.textContent;
                            this.textContent = 'Copied!';
                            setTimeout(() => {
                                this.textContent = originalText;
                            }, 1500);
                        });
                });

                // Add smooth scroll for activity timeline
                const activityItems = document.querySelectorAll('.activity-item');
                activityItems.forEach(item => {
                    item.style.opacity = '0';
                    item.style.transform = 'translateY(20px)';
                });

                // Animate activity items when they come into view
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.style.opacity = '1';
                            entry.target.style.transform = 'translateY(0)';
                            entry.target.style.transition = 'all 0.5s ease';
                        }
                    });
                }, {
                    threshold: 0.1
                });

                activityItems.forEach(item => observer.observe(item));
            });
        </script>

    </body>

    </html>
@endsection
