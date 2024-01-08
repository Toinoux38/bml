<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index()
    {
        $books = DB::table('book')->get();
        return view('dashboard', compact('books'));
    }
}



