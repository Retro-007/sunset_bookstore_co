<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use App\Models\Library;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    //
    public function viewAllGenre()
    {
        $genres = Genre::get();
        return view('admin.genres.viewAllGenres', [
            'genres' => $genres,
        ]);
    }
    public function viewSingleGenreBooks($id)
    {
        $book = Book::where('genre_id', $id)->first();
        return view('admin.genres.viewSingleGenreBooks', [
            'book' => $book,
        ]);
    }
    public function viewAllLibraries()
    {
        $libraries = Library::get();
        return view('admin.libararies.viewAllLibraries', [
            'libraries' => $libraries,
        ]);
    }

    public function viewSingleLibraryBooks($id)
    {
        $books = Book::where('library_id', $id)->get();
        return view('admin.libararies.viewSingleLibraryBooks', [
            'books' => $books,
        ]);
    }
}
