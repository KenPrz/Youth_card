<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
class MiscController extends Controller
{
    public function dateFormatter($date): string
    {
        return Carbon::parse($date)->format('F j, Y g:i A');
    }
}
