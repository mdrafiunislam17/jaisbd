<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsultancyMedicine extends Model
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
     * Get the category that this consultancy medicine belongs to.
     */
    public function category()
    {
        return $this->belongsTo(ConsultancyMedicineCategories::class, 'category_id');
    }

    public function bookings()
{
    return $this->morphMany(Booking::class, 'bookable');
}
}
