<section id="loker-slide" class="splide mt-4 w-full h-auto mx-auto">
    <h2 class="text-2xl mt-10 text-center font-bold">Rekomendasi Lowongan</h2>
    <div class="splide__track h-72 mt-4 md:mx-16 mx-auto">
        <ul class="splide__list mx-auto">
            @foreach ($lokers as $loker)
                <li class="splide__slide mx-auto h-full">
                    <x-card-carousel :loker="$loker" />
                </li>
            @endforeach
        </ul>
    </div>
</section>
