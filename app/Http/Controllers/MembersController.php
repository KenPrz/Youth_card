<?php

namespace App\Http\Controllers;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class MembersController extends Controller
{
    public function index(Request $request): View
    {
        $query = Member::query();
        if ($request->has('search')) {
            $searchTerm = $request->search;
    
            $query->where('name', 'like', '%' . $searchTerm . '%')
                ->orWhere('card_id', 'like', '%' . $searchTerm. '%')
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
    
    public function store(Request $request)
    {
        // Validation rules
        $rules = [
            'card_id' => ['required', Rule::unique('members')],
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('members')],
        ];
        $messages = [
            'card_id.unique' => 'A member with the same card ID already exists.',
            'email.unique' => 'A member with the same email already exists.',
        ];

        // Validate the request data
        $validator = Validator::make($request->all(), $rules, $messages);

        // If validation fails, redirect back with error messages
        if ($validator->fails()) {
            return redirect('/members')
                ->with('error_mssg', 'Error! Youth Already Exists!');
        }

        // If validation passes, create the member
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

        return redirect('/members')->with('flash_message', 'Member created successfully!');
    }

    public function show($card_id){
        $member = Member::find($card_id);
    
        if (!$member) {
            abort(404);
        }
        return view('members.show')->with('members', $member);
    }

    public function edit($id)
    {
        $member = Member::find($id);
    
        if (!$member) {
            return redirect()->route('members.index')->with('flash_message', 'Member not found');
        }
    
        return view('members.edit', compact('member'));
    }
    
    public function update(Request $request, $id)
    {
        $member = Member::find($id);
        $input = $request->all();
        $member->update($input);
        return redirect('members')->with('success_edit', 'Youth Info Updated!');  

        // return 'hello';
    }

    public function destroy($id)
    {
        Member::destroy($id);
        return redirect('members')->with('flash_message', 'Youth Info Deleted!');  
    }
}
