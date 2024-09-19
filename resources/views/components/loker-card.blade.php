<article class="flex bg-white transition shadow hover:shadow-lg p-4 rounded-lg max-h-64">
    <div class="md:basis-56 w-1/3 flex flex-col">
        <img alt="Lowongan Kerja {{ $loker->posisi }} di {{ $loker->nama_perusahaan }} - {{ $loker->category->name }}"
            data-src="/images/{{ $loker->images[0]->image_link }}" class="lazyload aspect-square object-cover md:h-2/3" />
        <div
            class="mt-6 w-full bg-slate-700 rounded-lg hover:bg-slate-600 hover:scale-105 transition ease-in-out duration-100">
            <a class="btn w-full btn-ghost btn-sm text-xs font-light text-white"
                href="{{ route('loker.show', $loker->id) }}"
                title="Lowongan Kerja {{ $loker->posisi }} di {{ $loker->nama_perusahaan }} - {{ $loker->category->name }}">Lihat
                Detail</a>
        </div>
    </div>

    <div class="flex flex-col w-2/3">
        <div class="p-2 sm:p-4">
            <div class="text-xs md:text-base font-medium text-gray-700 flex justify-between">
                <p>Dibutuhkan</p>
            </div>
            <a href="{{ route('loker.show', $loker->id) }}"
                title="Lowongan Kerja {{ $loker->posisi }} di {{ $loker->nama_perusahaan }} - {{ $loker->category->name }}">
                <h3 class="font-bold uppercase text-teal-500 hover:underline text-base md:text-xl leading-tight ">
                    {{ $loker->posisi }}
                </h3>
            </a>
            <div class="mt-2 text-xs md:text-base text-gray-700 flex flex-wrap gap-x-4 gap-y-0.5">
                <div class="flex items-start gap-1">
                    <x-heroicon-o-building-office-2 class="w-4" />
                    <p>{{ $loker->nama_perusahaan }}</p>
                </div>
                <div class="flex items-start gap-1">
                    <x-heroicon-o-academic-cap class="w-4" />
                    <p>{{ $loker->pendidikan }}</p>
                </div>
                <div class="flex items-start gap-1">
                    <x-bi-briefcase class="w-4" />
                    <p>{{ $loker->status_kerja }}</p>
                </div>
                <div class="flex items-start gap-1">
                    <x-bi-gender-ambiguous class="w-4" />
                    <p>{{ $loker->gender }}</p>
                </div>
                <div class="flex items-start gap-1">
                    <x-bi-geo-alt class="w-4" />
                    <p>{{ $loker->category->name }}</p>
                </div>
            </div>
        </div>
        <div class="flex justify-end gap-1 mt-auto">
            <x-heroicon-o-clock class="w-2" />
            <p class="text-[.6rem] md:text-sm">{{ $loker->created_at->locale('id')->diffForHumans() }}</p>
        </div>
    </div>
</article>
