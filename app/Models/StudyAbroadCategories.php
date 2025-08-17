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


    public function getCategoryNameAttribute()
{
    if ($this->category) {
        return $this->category->name;
    }

    // fallback to last inserted category
    $lastCategory = StudyAbroadCategories::latest('id')->first();

    return $lastCategory
        ? $lastCategory->name
        : (new StudyAbroadCategories())->getTable(); // will return "study_abroad_categories"
}

}
