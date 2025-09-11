<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RadioSelect extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $class = '',
        public string $label,
        public string $value,
        public string $name,
        public string $id,
        public bool $checked = false,
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.radio-select');
    }
}
