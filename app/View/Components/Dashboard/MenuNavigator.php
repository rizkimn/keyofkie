<?php

namespace App\View\Components\Dashboard;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MenuNavigator extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $icon,
        public string $label,
        public string $href = "#",
        public bool $isActive = false,
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.menu-navigator');
    }
}
