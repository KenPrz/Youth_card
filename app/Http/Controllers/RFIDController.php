<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
class RFIDController extends Controller
{
    public function redeem(Request $request)
    {
        $request->validate([
            'node_id' => 'required|numeric',
            'rfid' => 'required|numeric',
        ]);

        $member = Member::where('rfid', $request->rfid)->first();

    }
}
