<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tours;
use App\Models\Setting;
use Illuminate\Support\Facades\Log;
use App\Models\Booking;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel; // for CSV/Excel
use Barryvdh\DomPDF\Facade\Pdf;      // for PDF

class ReportController extends Controller
{
    //



    public function index(Request $request)
{
    $query = Booking::query()
        ->where('bookable_type', 'App\\Models\\Tour'); // adjust your model namespace

    if ($request->filled('start_date')) {
        $query->whereDate('booking_date', '>=', $request->start_date);
    }

    if ($request->filled('end_date')) {
        $query->whereDate('booking_date', '<=', $request->end_date);
    }

    $bookings = $query->with(['user'])
                      ->latest()
                      ->get();

    return view('admin.reports.tour_bookings', compact('bookings'));
}


public function tourBookingsReport()
{
    try {
        Log::info('Generating Tours bookings report');


        $allBookings = Booking::all();
        Log::debug('All bookings:', $allBookings->toArray());


        $bookings = Booking::where('bookable_type', \App\Models\Tours::class)->get();
        Log::debug('Tour bookings:', $bookings->toArray());

        $counts = Booking::select('bookable_type')
            ->selectRaw('count(*) as total')
            ->groupBy('bookable_type')
            ->get();
        Log::debug('Booking counts:', $counts->toArray());

        $settings = Setting::pluck("value", "setting_name")->toArray();

        return view('admin.report.tours', compact('bookings', 'settings', 'counts'));

    } catch (\Exception $e) {

    }
}

public function visaBookingsReport()
{
    try {
        Log::info('Generating Visa bookings report');

        $allBookings = Booking::all();
        Log::debug('All bookings:', $allBookings->toArray());


        $bookings = Booking::where('bookable_type', \App\Models\Visa::class)->get();
        Log::debug('Visa bookings:', $bookings->toArray());

        $counts = Booking::select('bookable_type')
            ->selectRaw('count(*) as total')
            ->groupBy('bookable_type')
            ->get();
        Log::debug('Booking counts:', $counts->toArray());

        $settings = Setting::pluck("value", "setting_name")->toArray();

        return view('admin.report.visa', compact('bookings', 'settings', 'counts'));

    } catch (\Exception $e) {

    }
}



public function consultanyMBookingsReport()
{
    try {
        Log::info('Generating Consultancy Medicine bookings report');


        $allBookings = Booking::all();
        Log::debug('All bookings:', $allBookings->toArray());


        $bookings = Booking::where('bookable_type', \App\Models\ConsultancyMedicine::class)->get();
        Log::debug('Consultancy Medicine bookings:', $bookings->toArray());

        $counts = Booking::select('bookable_type')
            ->selectRaw('count(*) as total')
            ->groupBy('bookable_type')
            ->get();
        Log::debug('Booking counts:', $counts->toArray());

        $settings = Setting::pluck("value", "setting_name")->toArray();

        return view('admin.report.medicine', compact('bookings', 'settings', 'counts'));

    } catch (\Exception $e) {

    }
}



public function StudyBookingsReport()
{
    try {
        Log::info('Generating Study Abroad bookings report');


        $allBookings = Booking::all();
        Log::debug('All bookings:', $allBookings->toArray());

        $bookings = Booking::where('bookable_type', \App\Models\StudyAbroad::class)->get();
        Log::debug('Study Abroad bookings:', $bookings->toArray());

        $counts = Booking::select('bookable_type')
            ->selectRaw('count(*) as total')
            ->groupBy('bookable_type')
            ->get();
        Log::debug('Booking counts:', $counts->toArray());

        $settings = Setting::pluck("value", "setting_name")->toArray();

        return view('admin.report.StudyAbroad', compact('bookings', 'settings', 'counts'));

    } catch (\Exception $e) {
    }
}




    public function AllBookingsReport()
{
    try {
        Log::info('Generating all bookings report');


        $bookings = Booking::all();

        $settings = Setting::pluck("value", "setting_name")->toArray();

        return view('admin.report.all', compact('bookings', 'settings'));

    } catch (\Exception $e) {
        Log::error('Failed to generate bookings report', [
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString(),
        ]);

        return redirect()->back()->with('error', 'Failed to generate report.');
    }
}



public function exportTourBookings(Request $request)
{
    try {
        $format = $request->query('format', 'csv');

        $bookings = Booking::with('user')
            ->where('bookable_type', \App\Models\Tours::class)
            ->get();

        if ($format === 'csv') {
            $filename = 'tour_bookings_' . now()->format('Ymd_His') . '.csv';
            $headers = [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => "attachment; filename=\"$filename\"",
            ];

            $callback = function () use ($bookings) {
                $file = fopen('php://output', 'w');
                // Header row
                fputcsv($file, ['Booking ID', 'User', 'Phone', 'Type', 'Date', 'Amount', 'Status']);

                foreach ($bookings as $b) {
                    fputcsv($file, [
                        $b->id,
                        $b->user->name ?? 'N/A',
                        $b->user->phone_number ?? 'N/A',
                        class_basename($b->bookable_type),
                        $b->booking_date,
                        $b->booking_amount,
                        $b->status,
                    ]);
                }
                fclose($file);
            };

            return response()->stream($callback, 200, $headers);
        }

        if ($format === 'pdf') {
            $pdf = Pdf::loadView('admin.report.tours_pdf', ['bookings' => $bookings]);
            return $pdf->download('tour_bookings_' . now()->format('Ymd_His') . '.pdf');
        }

        return back()->with('error', 'Invalid format selected.');

    } catch (\Exception $e) {
        Log::error('Tour bookings export failed', [
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString(),
        ]);
        return back()->with('error', 'Export failed.');
    }
}

}
