<th class="px-2 py-3 border-y border-neutral-200 bg-white relative {{$class}}" rowspan="{{$rowspan}}" colspan="{{$colspan}}">
    <div class="flex items-center gap-2 text-xs font-semibold">
        @if($sortName)
        <button type="submit" name="{{$sortName}}" value="{{request($sortName) == 'asc' ? 'desc' : 'asc'}}" class="opacity-30 hover:opacity-100">
            <x-icons type="sort" width="16" height="16" color="slate-800" />
        </button>
        @endif
        <span>{{$label}}</span>
    </div>
    @if($resize)
    <div class="resize-handle absolute top-0 right-[-3px] h-full w-[5px] cursor-col-resize"></div>
    @endif
</th>
