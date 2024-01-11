<?php

namespace App\View\Components\Members;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MembersLister extends Component
{
    /**
     * Create a new component instance.
     */
    public $listTitle;
    public $membersList;
    public function __construct($membersList, $listTitle)
    {   
        $this->listTitle = $listTitle;
        $this->membersList = $membersList;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.members.members-lister');
    }
}
