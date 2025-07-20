<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;

      protected $fillable = [
        'user_id',
        'bookable_id',
        'bookable_type',
        'booking_date',
        'booking_amount',
        'notes',
        'status',
    ];

    // protected $casts = [
    //     'booking_date' => 'date',
    //     'booking_amount' => 'decimal:2',
    // ];

    /**
     * The user who made the booking.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The polymorphic bookable model.
     */
    public function bookable(): MorphTo
    {
        return $this->morphTo();
    }
}
