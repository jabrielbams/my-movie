<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movies;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $movies = Movies::query();

        // Filter berdasarkan judul Film
        if ($request->has('search')) {
            $searchKeywords = explode(' ', $request->input('search'));
            foreach ($searchKeywords as $keyword) {
                $movies->where('title', 'like', '%' . $keyword . '%');
            }
        }

        $movies = $movies->get();

        return view('pages.search.index_movie', compact('movies'));
    }
}
