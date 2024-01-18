<?php

namespace App\View\Components\Misc;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ItemCard extends Component
{
    /**
     * Create a new component instance.
     */
    public int $itemID;
    public string $itemName;
    public $itemDescription;
    public int $requiredPoints;
    public int $quantity;
    public $image;

    public function __construct(int $itemID, string $itemName, $itemDescription, int $requiredPoints, int $quantity, $image)
    {
        $this->itemID = $itemID;
        $this->itemName = $itemName;
        $this->itemDescription = $itemDescription;
        $this->requiredPoints = $requiredPoints;
        $this->quantity = $quantity;
        $this->image = $image;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.misc.item-card');
    }
}
