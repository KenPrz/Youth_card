<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
class RedeemController extends Controller
{
    public function index(): View
    {
        return view('redeem.index');
    }
}
