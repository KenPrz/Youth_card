<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'gender',
        'birthday',
        'email',
        'contact_number',
        'purok',
        'youth_classification',
        'card_id',
        'age'
    ];

    protected $casts = [
        'age' => 'integer',
    ];

    public function points()
    {
        return $this->hasOne(MemberPoints::class);
    }
}
