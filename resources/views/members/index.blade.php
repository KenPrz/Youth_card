<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Members') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex w-full bg-white overflow-hidden shadow-sm sm:rounded-lg my-5">
                <div class="flex-1">
                    <form class="flex justify-start p-4 items-center" method="GET" action="{{ route('members.index') }}">
                        <x-text-input id="search" name="search" placeholder="Search..."/>
                        <button class="bg-secondary text-white p-2 rounded-md ms-2 hover:bg-secondary_hover transition-colors duration-200" type="submit">Search</button>
                    </form>
                </div>
                <div class="flex-1 flex justify-end p-4 items-center">
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
