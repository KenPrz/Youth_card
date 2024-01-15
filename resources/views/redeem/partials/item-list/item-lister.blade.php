<div class="p-5">
    <div class="mb-6 flex items-center justify-between">
        <h1>List of Items</h1>
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
