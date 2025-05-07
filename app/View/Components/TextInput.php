<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TextInput extends Component
{
    public $name;
    public $label;

    /**
     * Create a new component instance.
     *
     * @param string $name
     * @param string $label
     */
    public function __construct(string $name = '', string $label = '')
    {
        $this->name = $name;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.text-input');
    }
}
