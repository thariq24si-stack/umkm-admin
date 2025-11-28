<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warga;
use App\Models\WargaFile;
use Illuminate\Support\Facades\Storage;

class WargaFileController extends Controller
{
    // Menampilkan semua file warga
    public function index()
    {
        $wargaFiles = WargaFile::with('warga')->get(); // relasi warga
        return view('warga_files.index', compact('wargaFiles'));
    }

    // Menampilkan form upload file
    public function create()
    {
        $wargas = Warga::all();
        return view('warga_files.create', compact('wargas'));
    }

    // Simpan file multiple
    public function store(Request $request)
    {
        // Validasi
        $request->validate([
            'warga_id' => 'required|exists:warga,warga_id',
            'files.*' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048', // max 2MB per file
        ]);

        $warga_id = $request->warga_id;

        if($request->hasFile('files')) {
            foreach($request->file('files') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('warga_files', $filename, 'public');

                WargaFile::create([
                    'warga_id' => $warga_id,
                    'filename' => $filename,
                ]);
            }
        }

        return redirect()->route('warga-files.index')->with('success', 'Files uploaded successfully!');
    }

    // Optional: delete file
    public function destroy(WargaFile $wargaFile)
    {
        Storage::disk('public')->delete('warga_files/' . $wargaFile->filename);
        $wargaFile->delete();

        return redirect()->route('warga-files.index')->with('success', 'File deleted successfully!');
    }
}
