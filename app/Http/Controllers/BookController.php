<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Book;
class BookController extends Controller
{

    public function index(Request $request)
    {
        $query = $request->input('search');

        // Conditionally apply search filters
        $booksQuery = Book::query();
        if ($query) {
            $booksQuery->where('ISBN', 'like', "%$query%")
                ->orWhere('title', 'like', "%$query%");
        }

        $books = $booksQuery->paginate(20);

        return view('dashboard', compact('books'));
    }


    public function actionmenu()
    {

        return view('action');
    }
    public function create()
    {
        return view('dashboard');
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'title' => 'required',
        'ISBN' => 'required',
    ]);

    $maxBookID = Book::max('bookID');
    $newBookID = $maxBookID + 1;

    $book = new Book;
    $book->bookID = $newBookID;
    $book->title = $validatedData['title'];
    $book->ISBN = $validatedData['ISBN'];

    $book->save();

    return redirect('/dashboard')->with('success', 'Book added successfully');
}
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        // You can return a response if needed
        return redirect('/dashboard')->with('success', 'Book deleted successfully');
    }

    public function show(Book $book)
    {
        return view('showbook', compact('book'));
    }
}




