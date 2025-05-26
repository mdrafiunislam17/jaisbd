<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'email',
        'phone',
        'location',
        'status',
    ];

    /**
     * Relationship: ProjectInfo belongs to a Category
     */
    public function category()
    {
        return $this->belongsTo(ProjectCategory::class, 'category_id');
    }
}
