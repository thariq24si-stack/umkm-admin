<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)

    {
        // dd($request->all());

        $filterableColumns = ['status'];

        $searchableColumns = ['nama_produk'];


        $data['dataProduk'] = Produk::filter($request, $filterableColumns)->search($request, $searchableColumns)->paginate(10)->onEachSide(2)->withQueryString();
        return view('pages.prod.data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.prod.produk');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)

{
    // Validasi input
    $request->validate([
        'nama_produk' => 'required|string',
        'kategori' => 'required|string',
        'harga' => 'required|numeric',
        'stok' => 'required|numeric',
        'deskripsi' => 'nullable|string',
        'umkm_id' => 'required|numeric',
        'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'files.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf,docx|max:2048',
    ]);

    // Ambil data produk
    $data = $request->except('foto', 'files');

    // Upload foto utama produk (gambar produk)
    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/produk'), $filename);
        $data['foto'] = 'uploads/produk/' . $filename;
    }

    $produk = Produk::create($data);

    if ($request->hasFile('files')) {
        foreach ($request->file('files') as $file) {
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/produk'), $filename);

            Media::create([
                'ref_table' => 'produk',
                'ref_id' => $produk->id,
                'file_name' => 'uploads/produk/' . $filename,
                'mime_type' => $file->getClientMimeType(),
                'caption' => 'File terkait produk ' . $produk->nama_produk,
                'sort_order' => 0,
            ]);
        }
    }

    return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan!');
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $produk = Produk::findOrFail($id);
        $produk->update($request->all());

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus!');
    }
    public function edit(string $id)
{
     $dataProduk = Produk::with('Media')->findOrFail($id);

    return view('pages.prod.edit_produk', compact('dataProduk'));
}
}


