<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visa extends Model
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
    ];


    /**
     * Get the category that this visa belongs to.
     */
    public function category()
    {
        return $this->belongsTo(VisaCategories::class, 'category_id');
    }

}
