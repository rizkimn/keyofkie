<div class="{{$direction == 'row' ? 'md:grid md:grid-cols-[1fr_2fr] md:gap-4 md:items-center flex flex-col gap-2' : 'flex flex-col gap-2'}}">
    <label for="{{$id}}">{{$label}}</label>
    <div class="flex gap-2 items-center bg-neutral-100 p-3 rounded-xl {{$class}}">
        @if($showIcon)<x-icons type="{{$icon}}" color="slate-800" width="16" height="16" />@endif
        <input name="{{$name}}" id="{{$id}}" class="w-full bg-transparent outline-none" type="number" placeholder="{{$placeholder}}" value="{{$value}}" min="{{$min}}" max="{{$max}}" />
    </div>
</div>
