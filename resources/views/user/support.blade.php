@extends('layout.user_layout')
@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #ef4444;
            --primary-light: #eff6ff;
            --success: #22c55e;
            --warning: #f59e0b;
            --danger: #ef4444;
            --gray-50: #f8fafc;
            --gray-100: #f1f5f9;
            --gray-200: #e2e8f0;
            --gray-300: #cbd5e0;
            --gray-400: #94a3b8;
            --gray-500: #64748b;
            --gray-600: #475569;
            --gray-700: #334155;
            --gray-800: #1e293b;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
        }

        body {
            background: var(--gray-50);
            min-height: 100vh;
            padding: 1.5rem;
            color: var(--gray-800);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .support-header {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .header-title {
            font-size: 1.5rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .header-actions {
            display: flex;
            gap: 1rem;
        }

        .filter-group {
            display: flex;
            gap: 0.5rem;
        }

        .filter-button {
            padding: 0.5rem 1rem;
            border: 1px solid var(--gray-200);
            border-radius: 8px;
            background: white;
            color: var(--gray-600);
            font-size: 0.875rem;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .filter-button:hover {
            border-color: var(--primary);
            color: var(--primary);
        }

        .filter-button.active {
            background: var(--primary-light);
            border-color: var(--primary);
            color: var(--primary);
        }

        .search-bar {
            position: relative;
            flex-grow: 1;
            max-width: 400px;
        }

        .search-input {
            width: 100%;
            padding: 0.625rem 1rem 0.625rem 2.5rem;
            border: 1px solid var(--gray-200);
            border-radius: 8px;
            font-size: 0.875rem;
            transition: all 0.2s;
        }

        .search-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .search-icon {
            position: absolute;
            left: 0.875rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray-400);
            pointer-events: none;
        }

        .btn-new {
            padding: 0.625rem 1.25rem;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 0.875rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-new:hover {
            background: maroon;
        }

        .requests-grid {
            display: grid;
            gap: 1rem;
        }

        .request-card {
            background: white;
            border-radius: 12px;
            padding: 1.25rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: all 0.2s;
            display: grid;
            grid-template-columns: 1fr auto;
            gap: 1rem;
        }

        .request-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .request-info {
            display: grid;
            gap: 0.75rem;
        }

        .request-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 1rem;
        }

        .ticket-number {
            color: var(--gray-500);
            font-size: 0.875rem;
        }

        .request-title {
            font-weight: 500;
            color: var(--gray-800);
            margin-bottom: 0.25rem;
        }

        .request-meta {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            color: var(--gray-500);
            font-size: 0.875rem;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.375rem;
            padding: 0.25rem 0.75rem;
            border-radius: 999px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .status-badge.open {
            background: var(--primary-light);
            color: var(--primary);
        }

        .status-badge.in-progress {
            background: #fef3c7;
            color: var(--warning);
        }

        .status-badge.resolved {
            background: #dcfce7;
            color: var(--success);
        }

        .status-badge.closed {
            background: var(--gray-100);
            color: var(--gray-500);
        }

        .priority-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .priority-badge.high {
            background: #fee2e2;
            color: var(--danger);
        }

        .priority-badge.medium {
            background: #fef3c7;
            color: var(--warning);
        }

        .priority-badge.low {
            background: #dcfce7;
            color: var(--success);
        }

        .request-description {
            color: var(--gray-600);
            font-size: 0.875rem;
            line-height: 1.5;
        }

        .request-actions {
            display: flex;
            gap: 0.5rem;
        }

        .action-btn {
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            border: 1px solid var(--gray-200);
            background: white;
            color: var(--gray-500);
            cursor: pointer;
            transition: all 0.2s;
        }

        .action-btn:hover {
            border-color: var(--primary);
            color: var(--primary);
        }

        @media (max-width: 768px) {
            body {
                padding: 1rem;
            }

            /* Header adjustments */
            .support-header {
                padding: 1rem;
            }

            .header-title {
                font-size: 1.25rem;
                width: 100%;
                margin-bottom: 1rem;
            }

            .header-actions {
                flex-direction: column;
                width: 100%;
                gap: 1rem;
            }

            /* Filter group adjustments */
            .filter-group {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 0.5rem;
                width: 100%;
            }

            .filter-button {
                width: 100%;
                justify-content: center;
                padding: 0.75rem;
            }

            /* Search bar adjustments */
            .search-bar {
                width: 100%;
                max-width: none;
            }

            .search-input {
                padding: 0.75rem 1rem 0.75rem 2.5rem;
            }

            /* New request button adjustment */
            .btn-new {
                width: 100%;
                justify-content: center;
                padding: 0.75rem;
            }

            /* Request card adjustments */
            .request-card {
                grid-template-columns: 1fr;
                padding: 1rem;
            }

            .request-header {
                flex-direction: column;
                gap: 0.75rem;
            }

            .request-badges {
                display: flex;
                gap: 0.5rem;
                flex-wrap: wrap;
            }

            .request-meta {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
            }

            .meta-item {
                width: 100%;
            }

            .request-actions {
                justify-content: flex-end;
                border-top: 1px solid var(--gray-200);
                padding-top: 1rem;
            }

            /* Modal adjustments */
            .modal-content {
                margin: 1rem;
                max-height: calc(100vh - 2rem);
            }

            .modal-header {
                padding: 1rem;
            }

            .modal-body {
                padding: 1rem;
            }

            .modal-footer {
                padding: 1rem;
                flex-direction: column;
                gap: 0.5rem;
            }

            .modal-footer .btn {
                width: 100%;
            }

            /* Form adjustments */
            .form-group {
                margin-bottom: 1rem;
            }

            .form-input,
            .form-select,
            .form-textarea {
                padding: 0.75rem;
            }

            /* Timeline adjustments */
            .detail-timeline {
                margin: 1rem 0;
            }

            .timeline-item {
                padding: 0.75rem;
            }

            .timeline-header {
                flex-direction: column;
                gap: 0.25rem;
            }
        }

        /* Additional small screen optimizations */
        @media (max-width: 480px) {
            .filter-group {
                grid-template-columns: 1fr;
            }

            .request-badges {
                width: 100%;
            }

            .status-badge,
            .priority-badge {
                width: 100%;
                justify-content: center;
            }
        }

        /* Tablet optimizations */
        @media (min-width: 769px) and (max-width: 1024px) {
            .filter-group {
                flex-wrap: wrap;
            }

            .filter-button {
                flex: 1 1 calc(50% - 0.5rem);
            }

            .request-card {
                grid-template-columns: 1fr auto;
            }
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .modal.show {
            display: flex;
            opacity: 1;
        }

        .modal-content {
            background: white;
            border-radius: 12px;
            width: 100%;
            max-width: 600px;
            max-height: 90vh;
            overflow-y: auto;
            transform: translateY(-20px);
            transition: transform 0.3s ease;
        }

        .modal.show .modal-content {
            transform: translateY(0);
        }

        .modal-header {
            padding: 1.5rem;
            border-bottom: 1px solid var(--gray-200);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-title {
            font-size: 1.25rem;
            font-weight: 600;
        }

        .modal-close {
            background: none;
            border: none;
            color: var(--gray-500);
            cursor: pointer;
            font-size: 1.25rem;
        }

        .modal-body {
            padding: 1.5rem;
        }

        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            margin-bottom: 0.5rem;
            color: var(--gray-700);
        }

        .form-input,
        .form-select,
        .form-textarea {
            width: 100%;
            padding: 0.625rem;
            border: 1px solid var(--gray-200);
            border-radius: 8px;
            font-size: 0.875rem;
            transition: all 0.2s;
        }

        .form-input:focus,
        .form-select:focus,
        .form-textarea:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .form-textarea {
            min-height: 120px;
            resize: vertical;
        }

        .modal-footer {
            padding: 1.5rem;
            border-top: 1px solid var(--gray-200);
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
        }

        .btn {
            padding: 0.625rem 1.25rem;
            border-radius: 8px;
            font-size: 0.875rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
        }

        .btn-secondary {
            background: white;
            border: 1px solid var(--gray-200);
            color: var(--gray-600);
        }

        .btn-secondary:hover {
            border-color: var(--primary);
            color: var(--primary);
        }

        .btn-primary {
            background: var(--primary);
            border: none;
            color: white;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
        }
    </style>
    </head>

    <body>
        <div class="container">
            <div class="support-header">
                <div class="header-content">
                    <h1 class="header-title">
                        <i class="fas fa-headset"></i>
                        Support Requests
                    </h1>
                    <div class="header-actions">
                        <div class="filter-group">
                            <button class="filter-button active">
                                <i class="fas fa-inbox"></i>
                                All
                            </button>
                            <button class="filter-button">
                                <i class="fas fa-clock"></i>
                                Open
                            </button>
                            <button class="filter-button">
                                <i class="fas fa-spinner"></i>
                                In Progress
                            </button>
                            <button class="filter-button">
                                <i class="fas fa-check-circle"></i>
                                Resolved
                            </button>
                        </div>
                        <div class="search-bar">
                            <i class="fas fa-search search-icon"></i>
                            <input type="text" class="search-input" placeholder="Search requests...">
                        </div>
                        <button class="btn-new" onclick="openModal('newRequestModal')">
                            <i class="fas fa-plus"></i>
                            New Request
                        </button>
                    </div>
                </div>
            </div>

            <div class="requests-grid">
                <!-- Sample Request Cards -->
                <div class="request-card">
                    <div class="request-info">
                        <div class="request-header">
                            <div>
                                <span class="ticket-number">#SR-2024-001</span>
                                <h3 class="request-title">Unable to access dashboard</h3>
                                <div class="request-meta">
                                    <span class="meta-item">
                                        <i class="fas fa-user"></i>
                                        John Doe
                                    </span>
                                    <span class="meta-item">
                                        <i class="fas fa-calendar"></i>
                                        Jan 28, 2024
                                    </span>
                                    <span class="meta-item">
                                        <i class="fas fa-clock"></i>
                                        2 hours ago
                                    </span>
                                </div>
                            </div>
                            <div class="request-badges">
                                <span class="status-badge in-progress">
                                    <i class="fas fa-spinner"></i>
                                    In Progress
                                </span>
                                <span class="priority-badge high">
                                    <i class="fas fa-exclamation-circle"></i>
                                    High
                                </span>
                            </div>
                        </div>
                        <p class="request-description">
                            Getting error 403 when trying to access the analytics dashboard. Need urgent assistance as this
                            is affecting our reporting.
                        </p>
                    </div>
                    <div class="request-actions">
                        <button class="action-btn" title="View Details" onclick="openModal('viewRequestModal')">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="action-btn" title="Edit Request">
                            <i class="fas fa-edit"></i>
                        </button>
                    </div>
                </div>

            </div>
        </div>

        <!-- New Request Modal -->
        <div class="modal" id="newRequestModal">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Create New Support Request</h2>
                    <button class="modal-close" onclick="closeModal('newRequestModal')">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="newRequestForm">
                        <div class="form-group">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-input" placeholder="Brief description of the issue" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Category</label>
                            <select class="form-select" required>
                                <option value="">Select a category</option>
                                <option value="technical">Technical Issue</option>
                                <option value="billing">Billing</option>
                                <option value="feature">Feature Request</option>
                                <option value="access">Access/Permissions</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Priority</label>
                            <select class="form-select" required>
                                <option value="">Select priority level</option>
                                <option value="low">Low</option>
                                <option value="medium">Medium</option>
                                <option value="high">High</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Description</label>
                            <textarea class="form-textarea" placeholder="Detailed description of your issue..." required></textarea>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Attachments (optional)</label>
                            <input type="file" class="form-input" multiple>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" onclick="closeModal('newRequestModal')">Cancel</button>
                    <button class="btn btn-primary" onclick="submitRequest()">Submit Request</button>
                </div>
            </div>
        </div>

        <!-- View Request Modal -->
        <div class="modal" id="viewRequestModal">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Request Details</h2>
                    <button class="modal-close" onclick="closeModal('viewRequestModal')">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="request-details">
                        <div class="detail-header">
                            <span class="status-badge in-progress">In Progress</span>
                            <span class="priority-badge high">High Priority</span>
                        </div>
                        <h3 class="detail-title">#SR-2024-001: Unable to access dashboard</h3>
                        <div class="detail-meta">
                            <span>Submitted by: John Doe</span>
                            <span>Date: Jan 28, 2024</span>
                            <span>Last Updated: 2 hours ago</span>
                        </div>
                        <div class="detail-description">
                            <h4>Description</h4>
                            <p>Getting error 403 when trying to access the analytics dashboard. Need urgent assistance as
                                this is affecting our reporting.</p>
                        </div>
                        <div class="detail-timeline">
                            <h4>Activity Timeline</h4>
                            <div class="timeline-item">
                                <div class="timeline-icon">
                                    <i class="fas fa-comment"></i>
                                </div>
                                <div class="timeline-content">
                                    <div class="timeline-header">
                                        <span class="timeline-author">Support Agent (Jane Smith)</span>
                                        <span class="timeline-time">1 hour ago</span>
                                    </div>
                                    <p>Investigating the permission issues. Will update shortly.</p>
                                </div>
                            </div>
                            <div class="timeline-item">
                                <div class="timeline-icon">
                                    <i class="fas fa-ticket-alt"></i>
                                </div>
                                <div class="timeline-content">
                                    <div class="timeline-header">
                                        <span class="timeline-author">System</span>
                                        <span class="timeline-time">2 hours ago</span>
                                    </div>
                                    <p>Ticket created and assigned to Support Team</p>
                                </div>
                            </div>
                        </div>
                        <div class="add-comment">
                            <h4>Add Comment</h4>
                            <textarea class="form-textarea" placeholder="Type your comment here..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" onclick="closeModal('viewRequestModal')">Close</button>
                    <button class="btn btn-primary">Add Comment</button>
                </div>
            </div>
        </div>

        <script>
            // Modal functions
            function openModal(modalId) {
                const modal = document.getElementById(modalId);
                modal.classList.add('show');
            }

            function closeModal(modalId) {
                const modal = document.getElementById(modalId);
                modal.classList.remove('show');
            }

            // Close modal on backdrop click
            document.querySelectorAll('.modal').forEach(modal => {
                modal.addEventListener('click', (e) => {
                    if (e.target === modal) {
                        modal.classList.remove('show');
                    }
                });
            });

            // Filter buttons
            document.querySelectorAll('.filter-button').forEach(button => {
                button.addEventListener('click', () => {
                    // Remove active class from all buttons
                    document.querySelectorAll('.filter-button').forEach(btn => {
                        btn.classList.remove('active');
                    });
                    // Add active class to clicked button
                    button.classList.add('active');
                });
            });

            // Search functionality
            const searchInput = document.querySelector('.search-input');
            searchInput.addEventListener('input', (e) => {
                const searchTerm = e.target.value.toLowerCase();
                document.querySelectorAll('.request-card').forEach(card => {
                    const text = card.textContent.toLowerCase();
                    card.style.display = text.includes(searchTerm) ? '' : 'none';
                });
            });

            // Submit new request
            function submitRequest() {
                const form = document.getElementById('newRequestForm');
                if (form.checkValidity()) {
                    // Here you would typically make an API call to submit the request
                    alert('Request submitted successfully!');
                    closeModal('newRequestModal');
                    form.reset();
                } else {
                    form.reportValidity();
                }
            }

            // Escape key closes modal
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') {
                    document.querySelectorAll('.modal.show').forEach(modal => {
                        modal.classList.remove('show');
                    });
                }
            });
        </script>
    </body>

    </html>
@endsection
