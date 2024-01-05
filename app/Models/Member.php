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
    ];

    protected $casts = [
        'age' => 'integer',
    ];
}
