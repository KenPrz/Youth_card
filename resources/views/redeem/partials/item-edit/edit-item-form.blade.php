<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Item') }}
        </h2>
    </x-slot>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" max-w-md mx-auto bg-white border rounded-md shadow-md mt-4">
                <div class="flex items-center justify-start mt-5 ms-5 ease-in-out">
                    <a class="hover:-translate-x-1 transition-transform duration-500" href="{{ route('redeem.index') }}">
                        <span>
                            <img class="h-6 w-auto hover" src="{{asset('images/back.svg')}}" alt="back">
                        </span>
                    </a>
                </div>
                <div class="px-8 pb-8 pt-4">
                    <form enctype="multipart/form-data" action="{{ route('redeem.update', ['item_id' => $item->id]) }}" 
                        method="POST">
                        @method('PATCH') <!-- Add this line to set the form method to PATCH -->
                        @csrf <!-- Add this line to include the CSRF token -->
                        <h1 class="text-center text-2xl font-bold mb-3">Edit Item</h1>
                        <div class="grid grid-cols-1 gap-6">
                            <!-- Item Name -->
                            <div>
                                <label for="item_name" class="block text-sm font-medium text-gray-600">Item Name</label>
                                <input
                                    value="{{ old('item_name', $item->item_name) }}"
                                    type="text" 
                                    name="item_name" 
                                    id="item_name"
                                    class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500">
                                @error('item_name')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- Item Description -->
                            <div>
                                <label for="item_description" class="block text-sm font-medium text-gray-600">Item
                                    Description</label>
                                <textarea
                                    value="{{ old('item_description', $item->item_description) }}"
                                    name="item_description"
                                    id="item_description" 
                                    rows="3"
                                    class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500">
                                    {{ old('item_description', $item->item_description) }}
                                </textarea>
                                @error('item_description')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Required Points -->
                            <div>
                                <label for="required_points" class="block text-sm font-medium text-gray-600">
                                    Required Points
                                </label>
                                <input 
                                    value="{{ old('required_points', $item->required_points) }}"
                                    type="number" 
                                    name="required_points" 
                                    id="required_points"
                                    class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500">
                                @error('required_points')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Quantity -->
                            <div>
                                <label for="quantity" class="block text-sm font-medium text-gray-600">Quantity</label>
                                <input 
                                    value="{{ old('quantity', $item->quantity) }}"
                                    type="number" 
                                    name="quantity" 
                                    id="quantity"
                                    class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500">
                                @error('quantity')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- Image URL -->
                            <div>
                                <label for="image" class="block text-sm font-medium text-gray-600">Image URL</label>
                                <input
                                    value="{{ old('image') }}"
                                    type="file" name="image" id="image"
                                    class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500">
                                @error('image')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div>
                                <button type="submit"
                                    class="mt-5 w-full inline-flex items-center justify-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <button
                        x-data=""
                        x-on:click.prevent="$dispatch('open-modal', 'delete-modal')"
                        type="submit"
                        class="mt-2 w-full inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-800 focus:outline-none focus:border-red-800 focus:ring focus:ring-red-300 disabled:opacity-25 transition">
                        {{ __('Delete') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
    <x-modal :maxWidth="'md'" id="delete-modal" name="delete-modal" :show="$errors->deleteModal->isNotEmpty()" focusable x-on:close-modal="closeModal">
        <div class="max-w-md mx-auto p-8 rounded-md shadow-md mt-4">
            <h1 class="text-2xl font-semibold text-gray-800 mb-4">Delete Item</h1>
            
            <form action="{{ route('redeem.destroy', ['item_id' => $item->id]) }}" method="POST">
                @csrf
                @method('DELETE')
        
                <p class="text-gray-600 mb-4">Are you sure you want to delete this item?</p>
                <div class="flex items-center justify-between">
                    <div class="flex-1 px-2">
                        <button
                            x-on:click.prevent="$dispatch('close-modal', 'delete-modal')"
                            class="w-full px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"
                        >
                            Cancel
                        </button>
                    </div>
                    <div class="flex-1 px-2">
                        <button type="submit"
                            class="w-full px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-800 focus:outline-none focus:border-red-800 focus:ring focus:ring-red-300 disabled:opacity-25 transition">
                            {{ __('Delete') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>        
    </x-modal>
</x-app-layout>
