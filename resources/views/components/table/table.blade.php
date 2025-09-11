<div class="relative overflow-x-auto w-full mb-4">
    <table class="w-full table-auto border-collapse">
        <thead>
            {{$tableHead}}
        </thead>
        <tbody>
            {{$tableBody}}
        </tbody>
    </table>
    <div class="flex items-center justify-between px-2 py-4 border-b bg-white border-neutral-200 sticky bottom-0 left-0 z-10">
        <span class="flex items-center gap-1 text-sm">
            <p>Show</p>
            <div>
                <x-forms.select id="select-limit" name="page_limit" class="text-xs bg-transparent border border-neutral-200">
                    <option value="15" {{request('page_limit') == '15' ? 'selected' : ''}}>15</option>
                    <option value="25" {{request('page_limit') == '25' ? 'selected' : ''}}>25</option>
                    <option value="50" {{request('page_limit') == '50' ? 'selected' : ''}}>50</option>
                    <option value="100" {{request('page_limit') == '100' ? 'selected' : ''}}>100</option>
                </x-forms.select>
            </div>
            <p>per Page</p>
        </span>
        <x-table.pagination :data-table="$tableData" />
    </div>
</div>
