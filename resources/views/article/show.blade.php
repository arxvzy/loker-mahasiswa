@extends('components.layout')

@section('title', 'Artikel - Loker Mahasiswa')

@section('content')
    <div class="w-11/12 md:w-1/2 p-6 mx-auto bg-white rounded-3xl shadow-xl flex flex-col prose caret-transparent">
        <img data-src="/images/{{ $article->image }}" class="lazyload mx-auto aspect-video rounded-3xl"
            alt="{{ $article->title }}">
        <h1 class="m-auto text-3xl font-bold mt-6">{{ $article->title }}</h1>
        {!! $article->content !!}
    </div>
@endsection

{{-- text-xl font-normal --}}
