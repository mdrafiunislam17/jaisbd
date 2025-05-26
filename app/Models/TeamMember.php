<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $fillable = [
        'name',
        'management_id',
        'designation_id',
        'description',
        'image',
        'status'
    ];

    public function management()
    {
        return $this->belongsTo(Management::class);
    }

    public function designation()
    {
        return $this->belongsTo(Designation::class);
    }
}
