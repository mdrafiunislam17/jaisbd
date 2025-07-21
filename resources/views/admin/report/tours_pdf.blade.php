<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Tour Bookings Report - {{ now()->format('Y-m-d') }}</title>
    <style>
        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
            font-size: 12px;
            line-height: 1.4;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #343a40;
            padding-bottom: 10px;
        }
        .header h1 {
            font-size: 20px;
            margin: 0;
            color: #343a40;
        }
        .header .subtitle {
            font-size: 14px;
            color: #666;
            margin-top: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
        }
        table th {
            background-color: #343a40;
            color: white;
            text-align: left;
            padding: 8px;
            font-weight: bold;
        }
        table td {
            padding: 8px;
            border: 1px solid #ddd;
        }
        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .badge {
            display: inline-block;
            padding: 3px 7px;
            border-radius: 3px;
            font-size: 11px;
            font-weight: bold;
            text-align: center;
            white-space: nowrap;
        }
        .bg-success { background-color: #28a745; color: white; }
        .bg-warning { background-color: #ffc107; color: #212529; }
        .bg-danger { background-color: #dc3545; color: white; }
        .bg-secondary { background-color: #6c757d; color: white; }
        .footer {
            margin-top: 30px;
            padding-top: 10px;
            border-top: 1px solid #eee;
            text-align: right;
            font-size: 10px;
            color: #666;
        }
        .text-right {
            text-align: right;
        }
        .no-data {
            text-align: center;
            padding: 20px;
            color: #666;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Tour Bookings Report</h1>
        <div class="subtitle">
            Generated on: {{ now()->format('d M Y, h:i A') }} |
            Total Records: {{ $bookings->count() }}
        </div>
    </div>

    @if($bookings->count())
        <table>
            <thead>
                <tr>
                    <th width="10%">Booking ID</th>
                    <th width="20%">User</th>
                    <th width="15%">Phone</th>
                    <th width="15%">Type</th>
                    <th width="15%">Booking Date</th>
                    <th width="15%" class="text-right">Amount </th>
                    <th width="10%">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                    <tr>
                        <td>#{{ $booking->id }}</td>
                        <td>{{ $booking->user ? $booking->user->name : 'N/A' }}</td>
                        <td>{{ $booking->user && $booking->user->phone_number ? $booking->user->phone_number : 'N/A' }}</td>
                        <td>{{ class_basename($booking->bookable_type) }}</td>
                        <td>{{ \Carbon\Carbon::parse($booking->booking_date)->format('d M Y') }}</td>
                        <td class="text-right">{{ number_format($booking->booking_amount, 2) }}</td>
                        <td>
                            @if ($booking->status === 'confirmed')
                                <span class="badge bg-success">Confirmed</span>
                            @elseif ($booking->status === 'pending')
                                <span class="badge bg-warning">Pending</span>
                            @elseif ($booking->status === 'cancelled')
                                <span class="badge bg-danger">Cancelled</span>
                            @else
                                <span class="badge bg-secondary">{{ ucfirst($booking->status) }}</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="no-data">
            No tour bookings found for the selected criteria
        </div>
    @endif

    <div class="footer">
        <p>© {{ date('Y') }} {{ config('app.name', 'Your Application') }}. All rights reserved.</p>
        <p>Page {{ $page ?? '1' }} of {{ $pages ?? '1' }}</p>
    </div>
</body>
</html>
