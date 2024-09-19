<div
    class="bg-base-100 text-xs md:text-base font-normal shadow-xl w-11/12 md:w-1/2 mx-auto mt-6 flex flex-col rounded-2xl overflow-hidden">
    <div class="aspect-video mx-6 mt-6 overflow-hidden">
        <img alt="{{ $article->title }}" data-src="/images/{{ $article->image }}"
            class="lazyload aspect-video object-cover" />
    </div>
    <div class="flex flex-col m-6 mt-2  text-slate-600">
        <h2 class="text-lg md:text-xl font-bold text-slate-800"><a
                href="{{ route('article.show', $article->slug) }}">{{ $article->title }}</a>
        </h2>
        <p>{!! Str::words($article->content, 30, '...') !!}</p>
        <div class="ml-auto mt-4 w-1/2 bg-slate-700 rounded-lg">
            <a class="btn h-full w-full btn-ghost btn-sm text-white text-xs md:text-sm font-normal"
                href="{{ route('article.show', $article->slug) }}" title="Baca Artikel {{ $article->title }}">Baca
                Selengkapnya</a>
        </div>
    </div>
</div>
