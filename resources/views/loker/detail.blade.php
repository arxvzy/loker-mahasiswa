@extends('components.layout')
@section('title', 'Lowongan Kerja ' . $loker->posisi . ' di ' . $loker->nama_perusahaan)
@section('content')
    <div class="mx-auto w-11/12 flex justify-between mt-4 text-sm">
        <div class="lg:w-7/12 w-full flex flex-col gap-y-4 min-h-screen bg-white rounded-lg shadow-md p-4 hover:shadow-xl">
            <div class="w-11/12 mx-auto py-10">
                {{-- @foreach ($loker->images as $image) --}}
                {{-- <div class="w-3/4 mx-auto items-center">
                        <img class="min-w-full" src="/images/{{ $image->image_link }}" alt="" />
                    </div> --}}
                {{-- @endforeach --}}
                @if (count($loker->images) > 1)
                    <div class="carousel w-full">
                        @for ($i = 1; $i <= count($loker->images); $i++)
                            <div id="slide{{ $i }}" class="carousel-item relative w-full">
                                <img src="/images/{{ $loker->images[$i - 1]->image_link }}" class="object-contain" />
                                <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
                                    <a href="#slide{{ $i - 1 }}" class="btn btn-circle opacity-50">❮</a>
                                    <a href="#slide{{ $i + 1 }}" class="btn btn-circle opacity-50">❯</a>
                                </div>
                            </div>
                        @endfor
                    </div>
                @else
                    <img class="object-contain" src="/images/{{ $loker->images[0]->image_link }}" alt="" />
                @endif
                <h3 class="mt-10 font-bold text-base">{{ $loker->nama_perusahaan }}</h3>
                <h5 class="text-gray-500">Membuka Lowongan</h5>
                <h2 class="text-2xl font-bold text-secondary">{{ $loker->posisi }}</h2>
                <hr class="w-full my-4">
                <p class="text-slate-600">{{ $loker->deskripsi_perusahaan }}</p>
                <hr class="w-full my-4">
                <h4 class="text-lg font-semibold">Ringkasan</h4>
                <table class="w-full text-slate-600">
                    <tbody>
                        <tr>
                            <td class="pr-4">Pendidikan</td>
                            <td> : </td>
                            <td> {{ $loker->pendidikan }}</td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td> : </td>
                            <td> {{ $loker->gender }}</td>
                        </tr>
                        <tr>
                            <td>Status Kerja</td>
                            <td> : </td>
                            <td> {{ $loker->status_kerja }}</td>
                        </tr>
                        <tr>
                            <td class="align-text-top">Lokasi</td>
                            <td class="align-text-top"> : </td>
                            <td> {{ $loker->alamat }}</td>
                        </tr>
                    </tbody>
                </table>
                <hr class="w-full my-4">
                @if (count($loker->syarats) > 0)
                    <h4 class="text-lg font-semibold">Kualifikasi</h4>
                    @if (count($loker->syarats) > 1)
                        <ul class="list-disc pl-5 text-slate-600">
                            @foreach ($loker->syarats as $syarat)
                                <li>{{ $syarat->syarat }}</li>
                            @endforeach
                        </ul>
                    @else
                        <div class="prose-li:list-disc prose-li:list-inside prose-strong:font-semibold text-slate-600">
                            {!! $loker->syarats[0]->syarat !!}</div>
                    @endif
                    <hr class="w-full my-4">
                @endif
                @if ($loker->jobdesks->count() > 0)
                    <h4 class="text-lg font-semibold">Deskripsi Pekerjaan</h4>
                    <ul class="list-disc pl-5 text-slate-600">
                        @foreach ($loker->jobdesks as $jobdesk)
                            <li>{{ $jobdesk->jobdesk }}</li>
                        @endforeach
                    </ul>
                    <hr class="w-full my-4">
                @endif
                <h4 class="text-lg font-semibold">Cara Melamar</h4>
                <p class="text-wrap">{{ $loker->panduan_daftar }}</p>
                @if ($loker->email || $loker->telepon || $loker->website)
                    <h4 class="text-lg font-medium pt-2">Kirim Ke:</h4>
                    @if ($loker->email)
                        <div class="flex items-center gap-2">
                            <x-bi-envelope />
                            <p id="email" class="text-slate-600 overflow-x-auto">{{ $loker->email }}</p>
                            <button class="copy" data-clipboard-target="#email">
                                <x-bi-copy alt="Copy to clipboard" class="w-3" alt="Copy" />
                            </button>
                        </div>
                    @endif
                    @if ($loker->telepon)
                        <div class="flex items-center gap-2">
                            <x-bi-telephone />
                            <p id="telp" class="text-slate-600">{{ $loker->telepon }}</p>
                            <button class="copy" data-clipboard-target="#telp">
                                <x-bi-copy alt="Copy to clipboard" class="w-3" alt="Copy" />
                            </button>
                        </div>
                    @endif
                    @if ($loker->website)
                        <div class="flex items-center gap-2">
                            <x-bi-globe />
                            <a href="{{ $loker->website }}"
                                class="text-slate-600 hover:underline">{{ $loker->website }}</a>
                        </div>
                    @endif
                @endif
            </div>
        </div>
        <x-sidebar :categories="$categories"
            class="lg:w-2/5 max-h-screen hidden lg:block bg-white rounded-lg p-4 shadow hover:shadow-lg" />
    </div>
@endsection
