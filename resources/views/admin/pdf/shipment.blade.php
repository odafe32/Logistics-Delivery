<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Shipment {{ $shipment->tracking_number }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .section {
            margin-bottom: 20px;
        }
        .tracking-number {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .status-history {
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Shipment Details</h1>
        <div class="tracking-number">{{ $shipment->tracking_number }}</div>
    </div>

    <div class="section">
        <h2>Sender Information</h2>
        <table>
            <tr>
                <th>Name</th>
                <td>{{ $shipment->sender_name }}</td>
            </tr>
            <tr>
                <th>Phone</th>
                <td>{{ $shipment->sender_phone }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $shipment->sender_email }}</td>
            </tr>
            <tr>
                <th>Address</th>
                <td>{{ $shipment->sender_address }}</td>
            </tr>
        </table>
    </div>

    <div class="section">
        <h2>Recipient Information</h2>
        <table>
            <tr>
                <th>Name</th>
                <td>{{ $shipment->recipient_name }}</td>
            </tr>
            <tr>
                <th>Phone</th>
                <td>{{ $shipment->recipient_phone }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $shipment->recipient_email }}</td>
            </tr>
            <tr>
                <th>Address</th>
                <td>{{ $shipment->recipient_address }}</td>
            </tr>
        </table>
    </div>

    <div class="section">
        <h2>Package Details</h2>
        @foreach($shipment->packages as $package)
        <table>
            <tr>
                <th>Weight</th>
                <td>{{ $package->weight }} kg</td>
            </tr>
            <tr>
                <th>Dimensions</th>
                <td>{{ $package->length }}x{{ $package->width }}x{{ $package->height }} cm</td>
            </tr>
            <tr>
                <th>Contents</th>
                <td>{{ $package->contents }}</td>
            </tr>
        </table>
        @endforeach
    </div>

    <div class="status-history">
        <h2>Status History</h2>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Location</th>
                    <th>Notes</th>
                </tr>
            </thead>
            <tbody>
                @foreach($shipment->statuses as $status)
                <tr>
                    <td>{{ $status->status_date->format('M d, Y H:i') }}</td>
                    <td>{{ ucfirst(str_replace('_', ' ', $status->status)) }}</td>
                    <td>{{ $status->location ?? '-' }}</td>
                    <td>{{ $status->notes ?? '-' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
