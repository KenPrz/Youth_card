<x-app-layout>
    @if(session('success'))
        <div id="success-message" class="fixed top-0 right-0 m-4 bg-green-500 text-white p-2 rounded-md">
            {{ session('success') }}
        </div>
    @endif
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
<script type="module">
    $(document).ready(function() {
        // Check if the success message exists and show it using jQuery
        var successMessage = $('#success-message');
        if (successMessage.length) {
            successMessage.fadeIn('slow');

            // Optionally, you can add a timeout to automatically hide the message after a few seconds
            setTimeout(function() {
                successMessage.fadeOut('slow');
            }, 5000); // 5000 milliseconds (5 seconds)
        }
    });
</script>

