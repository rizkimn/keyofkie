<div class="w-full group relative">
    <label class="bg-neutral-50/50 flex flex-col items-center justify-center w-full px-6 py-16 bg-{{$color}}/5 border border-{{$color}} border-dashed rounded-xl cursor-pointer transition-all duration-300 ease-in-out"
           id="{{$id}}_dropzone"
           for="{{$id}}">
        <span class="flex items-center gap-2 opacity-50 group-hover:opacity-100 transition-opacity">
            <x-icons type="document-attachment" width="24" height="24" color="{{$color}}" class="transition-transform duration-300" id="{{$id}}_icon" />
            <p id="{{$id}}_placeholder" class="text-{{$color}} font-light text-center">{{$placeholder}}</p>
        </span>
        <span class="text-{{$color}}/70 text-sm mt-2 hidden" id="{{$id}}_hint">Drop file here to upload</span>
    </label>
    <input class="hidden" type="file" name="{{$name}}" id="{{$id}}" accept="{{$accepts ?? ".pdf,.doc,.docx"}}" onchange="getFileFromInput(event, '{{$id}}_placeholder')" {{$multiple ? "multiple" : ''}}>

    <!-- Progress indicator -->
    <div class="absolute inset-0 bg-white/90 flex items-center justify-center hidden" id="{{$id}}_progress">
        <div class="w-16 h-16 border-4 border-{{$color}}/30 border-t-{{$color}} rounded-full animate-spin"></div>
    </div>
</div>

<script>
    function truncateFileName(fileName, maxLength) {
    const lastDotIndex = fileName.lastIndexOf('.');
    const extension = lastDotIndex !== -1 ? fileName.slice(lastDotIndex) : '';
    const baseName = lastDotIndex !== -1 ? fileName.slice(0, lastDotIndex) : fileName;

    if (baseName.length > maxLength) {
        return baseName.slice(0, maxLength) + '...' + extension;
    }
    return fileName;
}

function displayFiles(files, placeHolderId) {
    const placeholder = document.getElementById(placeHolderId);

    if (files.length === 1) {
        placeholder.innerText = truncateFileName(files[0].name, 66);
    } else {
        const fileNames = Array.from(files).map(f => truncateFileName(f.name, 30));
        if (fileNames.length > 3) {
            placeholder.innerText = `${fileNames.slice(0, 3).join(', ')} +${fileNames.length - 3} more`;
        } else {
            placeholder.innerText = fileNames.join(', ');
        }
    }
}

function getFileFromInput(event, placeHolderId) {
    const fileInput = event.target;
    const files = fileInput.files;
    if (files.length > 0) {
        displayFiles(files, placeHolderId);
    }
}

// Initialize drag and drop functionality
document.addEventListener('DOMContentLoaded', () => {
    const dropzone = document.getElementById('{{$id}}_dropzone');
    const fileInput = document.getElementById('{{$id}}');
    const placeholder = document.getElementById('{{$id}}_placeholder');
    const hint = document.getElementById('{{$id}}_hint');
    const progress = document.getElementById('{{$id}}_progress');
    const icon = document.getElementById('{{$id}}_icon');

    if (!dropzone) return;

    // Prevent default drag behaviors
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropzone.addEventListener(eventName, preventDefaults, false);
        document.addEventListener(eventName, preventDefaults, false);
    });

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    // Highlight drop area
    ['dragenter', 'dragover'].forEach(eventName => {
        dropzone.addEventListener(eventName, highlight, false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        dropzone.addEventListener(eventName, unhighlight, false);
    });

    function highlight() {
        dropzone.classList.add('bg-{{$color}}/10', 'border-solid', 'scale-[1.02]');
        hint.classList.remove('hidden');
        icon.classList.add('scale-125');
    }

    function unhighlight() {
        dropzone.classList.remove('bg-{{$color}}/10', 'border-solid', 'scale-[1.02]');
        hint.classList.add('hidden');
        icon.classList.remove('scale-125');
    }

    // Handle dropped files
    dropzone.addEventListener('drop', handleDrop, false);

    function handleDrop(e) {
        const dt = e.dataTransfer;
        const files = dt.files;

        if (files.length) {
            progress.classList.remove('hidden');

            setTimeout(() => {
                // NOTE: fileInput.files is read-only in some browsers, so this might not always work
                // Better way: trigger change manually if needed
                fileInput.files = files;

                // Show multiple files
                displayFiles(files, '{{$id}}_placeholder');

                progress.classList.add('hidden');
            }, 800);
        }
    }
});

</script>
