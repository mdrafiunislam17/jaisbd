<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisaCategories extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function visas()
    {
        return $this->hasMany(Visa::class, 'category_id');
    }
}
