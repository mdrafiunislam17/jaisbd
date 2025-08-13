<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyAbroad extends Model
{
    use HasFactory;


        protected $fillable = [
        'title',
        'slug',
        'description',
        'category_id',
        'location',
        'duration',
        'start_date',
        'end_date',
        'price',
        'discount',
        'image',
        'guests',
        'status',
        'sort',
    ];

    /**
     * Get the category that this study abroad belongs to.
     */
    public function category()
    {
        return $this->belongsTo(StudyAbroadCategories::class, 'category_id');
    }

    public function bookings()
{
    return $this->morphMany(Booking::class, 'bookable');
}
}
