<div class="p-5">
    <div class="w-full mb-6 flex items-center justify-between">
        <h1 class="font-semibold text-xl">List of Items</h1>
        <a href="{{ route('redeem.create') }}"
                class="flex justify-between bg-blue-500 text-sm px-3 text-white p-2 rounded-md hover:bg-blue-600 transition-colors duration-200"
                >
                <img class="h-5 w-5 me-1" src="{{asset('images/add-circle.svg')}}" alt="">
            <span>Add Item</span>
        </a>
    </div>
    <div class="container">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @if ($items->isEmpty())
                <div class="alert alert-danger" role="alert">
                    No items found!
                </div>
            @else
                @foreach($items as $item)
                    <x-misc.item-card
                        :itemID="$item->id"
                        :itemName="$item->item_name"
                        :itemDescription="$item->item_description"
                        :requiredPoints="$item->required_points"
                        :quantity="$item->quantity"
                        :image="$item->image"
                    />
                @endforeach
            @endif
        </div>
        <div class="mt-4">
            {{ $items->links() }}
        </div>
    </div>
</div>
