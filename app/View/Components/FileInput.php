<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FileInput extends Component
{
    public $id;
    public $name;
    public $accept;
    public $label;
    public $helperText;

    /**
     * Create the component instance.
     *
     * @param  string  $id
     * @param  string  $name
     * @param  string|null  $accept
     * @param  string|null  $label
     * @param  string|null  $helperText
     * @return void
     */
    public function __construct(string $id, string $name, ?string $accept = null, ?string $label = null, ?string $helperText = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->accept = $accept;
        $this->label = $label;
        $this->helperText = $helperText;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.file-input');
    }
}