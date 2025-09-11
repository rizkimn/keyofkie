<div class="menu-navigator-group flex flex-col gap-2">
    <div class="flex items-center justify-between cursor-pointer">
        <div class="flex items-center gap-3">
            <span class="bg-white p-2 rounded-lg">
                <x-icons type="{{$icon}}" width="18" height="18" color="{{$isActive ? 'blue-500' : 'slate-800'}}" />
            </span>
            <h3 class="w-full text-sm {{$isActive ? 'opacity-100' : 'opacity-50'}}">{{$label}}</h3>
        </div>
        <div class="dropdown-btn">
            <x-icons type="caret-down" width="18" height="18" color="slate-800" />
        </div>
    </div>
    <ul class="menu-navigator-item hidden flex flex-col ml-4 pl-8 border-l border-l-slate-300">
        {{$slot}}
    </ul>
</div>
