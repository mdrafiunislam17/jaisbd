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
    // protected BookingRepository $bookingRepository;

    // public function __construct(BookingRepository $bookingRepository)
    // {
    //     $this->bookingRepository = $bookingRepository;
    // }

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

        return redirect()->back()->with('success', 'Booking updated successfully.');
    } catch (\Exception $e) {
        Log::error('Booking update failed', [
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString(),
        ]);
        return redirect()->back()->with('error', 'Error updating booking.');
    }
}




    // public function show(int $id): JsonResponse
    // {
    //     try {
    //         $booking = $this->bookingRepository->findById($id);

    //         if (!$booking) {
    //             return response()->json(['message' => 'Booking not found'], 404);
    //         }

    //         return response()->json(['data' => $booking]);
    //     } catch (\Exception $e) {
    //         Log::error('Failed to fetch booking', ['id' => $id, 'error' => $e->getMessage()]);
    //         return response()->json(['message' => 'Failed to fetch booking'], 500);
    //     }
    // }

    // public function store(StoreBookingRequest $request): JsonResponse
    // {
    //     try {
    //         $booking = $this->bookingRepository->create($request->validated());
    //         return response()->json(['message' => 'Booking created successfully', 'data' => $booking], 201);
    //     } catch (\Exception $e) {
    //         Log::error('Failed to create booking', ['error' => $e->getMessage()]);
    //         return response()->json(['message' => 'Failed to create booking'], 500);
    //     }
    // }

    // public function update(UpdateBookingRequest $request, int $id): JsonResponse
    // {
    //     try {
    //         $booking = $this->bookingRepository->findById($id);

    //         if (!$booking) {
    //             return response()->json(['message' => 'Booking not found'], 404);
    //         }

    //         $this->bookingRepository->update($booking, $request->validated());

    //         return response()->json(['message' => 'Booking updated successfully', 'data' => $booking]);
    //     } catch (\Exception $e) {
    //         Log::error('Failed to update booking', ['id' => $id, 'error' => $e->getMessage()]);
    //         return response()->json(['message' => 'Failed to update booking'], 500);
    //     }
    // }

    // public function destroy(int $id): JsonResponse
    // {
    //     try {
    //         $booking = $this->bookingRepository->findById($id);

    //         if (!$booking) {
    //             return response()->json(['message' => 'Booking not found'], 404);
    //         }

    //         $this->bookingRepository->delete($booking);

    //         return response()->json(['message' => 'Booking deleted successfully']);
    //     } catch (\Exception $e) {
    //         Log::error('Failed to delete booking', ['id' => $id, 'error' => $e->getMessage()]);
    //         return response()->json(['message' => 'Failed to delete booking'], 500);
    //     }
    // }
}
