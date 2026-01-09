<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use App\Models\Warga;
use Illuminate\Http\Request;

class UmkmController extends Controller
{
    /**
     * Menampilkan daftar UMKM dengan fitur Search
     */
    public function index(Request $request)
    {
        $searchableColumns = ['nama_usaha', 'kategori', 'alamat'];

        $umkms = Umkm::with('pemilik')
            ->when($request->search, function ($query) use ($request, $searchableColumns) {
                foreach ($searchableColumns as $column) {
                    $query->orWhere($column, 'like', '%' . $request->search . '%');
                }
            })
            ->orderBy('nama_usaha', 'asc')
            ->paginate(10)
            ->withQueryString();

        return view('pages.umkm.data', compact('umkms'));
    }


public function create()
{   
    $dataWarga = \App\Models\Warga::orderBy('first_name', 'asc')->get();
    
    return view('pages.Umkm.umkm', compact('dataWarga'));
}

// FUNGSI UNTUK HALAMAN EDIT (Klik tombol pensil di tabel)
public function edit($id)
{
    // Mengambil 1 data UMKM berdasarkan ID yang diklik
    $umkm = Umkm::where('umkm_id', $id)->firstOrFail();
    $dataWarga = Warga::orderBy('first_name', 'asc')->get();

    // Di sini kita lempar ke file edit_umkm.blade.php
    return view('pages.Umkm.edit_umkm', compact('umkm', 'dataWarga'));
}

    /**
     * Menyimpan data UMKM baru (Logic dari WargaController@store)
     */
public function store(Request $request)
{
   $request->validate([
        'nama_usaha' => 'required',
        'warga_id'   => 'required',
        'logo'       => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // Maks 2MB
    ]);

   $data = [
        'nama_usaha'        => $request->nama_usaha,
        'kategori'          => $request->kategori,
        'pemilik_warga_id'  => $request->warga_id, 
        'kontak'            => $request->kontak,
        'alamat'            => $request->alamat,
        'rt'                => $request->rt,
        'rw'                => $request->rw,
        'deskripsi'         => $request->deskripsi,
    ];

       if ($request->hasFile('logo')) {
        $file = $request->file('logo');
        
        // Membuat nama file unik (Contoh: 1735134567_toko-saya.png)
        $namaFile = time() . '_' . str_replace(' ', '-', strtolower($request->nama_usaha)) . '.' . $file->getClientOriginalExtension();
        
        // Pindahkan ke folder public yang kamu inginkan
        $file->move(public_path('assets-admin/img/logo-umkm'), $namaFile);
        
        // Masukkan nama file ke array data untuk disimpan ke database
        $data['logo'] = $namaFile;
    }

    // 4. Simpan ke Database
    \App\Models\Umkm::create($data);

    return redirect()->route('umkm.index')->with('success', 'UMKM Berhasil Ditambahkan!');
}
    /**
     * Menampilkan Detail UMKM
     */
    public function show($id)
    {
        $umkm = Umkm::with(['pemilik', 'produk'])->where('umkm_id', $id)->firstOrFail();
        return view('pages.Umkm.show', compact('umkm'));
    }

    

    /**
     * Memperbarui data UMKM (Logic dari WargaController@update)
     */
    public function update(Request $request, $id)
    {
        $umkm = Umkm::where('umkm_id', $id)->firstOrFail();
        
        $data = $request->validate([
            'nama_usaha' => 'required',
            'kategori'   => 'required',
            'warga_id'   => 'required',
            'kontak'     => 'required',
            'alamat'     => 'required',
            'rt'         => 'required',
            'rw'         => 'required',
            'deskripsi'  => 'nullable'
        ]);

        $umkm->update($data);

        return redirect()->route('umkm.index')->with('success', 'Data UMKM Berhasil Diperbarui!');
    }

    /**
     * Menghapus data UMKM (Logic dari WargaController@destroy)
     */
    public function destroy($id)
    {
        $umkm = Umkm::where('umkm_id', $id)->firstOrFail();
        $umkm->delete();

        return redirect()->route('umkm.index')->with('success', 'UMKM Berhasil Dihapus!');
    }
}