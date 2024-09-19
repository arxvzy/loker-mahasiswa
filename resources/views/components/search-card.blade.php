<article
    class="hover:animate-background rounded-xl bg-gradient-to-r from-green-300 via-blue-500 to-purple-600 p-0.5 shadow-md transition hover:bg-[length:400%_400%] hover:shadow-lg hover:[animation-duration:_4s] mt-10 lg:w-3/5 w-full mx-auto text-xs">
    <form action="/" method="GET" class="rounded-[10px] bg-white p-4 sm:p-6 font-bold">
        <div class="w-full grid md:grid-cols-3 md:gap-4 grid-cols-2 gap-2">
            <input type="text" name="search" id="search" placeholder="Cari..." autocomplete="off"
                class="input border-0 border-b-2 border-slate-400  max-w-xs focus:ring-0 focus:outline-none placeholder-slate-400"
                value="{{ old('search', request()->input('search')) }}" />
            <select name="wilayah" id="wilayah"
                class="select border-0 border-b-2 border-slate-400 max-w-xs focus:ring-0 focus:outline-none">
                <option value="">Semua Wilayah</option>
                @foreach ($categories as $category)
                    <option value="{{ Str::slug($category->name) }}" @selected(old('wilayah', request()->input('wilayah')) == Str::slug($category->name))>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            <select name="pendidikan" id="pendidikan"
                class="select border-0 border-b-2 border-slate-400 max-w-xs focus:ring-0 focus:outline-none">
                <option value="">
                    Semua Pendidikan
                </option>
                <option value="sma-smk" @selected(old('pendidikan', request()->input('pendidikan')) == 'sma')>
                    SMA / SMK
                </option>
                <option value="d1-d3" @selected(old('pendidikan', request()->input('pendidikan')) == 'd3')>
                    D1 - D3
                </option>
                <option value="s1-d4" @selected(old('pendidikan', request()->input('pendidikan')) == 's1')>
                    S1 / D4
                </option>
            </select>
            <select name="status" id="status"
                class="select border-0 border-b-2 border-slate-400 max-w-xs focus:ring-0 focus:outline-none">
                <option value="">
                    Semua status
                </option>
                <option value="full-time" @selected(old('status', request()->input('status')) == 'full-time')>
                    Full Time
                </option>
                <option value="part-time" @selected(old('status', request()->input('status')) == 'part-time')>
                    Part Time
                </option>
                <option value="full-time-&-part-time" @selected(old('status', request()->input('status')) == 'full-time-&-part-time')>
                    Full Time & Part Time
                </option>
                <option value="magang" @selected(old('status', request()->input('status')) == 'magang')>
                    Magang
                </option>
                <option value="freelance" @selected(old('status', request()->input('status')) == 'freelance')>
                    Freelance
                </option>
            </select>
            <button type="submit"
                class="w-2/3 rounded-md bg-teal-600 px-3 py-2.5 text-white transition hover:bg-teal-700 items-center flex justify-center gap-2">
                <x-heroicon-o-magnifying-glass class="w-4 h-4" />Cari
            </button>
        </div>
    </form>
</article>
<script>
    document.querySelector('form').addEventListener('submit', function(event) {
        let searchInput = document.getElementById('search');
        let wilayahInput = document.getElementById('wilayah');
        let pendidikanInput = document.getElementById('pendidikan');
        let statusInput = document.getElementById('status');

        if (!searchInput.value) {
            searchInput.disabled = true;
        }
        if (!wilayahInput.value) {
            wilayahInput.disabled = true;
        }
        if (!pendidikanInput.value) {
            pendidikanInput.disabled = true;
        }
        if (!statusInput.value) {
            statusInput.disabled = true;
        }
    });
</script>
