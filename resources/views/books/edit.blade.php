@extends('books.layout.book')

@section('title-Page')
    Update Book Details
@endsection

@section('page-Description')
    Detailed information about the book.
@endsection

@section('page-content')
    <form method="POST" action="{{ url('/books/manage/updateBook') }}" class=" h-full basis-full flex flex-row gap-4"
        enctype="multipart/form-data">
        @csrf
        <div class="bg-white rounded-xl p-4 basis-full">
            <div class="basis-full grid grid-cols-3 gap-2 h-full">

                {{-- form fields --}}
                <div class="col-span-1">
                    <label for="book_id">Book Id
                    </label>
                    <input type="number" name="book_id" id="book_id" placeholder="ID"
                        class="w-full p-2 border border-gray-300 rounded-xl read-only:bg-gray-300"
                        value="{{ $book->id }}" readonly />
                </div>

                <div class="col-span-2">
                    <label for="isbn">ISBN <span class="text-red-400">*</span> @error('isbn')
                            <span class="text-red-400">Enter ISBN</span>
                        @enderror
                    </label>
                    <div class="flex flex-row">
                        <input type="text" name="isbn" id="isbn" placeholder="ISBN"
                            class="w-full p-2 border border-gray-300 rounded-s-xl"
                            value="{{ $book->industryIdentifiers }}" />
                        <button type="button" id="isbn-exists"
                            class="bg-white px-4 border border-gray-300 p-2 h-auto rounded-e-xl hover:border-gray-300 hover:bg-gray-300 focus:outline-2 whitespace-nowrap">Check
                            ISBN</button>
                    </div>
                </div>

                {{-- other fields --}}
                <div class="col-span-full">
                    <label for="title">Book Title <span class="text-red-400">*</span> @error('title')
                            <span class="text-red-400">Enter Book Title</span>
                        @enderror
                    </label>
                    <input type="text" name="title" id="title" placeholder="Title"
                        class="w-full p-2 border border-gray-300 rounded-xl col-span-ful" value="{{ $book->title }}" />
                </div>

                <div class="col-span-1">
                    <label for="subtitle">subTitle
                    </label>
                    <input type="text" name="subtitle" id="subtitle" placeholder="Subtitle"
                        class="w-full p-2 border border-gray-300 rounded-xl" value="{{ $book->subtitle }}" />
                </div>

                <div class="col-span-1">
                    <label for="authors">Authors <span class="text-red-400">*</span> @error('authors')
                            <span class="text-red-400">Enter Authors</span>
                        @enderror
                    </label>
                    <input type="text" name="authors" id="authors" placeholder="Authors (comma separated)"
                        class="w-full p-2 border border-gray-300 rounded-xl" value="{{ $book->authors }}" />
                </div>

                <div class="col-span-1">
                    <label for="publisher">Publisher
                    </label>
                    <input type="text" name="publisher" id="publisher" placeholder="Publisher"
                        class="w-full p-2 border border-gray-300 rounded-xl" value="{{ $book->publisher }}" />
                </div>

                <div class="col-span-1">
                    <label for="publication_date">Publication Date
                    </label>
                    <input type="date" max="{{ date('Y-m-d') }}" name="publication_date" id="publication_date"
                        placeholder="Publication Date" class="w-full p-2 border border-gray-300 rounded-xl"
                        value="{{ $book->publishedDate }}" />
                </div>

                <div class="col-span-1">
                    <label for="available_copies">Available Copies
                    </label>
                    <input type="number" min="1" name="available_copies" id="available_copies"
                        placeholder="Available Copies" class="w-full p-2 border border-gray-300 rounded-xl"
                        value="{{ $book->available_copies }}" />
                </div>

                <div class="col-span-1">
                    <label for="categories">Categories <span class="text-red-400">*</span> @error('categories')
                            <span class="text-red-400">Enter Book Categories</span>
                        @enderror
                    </label>
                    <input type="text" name="categories" id="categories" placeholder="Categories"
                        class="w-full p-2 border border-gray-300 rounded-xl" value="{{ $book->categories }}" />
                </div>

                <div class="col-span-full">
                    <label for="available_copies">Description
                    </label>
                    <textarea name="description" id="description" cols="30" rows="5" placeholder="Description"
                        class="w-full p-2 border border-gray-300 rounded-xl col-span-full">{{ $book->description }}</textarea>
                </div>

                <button type="submit"
                    class="bg-gray-100 shadow-md border border-gray-300 p-3 rounded-xl hover:border-gray-300 hover:bg-gray-300 focus:outline-2 col-span-full">Update
                </button>
            </div>
        </div>
        <div class="bg-white rounded-xl p-3 flex flex-col gap-2 basis-auto">
            <label for="upload-book-cover"
                class="bg-white rounded-xl shadow p-4 flex flex-col gap-2 h-full basis-auto justify-center items-center border-3 border-dotted text-gray-400 hover:bg-gray-300 transition-all delay-75 duration-300 cursor-pointer text-center">
                <span>Upload Book Cover</span>
                <span>Recommended size: 1280x1920 pixels PNG, JPEG</span>
                {{-- <strong><span>Not Working yer (next update)</span></strong> --}}
                <img id="preview_img" src="{{ asset('storage/images/book-cover-placeholder.png') }}" alt="Book Cover"
                    class="rounded-xl shadow w-auto max-h-[200px] object-contain" srcset="">
                <input id="upload-book-cover" type="file" onchange="loadFile(event)" name="book_cover"
                    class="hidden" />
            </label>

            {{-- upload book pdf --}}
            <label for="upload-book-pdf"
                class="bg-white rounded-xl shadow p-4 flex flex-col gap-2 h-full basis-auto justify-center items-center border-3 border-dotted text-gray-400 hover:bg-gray-300 transition-all delay-75 duration-300 cursor-pointer text-center">
                <span>Upload Book PDF</span>
                <span>PDF</span>
                <strong><span>Not Working yer (next update)</span></strong>
                <input id="upload-book-pdf" type="file" name="previewLink" class="hidden" />
            </label>

            <button type="button" id="button_delete"
                class="bg-white rounded-xl shadow-md p-3 px-4 hover:bg-gray-300 border border-red-300">Delete
                Book</button>
        </div>
    </form>

    <form action="{{ url('/books/manage/delete/' . $book->id) }}" method="POST"
        onsubmit="return handleFormSubmission(event,'Are you sure you want to delete this Book?','Alert!','book_delete_form');"
        id="book_delete_form" class="hidden">
        @csrf
        @method('DELETE')
        {{-- <button type="submit"
            class="bg-white rounded-xl shadow-md p-3 px-4 hover:bg-gray-300 border border-red-300">Delete
            Book</button> --}}
    </form>

    <script type="module">
        $("#button_delete").click(function() {
            // console.log("deleting");
            $("#book_delete_form").submit()
        })
    </script>
    <script>
        var loadFile = function(event) {

            var input = event.target;
            var file = input.files[0];
            var type = file.type;

            var output = document.getElementById('preview_img');


            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>

    <!-- An unexamined life is not worth living. - Socrates -->
@endsection
