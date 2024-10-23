@extends('components.layout')
@section('title', 'Loker Mahasiswa - Temukan Pekerjaan Terbaikmu')

@section('content')
    <div class="mx-auto w-11/12">
        <x-header />
        <x-search-card :categories="$categories" />
        <x-carousel :lokers="$carousel" />
        <h2 class="text-2xl mt-10" id="loker"><b>Lowongan Terbaru</b></h2>
        <div class="flex justify-between mx-auto mt-4">
            <div class="lg:w-7/12 w-full flex flex-col gap-y-4">
                @if (count($lokers) == 0)
                    <p class="mt-4 mx-auto">Loker tidak ditemukan</p>
                @else
                    @foreach ($lokers as $key => $loker)
                        <x-loker-card :loker="$loker" />
                    @endforeach
                    @if ($lokers->hasPages())
                        <div class="mt-4 mx-auto">
                            {{ $lokers->links() }}
                        </div>
                    @endif
                @endif

            </div>
            <x-sidebar :categories="$categories" />
        </div>
    </div>
@endsection
