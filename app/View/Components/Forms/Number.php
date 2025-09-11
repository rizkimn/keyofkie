<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Number extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        public string $id,
        public string $label,
        public string $placeholder,
        public string $value = '',
        public string $direction = 'col',
        public string $icon = 'identity',
        public string $class = '',
        public string $min = '0',
        public string $max = '',
        public bool $showIcon = true,
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.number');
    }
}
