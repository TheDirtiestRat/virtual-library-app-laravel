@extends('books.layout.book')

@section('title-Page')
    Update Book Details
@endsection

@section('page-Description')
    Detailed information about the book.
@endsection

@section('page-content')
    <form method="POST" action="{{ url('/books/manage/storeBook') }}" class=" h-full basis-full flex flex-row gap-4" enctype="multipart/form-data">
        @csrf
        <div class="bg-white rounded-xl p-4 basis-full">
            <div class="basis-full grid grid-cols-3 gap-2 h-full">
                
                {{-- form fields --}}
                <input type="text" name="isbn" id="isbn" placeholder="ISBN"
                    class="w-full p-2 border border-gray-300 rounded-xl mb-2 col-span-2 @error('isbn') border-red-500 @enderror"
                    required value="869876897587"/>
                {{-- button to check ISBN Availability --}}
                <button type="button" id="isbn-exists"
                    class="bg-white shadow-md border border-gray-200 p-2 mb-2 h-auto rounded-xl hover:border-gray-300 hover:bg-gray-300 focus:outline-2 col-span-1">Check
                    ISBN</button>
                {{-- other fields --}}
                <input type="text" name="title" id="title" placeholder="Title"
                    class="w-full p-2 border border-gray-300 rounded-xl mb-2 col-span-full @error('title') border-red-500 @enderror"
                    required value=""/>
                <input type="text" name="subtitle" id="subtitle" placeholder="Subtitle"
                    class="w-full p-2 border border-gray-300 rounded-xl mb-2" />
                <input type="text" name="authors" id="authors" placeholder="Authors (comma separated)"
                    class="w-full p-2 border border-gray-300 rounded-xl mb-2"  value="Test Authors  "/>
                <input type="text" name="publisher" id="publisher" placeholder="Publisher"
                    class="w-full p-2 border border-gray-300 rounded-xl mb-2" />
                <input type="date" max="{{ date('Y-m-d') }}" name="publication_date" id="publication_date"
                    placeholder="Publication Date" class="w-full p-2 border border-gray-300 rounded-xl mb-2" />
                <input type="number" min="1" name="page_count" id="page_count" placeholder="Page Count"
                    class="w-full p-2 border border-gray-300 rounded-xl mb-2" />
                <input type="number" min="1" name="available_copies" id="available_copies"
                    placeholder="Available Copies" class="w-full p-2 border border-gray-300 rounded-xl mb-2" />

                <input type="text" name="categories" id="categories" placeholder="Categories"
                    class="w-full p-2 border border-gray-300 rounded-xl mb-2 col-span-full" />

                <textarea name="description" id="description" cols="30" rows="5" placeholder="Description"
                    class="w-full p-2 border border-gray-300 rounded-xl col-span-full"></textarea>

                <button type="submit"
                    class="bg-white shadow-md border border-gray-200 p-3 rounded-xl hover:border-gray-300 hover:bg-gray-300 focus:outline-2 col-span-full">Update Book</button>
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
                <input id="upload-book-cover" type="file" onchange="loadFile(event)" name="book_cover" class="hidden" />
            </label>

            {{-- upload book pdf --}}
            <label for="upload-book-pdf"
                class="bg-white rounded-xl shadow p-4 flex flex-col gap-2 h-full basis-auto justify-center items-center border-3 border-dotted text-gray-400 hover:bg-gray-300 transition-all delay-75 duration-300 cursor-pointer text-center">
                <span>Upload Book PDF</span>
                <span>PDF</span>
                <strong><span>Not Working yer (next update)</span></strong>
                <input id="upload-book-pdf" type="file" name="previewLink" class="hidden" />
            </label>
        </div>
    </form>

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
