<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PrimaryButton extends Component
{
    public $type;

    /**
     * Create a new component instance.
     *
     * @param string $type
     */
    public function __construct(string $type = 'submit')
    {
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.primary-button');
    }
}
