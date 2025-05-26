<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        "event_name",
        "location",
        "event_date",
        "start_time",
        "end_time",
        "email",
        "phone",
        "location_map",
        "short_description",
        "description",
        "image",
        "gallery",
        "status",
    ];

    protected $casts = [
        'gallery' => 'array', // ✅ Add this line
    ];
}
