<?php

namespace App\Http\Controllers;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;
class EventsController extends Controller
{
    public function index(): View
    {
        $upcomingEvents = Event::where('event_date', '>=', Carbon::now())->paginate(3);
        $pastEvents = Event::where('event_date', '<', Carbon::now())->paginate(2);
        return view('events.index', compact('upcomingEvents', 'pastEvents'));
    }
}
