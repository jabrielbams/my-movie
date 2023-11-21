<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $books = Book::query();

        // Filter berdasarkan judul buku
        if ($request->has('search')) {
            $searchKeywords = explode(' ', $request->input('search'));
            foreach ($searchKeywords as $keyword) {
                $books->where('title', 'like', '%' . $keyword . '%');
            }
        }

        $books = $books->get();

        return view('pages.search.index_book', compact('books'));
    }
}
