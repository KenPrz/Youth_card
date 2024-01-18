<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Members') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- prompt user for successful create -->
        @if(session('flash_message'))
        <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3 mt-3 rounded" role="alert">
            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
            <p>{{ session('flash_message') }}</p>
        </div>
        @endif

        <!-- prompt user for error create -->
        @if(session('error_mssg'))
        <div class="flex items-center bg-red-500 text-white text-sm font-bold px-4 py-3 mt-3 rounded" role="alert">
            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
            <p>{{ session('error_mssg') }}</p>
        </div>
        @endif

        <!-- prompt user for success edit -->
        @if(session('success_edit'))
        <div class="flex items-center bg-green-500 text-white text-sm font-bold px-4 py-3 mt-3 rounded" role="alert">
            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
            <p>{{ session('success_edit') }}</p>
        </div>
        @endif


        <div class="flex w-full bg-white overflow-hidden shadow-sm sm:rounded-lg my-5">
            
            <div class="flex-1">
                <form class="flex justify-start p-4 items-center" method="GET" action="{{ route('members.index') }}">
                    @csrf
                    <x-text-input id="search" name="search" placeholder="Search..." />
                    <button
                        class="bg-secondary text-white p-2 rounded-md ms-2 hover:bg-secondary_hover transition-colors duration-200"
                        type="submit">Search</button>
                </form>
            </div>
            <div class="flex-1 flex justify-end p-4 items-center">
                <button
                    class="flex justify-between bg-blue-500 text-sm px-3 text-white p-2 rounded-md hover:bg-blue-600 transition-colors duration-200"
                    x-data="" x-on:click.prevent="$dispatch('open-modal', 'add-user')">
                    <img class="h-5 w-5 me-1" src="{{ asset('images/add-circle.svg') }}" alt="">
                    <span>Add</span>
                </button>
            </div>
        </div>
        <x-table.table :headers="['RFID', 'Member', 'Email', 'Contact Number', 'Birthday', 'Purok', 'Classification', 'Action']">
            @if ($members->isEmpty())
                <tr class="border-b">
                    <x-table.td colspan="7">No members found.</x-table.td>
                </tr>
            @else
                @foreach ($members as $member)
                    <tr class="border-b text-center">
                        <x-table.td id="card_id">{{ $member->card_id }}</x-table.td>
                        <x-table.td id="name">{{ $member->name }}</x-table.td>
                        <x-table.td id="email">{{ $member->email }}</x-table.td>
                        <x-table.td>{{ $member->contact_number }}</x-table.td>
                        <x-table.td>{{ $member->birthday }}</x-table.td>
                        <x-table.td>{{ $member->purok }}</x-table.td>
                        <x-table.td>{{ $member->youth_classification }}</x-table.td>
                        <x-table.td>
                          <button
                                class="text-sm text-white bg-blue-500 hover:bg-blue-600 px-2 py-1 rounded"
                                
                            > <a href="{{ url('/members/' . $member->id) }}">View</a></button>  
                            <button
                                class="text-sm text-white bg-green-500 hover:bg-green-600 px-2 py-1 rounded"
                                 {{-- x-data=""
                                x-on:click.prevent="$dispatch('open-modal', 'edit-user')" id="{{ $member->id }}"> --}}
                                > <a href="{{ url('/members/' . $member->id . '/edit') }}">Edit</a>
                            </button>
                            <form method="POST" action="{{ url('/members' . '/' . $member->id) }}" accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="text-sm text-white bg-red-500 hover:bg-red-600 px-2 py-1 rounded" title="Delete Student" onclick="return confirm('Confirm delete? {{ $member->name }}')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                            </form>
                        </x-table.td>
                    </tr>
                @endforeach
            @endif
            <x-modal name="add-user" :show="$errors->userDeletion->isNotEmpty()" focusable>
                <div class="m-8">
                    <div class="h4 mb-3 font-bold">Add Youth Member</div>
                    <x-members.add-member-form />
                </div>
            </x-modal>
            {{-- <x-modal name="view-user" :show="$errors->userDeletion->isNotEmpty()" focusable>
              Show Profile
            </x-modal> --}}
            {{-- <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                @include('members.partials.delete-member-form')
            </x-modal> --}}
            {{-- <x-modal name="edit-user" :show="$errors->userEdit->isNotEmpty()" focusable id="{{$member->id}}">
                <div class="m-8">
                    <div class="h4 mb-3 font-bold text-center">Edit Youth Information</div>
                    @include('members.partials.edit-member-form')
                </div>
            </x-modal> --}}
        </x-table.table>
        <div class="mt-2">
            {{ $members->appends(['search' => request('search')])->links() }}
        </div>
    </div>
</x-app-layout>
