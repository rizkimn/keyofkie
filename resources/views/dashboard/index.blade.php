@extends('layout.dashboard')

@push('heads')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
@endpush

@section('title', 'Manajemen Tempat Wisata')

@section('main')
    <x-dashboard.menu-navigator icon="dashboard" label="Dashboard" href="#" :isActive="true" />
@endsection
