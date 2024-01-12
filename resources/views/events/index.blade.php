<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Events') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Welcome to Events!") }}
                </div>
            </div>
            <x-event.event-lister :events="$eventsToday" :title="'Events Today'" :nullTitle="'No Events Today'"/>
            <x-event.event-lister :events="$upcomingEvents" :title="'Upcoming Events'" :nullTitle="'No Upcoming Events'"/>
            <x-event.event-lister :events="$pastEvents" :title="'Past Events'" :nullTitle="'No Events Today'"/>
        </div>
    </div>
</x-app-layout>
