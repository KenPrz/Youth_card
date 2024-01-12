<?php

namespace App\Http\Controllers;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\MiscController;
class EventsController extends Controller
{
    private $misc;
    public function __construct(MiscController $misc)
    {
        $this->misc = New MiscController;
    }
    public function index(): View
    {
        $eventsToday = Event::whereDate('event_date', Carbon::today())->paginate(3);
        $upcomingEvents = Event::where('event_date', '>', Carbon::today())->paginate(3);
        $pastEvents = Event::where('event_date', '<', Carbon::today())->paginate(2);
        return view('events.index', compact('eventsToday','upcomingEvents', 'pastEvents'));
    }

    public function getEvent(Request $request): View
    {
        $event = Event::where('id', $request->event_id)->first();
        // return view('events.event', compact('event'));
        return view('events.partials.event', ['event_title' => $event->event_name,
            'event_description' => $event->event_description,
            'event_date' => $this->misc->dateFormatter($event->event_date),
        ]);
    }

    public function create(): View
    {
        return view('events.partials.create-event');
    }
}
