@extends('books.layout.book')

@section('title-Page')
    Add New Books
@endsection

@section('page-Description')
    Detailed information about the book.
@endsection

@section('page-content')
    <form method="POST" action="{{ url('/books/manage/storeBook') }}" class=" h-full basis-full flex flex-row gap-4"
        enctype="multipart/form-data">
        @csrf
        <div class="bg-amber-50 rounded-xl p-4 basis-full">
            <div class="basis-full grid grid-cols-3 gap-2 h-full">

                {{-- form fields --}}
                <div class="col-span-full">
                    <label for="isbn">ISBN <span class="text-red-400">*</span> @error('isbn')
                        <span class="text-red-400">Enter ISBN</span>
                    @enderror
                    </label>
                    <div class="flex flex-row">
                        <input type="text" name="isbn" id="isbn" placeholder="ISBN"
                            class="w-full p-2 bg-white border border-gray-300 rounded-s-xl" required value="" />
                        <button type="button" id="isbn-exists"
                            class="bg-amber-100 hover:bg-amber-200 px-4 border border-gray-300 p-2 h-auto rounded-e-xl hover:border-gray-300 focus:outline-2 whitespace-nowrap">Check
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
                        class="w-full p-2 bg-white border  border-gray-300 rounded-xl col-span-ful" required value="" />
                </div>

                <div class="col-span-1">
                    <label for="subtitle">subTitle
                    </label>
                    <input type="text" name="subtitle" id="subtitle" placeholder="Subtitle"
                        class="w-full p-2 bg-white border border-gray-300 rounded-xl" />
                </div>

                <div class="col-span-1">
                    <label for="authors">Authors <span class="text-red-400">*</span> @error('authors')
                            <span class="text-red-400">Enter Authors</span>
                        @enderror
                    </label>
                    <input type="text" name="authors" id="authors" placeholder="Authors (comma separated)"
                        class="w-full p-2 border border-gray-300 rounded-xl" value="" />
                </div>

                <div class="col-span-1">
                    <label for="publisher">Publisher
                    </label>
                    <input type="text" name="publisher" id="publisher" placeholder="Publisher"
                        class="w-full p-2 border border-gray-300 rounded-xl" />
                </div>

                <div class="col-span-1">
                    <label for="publication_date">Publication Date
                    </label>
                    <input type="date" max="{{ date('Y-m-d') }}" name="publication_date" id="publication_date"
                        placeholder="Publication Date" class="w-full p-2 border border-gray-300 rounded-xl" />
                </div>

                <div class="col-span-1">
                    <label for="available_copies">Available Copies
                    </label>
                    <input type="number" min="1" name="available_copies" id="available_copies"
                        placeholder="Available Copies" class="w-full p-2 border border-gray-300 rounded-xl" />
                </div>
                <input type="text" name="subtitle" id="subtitle" placeholder="Subtitle"
                    class="w-full p-2 bg-white border border-gray-300 rounded-xl mb-2" />
                <input type="text" name="authors" id="authors" placeholder="Authors (comma separated)"
                    class="w-full p-2 bg-white border border-gray-300 rounded-xl mb-2 @error('authors') border-red-500 @enderror"
                    value="" />
                <input type="text" name="publisher" id="publisher" placeholder="Publisher"
                    class="w-full p-2 bg-white border border-gray-300 rounded-xl mb-2" />
                <input type="date" max="{{ date('Y-m-d') }}" name="publication_date" id="publication_date"
                    placeholder="Publication Date" class="w-full p-2 bg-white border border-gray-300 rounded-xl mb-2" />
                <input type="number" min="1" name="page_count" id="page_count" placeholder="Page Count"
                    class="w-full p-2 bg-white border border-gray-300 rounded-xl mb-2" />
                <input type="number" min="1" name="available_copies" id="available_copies" placeholder="Available Copies"
                    class="w-full p-2 bg-white border border-gray-300 rounded-xl mb-2" />

                <div class="col-span-1">
                    <label for="categories">Categories <span class="text-red-400">*</span> @error('categories')
                            <span class="text-red-400">Enter Book Categories</span>
                        @enderror
                    </label>
                    <input type="text" name="categories" id="categories" placeholder="Categories"
                        class="w-full p-2 bg-white border border-gray-300 rounded-xl" />
                </div>

                <div class="col-span-full">
                    <label for="available_copies">Description
                    </label>
                    <textarea name="description" id="description" cols="30" rows="5" placeholder="Description"
                        class="w-full p-2 bg-white border border-gray-300 rounded-xl col-span-full"></textarea>
                </div>

                <button type="submit"
                    class="bg-highlight text-md font-semibold text-white hover:bg-green-800 shadow-md border border-gray-200 p-3 rounded-xl hover:border-gray-30 focus:outline-2 col-span-full">Add
                    Book</button>
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
                <strong><span>Not working yet (next update)</span></strong>
                <input id="upload-book-pdf" type="file" name="previewLink" class="hidden" />
            </label>
        </div>
    </form>

    <script>
        var loadFile = function (event) {

            var input = event.target;
            var file = input.files[0];
            var type = file.type;

            var output = document.getElementById('preview_img');


            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function () {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
@endsection
