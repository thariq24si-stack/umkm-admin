@extends('layouts.admin.app')
@section('content')
<div class="container-fluid px-4">

    <div class="py-4">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item">
                    <a href="#">
                        <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4h2v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="#">produk</a></li>
            </ol>
        </nav>

        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Data produk</h1>
                <p class="mb-0">Daftar seluruh produk </p>
            </div>
            <div>
                <a href="{{ route('produk.create') }}" class="btn btn-success text-white">
                    + Tambah produk
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-0 shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <form method="GET" action="{{ route('produk.index') }}" class="mb-3">
                            <div class="row">
                                <div class="col-md-2">
                                    <select name="status" class="form-select" onchange="this.form.submit()">
                                        <option value="">All</option>
                                        <option value="Tersedia" {{ request('status')=='Tersedia' ? 'selected' : '' }}>Tersedia</option>
                                        <option value="Habis" {{ request('status')=='Habis' ? 'selected' : '' }}>Habis</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control" id="exampleInputIconRight" value="{{request('search')}}" placeholder="Search" aria-label="Search">
                                        <button type="submit" class="input-group-text" id="basic-addon2">
                                            <svg class="icon icon-xxs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                        @if(request('search'))
                                        <a href="{{ request()->fullUrlWithQuery(['search'=> null]) }}" class="btn btn-outline-secondary ml-3" id="clear-search"> Clear</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </form>
                        <table class="table table-centered table-nowrap mb-0 rounded">
                            <thead class="thead-light">
                                <tr>
                                    <th class="border-0"><span class="badge bg-primary">No</span></th>
                                    <th><span class="badge bg-primary">Nama Produk</span></th>
                                    <th><span class="badge bg-info">Deskripsi</span></th>
                                    <th><span class="badge bg-success">Harga</span></th>
                                    <th><span class="badge bg-warning text-dark">Stok</span></th>
                                    <th><span class="badge bg-secondary">Status</span></th>
                                    <th><span class="badge bg-primary">UMKM ID</span></th>
                                    <th><span class="badge bg-info">Foto</span></th>
                                    <th><span class="badge bg-danger">Aksi</span></th>
                                </tr>
                            </thead>
<tbody>
    @foreach ($dataProduk as $item)
    <tr>
        {{-- No --}}
        <td>{{ ($dataProduk->currentPage() - 1) * $dataProduk->perPage() + $loop->iteration }}</td>

        {{-- Nama Produk --}}
        <td class="fw-bold text-dark">{{ $item->nama_produk }}</td>

        {{-- Deskripsi --}}
        <td>{{ Str::limit($item->deskripsi, 30) }}</td>

        {{-- Harga --}}
        <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>

        {{-- Stok --}}
        <td>{{ $item->stok }}</td>

        {{-- Status --}}
        <td>
            <span class="badge bg-{{ $item->status == 'Tersedia' ? 'success' : 'danger' }}">
                {{ $item->status }}
            </span>
        </td>

        {{-- UMKM ID --}}
        <td>{{ $item->umkm_id ?? '-' }}</td>

        {{-- FOTO (Sudah Diperbaiki) --}}
<td>
    <div class="d-flex align-items-center">
        @php
            // 1. Cek apakah ada data di kolom 'gambar'
            if (!empty($item->gambar)) {
                // 2. Cek apakah ini gambar dari seeder (ada kata 'assets-admin') atau upload (biasanya dari folder 'uploads' atau 'storage')
                if (str_contains($item->gambar, 'assets-admin')) {
                    $finalUrl = asset($item->gambar);
                } else {
                    // Jika kamu menyimpan hasil upload di folder public/uploads/produk/
                    $finalUrl = asset('uploads/produk/' . $item->gambar); 
                    
                    // Jika kamu menggunakan storage:link, gunakan baris di bawah ini:
                    // $finalUrl = asset('storage/' . $item->gambar);
                }
            } else {
                $finalUrl = null;
            }
        @endphp

        @if($finalUrl)
            <img src="{{ $finalUrl }}" 
                 width="45" height="45" 
                 class="rounded-circle border shadow-sm" 
                 style="object-fit: cover;" 
                 alt="Foto Produk"
                 onerror="this.onerror=null;this.src='https://ui-avatars.com/api/?name={{ urlencode($item->nama_produk) }}&background=f0f2f5&color=6c757d';">
        @else
            {{-- Tampilan jika data gambar di database kosong (Placeholder Inisial) --}}
            <img src="https://ui-avatars.com/api/?name={{ urlencode($item->nama_produk) }}&background=f0f2f5&color=6c757d&size=128"
                 width="45" height="45" 
                 class="rounded-circle border" 
                 alt="No Image">
        @endif
    </div>
</td>

        {{-- AKSI --}}
        <td>
            <div class="btn-group">
                <a href="{{ route('produk.edit', $item->produk_id) }}" class="btn btn-info btn-sm text-white me-1">
                    <svg class="icon icon-xs" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                </a>

                <form action="{{ route('produk.destroy', $item->produk_id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">
                        <svg class="icon icon-xs" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                    </button>
                </form>
            </div>
        </td>
    </tr>
    @endforeach
</tbody>
                        </table>

                        <div class="mt-3">
                            {{ $dataProduk->links('pagination::bootstrap-5') }}
                        </div>

                        @if ($dataProduk->isEmpty())
                        <p class="text-center mt-3 text-muted">Belum ada data produk.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
