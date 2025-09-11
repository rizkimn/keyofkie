@if ($isCurrent)
<span class="bg-neutral-100 w-8 h-8 flex items-center justify-center rounded-lg overflow-hidden text-blue-500">
    {{$label}}
</span>
@else
<a href="{{ $href }}" class="bg-neutral-100 w-8 h-8 flex items-center justify-center rounded-lg overflow-hidden opacity-30 hover:opacity-100">
    {{$label}}
</a>
@endif
