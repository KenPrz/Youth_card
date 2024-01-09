<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Events') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="font-semibold text-xl">Welcome To Events</h1>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-5">
                <div class="p-6 font-bold text-gray-900">
                    <h1>Upcoming Events</h1>
                </div>
                <button >
                    @foreach ($upcomingEvents as $event)
                        <div class="p-6 flex flex-col justify-start items-start text-start
                            bg-white border-b border-gray-200 hover:bg-slate-100 transition-colors duration-200">
                            <h1 class="text-xl font-semibold">{{$event->event_name}}</h1>
                            <p class="text-gray-500">{{$event->event_description}}</p>
                            <p class="text-gray-500">{{$event->event_date}}</p>
                            <p class="text-gray-500">{{$event->event_level}}</p>
                        </div>
                    @endforeach
                </button>
                <div class="m-2">
                    {{ $upcomingEvents->links() }}
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-5">
                <div class="p-6 font-bold text-gray-900">
                    <h1>Past Events</h1>
                </div>
                <button>
                    @foreach ($pastEvents as $event)
                        <div class="p-6 flex flex-col justify-start items-start text-start
                            bg-white border-b border-gray-200 hover:bg-slate-100 transition-colors duration-200">
                            <h1 class="text-xl font-semibold">{{$event->event_name}}</h1>
                            <p class="text-gray-500">{{$event->event_description}}</p>
                            <p class="text-gray-500">{{$event->event_date}}</p>
                            <p class="text-gray-500">{{$event->event_level}}</p>
                        </div>
                    @endforeach
                </button>
                <div class="m-2">
                    {{ $pastEvents->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
