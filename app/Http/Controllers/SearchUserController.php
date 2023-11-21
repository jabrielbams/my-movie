<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SearchUserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::query();

        // Filter berdasarkan nama pengguna
        if ($request->has('search')) {
            $searchKeywords = explode(' ', $request->input('search'));
            foreach ($searchKeywords as $keyword) {
                $users->where('name', 'like', '%' . $keyword . '%');
            }
        }

        $users = $users->get();

        return view('pages.search.index_user', compact('users'));
    }
}
