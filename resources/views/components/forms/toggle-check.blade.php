<li {{ $attributes->merge(['class' => "flex items-center bg-none px-3 gap-3 rounded-lg transition-all duration-200 $class"]) }}>
    <div class="relative inline-flex items-center cursor-pointer w-full">
        <label for="{{ $id }}" class="cursor-pointer flex gap-2 select-none">
            <div class="relative h-6 w-11 items-center">
                <input
                    type="checkbox"
                    name="{{ $name }}"
                    id="{{ $id }}"
                    {{ $checked ? 'checked' : '' }}
                    class="peer hidden"
                    {{-- wire:model="{{ $name }}" --}}
                />

                <!-- Background track -->
                <div class="absolute h-full w-full rounded-full bg-gray-300 peer-checked:bg-{{$color}}-500 transition-colors duration-300"></div>

                <!-- Toggle handle -->
                <span class="absolute left-0.5 top-0.5 h-5 w-5 rounded-full bg-white shadow-md transform transition-transform duration-300 peer-checked:translate-x-5"></span>
            </div>
            {{ $label }}
        </label>
    </div>
</li>
