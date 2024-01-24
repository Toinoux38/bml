<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

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
        return view('books.create-book');
    }

    public function viewCreate()
    {
        // Redirect to the form for adding a new book
        return redirect('/add-book');
    }
}




