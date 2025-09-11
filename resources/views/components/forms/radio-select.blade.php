<li class="flex bg-slate-50 hover:bg-slate-100 px-3 gap-3">
    <input {{$checked ? 'checked' : ''}} class="hidden checked:flex" type="radio" name="{{$name}}" value="{{$value}}" id="{{$id}}">
    <label for="{{$id}}" class="w-full py-4 cursor-pointer {{$class}}">{{$label}}</label>
</li>
