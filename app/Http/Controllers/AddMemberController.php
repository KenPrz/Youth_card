<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class AddMemberController extends Controller
{
    public function index(){
        return 'helllo';
    }
   

    // public function store(Request $request){
    //     Member::create([
    //         'name' => $request->input('name'),
    //         'email' => $request->input('email'),
    //         'gender' => $request->input('gender'),
    //         'contact_number' => $request->input('contact_number'),
    //         'birthday' => $request->input('birthday'),
    //         'purok' => $request->input('purok'),
    //         'youth_classification' => $request->input('youth_classification'),
    //         'card_id' => $request->input('card_id'),
    //         'age' => $request->input('age')
    //     ]);
    //     return redirect('/members');
    // }
}
