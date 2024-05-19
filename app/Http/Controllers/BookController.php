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

        // fonction de recherche
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
        $book = Book::find($id);

        if ($book->reservations()->exists()) {
            return redirect()->route('books.index')->with('error', 'Le livre est actuellement réservé et ne peut pas être supprimé.');
        }

        $book->delete();

        return redirect()->route('books.index')->with('success', 'Le livre a été supprimé avec succès.');
    }

    public function show(Book $book)
    {
        return view('showbook', compact('book'));
    }
}




