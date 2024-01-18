<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Commodity extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'item_name',
        'item_description',
        'required_points',
        'quantity',
        'image',
    ];

    protected $casts = [
        'is_deleted' => 'boolean',
    ];
}
