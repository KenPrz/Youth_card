<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Events') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-misc.card-component>
                <div class="p-6 text-gray-900">
                    {{ __("Welcome to Events!") }}
                </div>
                <div class="p-6 text-gray-900">
                    <a href="{{ route('events.create') }}" class="flex justify-between bg-blue-500 text-sm px-3 text-white p-2 rounded-md hover:bg-blue-600 transition-colors duration-200">
                        <img class="h-5 w-5 me-1" src="{{ asset('images/add-circle.svg') }}" alt="">
                        <span>Create Event</span>
                    </a>
                </div>
            </x-misc.card-component>
            <x-event.event-lister :events="$eventsToday" :title="'Events Today'" :nullTitle="'No Events Today'"/>
            <x-event.event-lister :events="$upcomingEvents" :title="'Upcoming Events'" :nullTitle="'No Upcoming Events'"/>
            <x-event.event-lister :events="$pastEvents" :title="'Past Events'" :nullTitle="'No Events Today'"/>
        </div>
    </div>
</x-app-layout>
