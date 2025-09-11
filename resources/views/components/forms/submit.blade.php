<button type="submit" class="flex gap-3 items-center justify-center bg-{{$color}} p-3 rounded-xl {{$class}}">
    @if($label)<span class="text-white">{{$label}}</span>@endif
    @if($icon)
    <x-icons type="{{$icon}}" :strokeWidth="2" color="white" width="16" height="16" />
    @endif
</button>
