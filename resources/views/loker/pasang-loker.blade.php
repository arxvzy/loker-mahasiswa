@extends('components.layout')
@section('title', 'Pasang Loker | Loker Mahasiswa')
@section('content')
    <div class="hero min-h-screen bg-white">
        <div class="hero-content text-center">
            <div class="max-w-md -mt-20">
                <h1 class="text-5xl font-bold">Pasang Loker Sekarang!</h1>
                <p class="py-6">Jangan biarkan posisi kosong menghambat bisnis mu. Pasang lowongan kerja di Loker Mahasiswa
                    dan temukan kandidat yang tepat dalam waktu singkat.</p>
                <a class="group relative inline-flex items-center overflow-hidden rounded bg-teal-600 px-8 py-3 text-white focus:outline-none focus:ring active:bg-teal-500"
                    href="https://wa.me/6285879505877" target="_blank">
                    <span class="absolute -end-full transition-all group-hover:end-4">
                        <svg class="size-5 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </span>

                    <span class="text-sm font-medium transition-all group-hover:me-4"> Pasang Sekarang </span>
                </a>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="self-end">
            <path fill="#0d9488" fill-opacity="1"
                d="M0,96L48,122.7C96,149,192,203,288,202.7C384,203,480,149,576,117.3C672,85,768,75,864,101.3C960,128,1056,192,1152,213.3C1248,235,1344,213,1392,202.7L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
            </path>
        </svg>
    </div>
@endsection
