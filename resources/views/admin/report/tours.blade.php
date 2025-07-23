@extends('admin.layouts.master')

@section('title', 'Tours Bookings Report')

@section('content')

<div class="container py-4">
    <h1 class="mb-4">Tour Bookings Report</h1>

    @if($bookings->count())
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th scope="col"># Booking ID</th>
                        <th scope="col">User</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Bookable Type</th>
                        <th scope="col">Booking Date</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $booking)
                        <tr>
                            <td>{{ $booking->id }}</td>
                            <td>{{ $booking->user ? $booking->user->name : 'N/A' }}</td>
                            <td>{{ $booking->user && $booking->user->phone_number ? $booking->user->phone_number : 'N/A' }}</td>
                            <td>{{ class_basename($booking->bookable_type) }}</td>
                            <td>{{ \Carbon\Carbon::parse($booking->booking_date)->format('d M Y') }}</td>
                            <td>{{ number_format($booking->booking_amount, 2) }}</td>
                            <td>
                                @if ($booking->status === 'successful')
                                    <span class="badge bg-success text-light">successful</span>
                                @elseif ($booking->status === 'pending')
                                    <span class="badge bg-warning text-dark">Pending</span>
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
        </div>
    @else
        <div class="alert alert-info">
            No bookings found for tours.
        </div>
    @endif

    {{-- <div class="mt-3 no-print">
        <button onclick="window.print()" class="btn btn-primary">Print Report</button>
    </div> --}}


    <div class="mb-3 d-flex justify-content-end gap-2">
    <a href="{{ route('admin.reports.tour-bookings.export', ['format' => 'csv']) }}" class="btn btn-sm btn-primary">
        <i class="bi bi-file-earmark-spreadsheet"></i> Download CSV
    </a>&nbsp;

    <a href="{{ route('admin.reports.tour-bookings.export', ['format' => 'pdf']) }}" class="btn btn-sm btn-danger">
        <i class="bi bi-file-earmark-pdf"></i> Download PDF
    </a>&nbsp;

    <button onclick="window.print()" class="btn btn-sm btn-secondary">
        <i class="bi bi-printer"></i> Print Report
    </button>
</div>

</div>


@endsection
