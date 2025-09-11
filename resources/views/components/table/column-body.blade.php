<td class="px-2 py-3 border-y border-neutral-200 bg-white relative {{$class}}">
    <div class="flex items-center gap-2 text-xs">
        {{$slot}}
    </div>
    @if($resize)
    <div class="resize-handle absolute top-0 right-[-3px] h-full w-[5px] cursor-col-resize"></div>
    @endif
</td>
