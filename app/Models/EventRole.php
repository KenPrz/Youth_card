<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventRole extends Model
{
    use HasFactory;

    protected $fillable = ['event_id', 'role_name', 'points'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
