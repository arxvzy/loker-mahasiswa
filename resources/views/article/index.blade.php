@extends('components.layout')

@section('title', 'Artikel - Loker Mahasiswa')

@section('content')
    <div class="w-11/12 md:w-1/2 mx-auto bg-white rounded-2xl shadow-lg py-6 flex">
        <h1 class="m-auto">Baca tips - tips menarik</h1>
    </div>
    @foreach ($articles as $article)
        <x-article-card :article="$article" />
    @endforeach
@endsection
