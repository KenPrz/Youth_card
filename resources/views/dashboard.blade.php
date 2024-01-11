<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Welcome to Dashboard!") }}
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-5">
                @if ($eventsToday->count()==0)
                    <div class="p-4 text-xl font-bold text-gray-900 border-b">
                        <h1>No Events Today</h1>
                    </div>
                @else
                    <div class="p-4 text-xl font-bold text-gray-900 border-b">
                        <h1>Events Today</h1>
                    </div>
                    <div class="w-full">
                        @foreach ($eventsToday as $event)
                            <button class="w-full p-4 flex flex-col justify-start items-start text-start
                                bg-white border-b border-gray-200 hover:bg-slate-100 transition-colors duration-200">
                                <h1 class="text-lg font-semibold">{{$event->event_name}}</h1>
                                <p class="text-md text-gray-500">{{$event->event_date}}</p>
                                <p class="text-md text-gray-500">{{$event->event_level}}</p>
                            </button>
                        @endforeach
                    </div>
                    <div class="m-2">
                        {{ $eventsToday->links() }}
                    </div>
                @endif
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-5">
                @if ($upcomingEvents->count()==0)
                    <div class="p-4 text-xl font-bold text-gray-900 border-b">
                        <h1>No Upcoming Events</h1>
                    </div>
                @else
                    <div class="p-4 text-xl font-bold text-gray-900 border-b">
                        <h1>Upcoming Events</h1>
                    </div>
                    <div class="w-full">
                        @foreach ($upcomingEvents as $event)
                            <button class="w-full p-6 flex flex-col justify-start items-start text-start
                                bg-white border-b border-gray-200 hover:bg-slate-100 transition-colors duration-200">
                                <h1 class="text-xl font-semibold">{{$event->event_name}}</h1>
                                <p class="text-gray-500">{{$event->event_date}}</p>
                                <p class="text-gray-500">{{$event->event_level}}</p>
                            </button>
                        @endforeach
                    </div>
                    <div class="m-2">
                        {{ $upcomingEvents->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>