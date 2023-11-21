@extends('layouts.app')

@section('title', 'Edit Pengguna')

@section('content')
    <form action="{{ route('user.update', $user->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama Pengguna</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                placeholder="Masukkan nama pengguna" value="{{ $user->name }}">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                placeholder="Masukkan email pengguna" value="{{ $user->email }}">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Password Lama</label>
            <input type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password"
                placeholder="Masukkan password lama">
            @error('old_password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Password Baru</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                placeholder="Masukkan password baru">
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Konfirmasi Password Baru</label>
            <input type="password" class="form-control" name="password_confirmation" placeholder="Konfirmasi password baru">
        </div>

        <button type="submit" class="btn btn-primary">Edit Pengguna</button>
    </form>
@endsection
