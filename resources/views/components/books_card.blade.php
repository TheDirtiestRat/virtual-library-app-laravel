@props(['id', 'title', 'author', 'coverImage'])

<div class="bg-parchment rounded-xl shadow-md p-4 flex flex-col gap-1">
    <!-- Book Cover -->
    <img src="{{ asset('storage/book-covers/' . $coverImage) }}" alt="Book Cover for {{ $title }}"
        class="w-full h-auto object-cover rounded-lg shadow-sm"
        onerror="this.onerror=null;this.src='{{ asset('storage/images/book-cover-placeholder.png') }}';" />


    <!-- Book Info -->
    <div class="flex flex-col gap-1">
        <h2 class="text-md font-semibold text-gray-800">{{ $title }}</h2>
        <p class="text-sm text-gray-600">{{ $author }}</p>
    </div>

    <!-- Action -->
    <a href="{{ url('/books/' . $id) }}" class="mt-auto text-center rounded-lg px-4 py-2 bg-amber-100 border border-amber-100
              shadow-sm hover:bg-amber-200 hover:shadow-md transition">
        View Details
    </a>
</div>
