@extends('layouts.admin.app')

@section('content')
<div class="py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item"><a href="{{ route('pesanan.index') }}">Pesanan</a></li>
            <li class="breadcrumb-item active">Tambah Pesanan Detail</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Tambah Pesanan (Multi-Produk)</h1>
            <p class="mb-0">Pilih warga dan tambahkan beberapa produk dalam satu transaksi.</p>
        </div>
    </div>
</div>

<form action="{{ route('pesanan.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12 col-xl-4">
            <div class="card border-0 shadow mb-4">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="nomor_pesanan">Nomor Pesanan</label>
                        <input type="text" name="nomor_pesanan" class="form-control" value="INV-{{ date('YmdHis') }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="warga_id">Pilih Warga (Pemesan)</label>
                        <select name="warga_id" class="form-select" required>
                            <option value="">-- Pilih Warga --</option>
                            @foreach($dataWarga as $warga)
                                <option value="{{ $warga->warga_id }}">{{ $warga->first_name }} {{ $warga->last_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="alamat_kirim">Alamat Lengkap</label>
                        <textarea name="alamat_kirim" class="form-control" rows="2" required></textarea>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label>RT</label>
                            <input type="text" name="rt" class="form-control" placeholder="001" required>
                        </div>
                        <div class="col-6 mb-3">
                            <label>RW</label>
                            <input type="text" name="rw" class="form-control" placeholder="002" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label>Metode Bayar</label>
                        <select name="metode_bayar" class="form-select">
                            <option value="Cash">Cash</option>
                            <option value="Transfer">Transfer</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-xl-8">
            <div class="card border-0 shadow mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="fs-5 fw-bold mb-0">Daftar Belanja Produk</h2>
                    <button type="button" id="add-item" class="btn btn-sm btn-secondary">+ Tambah Produk</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap mb-0 rounded" id="order-table">
                            <thead class="thead-light">
                                <tr>
                                    <th class="border-0">Produk UMKM</th>
                                    <th class="border-0">Harga Satuan</th>
                                    <th class="border-0" style="width: 100px;">Qty</th>
                                    <th class="border-0">Subtotal</th>
                                    <th class="border-0">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="item-row">
                                    <td>
                                        <select name="produk_id[]" class="form-select produk-select" required>
                                            <option value="">-- Pilih Produk --</option>
                 @foreach($dataProduk as $produk)
        <option value="{{ $produk->produk_id }}" data-price="{{ $produk->harga }}">
            {{ $produk->nama_produk }} (Rp {{ number_format($produk->harga, 0, ',', '.') }})
        </option>
    @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" name="harga_satuan[]" class="form-control harga-input" readonly value="0">
                                    </td>
                                    <td>
                                        <input type="number" name="qty[]" class="form-control qty-input" min="1" value="1" required>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control subtotal-input" readonly value="0">
                                    </td>
                                    <td>-</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="mt-4 text-end">
                        <h4 class="h5">Total Bayar: <span id="total-text">Rp 0</span></h4>
                        <input type="hidden" name="total_bayar" id="total_bayar" value="0">
                        <hr>
                        <button type="submit" class="btn btn-primary">Simpan Seluruh Pesanan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
document.getElementById('add-item').addEventListener('click', function() {
    let table = document.getElementById('order-table').getElementsByTagName('tbody')[0];
    let newRow = table.rows[0].cloneNode(true);
    
    // Reset nilai input di baris baru
    newRow.querySelector('.produk-select').value = "";
    newRow.querySelector('.harga-input').value = 0;
    newRow.querySelector('.qty-input').value = 1;
    newRow.querySelector('.subtotal-input').value = 0;
    
    // Tambah tombol hapus baris
    newRow.cells[4].innerHTML = '<button type="button" class="btn btn-danger btn-sm remove-row">X</button>';
    
    table.appendChild(newRow);
});

document.addEventListener('change', function(e) {
    // Jika produk dipilih, ambil harga dari atribut data-price
    if (e.target.classList.contains('produk-select')) {
        let price = e.target.options[e.target.selectedIndex].getAttribute('data-price');
        let row = e.target.closest('tr');
        row.querySelector('.harga-input').value = price;
        calculateSubtotal(row);
    }

    // Jika Qty diubah
    if (e.target.classList.contains('qty-input')) {
        calculateSubtotal(e.target.closest('tr'));
    }
});

document.addEventListener('click', function(e) {
    if (e.target.classList.contains('remove-row')) {
        e.target.closest('tr').remove();
        calculateTotal();
    }
});

function calculateSubtotal(row) {
    let harga = row.querySelector('.harga-input').value;
    let qty = row.querySelector('.qty-input').value;
    let subtotal = harga * qty;
    row.querySelector('.subtotal-input').value = subtotal;
    calculateTotal();
}

function calculateTotal() {
    let subtotals = document.querySelectorAll('.subtotal-input');
    let total = 0;
    subtotals.forEach(function(input) {
        total += parseFloat(input.value);
    });
    document.getElementById('total-text').innerText = 'Rp ' + total.toLocaleString('id-ID');
    document.getElementById('total_bayar').value = total;
}
document.addEventListener('change', function(e) {
    if (e.target.classList.contains('produk-select')) {
        const selectedOption = e.target.options[e.target.selectedIndex];
        const hargaProduk = selectedOption.getAttribute('data-price');
        
        const row = e.target.closest('tr');
        
        const hargaInput = row.querySelector('.harga-input');
        if (hargaInput) {
            hargaInput.value = hargaProduk;
        }
        
        calculateSubtotal(row);
    }
});

// Fungsi menghitung Subtotal per baris
function calculateSubtotal(row) {
    const harga = parseFloat(row.querySelector('.harga-input').value) || 0;
    const qty = parseFloat(row.querySelector('.qty-input').value) || 0;
    const subtotal = harga * qty;
    
    row.querySelector('.subtotal-input').value = subtotal;
    calculateTotal();
}

// Fungsi menghitung Total Bayar keseluruhan
function calculateTotal() {
    let total = 0;
    document.querySelectorAll('.subtotal-input').forEach(input => {
        total += parseFloat(input.value) || 0;
    });
    
    // Update teks tampilan dan input hidden untuk dikirim ke database
    document.getElementById('total-text').innerText = 'Rp ' + total.toLocaleString('id-ID');
    document.getElementById('total_bayar').value = total;
}
</script>
@endsection