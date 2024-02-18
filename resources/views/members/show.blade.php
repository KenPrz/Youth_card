<x-app-layout>
    
    <div class="flex justify-center items-center h-screen">
        
        <div class="bg-white drop-shadow-2xl rounded-md p-4">
            <div>
                @if(session('success_points'))
                <div class="flex items-center bg-green-500 text-white text-sm font-bold px-4 py-2 mt-2 mb-0 rounded" role="alert">
                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                    <p>{{ session('success_points') }}</p>
                </div>
                @endif
                @if(session('error_points'))
                <div class="flex items-center bg-red-500 text-white text-sm font-bold px-4 py-2 mt-2 mb-0 rounded" role="alert">
                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                    <p>{{ session('error_points') }}</p>
                </div>
                @endif
            </div>
            <div class="row">
                <div class="col-1">
                    <div class="flex justify-start mt-5 ms-5 ease-in-out">
                        <a class="hover:-translate-x-1 transition-transform duration-500" href="{{ route('members.index') }}">
                            <span>
                                <img class="h-6 w-auto hover" src="{{asset('images/back.svg')}}" alt="back">
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="font-semibold text-center mb-4">Youth Information</div>
            
            <div class="m-3">
                <p class="mb-2">Card ID: {{ $members->card_id }}</p>
                <h5 class="mb-2">Name: {{ $members->name }}</h5>
                <p class="mb-2">Email: {{ $members->email }}</p>
                <p class="mb-2">Mobile: {{ $members->contact_number }}</p>
                <p class="mb-2">Purok: {{ $members->purok }}</p>
                <p class="mb-2">Youth Classification: {{ $members->youth_classification }}</p>
                <p class="mb-2">Events Joined: 4 Events</p>
                <p class="mb-2">Points Earned: {{ optional($points)->points }}</p>
                <p class="mb-2">Date Added: {{ $members->created_at }}</p>
            </div>
    
            <div class="flex justify-center">
                
                <div class="text-center">
                    <button class="text-sm text-white bg-green-500 hover:bg-green-600 px-2 py-1 rounded" x-data=""
                        x-on:click.prevent="$dispatch('open-modal', 'add-manual-points')">
                        Add Points
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <x-modal name="add-manual-points" :show="$errors->userDeletion->isNotEmpty()" focusable>
       @include('members.partials.points-add-member')
    </x-modal>

    {{-- <div class="container mt-4 m-5 border px-2 rounded">
        <div class="">
            <div class="h5 content-center fw-bold">Youth Information</div>
            <div class="youth_info">
                {{ $members->name }}
            </div>
        </div>
    </div> --}}


</x-app-layout>
