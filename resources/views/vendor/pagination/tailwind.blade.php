<div class="flex items-center gap-4">
    <a class="flex items-center gap-2 px-6 py-3 font-sans text-xs font-bold text-center text-gray-900 uppercase align-middle transition-all rounded-full select-none hover:bg-gray-900/10 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none {{ $paginator->onFirstPage() ? 'invisible' : '' }}"
        href="{{ $paginator->previousPageUrl() }}">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
            aria-hidden="true" class="w-4 h-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"></path>
        </svg>
        Previous
    </a>
    <div class="flex items-center gap-2">
        {{-- @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            <button
                class="relative h-10 max-h-[40px] w-10 max-w-[40px] select-none rounded-full text-center align-middle font-sans text-xs font-medium uppercase transition-all {{ $paginator->currentPage() == $i ? 'bg-slate-900 text-white ' : '' }}"
                type="button">
                <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                    {{ $i }}
                </span>
            </button>
        @endfor --}}
        <button
            class="relative h-10 max-h-[40px] w-10 max-w-[40px] select-none rounded-full text-center align-middle font-sans text-xs font-medium uppercase transition-all bg-slate-700 text-white"
            type="button">
            <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                {{ $paginator->currentPage() }}
            </span>
        </button>
    </div>
    <a class="flex items-center gap-2 px-6 py-3 font-sans text-xs font-bold text-center text-gray-900 uppercase align-middle transition-all rounded-full select-none hover:bg-gray-900/10 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none {{ $paginator->currentPage() == $paginator->lastPage() ? 'invisible' : '' }}"
        href="{{ $paginator->nextPageUrl() }}">
        Next
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
            stroke="currentColor" aria-hidden="true" class="w-4 h-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"></path>
        </svg>
    </a>
</div>
