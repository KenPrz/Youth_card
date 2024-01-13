<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-misc.card-component>
                <div class="p-6 text-gray-900">
                    {{ __('Create an Event') }}
                </div>
            </x-misc.card-component>
            <form action="" method="POST">
                @csrf
                <x-misc.card-component class="mt-5">
                    @include('events.partials.primary-event-details-section')
                </x-misc.card-component>
                <x-misc.card-component class="mt-5">
                    @include('events.partials.event-organizers-details-section')
                </x-misc.card-component>
                <div class="flex item-center justify-end">
                    <button
                        type="submit"
                        class="mt-5 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"
                    >
                        Create Event
                    </button>
                </div>
            </form>
        </div>
</x-app-layout>
