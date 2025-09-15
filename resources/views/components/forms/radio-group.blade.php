<div class="{{$direction == 'row' ? 'md:grid md:grid-cols-[1fr_2fr] md:gap-4 md:items-center flex flex-col gap-2' : 'flex flex-col gap-2'}}">
    <label for="category">Kategori</label>
    <div class="flex flex-wrap gap-2 items-center {{$direction == 'row' ? 'md:justify-end' : 'md:justify-start'}}">
        {{$slot}}
    </div>
</div>
