<div class="{{$direction == 'row' ? 'md:grid md:grid-cols-[1fr_2fr] md:gap-4 md:items-center flex flex-col gap-2 w-full' : 'flex flex-col gap-2 w-full'}}">
    @if($label)<label>{{$label}}</label>@endif
    <ul class="w-full flex items-center bg-neutral-50 border border-neutral-300 rounded-lg {{$class}}">
        {{ $slot }}
    </ul>
</div>
