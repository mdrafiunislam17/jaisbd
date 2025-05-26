<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_info_id',
        'title',
        'subtitle',
        'image',
        'description',
        'status',
    ];

    /**
     * Relationship: A project belongs to a project info
     */
    public function projectInfo()
    {
        return $this->belongsTo(ProjectInfo::class);
    }
}
