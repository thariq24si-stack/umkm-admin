@extends('layouts.admin.app')
@section('content')
    <main class="content">
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
                    <li class="breadcrumb-item"><a href="#">Produk</a></li>
                </ol>
            </nav>

            <div class="d-flex justify-content-between w-100 flex-wrap">
                <div class="mb-3 mb-lg-0">
                    <h1 class="h4">Data Produk</h1>
                    <p class="mb-0">Daftar seluruh produk UMKM</p>
                </div>
                <div>
                    <a href="{{ route('produk.create') }}" class="btn btn-success text-white">
                        + Tambah Produk
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 mb-4">
                <div class="card border-0 shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-centered table-nowrap mb-0 rounded">
                                <thead class="thead-light">
                                    <tr>
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
                                            <td>{{ $item->nama_produk }}</td>
                                            <td>{{ $item->deskripsi }}</td>
                                            <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                                            <td>{{ $item->stok }}</td>
                                            <td>
                                                <span
                                                    class="badge bg-{{ $item->status == 'Tersedia' ? 'success' : 'danger' }}">
                                                    {{ $item->status }}
                                                </span>
                                            </td>
                                            <td>{{ $item->umkm_id }}</td>
                                            <td>
                                                @if ($item->foto)
                                                    <img src="{{ asset($item->foto) }}" width="50" class="rounded">
                                                @else
                                                    <small class="text-muted">Tidak ada</small>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('produk.edit', $item->produk_id) }}"
                                                    class="btn btn-info btn-sm">Edit<svg
                                                        class="w-6 h-6 text-white dark:text-white" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M5 11.917 9.724 16.5 19 7.5" />
                                                    </svg></a>
                                                <form action="{{ route('produk.destroy', $item->produk_id) }}"
                                                    method="POST" style="display:inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Hapus<svg
                                                            class="w-6 h-6 text-white  dark:text-white"
                                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                            width="24" height="24" fill="none"
                                                            viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-width="2"
                                                                d="m6 6 12 12m3-6a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            @if ($dataProduk->isEmpty())
                                <p class="text-center mt-3 text-muted">Belum ada data produk.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

