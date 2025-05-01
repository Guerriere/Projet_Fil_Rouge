<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Select extends Component
{
    public $id;
    public $name;
    public $label;
    public $options;
    public $value;

    /**
     * Create the component instance.
     *
     * @param  string  $id
     * @param  string  $name
     * @param  string|null  $label
     * @param  array  $options
     * @param  mixed  $value
     * @return void
     */
    public function __construct(string $id, string $name, ?string $label = null, array $options = [], $value = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->label = $label;
        $this->options = $options;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.select');
    }
}