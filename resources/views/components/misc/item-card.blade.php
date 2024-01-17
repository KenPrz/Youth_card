<div class="border-2 flex flex-col bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition duration-300 ease-in-out h-full">
    <section>
        @if($image == null)
            <img src="{{ asset('images/no-img.png') }}" alt="{{ $itemName }}" class="w-full h-32 object-cover">
        @else
            <img src="{{ url('storage/'.$image) }}" alt="{{ $itemName }}" class="w-full h-32 object-cover">
        @endif
    </section>
    <section class="flex-grow p-4">
        <h2 class="text-xl font-semibold">{{ $itemName }}</h2>
        <p class="text-gray-600">{{ $itemDescription }}</p>
        <div class="flex justify-between items-center mt-4">
            <span class="text-gray-700">Required Points: {{ $requiredPoints }}</span>
            <span class="{{ $quantity == 0 ? 'text-red-500' : 'text-gray-700' }}">In-Stock: {{ $quantity }}</span>
        </div>
    </section>
    <section class="flex justify-around p-4">
        <button
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'redeem-item-{{ $itemID }}')"
            class="w-32 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300 ease-in-out
                {{ $quantity == 0 ? 'opacity-50 cursor-not-allowed' : '' }}"
            :disabled="{{ $quantity == 0 ? 'true' : 'false' }}">
            Redeem
        </button>
        <a href="{{ route('get.item.edit', ['item_id' => $itemID]) }}" class="w-32 flex items-center justify-center bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 transition duration-300 ease-in-out cursor-pointer">
            <span>Edit</span>
        </a>        
    </section>
    <x-modal
        :maxWidth="'md'"
        id="redeem-item" name="redeem-item-{{$itemID}}" :show="$errors->redeemItem->isNotEmpty()" focusable x-on:close-modal="closeModal">
        <x-r-f-i-d.redeem-form
            :itemID="$itemID"
            :itemName="$itemName"
            :itemDescription="$itemDescription"
            :requiredPoints="$requiredPoints"
            :quantity="$quantity"
            :image="$image"
        />
    </x-modal>
</div>