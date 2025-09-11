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
                <x-forms.select name="category" id="category" label="Kategori" class="border py-1 rounded-xl {{ $errors->has('category') ? 'bg-red-50 border-red-500' : 'bg-neutral-50 border-neutral-300 hover:border-blue-400' }}" direction="row" >
                    <option disabled selected value="">Pilih Kategori</option>
                    <option value="Pantai" >Pantai</option>
                    <option value="Alam" >Alam</option>
                    <option value="Pulau" >Pulau</option>
                    <option value="Sejarah" >Sejarah</option>
                </x-forms.select>

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
                <div class="md:grid md:grid-cols-[1fr_2fr] md:gap-4 md:items-center flex flex-col gap-2">
                    <label for="category">Kategori</label>
                    <div class="flex gap-2 items-center md:justify-end">
                        <div>
                            <input type="checkbox" name="is_housing_improvement" value="1" id="housing_improvement" class="peer hidden" />
                            <label for="housing_improvement" class="cursor-pointer flex items-center gap-2 peer-checked:bg-emerald-100 bg-neutral-100 px-4 py-2.5 rounded-xl border peer-checked:border-emerald-500 border-slate-300 peer-checked:text-emerald-500 text-slate-400 peer-checked:[&_path]:stroke-emerald-500">
                                <p>RTLH</p>
                                <x-icons type="double-check" width="16" height="16" color="slate-400" />
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" name="is_healthy_kitchen" value="1" id="healthy_kitchen" class="peer hidden" />
                            <label for="healthy_kitchen" class="cursor-pointer flex items-center gap-2 peer-checked:bg-yellow-100 bg-neutral-100 px-4 py-2.5 rounded-xl border peer-checked:border-yellow-500 border-slate-300 peer-checked:text-yellow-500 text-slate-400 peer-checked:[&_path]:stroke-yellow-500">
                                <p>Dapur Sehat</p>
                                <x-icons type="double-check" width="16" height="16" color="slate-400" />
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex items-center gap-3 text-sm border-t border-t-slate-300 py-6">
            <a href="{{route("dashboard.locations.index")}}" class="bg-white/50 text-blue-400 border border-blue-400 px-6 py-3 rounded-xl cursor-pointer">Kembali</a>
            <x-forms.submit color="blue-400" label="Input Data" icon="send" class="px-4 cursor-pointer" />
        </div>
    </form>
@endsection
