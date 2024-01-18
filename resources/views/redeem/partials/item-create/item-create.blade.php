<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Item') }}
        </h2>
    </x-slot>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-2">
                <form enctype="multipart/form-data" method="POST" action="{{ route('redeem.store') }}" class="max-w-md mx-auto bg-white p-8 border rounded-md shadow-md mt-4">
                    <h1 class="font-bold text-xl text-center mb-2">Add Item</h1>
                    @csrf
                    <div class="grid grid-cols-1 gap-6">
                        <!-- Item Name -->
                        <div>
                            <label for="item_name" class="block text-sm font-medium text-gray-600">Item Name</label>
                            <input
                                value="{{ old('item_name') }}"
                                type="text" name="item_name" id="item_name"
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
                                value="{{ old('item_description') }}"
                                name="item_description" id="item_description" rows="3"
                                class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500"></textarea>
                            @error('item_description')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Required Points -->
                        <div>
                            <label for="required_points" class="block text-sm font-medium text-gray-600">Required
                                Points</label>
                            <input 
                                value="{{ old('required_points') }}"
                                type="number" name="required_points" id="required_points"
                                class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500">
                            @error('required_points')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Quantity -->
                        <div>
                            <label for="quantity" class="block text-sm font-medium text-gray-600">Quantity</label>
                            <input 
                                value="{{ old('quantity') }}"
                                type="number" name="quantity" id="quantity"
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
                                Add Item
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
