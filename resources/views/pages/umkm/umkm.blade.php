@extends('layouts.admin.app')

@section('content')
    <div class="py-4">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item">
                    <a href="#">
                        <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('umkm.index') }}">UMKM</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Usaha</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Tambah Unit Usaha</h1>
                <p class="mb-0">Form untuk mendaftarkan UMKM baru milik warga.</p>
            </div>
        </div>
    </div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-0 shadow components-section">
                <div class="card-body">
                    <form action="{{ route('umkm.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <div class="col-lg-4 col-sm-6">
                                <div class="mb-3">
                                    <label for="nama_usaha" class="form-label">Nama Usaha</label>
                                    <input type="text" id="nama_usaha" name="nama_usaha" class="form-control"
                                        value="{{ old('nama_usaha') }}" placeholder="Contoh: Warung Berkah" required>
                                </div>

                                <div class="mb-3">
                                    <label for="kategori" class="form-label">Kategori</label>
                                    <select id="kategori" name="kategori" class="form-select" required>
                                        <option value="">-- Pilih Kategori --</option>
                                        <option value="Makanan & Minuman">Makanan & Minuman</option>
                                        <option value="Kerajinan">Kerajinan</option>
                                        <option value="Jasa">Jasa</option>
                                        <option value="Fashion">Fashion</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                   <label for="warga_id" class="form-label">Pemilik (Warga)</label>
<select name="warga_id" id="warga_id" class="form-select" required>
    <option value="">-- Pilih Pemilik --</option>
    @foreach($dataWarga as $warga)
        <option value="{{ $warga->warga_id }}">
            {{ $warga->first_name }} {{ $warga->last_name }}
        </option>
    @endforeach
</select>
                                </div>
                            </div>

                            <div class="col-lg-4 col-sm-6">
                                <div class="mb-3">
                                    <label for="kontak" class="form-label">No. WhatsApp/Telepon</label>
                                    <input type="text" id="kontak" name="kontak" class="form-control" 
                                        placeholder="0812..." required>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="rt" class="form-label">RT</label>
                                        <input type="text" id="rt" name="rt" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="rw" class="form-label">RW</label>
                                        <input type="text" id="rw" name="rw" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-sm-12">
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat Usaha</label>
                                    <textarea id="alamat" name="alamat" class="form-control" rows="2" required></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi Singkat</label>
                                    <textarea id="deskripsi" name="deskripsi" class="form-control" rows="2"></textarea>
                                </div>

                                <div class="mb-3">
        <label for="logo">Logo UMKM</label>
        <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror">
        <small class="text-muted">Format: jpg, png, jpeg. Maks: 2MB</small>
        @error('logo') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary">
                                        Simpan <i class="fas fa-save ms-1"></i>
                                    </button>
                                    <a href="{{ route('umkm.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection