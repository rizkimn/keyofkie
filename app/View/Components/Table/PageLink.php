<?php

namespace App\View\Components\Table;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PageLink extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public mixed $href,
        public string $label,
        public bool $isCurrent = false,
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table.page-link');
    }
}
