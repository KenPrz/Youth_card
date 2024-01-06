<?php

namespace App\Http\Controllers;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MembersController extends Controller
{
    public function index(): View
    {
        return view('members.index',
            [
                'members' => Member::all()
            ]
        );
    }
}
