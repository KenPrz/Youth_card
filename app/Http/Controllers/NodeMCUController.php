<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\RFIDResult;

class NodeMCUController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            /// Retrieve the latest RFID result from the database
        $latestRFIDResult = RFIDResult::latest()->first();

        // Check if a result was found
        if ($latestRFIDResult) {
            $rfidData = $latestRFIDResult->rfid; // Assuming 'rfid' is the column name
        } else {
            $rfidData = null; // Set default value if no result is found
        }
        
        $csrfToken = csrf_token();
        //Return the RFID data as JSON response
        return response()->json([
            'RFID Result' => $rfidData,
            'message' => 'RFID Result Received',
            '_token' => $csrfToken 
        ], 200);
        
        
    }

    public function handleRFID(Request $request)
    {
        // listen form nodemcu trans data
        $rfidData = $request->input('rfid');

        // overwrte tayo sa db
        $existingResult = RFIDResult::latest()->first();
        if ($existingResult) {
            $existingResult->update(['rfid' => $rfidData]);
        } else {
            $result = RFIDResult::create(['rfid' => $rfidData]);
        }

        // for postman chcek if goods
        return response()->json([
            'RFID Result' => $rfidData,
            'message' => 'RFID Result Received'
        ], 200);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
