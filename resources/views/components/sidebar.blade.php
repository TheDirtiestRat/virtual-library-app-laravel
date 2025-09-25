<div class="h-full min-w-[280px] flex flex-col gap-3">
    <div class="bg-amber-50 rounded-xl shadow p-4 relative">
        <div class="flex flex-col items-center justify-center">
            <h1 class="text-2xl text-ink font-semibold">ACLC</h1>
            <h1 class="text-2xl text-ink font-semibold">Virtual Library</h1>
        </div>
    </div>
    <div class="basis-full flex flex-col gap-2 overflow-y-auto px-1">
        <h1 class="text-xl font-semibold">Categories</h1>
        @isset($categories)
            @empty($categories)
                <button class="text-gray-800 hover:text-gray-700 basis-auto">No Categories</button>
            @else
                @foreach ($categories as $category)
                    <a href="{{ url('/books/category/'.$category->categories.'/'. 0) }}"
                        class="shadow rounded-xl p-3 bg-parchment hover:bg-gray-100 focus:outline-2 basis-auto">
                        {{ $category->categories }}</a>
                    {{-- <button class="shadow rounded-xl p-3 bg-white hover:bg-gray-100 focus:outline-2 basis-auto">{{
                        $category->categories }}</button> --}}
                @endforeach
            @endempty
        @endisset
    </div>

    <a href="{{ url('/') }}"
        class="shadow rounded-xl text-white font-medium p-3 bg-highlight hover:bg-green-800 focus:outline-2 basis-auto">
        <i class="bi bi-arrow-left-circle-fill pr-2"></i>
        Back Home</a>
    <!-- The only way to do great work is to love what you do. - Steve Jobs -->
</div>
