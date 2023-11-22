@extends('layouts.app')

@section('title', 'Tambah Film')

@section('content')
    <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Judul Film</label>
            <input type="text" placeholder="Masukkan judul film"
                class="form-control @error('title')
                is-invalid
            @enderror" name="title">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Publisher</label>
            <input type="text" placeholder="Masukkan publisher film"
                class="form-control @error('publisher')
                is-invalid
            @enderror" name="publisher">
            @error('publisher')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Tahun Rilis</label>
            <input type="text" placeholder="Masukkan tahun rilis"
                class="form-control @error('year')
                is-invalid
            @enderror" name="year">
            @error('year')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea placeholder="Masukkan deskripsi film"
                class="form-control @error('description')
                is-invalid
            @enderror" name="description"></textarea>
            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Rating Film</label>
            <select class="form-select @error('rating')
                is-invalid
            @enderror" name="rating">
                <option selected disabled>Pilih Rating Film</option>
                <option value="Bad">Bad</option>,
                <option value="Good">Good</option>,
                <option value="Very Good">Very Good</option>,
                <option value="Oscar">Oscar</option>,
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <select class="form-select @error('genre')
                is-invalid
            @enderror" name="genre">
                <option selected disabled>Pilih Genre Film</option>
                <option value="Horor">Horor</option>,
                <option value="Komedi">Komedi</option>,
                <option value="Romance">Romance</option>,
                <option value="Biopik">Biopik</option>,
                <option value="Drama">Drama</option>,
                <option value="Lainnya">Lainnya</option>,
            </select>
        </div>
        <button type="submit" class="btn btn-primary mb-5">Tambah Film</button>
    </form>
@endsection
