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
        $members = $query->paginate(8);
    
        return view('members.index', compact('members'));
    }
    
    
    // public function addMember(Request $request)
    // {
    //     //Lagay mo dito yung logic ng pag add ng member
    // }
    // store ng data sa db
    public function store(Request $request){
        Member::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'gender' => $request->input('gender'),
            'contact_number' => $request->input('contact_number'),
            'birthday' => $request->input('birthday'),
            'purok' => $request->input('purok'),
            'youth_classification' => $request->input('youth_classification'),
            'card_id' => $request->input('card_id'),
            'age' => $request->input('age')
        ]);
        return redirect('/members');
    }

    public function show($card_id){
        $member = Member::find($card_id);
    
        if (!$member) {
            // Handle the case where the member with the given $card_id is not found
            abort(404);
        }

        return view('members.show')->with('members', $member);
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
