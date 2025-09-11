<form action="{{ $action }}" method="POST"> @csrf @method('DELETE')
    @if(isset($label))
    <button type="submit" class="flex items-center gap-3 text-red-500">
        <x-icons type="{{$icon}}" color="red-500" width="20" height="20" />
        <span>{{$label}}</span>
    </button>
    @else
    <button type="submit"><x-icons type="log-out" color="red-500" width="20" height="20" /></button>
    @endif
</form>
