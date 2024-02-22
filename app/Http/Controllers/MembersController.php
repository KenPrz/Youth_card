<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Models\MemberPoints;
use App\Models\RFIDResult;
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
                ->orWhere('card_id', 'like', '%' . $searchTerm . '%')
                ->orWhere('gender', 'like', '%' . $searchTerm . '%')
                ->orWhere('age', 'like', '%' . $searchTerm . '%')
                ->orWhere('birthday', 'like', '%' . $searchTerm . '%')
                ->orWhere('email', 'like', '%' . $searchTerm . '%')
                ->orWhere('contact_number', 'like', '%' . $searchTerm . '%')
                ->orWhere('purok', 'like', '%' . $searchTerm . '%')
                ->orWhere('youth_classification', 'like', '%' . $searchTerm . '%');
        }
        $members = $query->orderBy('created_at', 'desc')->paginate(8);
        return view('members.index', compact('members'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'card_id' => 'required|numeric',
            'name' => 'required',
            'email' => 'required|email|unique:members',
            'contact_number' => 'required',
            'birthday' => 'required|date',
            'gender' => 'required',
            'purok' => 'required|numeric',
            'youth_classification' => 'required',
        ]);
        RFIDResult::truncate();

        $member = Member::create($request->all());

        MemberPoints::create([
            'member_id' => $member->id,
            'points' => 0,
        ]);

        return redirect('/members')->with('flash_message', 'Member created successfully!');
    }


    public function show($card_id)
    {
        $member = Member::find($card_id);

        if (!$member) {
            abort(404);
        }
        $points = MemberPoints::where('member_id', $member->id)->first();

        return view('members.show', compact('card_id'))->with(['members' => $member, 'points' => $points]);
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
