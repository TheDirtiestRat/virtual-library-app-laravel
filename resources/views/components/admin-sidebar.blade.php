<div class="h-full min-w-[280px] flex flex-col gap-3">
    <div class="bg-amber-50 rounded-xl shadow p-4 relative">
        <div class="flex flex-col items-center justify-center">
            <h1 class="text-2xl text-ink font-semibold">ACLC</h1>
            <h1 class="text-2xl text-ink font-semibold">Virtual Library</h1>
        </div>
    </div>
    {{-- Admin Options --}}

    <form action="{{ route('import-book.csv') }}" method="POST" enctype="multipart/form-data"
        class="flex flex-col gap-2">
        @csrf
        <input type="file" name="csv_file" accept=".csv" class="shadow border border-gray-200 bg-amber-50 p-2 rounded-lg text-sm cursor-pointer
                  file:mr-2 file:rounded-md file:border-0 file:bg-amber-100 file:px-3 file:py-1
                  hover:border-gray-300 focus:outline-2 w-full">

        <div class="flex flex-row gap-2">
            <button type="submit"
                class="flex-1 bg-highlight text-white px-4 py-2 rounded-lg shadow hover:bg-green-800 transition text-sm">
                <i class="bi bi-upload pr-1"></i>
                Import CSV
            </button>
            <a href="{{ url('/books/manage/addBook') }}"
                class="flex-1 shadow rounded-lg px-4 py-2 text-sm text-center bg-highlight text-white hover:bg-green-800 transition font-medium">
                <i class="bi bi-plus-circle pr-2"></i>
                Add Book
            </a>
        </div>
    </form>


    <div class="flex flex-col gap-2 overflow-y-auto px-1">
        <h1 class="text-xl font-semibold">Categories</h1>

        @isset($categories)
            @empty($categories)
                <p class="text-gray-500 italic">No Categories</p>
            @else
                @foreach ($categories as $category)
                    <a href="{{ url('/books/category', $category->categories) }}"
                        class="shadow rounded-xl p-3 bg-parchment hover:bg-gray-200 focus:outline-2 transition">
                        {{ $category->categories }}
                    </a>
                    {{-- <button class="shadow rounded-xl p-3 bg-white hover:bg-gray-100 focus:outline-2 basis-auto">{{
                        $category->categories }}</button> --}}
                @endforeach
            @endempty
        @endisset

        {{-- <button
            class="shadow rounded-xl p-3 bg-white hover:bg-gray-100 focus:outline-2 basis-auto">Fiction</button>
        <button class="shadow rounded-xl p-3 bg-white hover:bg-gray-100 focus:outline-2 basis-auto">Non-Fiction</button>
        <button class="shadow rounded-xl p-3 bg-white hover:bg-gray-100 focus:outline-2 basis-auto">Science
            Fiction</button>
        <button class="shadow rounded-xl p-3 bg-white hover:bg-gray-100 focus:outline-2 basis-auto">Biography</button>
        <button class="shadow rounded-xl p-3 bg-white hover:bg-gray-100 focus:outline-2 basis-auto">Mystery</button>
        <button class="shadow rounded-xl p-3 bg-white hover:bg-gray-100 focus:outline-2 basis-auto">Romance</button>
        <button class="shadow rounded-xl p-3 bg-white hover:bg-gray-100 focus:outline-2 basis-auto">Fantasy</button>
        --}}
    </div>

    <a href="{{ url('/') }}"
        class="shadow rounded-xl text-white font-medium p-3 bg-highlight hover:bg-green-800 focus:outline-2 basis-auto">
        <i class="bi bi-arrow-left-circle-fill pr-2"></i>
        Back Home</a><!-- Walk as if you are kissing the Earth with your feet. - Thich Nhat Hanh -->
</div>
