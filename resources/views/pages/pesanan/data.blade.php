@extends('layouts.admin.app')

@section('content')
<div class="py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pesanan</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Data Pesanan</h1>
            <p class="mb-0">Manajemen transaksi dan pengiriman pesanan warga.</p>
        </div>
        <div>
            <a href="{{ route('pesanan.create') }}" class="btn btn-success d-inline-flex align-items-center">
                <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                Tambah Pesanan
            </a>
        </div>
    </div>
</div>

<div class="card border-0 shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-centered table-nowrap mb-0 rounded">
                <thead class="thead-light">
                    <tr>
                        <th class="border-0 rounded-start">No</th>
                        <th class="border-0">No. Pesanan</th>
                        <th class="border-0">Nama Pemesan</th>
                        <th class="border-0">Total</th>
                        <th class="border-0">Metode</th>
                        <th class="border-0">Status</th>
                        <th class="border-0 rounded-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataPesanan as $item)
                    <tr>
                        <td><span class="badge bg-secondary">{{ ($dataPesanan->currentPage() - 1) * $dataPesanan->perPage() + $loop->iteration }}</span></td>
                        <td><span class="fw-bold">{{ $item->nomor_pesanan }}</span></td>
                        <td>{{ $item->warga->first_name }} {{ $item->warga->last_name }}</td>
                        <td>Rp {{ number_format($item->total, 0, ',', '.') }}</td>
                        <td>{{ $item->metode_bayar }}</td>
                        <td>
                            @if($item->status == 'pending')
                                <span class="badge bg-warning">Pending</span>
                            @elseif($item->status == 'sukses')
                                <span class="badge bg-success">Sukses</span>
                            @else
                                <span class="badge bg-danger text-white">{{ $item->status }}</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('pesanan.edit', $item->pesanan_id) }}" class="btn btn-info btn-sm">
                                    <svg class="icon icon-xs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.13 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"></path></svg>
                                </a>
                                <form action="{{ route('pesanan.destroy', $item->pesanan_id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pesanan ini?')">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm text-white">
        <svg class="icon icon-xs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
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
        </div>
        <div class="mt-3">
            {{ $dataPesanan->links() }}
        </div>
    </div>
</div>
@endsection