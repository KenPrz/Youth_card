<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            
        </h2>
    </x-slot>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-misc.card-component>
                <div class="p-6 text-xl font-bold text-gray-900">
                    {{ __("Redeem") }}
                </div>
                <form class="flex justify-start p-4 items-center" method="GET" action="{{ route('redeem.index') }}">
                    @csrf
                    <x-text-input id="search" name="search" placeholder="Search Items..."/>
                    <button class="bg-secondary text-white p-2 rounded-md ms-2 hover:bg-secondary_hover transition-colors duration-200" type="submit">Search</button>
                </form>
            </x-misc.card-component>
            <div class="py-6">
                <x-misc.card-component>
                        <div class="w-full p-6 text-gray-900">
                            @include('redeem.partials.item-list.item-lister')
                        </div>
                </x-misc.card-component>
            </div>
        </div>
    </div>
</x-app-layout>

