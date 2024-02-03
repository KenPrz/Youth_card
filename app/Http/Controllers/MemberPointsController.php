<?php

namespace App\Http\Controllers;

use App\Models\MemberPoints;
use Illuminate\Http\Request;

class MemberPointsController extends Controller
{
    public function index()
    {
        return 'hello';
    }

    public function edit($id)
    {
        $member = MemberPoints::find($id);

        if (!$member) {
            return redirect()->back()->with('flash_message', 'Member not found');
        }

        return view('members.partials.points-add-member', compact('member'));
    }

    public function update(Request $request, $id)
    {
        $member = MemberPoints::find($id);

        if (!$member) {
            return redirect()->back()->with('error_points', 'error adding points');
        }  
        $oldpoints = $member->points;
        $newPoints = $request->input('points');
        $member->points = $oldpoints + $newPoints;

        $member->save();

        return redirect('members/' . $member->id)->with('success_points', 'Points Updated Successfully!');
    }
}
