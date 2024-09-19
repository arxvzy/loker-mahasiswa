<sidebar class="lg:w-2/5 hidden lg:block">
    <div class="w-full flex flex-col gap-y-4">
        <div class=" bg-white rounded-lg p-4 shadow hover:shadow-lg text-start text-lg ">
            <div class="mx-8 my-5">
                <h1 class="text-xl font-semibold border-b-2 border-slate-900">Cari Loker Disekitarmu</h1>
                <ul class="divide-y divide-slate-400">
                    @foreach ($categories->take(9) as $category)
                        <li class="mt-2"><a href="/?category={{ $category->name }}"
                                title="{{ $category->name }}">{{ $category->name }}</a></li>
                    @endforeach
                    {{-- @if (count($categories) > 9)
                        <li class="mt-2 font-semibold">Wilayah
                            Lainnya</li>
                    @endif --}}
                </ul>
            </div>
        </div>
        <div class="bg-white
                            rounded-lg p-4 shadow hover:shadow-lg text-start text-lg">
            <div class="mx-8 my-5 py-5">
                <h1 class="text-xl font-semibold border-b-2 border-slate-900">Ikuti Kami</h1>
                <x-follow-us />
            </div>
        </div>
    </div>
</sidebar>
