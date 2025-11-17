@extends('admin.Layouts.app')
@section('title', 'Tambah Mahasiswa')
@section('content')

<div class="py-4">
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item">
                <a href="#">
                    <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                </a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('mahasiswa.index') }}">Mahasiswa</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Mahasiswa</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Tambah Mahasiswa</h1>
            <p class="mb-0">Form untuk menambahkan data mahasiswa baru.</p>
        </div>
        <div>
            <a href="{{ route('mahasiswa.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left me-1"></i> Kembali</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 mb-4">
        <div class="card border-0 shadow components-section">
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> Terdapat kesalahan dalam input data.
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('mahasiswa.store') }}" method="POST">
                    @csrf
                    <div class="row mb-4">
                        <div class="col-lg-6 col-sm-12">
                            <!-- Name -->
                            <div class="mb-3">
                                <label for="nim" class="form-label">NIM <span class="text-danger">*</span></label>
                                <input type="text" id="nim" name="nim" class="form-control @error('nim') is-invalid @enderror" 
                                       value="{{ old('nim') }}" required>
                                @error('nim')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="nama_mahasiswa" class="form-label">Nama Mahasiswa <span class="text-danger">*</span></label>
                                <input type="text" id="nama_mahasiswa" name="nama_mahasiswa" class="form-control @error('nama_mahasiswa') is-invalid @enderror" 
                                       value="{{ old('nama_mahasiswa') }}" required>
                                @error('nama_mahasiswa')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                                       value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Password Confirmation -->
                            <div class="mb-3">
                                <label for="jurusan" class="form-label">Jurusan <span class="text-danger">*</span></label>
                                <input type="text" id="jurusan" name="jurusan" class="form-control @error('jurusan') is-invalid @enderror" 
                                       value="{{ old('jurusan') }}" required>
                                @error('jurusan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat <span class="text-danger">*</span></label>
                                <input type="text" id="alamat" name="alamat" class="form-control @error('alamat') is-invalid @enderror" 
                                       value="{{ old('alamat') }}" required>
                                @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Buttons -->
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save me-1"></i> Simpan
                                </button>
                                <a href="{{ route('mahasiswa.index') }}" class="btn btn-outline-secondary">
                                    <i class="fas fa-times me-1"></i> Batal
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection