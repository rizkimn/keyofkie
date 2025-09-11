@if ($isLastPage)
    <span class="bg-neutral-100 w-8 h-8 flex items-center justify-center rounded-lg overflow-hidden opacity-30">
        <x-icons type="right-arrow" width="14" height="14" color="slate-800" />
    </span>
@else
    <a href="{{ $href }}" class="bg-neutral-100 w-8 h-8 flex items-center justify-center rounded-lg overflow-hidden">
        <x-icons type="right-arrow" width="14" height="14" color="slate-800" />
    </a>
@endif
