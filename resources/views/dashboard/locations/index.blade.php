@extends('layout.dashboard')

@push('heads')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
@endpush

@section('title', 'Manajemen Tempat Wisata')

@section('main')
    <x-dashboard.menu-navigator icon="map" label="Manajemen Tempat Wisata" href="#" :isActive="true" />

    <section class="flex flex-col items-center gap-4 mt-6 py-6 bg-white rounded-full">
        <div class="w-full grid grid-cols-4 gap-4 p-6">
            <div class="flex flex-col bg-slate-100 rounded-[28px] p-1 space-y-1">
                <div class="bg-white hover:bg-slate-50 h-full p-0 rounded-[24px] shadow-lg space-y-6">
                    <a class="flex h-full items-center justify-center gap-2 p-2 rounded-[24px]"
                        href="{{route('dashboard.locations.create')}}">
                        <x-icons type="plus" color="slate-500" width="30" height="30" />
                    </a>
                </div>
                <span class="text-slate-400 text-sm flex justify-center py-1">Tambah Tempat Baru</span>
            </div>
            @foreach ($locations as $location)
            @php
                $categoryColorMap = [
                    'Pantai' => 'sky',
                    'Alam' => 'emerald',
                    'Pulau' => 'blue',
                    'Sejarah' => 'amber',
                ]
            @endphp
            <div class="bg-{{$categoryColorMap[$location->category]}}-200 rounded-[28px] p-1 space-y-1">
                <div class="bg-white p-6 rounded-[24px] shadow-lg space-y-6">
                    <h2>{{$location->name}}</h2>
                    <a class="flex items-center justify-center gap-2 p-2 border border-blue-300 hover:bg-blue-50 rounded-xl"
                        href="{{route('dashboard.locations.show', ['location' => $location])}}">
                        <x-icons type="map" color="blue-500" width="20" height="20" />
                        <span class="text-sm text-blue-500">Buka Peta</span>
                    </a>
                </div>
                <span class="text-{{$categoryColorMap[$location->category]}}-600 text-sm flex justify-center py-1">{{$location->category}}</span>
            </div>
            @endforeach
        </div>
        <x-table.pagination :data-table="$locations" />
    </section>
@endsection
