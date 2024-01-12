<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Members') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex w-full">
            <div class="flex-1 flex justify-start py-4 items-center">
                <button
                    class="bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600 transition-colors duration-200"
                    x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'edit-user')"
                    >Add
                </button>
            </div>
            <div class="flex-1">
                <form class="flex justify-end py-4 items-center" method="GET" action="{{ route('members.index') }}">
                    @csrf
                    <x-text-input id="search" name="search" placeholder="Search..."/>
                    <button class="bg-secondary text-white p-2 rounded-md ms-2 hover:bg-secondary_hover transition-colors duration-200" type="submit">Search</button>
                </form>
            </div>
        </div>
        <x-table.table :headers="['Member', 'Name', 'Email','Contact Number','Birthday','Purok','Classification','Action']">
            @if ($members->isEmpty())
                <tr class="border-b">
                    <x-table.td colspan="7">No members found.</x-table.td>
                </tr>
            @else
                @foreach ($members as $member)
                    <tr class="border-b text-center">
                        <x-table.td>{{$member->card_id}}</x-table.td>
                        <x-table.td>{{$member->name}}</x-table.td>
                        <x-table.td>{{$member->email}}</x-table.td>
                        <x-table.td>{{$member->contact_number}}</x-table.td>
                        <x-table.td>{{$member->birthday}}</x-table.td>
                        <x-table.td>{{$member->purok}}</x-table.td>
                        <x-table.td>{{$member->youth_classification}}</x-table.td>
                        <x-table.td>
                            <button
                                class="text-sm text-white bg-green-500 hover:bg-green-600 px-2 py-1 rounded"
                                x-data=""
                                x-on:click.prevent="$dispatch('open-modal', 'edit-user')"
                            >Edit</button>
                            <button
                                class="text-sm text-white bg-red-500 hover:bg-red-600 px-2 py-1 rounded"
                                x-data=""
                                x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
                                {{ __('Delete') }}
                            </button>
                        </x-table.td>
                    </tr>
                @endforeach
            @endif
            <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                Delete Account
            </x-modal>
            <x-modal name="edit-user" :show="$errors->userEdit->isNotEmpty()" focusable>
                <div class="m-8">
                    <div class="h4 mb-3 font-bold">Add Youth Member</div>
                    <form class="w-full max-w-lg" action="addmember" method="POST" >
                      @csrf
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                Youth RFID
                              </label>
                              <input name="card_id" class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="########" >
                            </div>
                          </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                      <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                          Name
                        </label>
                        <input required name="name" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="">
                        <p class="text-red-500 text-xs italic">Please fill out this field.</p>
                      </div>
                      <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                          Email Address
                        </label>
                        <input required name="email" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="email" placeholder="">
                      </div>
                    </div>
                    {{-- <div class="flex flex-wrap -mx-3 mb-6">
                      <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                          Password
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="password" placeholder="******************">
                        <p class="text-gray-600 text-xs italic">Make it as long and as crazy as you'd like</p>
                      </div>
                    </div> --}}
                    <div class="flex flex-wrap -mx-3 mb-2">
                      <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                          Contact Number
                        </label>
                        <input required name="contact_number" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-city" type="text" placeholder="+639********">
                      </div>
                      <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                          Age
                        </label>
                        <input name="age" required name="contact_number" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-city" type="text" placeholder="+639********">
                      </div>
                      <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-zip">
                          Birthday
                        </label>
                        <input required name="birthday" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-zip" type="date" placeholder="90210">
                      </div>
                      
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-2 p">
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                              Gender
                            </label>
                            <input required name="gender" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-city" type="text" placeholder="">
                          </div>
                          <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                              Purok
                            </label>
                            <div class="relative">
                              <select name="purok" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                              </select>
                              <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                              </div>
                            </div>
                          </div>
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                              Youth Classification
                            </label>
                            <div class="relative">
                              <select name="youth_classification" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                                <option>In-School Youth</option>
                                <option>Out-of-School</option>
                                <option>Working Youth</option>
                                <option>Youth With Special Needs</option>
                              </select>
                              <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                              </div>
                            </div>
                          </div>
                          
                      </div>
                      <div class="text-center px-4 py-2 mt-2">
                        <input type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                      </div>
                  </form>
                </div>
            </x-modal>
        </x-table.table>
        <div class="mt-2">
            {{ $members->appends(['search' => request('search')])->links() }}
        </div>
    </div>
</x-app-layout>
