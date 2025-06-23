<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
    //

    public function subscribe(Request $request)
{
    $request->validate([
        'email' => 'required|email'
    ]);

    $email = $request->email;

    // উদাহরণ: Admin কে ইমেইল পাঠানো
    Mail::raw("New newsletter subscriber: $email", function ($message) use ($email) {
        $message->to('admin@example.com') // আপনার ইমেইল দিন
                ->subject('New Newsletter Subscription');
    });

    return back()->with('success', 'Thanks for subscribing!');
}
}
