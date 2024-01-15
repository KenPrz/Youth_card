<x-app-layout>
    <div class="container mt-5">
        <div class=" mt-5 h-56 grid grid-cols-3 gap-4 content-start">
            <div class="card bg-white drop-shadow-2xl rounded-md p-2 content-center" style="margin:20px;">
                <div class="card-header text-center font-semibold">Youth Information</div>
                <div class="card-body m-3">
                    <p class="card-text">Card ID : {{ $members->card_id }}</p>
                    <h5 class="card-title">Name : {{ $members->name }}</h5>
                    <p class="card-text">Email : {{ $members->email }}</p>
                    <p class="card-text">Mobile : {{ $members->contact_number }}</p>
                    <p class="card-text">Purok : {{ $members->purok }}</p>
                    <p class="card-text">Youth Classification : {{ $members->youth_classification }}</p>
                    <p class="card-text">Events Joined : 4 Events</p>
                    <p class="card-text">Points Earned : 1000 Points</p>
                    <p class="card-text">Date Added : {{ $members->created_at }}</p>
                </div>
                <div class="flex">
                    <div class="points text-start px-10">
                        <button
                        class="text-sm text-white bg-red-500 hover:bg-red-600 px-2 py-1 rounded" 
                        ><a href="/members" class="">
                            Go back
                        </a>
                        </button>
                    </div>
                    <div class="points text-end px-10">
                        <button
                        class="text-sm text-white bg-green-500 hover:bg-green-600 px-2 py-1 rounded" 
                        x-data=""
                        x-on:click.prevent="$dispatch('open-modal', 'add-manual-points')">
                            Add Points
                        </button>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <x-modal name="add-manual-points" :show="$errors->userDeletion->isNotEmpty()" focusable>
        Add Manual Points
    </x-modal>
</x-app-layout>