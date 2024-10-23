<article class="flex flex-col mx-auto bg-white transition shadow hover:shadow-2xl p-4 rounded-lg h-full">
    <div class="md:basis-36 basis-40  flex flex-col">
        <img alt="Lowongan Kerja {{ $loker->posisi }} di {{ $loker->nama_perusahaan }} - {{ $loker->category->name }}"
            data-splide-lazy="/images/{{ $loker->images[0]->image_link }}"
            class="aspect-square object-cover w-full object-center rounded-xl" />
    </div>

    <div class="flex flex-col w-full">
        <div class="pt-3">
            <a href="{{ route('loker.show', $loker->id) }}"
                title="Lowongan Kerja {{ $loker->posisi }} di {{ $loker->nama_perusahaan }} - {{ $loker->category->name }}">
                <h3
                    class="font-bold uppercase text-teal-500 hover:underline text-sm md:text-base leading-tight truncate">
                    {{ $loker->posisi }}
                </h3>
            </a>
            <div class="text-xs text-gray-700 flex flex-wrap gap-x-2 gap-y-0.5">
                <div class="flex items-start gap-x-0.5 md:w-1/2 max-w-full">
                    <x-heroicon-o-building-office-2 class="w-4 overflow-visible" />
                    <p class="truncate">{{ $loker->nama_perusahaan }}</p>
                </div>
                <div class="flex items-start gap-x-0.5">
                    <x-heroicon-o-academic-cap class="w-4 overflow-visible" />
                    <p class="">{{ $loker->pendidikan }}</p>
                </div>
                <div class="flex items-start gap-x-0.5">
                    <x-bi-briefcase class="w-4 overflow-visible" />
                    <p class="">{{ $loker->status_kerja }}</p>
                </div>
                <div class="flex items-start gap-x-0.5">
                    <x-bi-geo-alt class="w-4 overflow-visible" />
                    <p class="">{{ $loker->category->name }}</p>
                </div>
            </div>
        </div>
    </div>
</article>
