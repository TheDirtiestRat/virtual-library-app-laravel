@extends('layout.app')

@section('content')
    <div class="p-4 ">
        <div class="basis-full flex flex-col gap-4 h-full w-full">
            <div class="bg-white rounded-xl shadow p-4 basis-auto flex flex-row justify-between items-center">
                <div class="">
                    <h1 class="text-2xl font-semibold">Book Details</h1>
                    <p class="text-gray-600">Detailed information about the book.</p>
                </div>

                <a href="{{ url('/books') }}"
                    class="shadow rounded-xl p-3 hover:bg-gray-100 focus:outline-2 basis-auto">Back</a>
                <!-- Knowledge is power. - Francis Bacon -->
            </div>
            <div class="w-full h-full basis-full flex flex-row gap-4">
                <div class="bg-white rounded-xl shadow p-4 flex flex-col gap-2 h-full w-[350px] basis-auto">
                    @if ($book->thumbnail)
                        <img src="{{ asset('storage/book-covers/' . $book->thumbnail) }}" alt="Book Cover"
                            class="w-full h-auto rounded-xl shadow" srcset="">
                    @else
                        <img src="{{ asset('storage/images/book-cover-placeholder.png') }}" alt="Book Cover"
                            class="rounded-xl shadow basis-auto " srcset="">
                    @endif
                    <h2 class="font-semibold text-lg w-full">{{ $book->title }}</h2>
                    <p class="text-gray-600">{{ $book->authors }}</p>
                    <p class="text-gray-600">{{ $book->subtitle ?? 'No subtitle available for this book.' }}</p>
                </div>
                <div class="bg-white rounded-xl shadow p-4 basis-full flex flex-col gap-2 overflow-y-auto">
                    <h2 class="text-xl font-semibold mb-2">About the Book</h2>
                    <p class="text-gray-700">
                        <span class="font-semibold">ISBN:</span>
                        {{ $book->industryIdentifiers ?? 'N/A' }}
                        <br>
                        <span class="font-semibold">Available Copies:</span>
                        {{ $book->available_copies ?? 'N/A' }}
                        <br>
                        <span class="font-semibold">Page Count:</span>
                        {{ $book->pageCount ?? 'N/A' }}
                        <br>
                        <span class="font-semibold">Publisher:</span>
                        {{ $book->publisher ?? 'N/A' }}
                        <br>
                        <span class="font-semibold">Categories:</span>
                        {{ $book->categories ?? 'N/A' }}
                        <br>
                        <span class="font-semibold">Published Date:</span>
                        {{ $book->publishedDate ?? 'N/A' }}
                    </p>
                    <div class="basis-full">
                        <p class="text-gray-700 h-full ">
                            <span class="font-semibold">Description:</span>
                            <br>
                            {{ $book->description ?? 'No description available for this book.' }}
                        </p>
                    </div>

                    <div class="basis-auto flex flex-row gap-3 w-full">
                        {{-- <form action="{{ url('/books/manage/delete/'. $book->id) }}" method="POST"
                            onsubmit="return handleFormSubmission(event,'Are you sure you want to delete this Book?','Alert!','book_delete_form');"
                            id="book_delete_form">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-white rounded-xl shadow-md p-3 px-4 hover:bg-gray-300 border border-red-300">Delete
                                Book</button>
                        </form> --}}
                        {{-- <a href="{{ url($book->previewLink) }}"
                            class="shadow rounded-xl p-3 hover:bg-gray-100 focus:outline-2 basis-auto">Read Book</a>
                        <a href="{{ url($book->infoLink) }}"
                            class="shadow rounded-xl p-3 hover:bg-gray-100 focus:outline-2 basis-auto">More Details</a> --}}
                    </div>
                    <!-- It is quality rather than quantity that matters. - Lucius Annaeus Seneca -->
                </div>
            </div>
        </div>
        <!-- It is quality rather than quantity that matters. - Lucius Annaeus Seneca -->
    </div>
@endsection
