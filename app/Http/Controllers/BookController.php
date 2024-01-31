<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Book;
class BookController extends Controller
{
    public function index()
    {
        $books = DB::table('book')->paginate(20); // Change 10 to the desired number of books per page
        return view('dashboard', compact('books'));
    }

    public function actionmenu()
    {
         // Change 10 to the desired number of books per page
        return view('action');
    }
    public function create()
    {
        return view('dashboard'); // Return the dashboard view where the modal is located
    }

    public function store(Request $request)
{
    // Validate the request data
    $validatedData = $request->validate([
        'title' => 'required',
        'ISBN' => 'required',
        // Add more validation rules as per your book model
    ]);

    // Calculate the new bookID
    $maxBookID = Book::max('bookID');
    $newBookID = $maxBookID + 1;

    // Create a new book instance
    $book = new Book;
    $book->bookID = $newBookID;
    $book->title = $validatedData['title'];
    $book->ISBN = $validatedData['ISBN'];
    // Set other attributes as per your book model

    // Save the book to the database
    $book->save();

    // Redirect back to the dashboard with a success message
    return redirect('/dashboard')->with('success', 'Book added successfully');
}
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        // You can return a response if needed
        return response()->json(['message' => 'Book deleted successfully']);
    }

}




