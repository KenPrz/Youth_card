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
    
        // Assuming you want to send some data to the front end
        $responseData = [
            'member' => $member,
            'message' => 'Redemption successful',
        ];
    
        return response()->json($responseData);
    }

    public function checkRFID(Request $request)
    {

        $request->validate([
            'card_number' => 'required|numeric',
        ]);
        $member = Member::where('card_id', $request->card_number)->first();
        if ($member) {
            $responseData = [
                'member' => $member,
                'message' => 'success',
            ];
        } else {
            $responseData = [
                'message' => 'failed',
            ];
        }
        return response()->json($responseData);
    }
}    
