<div class="flex flex-row gap-1 items-center">
    @if ($paginator->onFirstPage())
        <a class="page-link bg-highlight text-white p-2 px-4 rounded-xl shadow-md" href="#"
            tabindex="-1">Previous</a>
        {{-- <li class="page-item disabled">
        </li> --}}
    @else
        <a class="page-link bg-highlight text-white p-2 px-4 rounded-xl shadow-md hover:bg-gray-300"
            href="{{ $paginator->previousPageUrl() }}">
            Previous</a>
        {{-- <li class="page-item">
        </li> --}}
    @endif

    <span class="text-gray-500 px-2">Total Per page: {{ $paginator->count() }}</span>

    @if ($paginator->hasMorePages())
        <a class="page-link bg-highlight text-white p-2 px-4 rounded-xl shadow-md hover:bg-gray-300"
            href="{{ $paginator->nextPageUrl() }}" rel="next">Next</a>
        {{-- <li class="page-item">
        </li> --}}
    @else
        <a class="page-link bg-highlight text-white p-2 px-4 rounded-xl shadow-md "
            href="#">Next</a>
        {{-- <li class="page-item disabled">
        </li> --}}
    @endif
    <!-- It is not the man who has too little, but the man who craves more, that is poor. - Seneca -->
</div>
