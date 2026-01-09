<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Warga;
use App\Models\DetailPesanan;
use App\Models\Produk;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * Menampilkan daftar semua pesanan
     */
    public function index(Request $request)
    {
        // Mengambil data pesanan beserta relasi warganya
        $query = Pesanan::with('warga');

        // Fitur pencarian berdasarkan nomor pesanan
        if ($request->has('search')) {
            $query->where('nomor_pesanan', 'like', '%' . $request->search . '%');
        }

        $dataPesanan = $query->paginate(10);
        return view('pages.pesanan.data', compact('dataPesanan'));
    }

    /**
     * Menampilkan form tambah pesanan
     */
    public function create()
{
    $dataWarga = Warga::all();
$dataProduk = Produk::all(); // Pastikan sudah ada Model Produk    
return view('pages.pesanan.pesanan', compact('dataWarga', 'dataProduk'));
}
   public function store(Request $request)
{
    // 1. Validasi
    $request->validate([
        'warga_id' => 'required',
        'produk_id' => 'required|array', // Harus berupa array karena bisa banyak produk
        'qty' => 'required|array',
        'alamat_kirim' => 'required',
    ]);

    // 2. Simpan ke Tabel Pesanan (Induk)
    $pesanan = Pesanan::create([
        'nomor_pesanan' => $request->nomor_pesanan,
        'warga_id' => $request->warga_id,
        'total' => $request->total_bayar, // Total didapat dari input hidden di form
        'alamat_kirim' => $request->alamat_kirim,
        'rt' => $request->rt,
        'rw' => $request->rw,
        'metode_bayar' => $request->metode_bayar,
        'status' => 'pending',
    ]);

    // 3. Simpan ke Tabel Detail Pesanan (Anak)
    foreach ($request->produk_id as $key => $val) {
        DetailPesanan::create([
            'pesanan_id'   => $pesanan->pesanan_id,
            'produk_id'    => $request->produk_id[$key],
            'qty'          => $request->qty[$key],
            'harga_satuan' => $request->harga_satuan[$key],
            'subtotal'     => $request->qty[$key] * $request->harga_satuan[$key],
        ]);
    }

    return redirect()->route('pesanan.index')->with('success', 'Pesanan dan Detail berhasil disimpan!');
}
public function edit($id)
{
    $pesanan = Pesanan::findOrFail($id);
    $dataWarga = Warga::all();
    return view('pages.pesanan.edit_pesanan', compact('pesanan', 'dataWarga'));
}

public function update(Request $request, $id)
{
    $pesanan = Pesanan::findOrFail($id);
    
    $request->validate([
        'total' => 'required',
        'status' => 'required',
        'bukti_bayar' => 'nullable|image|max:2048'
    ]);

    $data = $request->all();

    if ($request->hasFile('bukti_bayar')) {
        // Hapus foto lama jika ada
        if ($pesanan->bukti_bayar && file_exists(public_path('assets-admin/img/bukti-bayar/' . $pesanan->bukti_bayar))) {
            unlink(public_path('assets-admin/img/bukti-bayar/' . $pesanan->bukti_bayar));
        }

        $file = $request->file('bukti_bayar');
        $namaFile = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('assets-admin/img/bukti-bayar'), $namaFile);
        $data['bukti_bayar'] = $namaFile;
    }

    $pesanan->update($data);
    return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil diperbarui!');
}
public function destroy($id)
{
    $pesanan = \App\Models\Pesanan::findOrFail($id);

    // Hapus bukti bayar dari folder assets jika ada
    if ($pesanan->bukti_bayar && file_exists(public_path('assets-admin/img/bukti-bayar/' . $pesanan->bukti_bayar))) {
        unlink(public_path('assets-admin/img/bukti-bayar/' . $pesanan->bukti_bayar));
    }

    // Hapus data dari database
    $pesanan->delete();

    return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil dihapus!');
}
}