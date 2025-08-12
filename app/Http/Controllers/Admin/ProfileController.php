<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    /**
     * Show profile page.
     */
    public function index()
    {
        $user = Auth::user();
        $settings = Setting::pluck('value', 'setting_name')->toArray();
        return view('admin.profile.index', compact('user', 'settings'));
    }

    /**
     * Handle profile or password update.
     */
    public function profileUpdate(Request $request): RedirectResponse
    {
        /** @var User $user */
        $user = Auth::user();

        if ($request->input('form') === 'profile') {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'phone_number' => 'nullable|string|max:20',
                'address' => 'nullable|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            try {
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                $user->phone_number = $request->input('phone_number');
                $user->address = $request->input('address');

                if ($request->hasFile('image')) {
                    // Delete old image if it exists
                    if ($user->image && Storage::disk('public')->exists('uploads/user/' . $user->image)) {
                        Storage::disk('public')->delete('uploads/user/' . $user->image);
                    }

                    // Store new image
                    $user->image = $this->uploadImage($request->file('image'));
                }

                $user->save();

                return back()->with('success', 'Profile has been updated successfully.');

            } catch (QueryException $exception) {
                Log::error('Profile update failed', [
                    'error' => $exception->getMessage(),
                    'trace' => $exception->getTraceAsString(),
                ]);
                return back()->with('error', 'Database error: ' . $exception->getCode());
            }
        }

        if ($request->input('form') === 'password') {
            $request->validate([
                'password' => [
                    'required',
                    'confirmed',
                    Password::min(6)->mixedCase()->numbers(),
                ],
            ]);

            try {
                $user->password = Hash::make($request->input('password'));
                $user->save();

                return back()->with('success', 'Password has been updated successfully.');

            } catch (QueryException $exception) {
                Log::error('Password update failed', [
                    'error' => $exception->getMessage(),
                    'trace' => $exception->getTraceAsString(),
                ]);
                return back()->with('error', 'Database error: ' . $exception->getCode());
            }
        }

        return back();
    }

    /**
     * Store image in public disk under uploads/user.
     */
    private function uploadImage($image): string
    {
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/user'), $imageName);
        return $imageName;
    }

}
