@extends('layout.app')

@section('content')
    <div class="p-6">
        <div class="flex flex-col gap-6 w-full h-full">
            <!-- Header -->
            <div class="bg-amber-50 rounded-xl shadow p-5 flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold">Book Details</h1>
                    <p class="text-gray-500 text-sm">Comprehensive information about this book.</p>
                </div>

                <a href="{{ url('/books') }}"
                    class="px-4 py-2 rounded-lg border border-gray-200 shadow-sm bg-highlight hover:bg-green-800 transition text-white text-sm font-medium">
                    ← Back
                </a>
            </div>

            <!-- Main Content -->
            <div class="flex flex-row gap-6 h-full w-full">
                <!-- Left Sidebar (Book Cover & Basic Info) -->
                <div class="bg-amber-50 rounded-xl shadow p-4 flex flex-col gap-3 w-[320px] shrink-0">
                    <img src="{{ asset('storage/book-covers/' . $book->thumbnail) }}" alt="Book Cover"
                        class="w-full h-80 object-cover rounded-lg shadow-sm"
                        onerror="this.onerror=null;this.src='{{ asset('storage/images/book-cover-placeholder.jpeg') }}';" />

                    <div class="flex flex-col gap-1">
                        <h2 class="text-lg font-semibold">{{ $book->title }}</h2>
                        <p class="text-gray-600 text-sm">{{ $book->authors }}</p>
                        <p class="text-gray-500 text-sm italic">
                            {{ $book->subtitle ?? 'No subtitle available.' }}
                        </p>
                    </div>
                </div>

                <!-- Right Content (Details + Description) -->
                <div class="bg-amber-50 rounded-xl shadow p-6 flex flex-col gap-4 flex-1 overflow-y-auto">
                    <h2 class="text-xl font-semibold border-b pb-2">About the Book</h2>

                    <dl class="grid grid-cols-2 gap-x-6 gap-y-3 text-sm">
                        <div>
                            <dt class="font-medium text-gray-700">ISBN</dt>
                            <dd class="text-gray-600">{{ $book->industryIdentifiers ?? 'N/A' }}</dd>
                        </div>
                        <div>
                            <dt class="font-medium text-gray-700">Available Copies</dt>
                            <dd class="text-gray-600">{{ $book->available_copies ?? 'N/A' }}</dd>
                        </div>
                        <div>
                            <dt class="font-medium text-gray-700">Page Count</dt>
                            <dd class="text-gray-600">{{ $book->pageCount ?? 'N/A' }}</dd>
                        </div>
                        <div>
                            <dt class="font-medium text-gray-700">Publisher</dt>
                            <dd class="text-gray-600">{{ $book->publisher ?? 'N/A' }}</dd>
                        </div>
                        <div class="col-span-2">
                            <dt class="font-medium text-gray-700">Categories</dt>
                            <dd class="text-gray-600">{{ $book->categories ?? 'N/A' }}</dd>
                        </div>
                        <div class="col-span-2">
                            <dt class="font-medium text-gray-700">Published Date</dt>
                            <dd class="text-gray-600">{{ $book->publishedDate ?? 'N/A' }}</dd>
                        </div>
                    </dl>

                    <div>
                        <h3 class="font-medium text-gray-700 mb-1">Description</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            {{ $book->description ?? 'No description available for this book.' }}
                        </p>
                    </div>

                    {{-- Action buttons (future use) --}}
                    {{--
                    <div class="flex gap-3 mt-4">
                        <a href="{{ url($book->previewLink) }}"
                            class="px-4 py-2 rounded-lg border shadow-sm hover:bg-gray-100 text-sm">
                            Read Book
                        </a>
                        <a href="{{ url($book->infoLink) }}"
                            class="px-4 py-2 rounded-lg border shadow-sm hover:bg-gray-100 text-sm">
                            More Details
                        </a>
                    </div>
                    --}}
                </div>
            </div>
        </div>
    </div>
@endsection
