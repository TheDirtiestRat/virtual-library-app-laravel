<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rules\File; // For advanced file validation
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    //
    public function show(): View
    {
        $books = Book::latest()->paginate(20);
        $categories = Book::select('categories')->distinct()->get();
        $all_books = Book::count();

        return view('books.list', compact('books', 'categories', 'all_books'));
    }

    public function details(string $book_id): View
    {
        return view('books.details', [
            'book' => Book::where('id', $book_id)->firstOrFail(),
        ]);
    }

    public function create(): View
    {
        return view('books.create');
    }
    public function edit(string $book_id): View
    {
        $book = Book::where('id', $book_id)->firstOrFail();

        // dd($book);

        return view('books.edit', compact('book'));
    }

    public function store(Request $request)
    {
        // Validate and store the new book
        $validatedData = $request->validate([
            'isbn' => 'required|string|max:13|unique:books,industryIdentifiers',
            'title' => 'required|string|max:255|unique:books,title',
            'subtitle' => 'nullable|string|max:255',
            'authors' => 'nullable|string|max:255',
            'publisher' => 'nullable|string|max:255',
            'publication_date' => 'nullable|date',
            'description' => 'nullable|string',
            'pageCount' => 'nullable|integer',
            'categories' => 'required|string|max:255',

            // 'thumbnail' => 'nullable|url',
            // 'industryIdentifiers' => 'nullable|string|max:255',
            'previewLink' => 'nullable|string',
            'infoLink' => 'nullable|string',

            'available_copies' => 'nullable|integer|min:0',

            // check file validation
            'book_cover' => ['nullable', File::types(['png', 'jpg', 'jpeg', 'gif'])->max(5 * 1024),],
        ]);

        $fileExtension = ($request->hasFile('book_cover')) ? $request->file('book_cover')->extension() : "png";
        $fileName = ($request->hasFile('book_cover')) ? time() . '_' . $validatedData['isbn'] . "." . $fileExtension : null;

        // Create the book
        Book::create([
            'title' => $validatedData['title'],
            'subtitle' => $validatedData['subtitle'] ?? null,
            'authors' => $validatedData['authors'] ?? null, // Store as comma-separated string
            'publisher' => $validatedData['publisher'] ?? null,
            'publishedDate' => $validatedData['publication_date'] ?? null, // this will throw an error
            'description' => $validatedData['description'] ?? null,
            'pageCount' => $validatedData['pageCount'] ?? null,
            'categories' => $validatedData['categories'] ?? null, // Store as comma-separated string

            'thumbnail' => $fileName ?? null,
            'industryIdentifiers' => $validatedData['isbn'] ?? null,
            'previewLink' => $validatedData['previewLink'] ?? null,
            'infoLink' => $validatedData['infoLink'] ?? null,

            'available_copies' => $validatedData['available_copies'] ?? 0,
        ]);

        // Store the file   
        if ($request->hasFile('book_cover')) {
            $path = $request->file('book_cover')->storeAs('book-covers', $fileName, 'public');
        }

        return redirect('/books/manage/addBook')->with('success', $validatedData['title'] . ' Book added successfully!');
        // return redirect('/books/manage')->with('success', 'Book added successfully!');
    }

    public function update(Request $request)
    {
        // Validate and store the new book
        $validatedData = $request->validate([
            'book_id' => 'required',
            'isbn' => 'required|string|max:13',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'authors' => 'nullable|string|max:255',
            'publisher' => 'nullable|string|max:255',
            'publication_date' => 'nullable|date',
            'description' => 'nullable|string',
            'pageCount' => 'nullable|integer',
            'categories' => 'required|string|max:255',

            // 'thumbnail' => 'nullable|url',
            // 'industryIdentifiers' => 'nullable|string|max:255',
            'previewLink' => 'nullable|string',
            'infoLink' => 'nullable|string',

            'available_copies' => 'nullable|integer|min:0',

            // check file validation
            'book_cover' => ['nullable', File::types(['png', 'jpg', 'jpeg', 'gif'])->max(5 * 1024),],
        ]);

        // find book
        $book = Book::where('id', $validatedData['book_id'])->first();

        // dd($validatedData['book_id']);

        if (!$book) {
            return redirect('/books/manage')->with('message', 'Book Not Found!');
        }

        // Handle file upload if present
        $fileExtension = ($request->hasFile('book_cover')) ? $request->file('book_cover')->extension() : "png";
        $fileName = ($request->hasFile('book_cover')) ? time() . '_' . $validatedData['isbn'] . "." . $fileExtension : $book->thumbnail;

        if ($request->hasFile('book_cover')) {
            // Delete old cover if exists
            if ($book->thumbnail && Storage::disk('public')->exists('book-covers/' . $book->thumbnail)) {
                Storage::disk('public')->delete('book-covers/' . $book->thumbnail);
            }
            $path = $request->file('book_cover')->storeAs('book-covers', $fileName, 'public');
        }

        // Update book fields
        $book->title = $validatedData['title'];
        $book->subtitle = $validatedData['subtitle'] ?? null;
        $book->authors = $validatedData['authors'] ?? null;
        $book->publisher = $validatedData['publisher'] ?? null;
        $book->publishedDate = $validatedData['publication_date'] ?? null;
        $book->description = $validatedData['description'] ?? null;
        $book->pageCount = $validatedData['pageCount'] ?? null;
        $book->categories = $validatedData['categories'] ?? null;
        $book->thumbnail = $fileName ?? $book->thumbnail;
        $book->industryIdentifiers = $validatedData['isbn'] ?? null;
        $book->previewLink = $validatedData['previewLink'] ?? null;
        $book->infoLink = $validatedData['infoLink'] ?? null;
        $book->available_copies = $validatedData['available_copies'] ?? $book->available_copies;

        $book->save();

        return redirect('/books/manage')->with('success', $validatedData['title'] . ' Book Updated successfully!');
        // return redirect('/books/manage')->with('success', 'Book added successfully!');
    }

    public function delete($book_id)
    {
        // dd($book_id);
        // deletes the data in the database
        $book = Book::where('id', $book_id)->first();

        if ($book->exists()) {
            // The record exists
            $book->delete();
        } else {
            // The record does not exist
            return redirect('/books/manage')->with('message', 'Book Not Found!');
        }

        // deletets the uploaded files
        if (Storage::disk('public')->exists('book-covers/' . $book->thumbnail)) {
            Storage::disk('public')->delete('book-covers/' . $book->thumbnail);
        }

        return redirect('/books/manage')->with('success', 'Book deleted successfully!');
    }

    public function manage(): View
    {
        $books = Book::latest()->paginate(50);
        $categories = Book::select('categories')->distinct()->get();
        $all_books = Book::count();

        // dd("manage is open");

        return view('books.manage', compact('books', 'categories', 'all_books'));
    }

    public function getBookByCategory(string $category,$is_manage)
    {
        $books = Book::where('categories', $category)->paginate(20);
        // dd($is_manage);
        $categories = Book::select('categories')->distinct()->get();
        $all_books = Book::count();

        if ($is_manage) {
            return view('books.manage', compact('books', 'categories', 'all_books'));
        }

        return view('books.list', compact('books', 'categories', 'all_books'));
    }

    public function searchBook(Request $request)
    {
        $searchFor = $request->input('for_manage');
        $query = $request->input('search');

        if ($query) {
            $books = Book::where('title', 'like', '%' . $query . '%')
                ->orWhere('industryIdentifiers', 'like', $query . '%')
                ->paginate(50);
        } else {
            $books = Book::paginate(50);
        }
        // $validatedData = $request->validate([
        //     'search' => 'nullable|string|max:255',
        // ]);

        // $books = Book::where('title', 'like', $validatedData['search'] ?? null . '%')->get();
        // dd($books);

        $categories = Book::select('categories')->distinct()->get();
        $all_books = Book::count();

        if ($searchFor) {
            return view('books.manage', compact('books', 'categories', 'all_books'));
        }

        return view('books.list', compact('books', 'categories', 'all_books'));
    }

    public function getBookAPI(string $isbn)
    {
        $response = Http::withOptions([
            'verify' => false,
        ])->get('https://www.googleapis.com/books/v1/volumes', [
            'q' => 'isbn:' . $isbn,
        ]);


        if ($response->successful()) {
            $data = $response->json(); // Get data as an associative array
            // Process the data
            return response()->json($data);
        } else {
            // Handle the error, e.g., log it or return an error message
            $statusCode = $response->status();
            $errorMessage = $response->body();

            return response()->json([
                'error' => 'Failed to fetch data from API',
                'status_code' => $statusCode,
                'message' => $errorMessage,
            ], $statusCode);
        }
    }

    public function import(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt|max:2048', // Adjust validation as needed
        ]);

        $file = $request->file('csv_file');
        $filePath = $file->getPathname();

        // Open the CSV file
        if (($handle = fopen($filePath, 'r')) !== FALSE) {
            // Read the first row (header)
            $header = fgetcsv($handle, 1000, ',');

            // Loop through each row of the CSV
            while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
                // Map CSV data to your model attributes
                // Ensure the order matches your CSV columns
                $yourModel = new Book();

                // dd($data);

                $yourModel->title = $data[4] ?? "no title";
                $yourModel->subtitle = $data[22] ?? "no subtitle";
                $yourModel->authors = $data[3];
                $yourModel->publisher = $data[26] ?? "no publisher";
                $yourModel->publishedDate = $data[2];
                $yourModel->description = $data[10] ?? "no description";
                $yourModel->pageCount = $data[17] ?? 0;
                $yourModel->categories = $data[33] ?? "no categories";
                $yourModel->thumbnail = "";
                $yourModel->industryIdentifiers = $data[6] ?? "no isbn";
                $yourModel->previewLink = "";
                $yourModel->infoLink = "";
                $yourModel->available_copies = 1;
                // ... add more columns as needed

                // dd($data[6]);

                $yourModel->save();
            }
            fclose($handle);
        }

        return redirect()->back()->with('success', 'CSV imported successfully!');
    }
}
