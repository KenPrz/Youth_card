<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberPoints extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'points',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}