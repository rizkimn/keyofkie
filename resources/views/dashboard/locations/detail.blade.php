@extends('layout.dashboard')

@push('heads')
    @vite([
        'resources/css/app.css',
        'resources/js/app.js',
        'resources/js/dashboard/locations/detail.js',
    ])
@endpush

@section('title', 'Detail Tempat Wisata')

@section('main')
    <x-dashboard.menu-navigator icon="map" label="Detail Tempat Wisata" href="#" :isActive="true" />

    <section class="py-6 grid grid-cols-1 lg:grid-cols-2 gap-6">
        {{-- Detail Informasi Lokasi --}}
        <div class="flex flex-col gap-4">
            <h2 class="text-2xl font-semibold">{{$location->name}}</h2>
            <p class="text-gray-600 text-sm">{{$location->description ?? '-'}}</p>
            <div class="grid grid-cols-2 gap-2 text-sm">
                <span class="font-semibold">Kategori:</span>
                <span>{{$location->category ?? '-'}}</span>
                <span class="font-semibold">Koordinat:</span>
                <span>{{$location->latitude}}, {{$location->longitude}}</span>
            </div>
        </div>

        {{-- Map --}}
        <div class="bg-white p-2 rounded-xl w-full">
            <div id="map" class="w-full h-[50vh] rounded-lg relative z-10"></div>
        </div>
    </section>

    {{-- Statistik Sosial Media --}}
    <section class="mt-8">
        <h3 class="text-xl font-semibold mb-4">Statistik Sosial Media</h3>
        @if($stats)
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                <div class="bg-white p-4 rounded-xl text-center shadow">
                    <p class="text-sm text-gray-500">Total Posts</p>
                    <p class="text-lg font-bold">{{$stats->total_posts}}</p>
                </div>
                <div class="bg-white p-4 rounded-xl text-center shadow">
                    <p class="text-sm text-gray-500">Likes</p>
                    <p class="text-lg font-bold">{{$stats->total_likes}}</p>
                </div>
                <div class="bg-white p-4 rounded-xl text-center shadow">
                    <p class="text-sm text-gray-500">Comments</p>
                    <p class="text-lg font-bold">{{$stats->total_comments}}</p>
                </div>
                <div class="bg-white p-4 rounded-xl text-center shadow">
                    <p class="text-sm text-gray-500">Shares</p>
                    <p class="text-lg font-bold">{{$stats->total_shares}}</p>
                </div>
                <div class="bg-white p-4 rounded-xl text-center shadow">
                    <p class="text-sm text-gray-500">Positive</p>
                    <p class="text-lg font-bold text-green-600">{{$stats->positive}}</p>
                </div>
                <div class="bg-white p-4 rounded-xl text-center shadow">
                    <p class="text-sm text-gray-500">Neutral</p>
                    <p class="text-lg font-bold text-yellow-500">{{$stats->neutral}}</p>
                </div>
                <div class="bg-white p-4 rounded-xl text-center shadow">
                    <p class="text-sm text-gray-500">Negative</p>
                    <p class="text-lg font-bold text-red-500">{{$stats->negative}}</p>
                </div>
            </div>
        @else
            <p class="text-gray-500">Belum ada data postingan sosial media terkait lokasi ini.</p>
        @endif
    </section>
@endsection

@push('scripts')
<script>
    window.locationData = @json($location)
</script>
@endpush
