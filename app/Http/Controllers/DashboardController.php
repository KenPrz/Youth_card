<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\MemberPoints;
use App\Models\Event;
class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     */
    public function index()
    {
        $members = Member::count();
        $eventsToday = Event::whereDate('event_date', today())->paginate(3);
        $upcomingEvents = Event::whereDate('event_date', '>', today())->paginate(3);
        $topMembers = MemberPoints::with('member')->orderBy('points', 'desc')->take(5)->get();
        return view('dashboard', compact('members', 'eventsToday','upcomingEvents', 'topMembers'));
    }
}
