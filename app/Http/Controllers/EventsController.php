<?php

namespace App\Http\Controllers;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Member;
use App\Http\Controllers\MiscController;
use GuzzleHttp\Psr7\Response;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Redirect;

class EventsController extends Controller
{
    private $misc;
    public function __construct(MiscController $misc)
    {
        $this->misc = New MiscController;
    }
    public function index(): View
    {
        $eventsToday = Event::whereDate('event_start', Carbon::today())->paginate(3);   
        $upcomingEvents = Event::whereDate('event_start', '>', Carbon::today())->paginate(3);
        $pastEvents = Event::whereDate('event_end', '<', Carbon::today())->paginate(2);
        return view('events.index', compact('eventsToday','upcomingEvents', 'pastEvents'));
    }

    public function getEvent(Request $request): View
    {
        $event = Event::where('id', $request->event_id)->first();
        // return view('events.event', compact('event'));
        return view('events.partials.event', compact('event'));
    }

    public function create(): View
    {
        return view('events.partials.create-event');
    }

    public function store(Request $request)
    {
        $event = new Event;
        $event->event_name = $request->event_name;
        $event->event_description = $request->event_description;
        $event->event_date = $request->event_date;
        $event->start_time = $request->start_time;
        $event->end_time = $request->end_time;
        $event->save();
        return redirect()->route('events.index');
    }

    public function edit(Request $request): View
    {
        $event = Event::where('id', $request->event_id)->first();
        return view('events.partials.edit-event', compact('event'));
    }

    public function searchName(Request $request): JsonResponse
    {
        $members = Member::where('name', 'LIKE', '%' . $request->search . '%')->get();
        return response()->json($members);
    }

    public function destroy(Request $request, $event_id)
        {
        // dd($request->all());
        $event = Event::where('id', $event_id)->first();
        $event->delete();
        return redirect()->route('events.index');
    }
}
