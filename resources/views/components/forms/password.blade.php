<div class="{{$direction == 'row' ? 'md:grid md:grid-cols-[1fr_2fr] md:gap-4 md:items-center flex flex-col gap-2' : 'flex flex-col gap-2'}}">
    <label for="{{$id}}">{{$label}}</label>
    <div class="flex gap-2 items-center bg-neutral-50 p-3 rounded-xl {{$class}}">
        @if($showIcon)<x-icons type="lock" color="slate-800" width="16" height="16" />@endif
        <input name="{{$name}}" id={{$id}} class="w-full bg-transparent outline-none" type="password" placeholder="{{$placeholder}}" value="{{$value}}">
        <span class="cursor-pointer hint" onclick="togglePassword('{{$id}}')"><x-icons type="eye" color="slate-400" width="16" height="16" /></span>
    </div>
</div>

<script> function togglePassword(id) { document.getElementById(id).type = document.getElementById(id).type === 'password' ? 'text' : 'password'; } </script>
