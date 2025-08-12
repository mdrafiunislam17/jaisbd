<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsultancyMedicineCategories extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function consultancyMedicines()
    {
        return $this->hasMany(ConsultancyMedicine::class, 'category_id');
    }
}
