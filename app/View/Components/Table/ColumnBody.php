<?php

namespace App\View\Components\Table;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ColumnBody extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $class = '',
        public bool $resize = false,
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table.column-body');
    }
}
