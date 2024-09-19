@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a
                class="group rounded-lg invisible relative mt-4 inline-block text-sm font-medium text-white focus:outline-none focus:ring">
                <span class="absolute rounded-lg inset-0 border border-teal-600 group-active:border-teal-500"></span>
                <span
                    class="block border rounded-lg border-teal-600 bg-teal-600 md:px-12 px-6 py-3 transition-transform active:border-teal-500 active:bg-teal-500 group-hover:-translate-x-1 group-hover:-translate-y-1">
                    {!! __('pagination.previous') !!}
                </span>
            </a>
        @else
            <a class="group rounded-lg relative mt-4 inline-block text-sm font-medium text-white focus:outline-none focus:ring"
                href="{{ $paginator->previousPageUrl() }}">
                <span class="absolute rounded-lg inset-0 border border-teal-600 group-active:border-teal-500"></span>
                <span
                    class="block border rounded-lg border-teal-600 bg-teal-600 md:px-12 px-6 py-3 transition-transform active:border-teal-500 active:bg-teal-500 group-hover:-translate-x-1 group-hover:-translate-y-1">
                    {!! __('pagination.previous') !!}
                </span>
            </a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="group rounded-lg relative mt-4 inline-block text-sm font-medium text-white focus:outline-none focus:ring"
                href="{{ $paginator->nextPageUrl() }}">
                <span class="absolute rounded-lg inset-0 border border-teal-600 group-active:border-teal-500"></span>
                <span
                    class="block border rounded-lg border-teal-600 bg-teal-600 md:px-12 px-6 py-3 transition-transform active:border-teal-500 active:bg-teal-500 group-hover:-translate-x-1 group-hover:-translate-y-1">
                    {!! __('pagination.next') !!}
                </span>
            </a>
        @else
            <a
                class="group rounded-lg relative mt-4 inline-block text-sm font-medium text-white focus:outline-none focus:ring invisible">
                <span class="absolute rounded-lg inset-0 border border-teal-600 group-active:border-teal-500"></span>
                <span
                    class="block border rounded-lg border-teal-600 bg-teal-600 md:px-12 px-6 py-3 transition-transform active:border-teal-500 active:bg-teal-500 group-hover:-translate-x-1 group-hover:-translate-y-1">
                    {!! __('pagination.next') !!}
                </span>
            </a>
        @endif
    </nav>
@endif
