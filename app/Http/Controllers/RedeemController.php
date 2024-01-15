<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Commodity;
class RedeemController extends Controller
{
    public function index(): View
    {
        $items = Commodity::paginate(6);
        return view('redeem.index', compact('items'));
    }
}
