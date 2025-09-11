<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Icons extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $type,
        public string $color,
        public string $width,
        public string $height,
        public string $strokeWidth="1",
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.icons');
    }
}
