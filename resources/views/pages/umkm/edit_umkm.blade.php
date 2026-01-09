@extends('layouts.admin.app')
@section('content')
    <div class="py-4">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">
                        <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('umkm.index') }}">UMKM</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Usaha</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Edit Unit Usaha</h1>
                <p class="mb-0">Ubah informasi usaha: <strong>{{ $umkm->nama_usaha }}</strong></p>
            </div>
            <div>
                <a href="{{ route('umkm.index') }}" class="btn btn-outline-gray-600">Kembali</a>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow mb-4">
        <div class="card-body p-4">
            {{-- Perhatikan action route-nya mengarah ke umkm.update --}}
            <form action="{{ route('umkm.update', $umkm->umkm_id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-4">
                    {{-- KOLOM KIRI: INFO USAHA --}}
                    <div class="col-md-7">
                        <h5 class="mb-3 text-info">Profil UMKM</h5>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="nama_usaha" class="form-label fw-bold">Nama Usaha</label>
                                <input type="text" id="nama_usaha" name="nama_usaha" class="form-control"
                                    value="{{ old('nama_usaha', $umkm->nama_usaha) }}" required>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="kategori" class="form-label fw-bold">Kategori</label>
                                <select id="kategori" name="kategori" class="form-select" required>
                                    <option value="Makanan & Minuman" {{ $umkm->kategori == 'Makanan & Minuman' ? 'selected' : '' }}>Makanan & Minuman</option>
                                    <option value="Kerajinan" {{ $umkm->kategori == 'Kerajinan' ? 'selected' : '' }}>Kerajinan</option>
                                    <option value="Jasa" {{ $umkm->kategori == 'Jasa' ? 'selected' : '' }}>Jasa</option>
                                    <option value="Fashion" {{ $umkm->kategori == 'Fashion' ? 'selected' : '' }}>Fashion</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="warga_id" class="form-label fw-bold">Pemilik</label>
                                <select id="warga_id" name="warga_id" class="form-select" required>
                                    @foreach($dataWarga as $warga)
                                        <option value="{{ $warga->warga_id }}" {{ $umkm->warga_id == $warga->warga_id ? 'selected' : '' }}>
                                            {{ $warga->first_name }} {{ $warga->last_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="kontak" class="form-label fw-bold">Kontak (WhatsApp)</label>
                                <input type="text" id="kontak" name="kontak" class="form-control"
                                    value="{{ old('kontak', $umkm->kontak) }}" required>
                            </div>
                        </div>
                    </div>

                    {{-- KOLOM KANAN: LOKASI --}}
                    <div class="col-md-5 border-start ps-md-4">
                        <h5 class="mb-3 text-info">Lokasi & Deskripsi</h5>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="rt" class="form-label fw-bold">RT</label>
                                <input type="text" id="rt" name="rt" class="form-control" value="{{ old('rt', $umkm->rt) }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="rw" class="form-label fw-bold">RW</label>
                                <input type="text" id="rw" name="rw" class="form-control" value="{{ old('rw', $umkm->rw) }}" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label fw-bold">Alamat Lengkap</label>
                            <textarea id="alamat" name="alamat" class="form-control" rows="2" required>{{ old('alamat', $umkm->alamat) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label fw-bold">Deskripsi Singkat</label>
                            <textarea id="deskripsi" name="deskripsi" class="form-control" rows="3">{{ old('deskripsi', $umkm->deskripsi) }}</textarea>
                        </div>
                    </div>

                    {{-- BUTTONS --}}
                    <div class="col-12 text-end border-top pt-4">
                        <a href="{{ route('umkm.index') }}" class="btn btn-link text-gray-600 me-2">Batal</a>
                        <button type="submit" class="btn btn-info px-4">Simpan Perubahan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection