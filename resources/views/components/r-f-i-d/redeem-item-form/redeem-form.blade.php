<div class="max-w-md mx-auto p-8 rounded-md shadow-md">
    <h1 class="text-xl font-semibold text-gray-800 mb-4">Redeem: {{ __($itemName) }}</h1>
    <div x-data="{ formData: { item_id: '{{ $itemID }}' }, amount: amount }">
        <form x-on:submit.prevent="submitForm" method="POST" action="{{route('redeem.item')}}">
            @csrf
            @method('POST')
            <div class="flex flex-col mb-4">
                <div class="flex item-center justify-between">
                    <h1>Required Points: {{ $requiredPoints }}</h1>
                    <h1 class="pe-2">In-Stock: {{ $quantity }}</h1>
                </div>
                <input x-model="formData.item_id" type="number" name="item_id" id="item_id" class="hidden">
                <label for="item_id" class="block text-sm font-medium text-gray-600">Amount</label>
                <input x-model="formData.amount" type="number" name="amount" id="amount"
                    class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500">

                </p>
                @error('amount')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <div class="flex-1 px-2">
                    <button type="submit"
                        class="w-full px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-800 focus:outline-none focus:border-green-800 focus:ring focus:ring-green-300 disabled:opacity-25 transition">
                        {{ __('Redeem') }}
                    </button>
                </div>
                <div class="flex-1 px-2">
                    <button x-on:click.prevent="$dispatch('close-modal', 'redeem-item-{{ $itemID }}')"
                        class="w-full px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                        Cancel
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>