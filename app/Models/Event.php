<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Event extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'event_name',
        'event_description',
        'event_date',
        'start_time',
        'end_time',
        'event_level',
    ];
    
    public function eventRoles()
    {
        return $this->hasMany(EventRole::class);
    }
}
