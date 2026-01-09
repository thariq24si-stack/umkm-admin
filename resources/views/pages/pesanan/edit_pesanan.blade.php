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
                <li class="breadcrumb-item"><a href="{{ route('pesanan.index') }}">Pesanan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Pesanan</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Edit Pesanan: {{ $pesanan->nomor_pesanan }}</h1>
                <p class="mb-0">Ubah data transaksi atau status pengiriman pesanan.</p>
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
                    <form action="{{ route('pesanan.update', $pesanan->pesanan_id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-4">
                            <div class="col-lg-4 col-sm-6">
                                <div class="mb-3">
                                    <label for="nomor_pesanan" class="form-label">Nomor Pesanan</label>
                                    <input type="text" id="nomor_pesanan" name="nomor_pesanan" class="form-control" 
                                        value="{{ $pesanan->nomor_pesanan }}" readonly>
                                </div>

                                <div class="mb-3">
                                    <label for="warga_id" class="form-label">Pemesan</label>
                                    <select name="warga_id" id="warga_id" class="form-select" required>
                                        @foreach($dataWarga as $warga)
                                            <option value="{{ $warga->warga_id }}" {{ $pesanan->warga_id == $warga->warga_id ? 'selected' : '' }}>
                                                {{ $warga->first_name }} {{ $warga->last_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="total" class="form-label">Total Pembayaran (Rp)</label>
                                    <input type="number" id="total" name="total" class="form-control" 
                                        value="{{ $pesanan->total }}" required>
                                </div>
                            </div>

                            <div class="col-lg-4 col-sm-6">
                                <div class="mb-3">
                                    <label for="alamat_kirim" class="form-label">Alamat Pengiriman</label>
                                    <textarea id="alamat_kirim" name="alamat_kirim" class="form-control" rows="2" required>{{ $pesanan->alamat_kirim }}</textarea>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="rt" class="form-label">RT</label>
                                        <input type="text" id="rt" name="rt" class="form-control" value="{{ $pesanan->rt }}" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="rw" class="form-label">RW</label>
                                        <input type="text" id="rw" name="rw" class="form-control" value="{{ $pesanan->rw }}" required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="metode_bayar" class="form-label">Metode Pembayaran</label>
                                    <select id="metode_bayar" name="metode_bayar" class="form-select" required>
                                        <option value="Transfer Bank" {{ $pesanan->metode_bayar == 'Transfer Bank' ? 'selected' : '' }}>Transfer Bank</option>
                                        <option value="E-Wallet (Dana/OVO)" {{ $pesanan->metode_bayar == 'E-Wallet (Dana/OVO)' ? 'selected' : '' }}>E-Wallet (Dana/OVO)</option>
                                        <option value="Cash on Delivery (COD)" {{ $pesanan->metode_bayar == 'Cash on Delivery (COD)' ? 'selected' : '' }}>Cash on Delivery (COD)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4 col-sm-12">
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status Pesanan</label>
                                    <select id="status" name="status" class="form-select" required>
                                        <option value="pending" {{ $pesanan->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="sukses" {{ $pesanan->status == 'sukses' ? 'selected' : '' }}>Sukses</option>
                                        <option value="batal" {{ $pesanan->status == 'batal' ? 'selected' : '' }}>Batal</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="bukti_bayar" class="form-label">Update Bukti Bayar</label>
                                    @if($pesanan->bukti_bayar)
                                        <div class="mb-2">
                                            <img src="{{ asset('assets-admin/img/bukti-bayar/' . $pesanan->bukti_bayar) }}" width="100" class="rounded shadow-sm">
                                        </div>
                                    @endif
                                    <input type="file" id="bukti_bayar" name="bukti_bayar" class="form-control">
                                    <small class="text-muted">Biarkan kosong jika tidak ingin mengubah foto.</small>
                                </div>

                                <div class="mt-5">
                                    <button type="submit" class="btn btn-primary">Update Data <i class="fas fa-save ms-1"></i></button>
                                    <a href="{{ route('pesanan.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection