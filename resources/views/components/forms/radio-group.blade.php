<div class="modal hidden" id="{{$id}}">
    <div class="modal-overlay fixed w-full bg-black/80 top-0 left-0 bottom-0 flex py-24 justify-center">
        <div class="modal-card absolute flex flex-col gap-6 bg-white w-[60%] max-md:w-[90%] rounded-2xl p-4">
            <div class="modal-head flex items-center justify-between">
                <h2 class="font-semibold">{{$title}}</h2>
                <div class="opacity-30 hover:opacity-100 cursor-pointer" onclick="closeModal('{{$id}}')">
                    <x-icons type="close" width="16" height="16" color="slate-400" />
                </div>
            </div>
            <div class="modal-body">
                <ul class="flex flex-col">
                    {{$slot}}
                </ul>
            </div>
        </div>
    </div>
</div>
