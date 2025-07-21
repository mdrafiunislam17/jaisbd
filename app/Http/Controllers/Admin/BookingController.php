<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Models\Booking;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Repositories\BookingRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class BookingController extends Controller
{


      public function __construct()
        {
            $this->middleware('permission:bookings-list|bookings-edit')->only('index');
            // $this->middleware('permission:bookings-create')->only(['create', 'store']);
            $this->middleware('permission:bookings-edit')->only(['edit', 'update']);
            // $this->middleware('permission:bookings-delete')->only('destroy');
        }

    public function index()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $booking = Booking::all();
        return view('admin.bookings.index', compact('booking','settings'));


    }

   public function store(Request $request): RedirectResponse
{
    try {
        Log::info('Booking store request', $request->all());

        $booking = new Booking();
        $booking->fill([
            'user_id' => $request->input('user_id'),
            'bookable_id' => $request->input('bookable_id'),
            'bookable_type' => $request->input('bookable_type'),
            'booking_date' => $request->input('booking_date'),
            'booking_amount' => $request->input('booking_amount'),
            'notes' => $request->input('notes'),
            'status' => $request->input('status'),
        ]);
        $booking->save();

        return redirect()->back()->with('success', 'Booking created successfully.');
    } catch (\Exception $e) {
        Log::error('Booking store failed', [
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString(),
        ]);
        return redirect()->back()->with('error', 'Error creating booking.');
    }
}

public function edit(Booking $booking)
{
    $settings = Setting::query()->pluck("value", "setting_name")->toArray();
    $users = User::all();
    return view('admin.bookings.edit', compact('booking','settings','users'));
}


 public function update(Request $request, Booking $booking): RedirectResponse
{
    try {
        Log::info('Booking update request', $request->all());

        $booking->fill([
            'user_id' => $request->input('user_id'),
            'bookable_id' => $request->input('bookable_id'),
            'bookable_type' => $request->input('bookable_type'),
            'booking_date' => $request->input('booking_date'),
            'booking_amount' => $request->input('booking_amount'),
            'notes' => $request->input('notes'),
            'status' => $request->input('status'),
        ]);

        $booking->save();

        return redirect()->route('bookings.index')->with('success', 'Booking updated successfully.');
    } catch (\Exception $e) {
        Log::error('Booking update failed', [
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString(),
        ]);
        return redirect()->back()->with('error', 'Error updating booking.');
    }
}




}
