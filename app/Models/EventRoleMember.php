<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventRoleMember extends Model
{
    use HasFactory;

    protected $fillable = ['member_id', 'event_role_id'];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function eventRole()
    {
        return $this->belongsTo(EventRole::class);
    }
}
