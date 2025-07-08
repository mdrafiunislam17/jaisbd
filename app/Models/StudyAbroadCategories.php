<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyAbroadCategories extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    public function studyAbroads()
    {
        return $this->hasMany(StudyAbroad::class, 'category_id');
    }
}
