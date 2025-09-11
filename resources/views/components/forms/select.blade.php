<div class="{{$direction == 'row' ? 'md:grid md:grid-cols-[1fr_2fr] md:gap-4 md:items-center flex flex-col gap-2' : 'flex flex-col gap-2'}}">
    @if($label)<label for="{{$id}}">{{$label}}</label>@endif
    <div class="bg-neutral-100 rounded-lg cursor-pointer overflow-hidden pr-2 {{$class}}">
        <select class="bg-transparent w-full py-2 px-3 outline-none cursor-pointer" name="{{$name}}" id="{{$id}}">
            {{$slot}}
        </select>
    </div>
</div>
