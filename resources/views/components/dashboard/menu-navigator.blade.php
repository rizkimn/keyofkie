<a href="{{$href}}" class="flex items-center gap-3">
    <span class="bg-white p-2 rounded-lg">
        <x-icons type="{{$icon}}" width="18" height="18" color="{{$isActive ? 'blue-500' : 'slate-800'}}" />
    </span>
    <h3 class="w-full text-sm {{$isActive ? 'opacity-100' : 'opacity-50'}} hover:opacity-100">{{$label}}</h3>
</a>
