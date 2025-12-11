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
                            <form method="GET" action="{{ route('produk.index') }}"  class="mb-3">
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
        <svg class="icon icon-xxs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
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
                                            <td>{{ ($dataProduk->currentPage() - 1) * $dataProduk->perPage() + $loop->iteration }}
                                        </td>
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
                                                @if($item->foto)
        <img src="{{ asset('uploads/' . $item->foto) }}" width="35"  width="35"class="rounded-circle">
    
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

