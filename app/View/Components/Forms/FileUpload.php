<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FileUpload extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $id,
        public string $color,
        public string $name,
        public mixed $accepts = ".pdf,.doc,.docx",
        public? bool $multiple = false,
        public string $placeholder,
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.file-upload');
    }
}
