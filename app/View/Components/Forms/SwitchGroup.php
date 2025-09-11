<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SwitchGroup extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $label = '',
        public string $class = '',
        public string $direction = 'col',
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.switch-group');
    }
}
