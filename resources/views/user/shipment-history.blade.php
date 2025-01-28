@extends('layout.user_layout')
@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
        }

        body {
            background: #f8fafc;
            min-height: 100vh;
            padding: 1.5rem;
            color: #0f172a;
        }

        .container {
            max-width: 100%;
            margin: 0 auto;
        }

        .table-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.05);
            overflow: hidden;
        }

        .card-header {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid #f1f5f9;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .header-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #0f172a;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .shipment-count {
            background: #f1f5f9;
            color: #64748b;
            padding: 0.25rem 0.75rem;
            border-radius: 999px;
            font-size: 0.875rem;
        }

        .search-wrapper {
            position: relative;
            min-width: 280px;
        }

        .search-input {
            width: 100%;
            padding: 0.625rem 1rem 0.625rem 2.5rem;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            font-size: 0.875rem;
            transition: all 0.2s;
        }

        .search-input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgb(59 130 246 / 0.1);
        }

        .search-icon {
            position: absolute;
            left: 0.875rem;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            pointer-events: none;
        }

        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #f8fafc;
            padding: 0.875rem 1.5rem;
            text-align: left;
            font-weight: 500;
            color: #64748b;
            border-bottom: 1px solid #e2e8f0;
            white-space: nowrap;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        th:hover {
            background: #f1f5f9;
        }

        .sort-header {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        td {
            padding: 1rem 1.5rem;
            border-bottom: 1px solid #f1f5f9;
            transition: background-color 0.15s;
        }

        tr:hover td {
            background: #f8fafc;
        }

        .tracking-number {
            color: #3b82f6;
            font-weight: 500;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            position: relative;
        }

        .tracking-number:hover {
            color: #2563eb;
        }

        .tracking-number::after {
            content: 'Click to copy';
            position: absolute;
            top: -2rem;
            left: 50%;
            transform: translateX(-50%);
            background: #1e293b;
            color: white;
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            font-size: 0.75rem;
            white-space: nowrap;
            opacity: 0;
            visibility: hidden;
            transition: all 0.2s;
        }

        .tracking-number:hover::after {
            opacity: 1;
            visibility: visible;
            top: -2.5rem;
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

        .actions {
            display: flex;
            gap: 0.5rem;
        }

        .btn {
            width: 2.25rem;
            height: 2.25rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            transition: all 0.2s;
        }

        .btn-primary {
            background: #3b82f6;
            color: white;
        }

        .btn-primary:hover {
            background: #2563eb;
        }

        .btn-secondary {
            background: white;
            border: 1px solid #e2e8f0;
            color: #64748b;
        }

        .btn-secondary:hover {
            border-color: #3b82f6;
            color: #3b82f6;
        }

        .empty-message {
            padding: 3rem;
            text-align: center;
            color: #64748b;
            display: none;
        }

        @media (max-width: 768px) {
            .card-header {
                flex-direction: column;
                align-items: stretch;
            }

            .search-wrapper {
                min-width: 100%;
            }

            th,
            td {
                padding: 0.75rem 1rem;
            }

            .btn {
                width: 2rem;
                height: 2rem;
            }
        }

        /* Active row styles */
        tr.active td {
            background-color: #eff6ff !important;
            border-color: #dbeafe;
        }

        /* Smooth transitions for all interactive elements */
        .btn,
        .tracking-number,
        .status-badge,
        th,
        td,
        tr {
            transition: all 0.2s ease;
        }

        /* Enhanced button styles */
        .btn {
            position: relative;
            overflow: hidden;
        }

        .btn:active {
            transform: scale(0.95);
        }

        /* Ripple effect for buttons */
        .btn::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.3s, height 0.3s;
        }

        .btn:active::after {
            width: 200%;
            height: 200%;
        }

        /* Enhanced sort header styles */
        .sort-header {
            opacity: 0.8;
            transition: opacity 0.2s;
        }

        th:hover .sort-header {
            opacity: 1;
        }

        /* Column highlight effect */
        td.highlight {
            background-color: #f8fafc;
        }

        /* Responsive design enhancements */
        @media (max-width: 768px) {
            .table-container {
                margin: 0 -1rem;
                padding: 0 1rem;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
                scrollbar-width: thin;
            }

            .table-container::-webkit-scrollbar {
                height: 6px;
            }

            .table-container::-webkit-scrollbar-track {
                background: #f1f5f9;
            }

            .table-container::-webkit-scrollbar-thumb {
                background: #cbd5e0;
                border-radius: 3px;
            }

            .action-buttons {
                flex-direction: row;
                gap: 0.5rem;
            }
        }

        /* Smooth animations for status changes */
        .status-badge {
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-4px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Enhanced tooltip styles */
        .tooltip {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
    </style>

    <div class="container">
        <div class="table-card">
            <div class="card-header">
                <div class="header-left">
                    <h2 class="header-title">
                        <i class="fas fa-shipping-fast"></i> Shipments
                    </h2>
                    <span class="shipment-count">3 Total</span>
                </div>
                <div class="search-wrapper">
                    <i class="fas fa-search search-icon"></i>
                    <input type="text" class="search-input" placeholder="Search shipments...">
                </div>
            </div>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>
                                <div class="sort-header">
                                    Tracking Number
                                    <i class="fas fa-sort"></i>
                                </div>
                            </th>
                            <th>
                                <div class="sort-header">
                                    Date
                                    <i class="fas fa-sort"></i>
                                </div>
                            </th>
                            <th>
                                <div class="sort-header">
                                    From
                                    <i class="fas fa-sort"></i>
                                </div>
                            </th>
                            <th>
                                <div class="sort-header">
                                    To
                                    <i class="fas fa-sort"></i>
                                </div>
                            </th>
                            <th>
                                <div class="sort-header">
                                    Status
                                    <i class="fas fa-sort"></i>
                                </div>
                            </th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="tracking-number">
                                    <span>MX123456789</span>
                                    <i class="far fa-copy"></i>
                                </div>
                            </td>
                            <td>Jan 25, 2025</td>
                            <td>Lagos</td>
                            <td>Abuja</td>
                            <td>
                                <span class="status-badge in-transit">
                                    <i class="fas fa-truck"></i>
                                    In Transit
                                </span>
                            </td>
                            <td>
                                <div class="actions">

                                    <button class="btn btn-secondary" title="View Details">
                                        <i class="fas fa-info-circle"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="tracking-number">
                                    <span>MX987654321</span>
                                    <i class="far fa-copy"></i>
                                </div>
                            </td>
                            <td>Jan 20, 2025</td>
                            <td>Ibadan</td>
                            <td>Port Harcourt</td>
                            <td>
                                <span class="status-badge delivered">
                                    <i class="fas fa-check-circle"></i>
                                    Delivered
                                </span>
                            </td>
                            <td>
                                <div class="actions">

                                    <button class="btn btn-secondary" title="View Details">
                                        <i class="fas fa-info-circle"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="tracking-number">
                                    <span>MX456789012</span>
                                    <i class="far fa-copy"></i>
                                </div>
                            </td>
                            <td>Jan 28, 2025</td>
                            <td>Kano</td>
                            <td>Enugu</td>
                            <td>
                                <span class="status-badge pending">
                                    <i class="fas fa-clock"></i>
                                    Pending
                                </span>
                            </td>
                            <td>
                                <div class="actions">

                                    <button class="btn btn-secondary" title="View Details">
                                        <i class="fas fa-info-circle"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="empty-message">
                <i class="fas fa-box fa-2x mb-3"></i>
                <h3>No shipments found</h3>
                <p>Try adjusting your search terms</p>
            </div>
        </div>
    </div>

    <script>
        // Copy tracking number
        document.querySelectorAll('.tracking-number').forEach(number => {
            number.addEventListener('click', function() {
                const text = this.querySelector('span').textContent;
                navigator.clipboard.writeText(text).then(() => {
                    const icon = this.querySelector('i');
                    icon.className = 'fas fa-check';
                    this.style.color = '#16a34a';

                    setTimeout(() => {
                        icon.className = 'far fa-copy';
                        this.style.color = '';
                    }, 1500);
                });
            });
        });



        // Add tooltip functionality for buttons
        document.querySelectorAll('.btn').forEach(btn => {
            btn.addEventListener('mouseenter', function(e) {
                const tooltip = document.createElement('div');
                tooltip.className = 'tooltip';
                tooltip.textContent = this.title;
                tooltip.style.cssText = `
          position: absolute;
          background: #1f2937;
          color: white;
          padding: 4px 8px;
          border-radius: 4px;
          font-size: 12px;
          white-space: nowrap;
          pointer-events: none;
          opacity: 0;
          transition: opacity 0.2s;
          z-index: 1000;
        `;
                document.body.appendChild(tooltip);

                const rect = this.getBoundingClientRect();
                tooltip.style.top = rect.top - tooltip.offsetHeight - 8 + 'px';
                tooltip.style.left = rect.left + (rect.width - tooltip.offsetWidth) / 2 + 'px';

                requestAnimationFrame(() => tooltip.style.opacity = '1');

                this.addEventListener('mouseleave', function handler() {
                    tooltip.remove();
                    this.removeEventListener('mouseleave', handler);
                });
            });
        });
    </script>
@endsection
