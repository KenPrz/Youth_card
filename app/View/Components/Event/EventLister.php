<?php

namespace App\View\Components\Event;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EventLister extends Component
{
    /**
     * Create a new component instance.
     */
    public $nullTitle;
    public $title;
    public $events;
    public function __construct($events, $title, $nullTitle)
    {   
        $this->title = $title;
        $this->events = $events;
        $this->nullTitle = $nullTitle;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.event.event-lister');
    }
}
