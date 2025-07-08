<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "short_detail",
        "detail",
        "image",
        "posted_by",
        "posted_on",
        "status",
    ];


    // app/Models/Blog.php

public function getReadTimeAttribute()
{
    // Estimate: average person reads 200 words per minute
    $words = str_word_count(strip_tags($this->detail));
    $minutes = ceil($words / 200);
    return $minutes;
}

}
