@extends('layout.dashboard')

@push('heads')
    @vite([
        'resources/css/app.css',
        'resources/js/app.js',
        'resources/js/dashboard/locations/create.js',
    ])
@endpush

@section('title', 'Tambah Tempat Wisata')

@section('main')
    <x-dashboard.menu-navigator icon="map" label="Tambah Tempat Wisata" href="#" :isActive="true" />

    <h2 class="text-2xl py-4">Input Tempat Wisata</h2>

    @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl mb-6">
        <ul class="list-disc list-inside text-sm">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{route('dashboard.locations.store')}}" enctype="multipart/form-data" method="POST" class="w-full flex flex-col gap-6">
        @csrf @method('POST')
        <div class="flex max-md:flex-col gap-6">
            <div class="lg:w-lg flex flex-col gap-4 text-sm">
                <x-forms.input id="name" name="name"
                    class="border {{ $errors->has('name') ? 'bg-red-50 border-red-500' : 'bg-neutral-50 border-neutral-300 hover:border-blue-400' }}"
                    label="Nama Tempat Wisata"
                    placeholder="Masukkan Nama Tempat"
                    direction="row"
                    :show-icon="false"
                />
                <x-forms.input id="description" name="description"
                    class="border {{ $errors->has('description') ? 'bg-red-50 border-red-500' : 'bg-neutral-50 border-neutral-300 hover:border-blue-400' }}"
                    label="Deskripsi Tempat"
                    placeholder="Masukkan Deskripsi"
                    direction="row"
                    :show-icon="false"
                />
                <div class="flex flex-col gap-2">
                    <p>Foto Pendukung</p>
                    <x-forms.file-upload id="images" name="images[]"
                        color="slate-500"
                        placeholder="Upload Foto Pendukung"
                        :multiple="true"
                        accepts="image/*" />
                </div>
            </div>
            <div class="flex flex-col gap-4 text-sm lg:w-2xl">
                <div class="flex flex-col gap-2">
                    <label for="latitude">Koordinat</label>
                    <span class="grid grid-cols-2 max-md:grid-cols-1 items-center gap-2">
                        <x-forms.input id="latitude" name="latitude"
                            class="border {{ $errors->has('latitude') ? 'bg-red-50 border-red-500' : 'bg-neutral-50 border-neutral-300 hover:border-blue-400' }}"
                            label=""
                            placeholder="Latitude"
                            :show-icon="false"
                        />
                        <x-forms.input id="longitude" name="longitude"
                            class="border {{ $errors->has('longitude') ? 'bg-red-50 border-red-500' : 'bg-neutral-50 border-neutral-300 hover:border-blue-400' }}"
                            label=""
                            placeholder="Longitude"
                            :show-icon="false"
                        />
                    </span>
                </div>
                <div class="flex items-center w-full">
                    <div class="bg-white p-2 rounded-xl w-full">
                        <div id="map" class="w-full aspect-[5/3] max-md:aspect-[3/5] rounded-lg relative z-10"></div>
                    </div>
                </div>
                <x-forms.radio-group title="Kategori" >
                    <x-forms.radio-select
                        class="flex"
                        name="category"
                        label="Pantai"
                        value="Pantai"
                        id="category_pantai"
                    />
                    <x-forms.radio-select
                        class="flex"
                        name="category"
                        label="Alam"
                        value="Alam"
                        id="category_alam"
                    />
                    <x-forms.radio-select
                        class="flex"
                        name="category"
                        label="Pulau"
                        value="Pulau"
                        id="category_pulau"
                    />
                    <x-forms.radio-select
                        class="flex"
                        name="category"
                        label="Sejarah"
                        value="Sejarah"
                        id="category_sejarah"
                    />
                </x-forms.radio-group>
            </div>
        </div>
        <div class="flex items-center gap-3 text-sm border-t border-t-slate-300 py-6">
            <a href="{{route("dashboard.locations.index")}}" class="bg-white/50 text-blue-400 border border-blue-400 px-6 py-3 rounded-xl cursor-pointer">Kembali</a>
            <x-forms.submit color="blue-400" label="Input Data" icon="send" class="px-4 cursor-pointer" />
        </div>
    </form>
@endsection
