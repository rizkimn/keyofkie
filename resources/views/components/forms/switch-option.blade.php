<li class="w-full flex ">
    <input type="radio" class="peer hidden" name="{{$name}}" id="{{$id}}" value="{{$value}}" {{ $checked ? 'checked' : '' }}>
    <label for="{{$id}}" class="flex justify-center w-full p-3 rounded-lg peer-checked:bg-blue-500 peer-checked:text-white cursor-pointer {{$class}}">{{$label}}</label>
</li>
