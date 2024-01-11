<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-5">
    @if ($events->count()==0)
        <div class="p-4 text-xl font-bold text-gray-900 border-b">
            <h1>{{$nullTitle}}</h1>
        </div>
    @else
        <div class="p-4 text-xl font-semibold text-gray-900 border-b">
            <h1>{{$title}}</h1>
        </div>
        <div class="w-full">
            @foreach ($events as $event)
                <button x-data="{ eventId: {{$event->id}} }" 
                        x-on:click="$wire.getEvent(eventId)" 
                        class="w-full p-4 flex flex-col justify-start items-start text-start
                            bg-white border-b border-gray-200 hover:bg-slate-100 transition-colors duration-200">
                    <h1 class="text-lg font-semibold">{{$event->event_name}}</h1>
                    <p class="text-md text-gray-500">{{$event->event_date}}</p>
                    <p class="text-md text-gray-500">{{$event->event_level}}</p>
                </button>
            @endforeach
        </div>
        <div class="m-2">
            {{ $events->links() }}
        </div>
    @endif
</div>