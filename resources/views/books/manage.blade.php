@extends('layout.app')

@section('content')
    <div class="p-4 h-screen w-screen">
        <div class="flex flex-row gap-4 h-full w-full">
            <div class="basis-auto">
                @include('components.admin-sidebar')
            </div>
            <div class="basis-full flex flex-col gap-4">
                <div class="bg-amber-50 rounded-xl shadow p-4 basis-auto">
                    <div class="flex flex-row gap-2 items-center justify-between w-full mb-1">
                        <h1 class="text-2xl font-semibold">Book List</h1>
                        <p class="text-gray-600">A collection of books available in the library.</p>
                    </div>
                    <!-- Knowledge is power. - Francis Bacon -->
                    {{-- search tab --}}
                    {{-- <form action="{{ url('books_search') }}" class="flex flex-row gap-2" method="GET">
                        <input type="text" name="search" id="search" placeholder="Search Book..."
                            class="w-full p-2 border border-gray-300 rounded-xl col-span-full" value="" />
                        <button type="submit"
                            class="bg-gray-200 rounded-xl shadow-md p-3 px-4 hover:bg-gray-300 whitespace-nowrap">Search
                            Book</button>
                    </form> --}}
                </div>
                <div class="bg-amber-50 rounded-xl shadow p-4 h-full basis-full overflow-auto">
                    {{-- list of books by table --}}
                    <table class="min-w-full table-auto">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 bg-bookmark text-white rounded-s-xl">ID</th>
                                <th class="px-4 py-2 bg-bookmark text-white">Title</th>
                                <th class="px-4 py-2 bg-bookmark text-white">Author</th>
                                <th class="px-4 py-2 bg-bookmark text-white">Copies</th>
                                <th class="px-4 py-2 bg-bookmark text-white rounded-e-xl">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                                <tr class="hover:bg-amber-100 border-b border-gray-200">
                                    <td class="px-4 py-2 truncate">{{ $book->id }}</td>
                                    <td class="px-4 py-2 ">{{ $book->title }}</td>
                                    <td class="px-4 py-2 ">{{ $book->authors }}</td>
                                    <td class="px-4 py-2 text-center">{{ $book->available_copies }}</td>
                                    <td class="px-4 py-2 w-1/6">
                                        <a href="{{ url('/books/' . $book->id) }}"
                                            class="text-gray-500 hover:underline">View Details</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="bg-amber-50 rounded-xl shadow p-4 basis-auto flex flex-row gap-4 justify-between items-center">
                    <p class="text-gray-600">All Books: {{ $all_books }}</p>
                    {{-- <p class="text-gray-600">current Books: {{ $books->count() }}</p> --}}

                    {{ $books->links('vendor.pagination.my-custom-pagination') }}
                    <!-- Knowledge is power. - Francis Bacon -->
                </div>
            </div>
        </div>
        <!-- I have not failed. I've just found 10,000 ways that won't work. - Thomas Edison -->

        @include('components.alert')
    </div>
@endsection
