<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Event') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex item-center justify-between mb-5">
                <a href="{{ route('events.index') }}" class="flex justify-between bg-blue-500 text-sm px-3 text-white p-2 rounded-md hover:bg-blue-600 transition-colors duration-200">
                    <img class="h-5 w-5 me-1" src="{{ asset('images/back-white.svg') }}" alt="">
                    <span>Back</span>
                </a>
                <a href="{{ route('events.edit', ['event_id' => $event->id]) }}"
                    class="flex justify-between bg-blue-500 text-sm px-3 text-white p-2 rounded-md hover:bg-blue-600 transition-colors duration-200">
                    <img class="h-5 w-5 me-1" src="{{ asset('images/edit.svg') }}" alt="">
                    <span>Edit</span>
                </a>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" p-6 text-gray-900">
                    <h1 class="text-xl font-bold">{{ $event->event_name }}</h1>
                    <p class="text-md text-gray-500">{{ \Carbon\Carbon::parse($event->event_date)->format('F j, Y g:i A')}}</p>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-5">
                <div class="p-6 text-gray-900">
                    <h1 class="text-lg font-bold">Event Details</h1>
                    <p class="text-md text-gray-500">{{ $event->event_description }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>