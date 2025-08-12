<?php

namespace App\Http\Controllers;
use App\Models\Setting;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Carbon;

use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    //


     public function index ()
    {
        $settings = Setting::pluck("value", "setting_name")->toArray();
        return view('user.index',compact('settings'));
    }

    public function editUser(){
        $user = Auth::user();
        $settings = Setting::pluck('value', 'setting_name')->toArray();

        return view('user.profile',compact('settings','user'));
    }

     private function uploadImage($image): string
    {
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/user'), $imageName);
        return $imageName;
    }



     public function userProfileUpdate(Request $request): RedirectResponse
{
    $user = Auth::user();

    // Validate profile fields
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'phone_number' => 'nullable|string|max:20',
        'address' => 'nullable|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'password' => 'nullable|confirmed|min:6',
    ]);

    try {
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone_number = $request->input('phone_number');
        $user->address = $request->input('address');

        if ($request->hasFile('image')) {
            if ($user->image && Storage::disk('public')->exists('uploads/user/' . $user->image)) {
                Storage::disk('public')->delete('uploads/user/' . $user->image);
            }
            $user->image = $this->uploadImage($request->file('image'));
        }

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        return back()->with('success', 'Profile and password updated successfully.');

    } catch (QueryException $exception) {
        Log::error('Profile/password update failed', [
            'error' => $exception->getMessage(),
            'trace' => $exception->getTraceAsString(),
        ]);
        return back()->with('error', 'Database error: ' . $exception->getCode());
    }
}



// public function userBooking(){
//       $settings = Setting::pluck('value', 'setting_name')->toArray();
//       $booking = Booking::all();
//       return view('user.booking',compact('settings','booking'));
// }




public function userBooking(Request $request)
{
    try {
        Log::info('User booking report generation started', [
            'user_id' => Auth::id(),
            'filters' => $request->only(['start_date', 'end_date', 'report_type'])
        ]);

        $typeMap = [
            'tour' => \App\Models\Tours::class,
            'visa' => \App\Models\Visa::class,
            'medical' => \App\Models\ConsultancyMedicine::class,
            'study_abroad' => \App\Models\StudyAbroad::class,
        ];

        $query = Booking::query()
            ->where('user_id', Auth::id());

        if ($request->filled('report_type') && $request->report_type !== 'all') {
            if (isset($typeMap[$request->report_type])) {
                $query->where('bookable_type', $typeMap[$request->report_type]);
            }
        }

        if ($request->filled('start_date')) {
            $start = Carbon::createFromFormat('Y-m-d', $request->start_date)
                ->startOfDay()
                ->timezone('UTC');
            $query->where('booking_date', '>=', $start);
            Log::debug('Applied start date filter', ['start' => $start->toDateTimeString()]);
        }

        if ($request->filled('end_date')) {
            $end = Carbon::createFromFormat('Y-m-d', $request->end_date)
                ->endOfDay()
                ->timezone('UTC');
            $query->where('booking_date', '<=', $end);
            Log::debug('Applied end date filter', ['end' => $end->toDateTimeString()]);
        }

        // ✅ Fix: Use paginate instead of get()
        $perPage = 10; // you can make this configurable
        $bookings = $query->latest()->paginate($perPage);

        Log::info('Booking query executed', [
            'sql' => $query->toSql(),
            'bindings' => $query->getBindings(),
            'current_page' => $bookings->currentPage(),
            'total_rows' => $bookings->total(),
        ]);

        // ✅ The counts logic still needs raw counts, so clone BEFORE paginate
        $counts = (clone $query)
            ->select('bookable_type')
            ->selectRaw('count(*) as total')
            ->groupBy('bookable_type')
            ->get();

        $settings = Setting::pluck('value', 'setting_name')->toArray();

        return view('user.booking', compact('bookings', 'settings', 'counts'));

    } catch (\Throwable $e) {
        Log::error('Failed to generate user bookings report', [
            'user_id' => Auth::id(),
            'message' => $e->getMessage(),
            'trace' => $e->getTraceAsString(),
        ]);
        return back()->withErrors('Something went wrong. Please try again.');
    }
}



public function userDestroy(Booking $booking)
{
    if ($booking->user_id !== Auth::id()) {
        abort(403, 'Unauthorized action.');
    }

    if ($booking->status === 'successful') {
        // Log attempted unauthorized deletion of successful booking
        Log::warning('Attempt to delete successful booking blocked', [
            'user_id' => Auth::id(),
            'booking_id' => $booking->id,
        ]);
        return back()->withErrors('You cannot delete a booking that is marked as successful.');
    }

    try {
        $booking->delete();
        Log::info('Booking deleted', [
            'user_id' => Auth::id(),
            'booking_id' => $booking->id,
        ]);
        return redirect()->route('user.booking')->with('success', 'Booking deleted successfully.');
    } catch (\Throwable $e) {
        Log::error('Booking deletion failed', [
            'user_id' => Auth::id(),
            'booking_id' => $booking->id,
            'message' => $e->getMessage(),
        ]);
        return back()->withErrors('Failed to delete booking.');
    }
}



    /**
     * Store image in public disk under uploads/user.
     */



}
