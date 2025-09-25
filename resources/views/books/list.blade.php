@extends('layout.app')

@section('content')
    <div class="p-4 h-screen w-screen">
        <div class="flex flex-row gap-4 h-full w-full">
            <div class="basis-auto">
                @include('components.sidebar')
            </div>
            <div class="basis-full flex flex-col gap-4">
                <div class="bg-amber-50 rounded-xl shadow p-4 basis-auto">
                    <div class="flex flex-row gap-3 items-center mb-2">
                        <h1 class="text-2xl font-semibold">Book List</h1>
                        <p class="text-gray-600">A collection of books available in the library.</p>
                    </div>

                    <!-- Knowledge is power. - Francis Bacon -->
                    {{-- search tab --}}
                    <form action="{{ url('books_search') }}" class="flex flex-row gap-2" method="GET"
                        >
                        {{-- @csrf --}}
                        <input type="text" name="search" id="search" placeholder="Search Book..."
                            class="w-full p-2 border border-gray-300 rounded-xl col-span-full" value="" />
                        <button type="submit"
                            class="bg-highlight rounded-xl shadow-md p-3 px-4 hover:bg-green-800 whitespace-nowrap text-white">Search
                            Book</button>
                    </form>

                </div>
                <div class="bg-amber-50 rounded-xl shadow p-4 h-full basis-full overflow-auto">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4">
                        @foreach ($books as $book)
                            @include('components.books_card', [
                                'id' => $book->id,
                                'title' => $book->title,
                                'author' => $book->authors,
                                'coverImage' => $book->thumbnail,
                            ])
                        @endforeach
                    </div>
                </div>
                <div class="bg-amber-50 rounded-xl shadow p-4 basis-auto flex flex-row gap-4 items-center justify-between">
                    <p class="text-gray-600">All Books: {{ $all_books }}</p>
                    {{-- <p class="text-gray-600">current Books: {{ $books->count() }}</p> --}}
                    <!-- Knowledge is power. - Francis Bacon -->
                    {{ $books->links('vendor.pagination.my-custom-pagination') }}
                    {{-- {{ $students->links('vendor.pagination.custom') }} --}}
                </div>
            </div>
        </div>
        <!-- Walk as if you are kissing the Earth with your feet. - Thich Nhat Hanh -->
    </div>
@endsection
