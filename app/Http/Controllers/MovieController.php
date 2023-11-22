<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovieRequest;
use App\Models\Movies;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( Request $request)
    {
        $movies = Movies::query();

        if ($request->has('search')) {
            $movies->where('title', 'like', '%' . $request->input('search') . '%');
        }

        $movies = $movies->get();

        return view('pages.search.index_movie', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.movie.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $movies = Movies :: create($request->all());
        $movies -> save();
        // dd($movies);

        return redirect()->route('movies.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $movie = Movies::findOrFail($id);

        return view('pages.movie.edit', compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $movie = Movies::findOrFail($id);

        $data = $request->all();

        $movie->update($data);

        return redirect()->route('movies.index')->with('success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movie = Movies::findOrFail($id);

        $movie->delete();

        return redirect()->route('movies.index')->with('success', 'Data Berhasil Dihapus');
    }
}
