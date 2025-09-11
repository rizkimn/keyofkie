<nav class="flex items-center gap-1 text-sm" aria-label="Pagination">
    <!-- Tombol Sebelumnya -->
    <x-table.previous-page-link :is-first-page="$dataTable->onFirstPage()" :href="$dataTable->previousPageUrl()" />

    <!-- Link Halaman -->
    @php
        $startPage = max(1, $dataTable->currentPage() - 2); // Halaman awal
        $endPage = min($dataTable->lastPage(), $dataTable->currentPage() + 2); // Halaman akhir
    @endphp

    <!-- Tombol ke halaman pertama jika jauh -->
    @if ($startPage > 1)
        <x-table.page-link href="{{ $dataTable->url(1) }}" label="1" />
        @if ($startPage > 2)
            <x-table.page-padding-link />
        @endif
    @endif

    <!-- Tombol untuk halaman di sekitar halaman saat ini -->
    @for ($page = $startPage; $page <= $endPage; $page++)
        @if ($page == $dataTable->currentPage())
            <x-table.page-link :is-current="true" :label="$page" />
        @else
            <x-table.page-link :href="$dataTable->url($page)" :label="$page" />
        @endif
    @endfor

    <!-- Tombol ke halaman terakhir jika jauh -->
    @if ($endPage < $dataTable->lastPage())
        @if ($endPage < $dataTable->lastPage() - 1)
            <x-table.page-padding-link />
        @endif
        <x-table.page-link :href="$dataTable->url($dataTable->lastPage())" :label="$dataTable->lastPage()" />
    @endif

    <!-- Tombol Berikutnya -->
    <x-table.next-page-link :is-last-page="$dataTable->onLastPage()" :href="$dataTable->nextPageUrl()" />
</nav>
