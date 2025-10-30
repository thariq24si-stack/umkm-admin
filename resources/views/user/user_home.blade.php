@extends('layouts.admin.app')
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
                    <li class="breadcrumb-item"><a href="#">Warga</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah warga</li>
                </ol>
            </nav>
            <div class="d-flex justify-content-between w-100 flex-wrap">
                <div class="mb-3 mb-lg-0">
                    <h1 class="h4">Tambah warga</h1>
                    <p class="mb-0">Form untuk menambahkan data warga baru.</p>
                </div>
                <div>
                    <a href="{{ route('user.index') }}" class="btn btn-primary"><i class="far fa-question-circle me-1"></i> Kembali</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 mb-4">
                <div class="card border-0 shadow components-section">
                    <div class="card-body">
                       <form action="{{ route('user.store') }}" method="POST">
    @csrf
    
    <div>
        <label>Name</label>
        <input type="text" name="name" value="{{ old('name') }}" required>
        @error('name')
            <span style="color: red;">{{ $message }}</span>
        @enderror
    </div>
    
        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
        @error('email')
            <span style="color: red;">{{ $message }}</span>
        @enderror
    </div>
    
    <div>
        <label>Password</label>
        <input type="password" name="password" required>
        @error('password')
            <span style="color: red;">{{ $message }}</span>
        @enderror
    </div>
    
    <div>
        <label>Konfirmasi Password</label>
        <input type="password" name="password_confirmation" required>
    </div>
        
    
    <div class="mb-4">

    <button type="submit">Simpan</button>
    <a href="{{ route('user.index') }}">Batal</a>
</form>
                    </div>

                </div>
            </div>
        </div>

@endsection
