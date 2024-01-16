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
            <span class="text-gray-700">Quantity: {{ $quantity }}</span>
        </div>
    </section>
    <section class="flex justify-around p-4">
        <button class="w-32 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300 ease-in-out">
            Redeem
        </button>
        <button class="w-32 bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 transition duration-300 ease-in-out">
            Edit
        </button>
    </section>
</div>