@extends('layout.user_layout')
@section('content')
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f5f5f5;
            padding: 24px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 32px;
        }

        .greeting {
            font-size: 24px;
            color: #333;
        }

        .create-account-btn {
            background-color: #dc2626;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .create-account-btn:hover {
            background-color: #b91c1c;
        }

        .quick-actions {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 24px;
            margin-bottom: 48px;
        }

        .action-card {
            background: white;
            padding: 32px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
            align-items: center;
            cursor: pointer;
            transition: box-shadow 0.3s;
        }

        .action-card:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .icon-container {
            width: 64px;
            height: 64px;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .icon-container img {
            width: 48px;
            height: 48px;
        }

        .action-title {
            color: #666;
            font-size: 18px;
        }

        .shipments-section {
            background: white;
            padding: 24px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .section-header {
            margin-bottom: 24px;
        }

        .section-title {
            font-size: 20px;
            color: #333;
            margin-bottom: 8px;
        }

        .red-line {
            width: 96px;
            height: 4px;
            background-color: #dc2626;
        }

        .empty-state {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 48px 0;
            color: #666;
        }

        .empty-state img {
            width: 48px;
            height: 48px;
            margin-bottom: 16px;
        }

        .empty-state p {
            margin: 8px 0;
        }

        @media (max-width: 768px) {
            body {
                padding: 16px;
            }

            .header {
                flex-direction: column;
                gap: 16px;
                align-content:
                    text-align: left;
            }

            .quick-actions {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="header">
        <div>
            <h1 class="greeting">Hello <span id="userName">Joseph Sule Godfrey</span>!</h1>
            <div class="red-line"></div>
        </div>

    </div>

    <div class="quick-actions">
        <a href="{{ url('/new-shipment') }}">
            <div class="action-card">
                <div class="icon-container">
                    <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23dc2626' stroke-width='2'%3E%3Cpath d='M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z'%3E%3C/path%3E%3Cpolyline points='3.27 6.96 12 12.01 20.73 6.96'%3E%3C/polyline%3E%3Cline x1='12' y1='22.08' x2='12' y2='12'%3E%3C/line%3E%3C/svg%3E"
                        alt="New shipment">
                </div>
                <h3 class="action-title">New shipment</h3>
            </div>
        </a>
        <a href="{{ url('user-track-shipment') }}">
            <div class="action-card">
                <div class="icon-container">
                    <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23dc2626' stroke-width='2'%3E%3Cpath d='M3 9h18v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9Z'%3E%3C/path%3E%3Cpath d='M3 9h18'%3E%3C/path%3E%3Cpath d='M15 13v2'%3E%3C/path%3E%3Cpath d='M7 3h10l2 6H5L7 3Z'%3E%3C/path%3E%3C/svg%3E"
                        alt="Track shipment">
                </div>
                <h3 class="action-title">Track shipment</h3>
            </div>
        </a>
        <div class="action-card">
            <div class="icon-container">
                <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23dc2626' stroke-width='2'%3E%3Cpath d='M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z'%3E%3C/path%3E%3Ccircle cx='12' cy='12' r='3'%3E%3C/circle%3E%3C/svg%3E"
                    alt="Manage settings">
            </div>
            <h3 class="action-title">My Shipments</h3>
        </div>
    </div>

    <div class="shipments-section">
        <div class="section-header">
            <h2 class="section-title">Your Shipments</h2>
            <div class="red-line"></div>
        </div>
        <div class="empty-state">
            <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23666666' stroke-width='2'%3E%3Cpath d='M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z'%3E%3C/path%3E%3C/svg%3E"
                alt="No shipments">
            <p>No Recent Shipments.</p>
            <p>No Shipments</p>
        </div>
    </div>

    <script>
        // Add interactivity
        document.querySelectorAll('.action-card').forEach(card => {
            card.addEventListener('click', () => {
                // Handle card click - can add specific actions for each card
                const action = card.querySelector('.action-title').textContent;
                console.log(`${action} clicked`);
            });
        });

        // Business account button click handler
        document.querySelector('.create-account-btn').addEventListener('click', () => {
            console.log('Create Business Account clicked');
        });

        // You can add more JavaScript functionality as needed
    </script>
@endsection
