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
            <div class="container flex">
                <div class="flex flex-col w-3/4">
                    @if ($eventsToday->count()!=0)
                        <x-event.event-lister 
                            :events="$eventsToday" 
                            :title="'Events Today'" 
                            :nullTitle="'No Events Today'"/>
                    @else
                        <x-event.event-lister :events="$upcomingEvents" :title="'Upcoming Events'" :nullTitle="'No Upcoming Events'"/>
                    @endif
                </div>
                <div class="flex flex-col ps-4 md:w-1/4">
                    <x-members.members-lister :membersList="$topMembers" :listTitle="'Top Members'"/>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>