<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-5">
    @if ($events->count()==0)
        <div class="p-4 text-xl font-bold text-gray-900 border-b">
            <h1>{{$nullTitle}}</h1>
        </div>
    @else
        <div class="p-4 text-xl font-semibold text-gray-900 border-b flex items-center justify-between">
            <h1>{{$title}}</h1>
            @if (Route::currentRouteName()=='dashboard')
                <a href="{{route('events.index')}}" class="text-sm text-gray-500 hover:text-gray-700">View All</a>
            @endif
        </div>
        <div class="w-full">
            @foreach ($events as $event)
                <a href="{{ route('events.event', ['event_id' => $event->id]) }}"
                    class="w-full p-4 flex flex-col justify-start items-start text-start
                    bg-white border-b border-gray-200 hover:bg-slate-100 transition-colors duration-200">
                    <h1 class="text-lg font-semibold">{{$event->event_name}}</h1>
                    <p class="text-md text-gray-500">{{ \Carbon\Carbon::parse($event->event_start)->format('F j, Y g:i A')}}</p>
                    <p class="text-md text-gray-500">{{$event->event_level}}</p>
                </a>
            @endforeach        
        </div>
        <div class="m-2">
            {{ $events->links() }}
        </div>
    @endif
</div>