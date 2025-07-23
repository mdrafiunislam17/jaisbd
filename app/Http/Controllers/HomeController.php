<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    /**
     * Require auth
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show dashboard
     */
    public function index()
    {
        $settings = Setting::pluck("value", "setting_name")->toArray();
        $user = User::all();
        return view('admin.index', compact('settings','user'));
    }

    /**
     * Generate filtered bookings report.
     *
     *
     */


    public function BookingsReport(Request $request)
{
    try {
        Log::info('Generating bookings report', $request->only(['start_date', 'end_date', 'report_type']));

        $typeMap = [
            'tour' => \App\Models\Tours::class,
            'visa' => \App\Models\Visa::class,
            'medical' => \App\Models\ConsultancyMedicine::class,
            'study_abroad' => \App\Models\StudyAbroad::class,
        ];

        $query = Booking::query();

        if ($request->filled('report_type') && $request->report_type !== 'all' && isset($typeMap[$request->report_type])) {
            $query->where('bookable_type', $typeMap[$request->report_type]);
        }

        if ($request->filled('start_date')) {
            $start = Carbon::createFromFormat('Y-m-d', $request->start_date, config('app.timezone'))->startOfDay()->setTimezone('UTC');
            Log::debug('Start date filter (UTC) on booking_date:', ['start' => $start]);
            $query->where('booking_date', '>=', $start);
        }

        if ($request->filled('end_date')) {
            $end = Carbon::createFromFormat('Y-m-d', $request->end_date, config('app.timezone'))->endOfDay()->setTimezone('UTC');
            Log::debug('End date filter (UTC) on booking_date:', ['end' => $end]);
            $query->where('booking_date', '<=', $end);
        }

        $bookings = $query->get();

        Log::info('Final SQL and rows', [
            'sql' => $query->toSql(),
            'bindings' => $query->getBindings(),
            'rows' => $bookings->count(),
        ]);

        $counts = (clone $query)
            ->select('bookable_type')
            ->selectRaw('count(*) as total')
            ->groupBy('bookable_type')
            ->get();

        Log::debug('Booking counts:', $counts->toArray());

        $settings = Setting::pluck('value', 'setting_name')->toArray();

        return view('admin.report.tours', compact('bookings', 'settings', 'counts'));

    } catch (\Exception $e) {
        Log::error('Error generating bookings report', [
            'message' => $e->getMessage(),
            'trace' => $e->getTraceAsString(),
        ]);
        return back()->withErrors('Something went wrong. Please try again.');
    }
}


}
