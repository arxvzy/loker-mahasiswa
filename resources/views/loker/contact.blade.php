@extends('components.layout')
@section('title', 'Temukan Kami | Loker Mahasiswa')

@section('content')
    <div class="w-full flex h-[65vh]">
        <div class="w-full h-full md:w-2/3 md:h-3/4 m-auto flex  bg-white rounded-2xl shadow-lg">
            <div class="flex flex-col m-auto w-full">

                <h1 class="mx-auto text-xl font-bold">Temukan Kami</h1>
                <div class="mt-4 w-3/4 mx-auto grid grid-cols-1 lg:grid-cols-2 gap-x-4">
                    <x-list-ig />
                </div>
            </div>
        </div>
    </div>
@endsection
