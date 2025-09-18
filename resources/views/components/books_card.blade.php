@props(['id', 'title', 'author', 'coverImage'])

<div class="bg-white rounded-xl shadow-md p-3 flex flex-col gap-2">
    <div class="basis-full flex flex-col gap-2">
        @if ($coverImage)
            <img src="{{ asset('storage/book-covers/' . $coverImage) }}" alt="Book Cover"
                class="w-full h-auto rounded-xl shadow" srcset="">
        @else
            <img src="{{ asset('storage/images/book-cover-placeholder.png') }}" alt="Book Cover"
                class="w-full h-auto rounded-xl shadow" srcset="">
        @endif
        <h2 class="font-semibold">{{ $title }}</h2>
        <p class="text-gray-600 text-sm">{{ $author }}</p>
    </div>
    <div class="basis-auto flex flex-col gap-2">
        <a href="{{ url('/books/' . $id) }}" class="border border-gray-300 shadow rounded-xl p-3 hover:bg-gray-100 hover:shadow-lg focus:outline-2">View
            Details</a>
    </div>

    <!-- Order your soul. Reduce your wants. - Augustine -->
</div>
