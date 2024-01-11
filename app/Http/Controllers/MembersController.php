<?php

namespace App\Http\Controllers;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MembersController extends Controller
{
    public function index(Request $request): View
    {
        if($request->has('search')) {
            $members = Member::where('name', 'like', '%' . $request->search . '%')->paginate(6);
        } else {
            $members = Member::paginate(6);
        }
        return view('members.index', compact('members'));
    }
    
    public function addMember(Request $request)
    {
        //Lagay mo dito yung logic ng pag add ng member
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
