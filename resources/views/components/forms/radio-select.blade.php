<div>
    <input type="radio" name="{{$name}}" value="{{$value}}" id="{{$id}}" class="peer hidden" />
    <label for="{{$id}}" class="cursor-pointer flex items-center gap-2 peer-checked:bg-emerald-100 bg-neutral-100 px-4 py-2.5 rounded-xl border peer-checked:border-emerald-500 border-slate-300 peer-checked:text-emerald-500 text-slate-400 peer-checked:[&_path]:stroke-emerald-500">
        <p>{{$label}}</p>
        <x-icons type="double-check" width="16" height="16" color="slate-400" />
    </label>
</div>
