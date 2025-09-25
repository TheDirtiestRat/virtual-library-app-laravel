<div class="h-full min-w-[280px] flex flex-col gap-3">
    <div class="bg-white rounded-xl shadow p-4 basis-1/3 relative">
        <div class="bottom-4 left-4 absolute">
            @include('components.title')
        </div>
    </div>
    <div class="basis-full flex flex-col gap-2 overflow-y-auto px-1">
        <h1 class="text-xl font-semibold">Categories</h1>
        @isset($categories)
            @empty($categories)
                <button class="text-gray-800 hover:text-gray-700 basis-auto">No Categories</button>
            @else
                @foreach ($categories as $category)
                    <a href="{{ url('/books/category/'.$category->categories.'/'. false) }}"
                        class="shadow rounded-xl p-3 bg-white hover:bg-gray-100 focus:outline-2 basis-auto">
                        {{ $category->categories }}</a>
                    {{-- <button
                        class="shadow rounded-xl p-3 bg-white hover:bg-gray-100 focus:outline-2 basis-auto">{{ $category->categories }}</button> --}}
                @endforeach
            @endempty
        @endisset
    </div>

    <a href="{{ url('/') }}" class="shadow rounded-xl p-3 bg-white hover:bg-gray-100 focus:outline-2 basis-auto">Back
        Home</a>
    <!-- The only way to do great work is to love what you do. - Steve Jobs -->
</div>
