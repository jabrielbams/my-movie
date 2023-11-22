@extends('layouts.app')

@section('title', 'Hasil Pencarian Film')

@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Judul Film</th>
                <th scope="col">publisher</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Tahun Rilis</th>
                <th scope="col">Rating</th>
                <th scope="col">Genre</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movies as $movie)
                <tr>
                    <th scope="row">{{ $movie->id }}</th>
                    <td>{{ $movie->title }}</td>
                    <td>{{ $movie->publisher }}</td>
                    <td>{{ $movie->year }}</td>
                    <td>{{ $movie->description }}</td>
                    <td>{{ $movie->rating }}</td>
                    <td>{{ $movie->genre }}</td>
                    <td nowrap>
                        <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('movies.create') }}">
        <button class="btn btn-primary">Tambah Film</button>
    </a>
@endsection
