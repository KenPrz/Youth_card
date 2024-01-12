<?php

namespace App\Http\Controllers;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MembersController extends Controller
{
    public function index(Request $request): View
    {
        $query = Member::query();
        if ($request->has('search')) {
            $searchTerm = $request->search;
    
            $query->where('name', 'like', '%' . $searchTerm . '%')
                ->orWhere('gender', 'like', '%' . $searchTerm . '%')
                ->orWhere('age', 'like', '%' . $searchTerm . '%')
                ->orWhere('birthday', 'like', '%' . $searchTerm . '%')
                ->orWhere('email', 'like', '%' . $searchTerm . '%')
                ->orWhere('contact_number', 'like', '%' . $searchTerm . '%')
                ->orWhere('purok', 'like', '%' . $searchTerm . '%')
                ->orWhere('youth_classification', 'like', '%' . $searchTerm . '%');
        }
        $members = $query->paginate(6);
    
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
