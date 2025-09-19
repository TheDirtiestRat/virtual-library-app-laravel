<div class="h-full min-w-[280px] flex flex-col gap-3">
    <div class="bg-white rounded-xl shadow p-4 basis-1/3 relative">
        <div class="bottom-4 left-4 absolute">
            @include('components.title')
        </div>
    </div>
    {{-- admit options --}}
    <a href="{{ url('/books/manage/addBook') }}"
        class="shadow rounded-xl p-3 bg-white hover:bg-gray-100 focus:outline-2 basis-auto">Add Book</a>
    {{-- <a href="{{ url('/') }}"
        class="shadow rounded-xl p-3 bg-white hover:bg-gray-100 focus:outline-2 basis-auto">Import Books</a> --}}
    <form action="{{ route('import-book.csv') }}" method="POST" enctype="multipart/form-data"
        class="basis-auto flex flex-row gap-1">
        @csrf
        <input type="file" name="csv_file" accept=".csv"
            class="shadow-md border border-gray-200 p-2 mb-2 h-auto rounded-s-xl hover:border-gray-300 hover:bg-gray-300 focus:outline-2 w-[200px]">
        <button type="submit"
            class="bg-white shadow-md border border-gray-200 p-2 mb-2 h-auto rounded-e-xl hover:border-gray-300 hover:bg-gray-300 focus:outline-2 whitespace-nowrap">Import
            CSV</button>
    </form>

    <div class="basis-full flex flex-col gap-2 overflow-y-auto px-1">
        <h1 class="text-xl font-semibold">Categories</h1>

        @isset($categories)
            @empty($categories)
                <button class="text-gray-800 hover:text-gray-700 basis-auto">No Categories</button>
            @else
                @foreach ($categories as $category)
                    <a href="{{ url('/books/category/'.$category->categories.'/'. true) }}"
                        class="shadow rounded-xl p-3 bg-white hover:bg-gray-100 focus:outline-2 basis-auto">
                        {{ $category->categories }}</a>
                    {{-- <button
                        class="shadow rounded-xl p-3 bg-white hover:bg-gray-100 focus:outline-2 basis-auto">{{ $category->categories }}</button> --}}
                @endforeach
            @endempty
        @endisset

        {{-- <button class="shadow rounded-xl p-3 bg-white hover:bg-gray-100 focus:outline-2 basis-auto">Fiction</button>
        <button class="shadow rounded-xl p-3 bg-white hover:bg-gray-100 focus:outline-2 basis-auto">Non-Fiction</button>
        <button class="shadow rounded-xl p-3 bg-white hover:bg-gray-100 focus:outline-2 basis-auto">Science
            Fiction</button>
        <button class="shadow rounded-xl p-3 bg-white hover:bg-gray-100 focus:outline-2 basis-auto">Biography</button>
        <button class="shadow rounded-xl p-3 bg-white hover:bg-gray-100 focus:outline-2 basis-auto">Mystery</button>
        <button class="shadow rounded-xl p-3 bg-white hover:bg-gray-100 focus:outline-2 basis-auto">Romance</button>
        <button class="shadow rounded-xl p-3 bg-white hover:bg-gray-100 focus:outline-2 basis-auto">Fantasy</button> --}}
    </div>

    <a href="{{ url('/') }}"
        class="shadow rounded-xl p-3 bg-white hover:bg-gray-100 focus:outline-2 basis-auto">Back Home</a>
    <!-- Walk as if you are kissing the Earth with your feet. - Thich Nhat Hanh -->
</div>
