<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BookController extends Controller
{
    public function viewAllBooks()
    {
        $books = Book::get();
        return view('admin.books.viewAllBooks', [
            'books' => $books,
        ]);
    }

    public function createBook(Request $request)
    {
        try {
            $book = new Book();
            $book->book_code = Str::random(10);
            $book->name = $request->name;
            $book->library_id = $request->library_id;
            $book->genre_id = $request->genre_id;
            $book->save();
            return redirect()->back()->with(['success' => 'Book Created Successfully']);
        } catch (\Illuminate\Database\QueryException $qe) {
            return redirect()->back()->with(['error' => $qe->getMessage()]);
        } catch (Exception $e) {
            return redirect()->back()->with(['message' => $e->getMessage()]);
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }

    public function editBook($id)
    {
        $book = Book::where('id', $id)->first();
        return view('admin.books.viewEditBook', [
            'book' => $book,
        ]);
    }
}
