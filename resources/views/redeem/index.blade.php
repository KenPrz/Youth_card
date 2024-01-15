<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Redeem') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-misc.card-component>
                <div class="p-6 text-gray-900">
                    {{ __("Redeem") }}
                </div>
            </x-misc.card-component>
            <div class="py-6">
                <x-misc.card-component>
                    <div class="p-6 text-gray-900">
                        @include('redeem.partials.item-list.item-lister')
                    </div>
                </x-misc.card-component>
            </div>
        </div>
    </div>
</x-app-layout>

