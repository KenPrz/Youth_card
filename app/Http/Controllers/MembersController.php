<?php

namespace App\Http\Controllers;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MembersController extends Controller
{
    public function index(): View
    {
        $members = Member::paginate(6);
        return view('members.index', compact('members'));
    }

    
    public function edit(Request $request): View
    {
        $member = Member::find($request->id);
        return view('members.edit', compact('member'));
    }

    public function destroy(Request $request): View
    {
        $member = Member::find($request->id);
        $member->delete();
        return view('members.index');
    }
    
}
