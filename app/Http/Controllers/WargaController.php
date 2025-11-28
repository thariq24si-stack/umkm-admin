<?php
namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filterableColumns = ['gender'];

        $searchableColumns = ['first_name','last_name','email'];

        $data['dataWarga'] = Warga::filter($request, $filterableColumns)->search($request, $searchableColumns)->paginate(10)->onEachSide(2)->withQueryString();

        return view('pages.warga.data', $data);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.home');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data['first_name'] = $request->first_name;
        $data['last_name']  = $request->last_name;
        $data['birthday']   = $request->birthday;
        $data['gender']     = $request->gender;
        $data['email']      = $request->email;
        $data['phone']      = $request->phone;

        Warga::create($data);

        return redirect()->route('home')->with('success', 'Penambahan Data Berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
    // Ambil data warga
    $data['dataWarga'] = Warga::with('files')->findOrFail($id); // ambil relasi files juga
    return view('pages.warga.edit_warga', $data);
}

/**
 * Update the specified resource in storage.
 */
public function update(Request $request, string $id)
{
    $warga = Warga::findOrFail($id);

    // Update data utama warga
    $warga->update($request->except('files')); // jangan ikutkan files di mass assign

    // Handle multiple file upload
    if ($request->hasFile('files')) {
        foreach ($request->file('files') as $file) {
            $filename = $file->store('warga_files', 'public'); // simpan di storage/app/public/warga_files
            $warga->files()->create([
                'filename' => $filename
            ]);
        }
    }

    return redirect()->route('warga.index')->with('success', 'Data berhasil diperbarui!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $warga = warga::findorfail($id);

        $warga->delete();
        return redirect()->route('warga.index')->with('success', 'Data berhasil dihapus!');

    }
}
