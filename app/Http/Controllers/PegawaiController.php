<?php
namespace App\Http\Controllers;

use App\Models\Pegawai; // Pastikan Model Pegawai di-import
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::all(); // Ambil semua data pegawai
        return view('pegawai.index', compact('pegawai')); // Kirim data ke View
    }   
    public function create()
    {
        return view('pegawai.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'pegawai_nip' => 'required|unique:pegawai,pegawai_nip|max:18',
            'pegawai_nama' => 'required|max:100',
            'pegawai_jabatan' => 'required|max:100',
            'pegawai_golongan' => 'required|max:10',
            'pegawai_unor' => 'required|max:100',
        ]);

        Pegawai::create([
            'pegawai_nip' => $request->pegawai_nip,
            'pegawai_nama' => $request->pegawai_nama,
            'pegawai_jabatan' => $request->pegawai_jabatan,
            'pegawai_golongan' => $request->pegawai_golongan,
            'pegawai_unor' => $request->pegawai_unor,
        ]);
    
        return redirect()->route('pegawai.index')->with('success', 'Data Pegawai berhasil ditambahkan.');

        Pegawai::create($request->all());
        return redirect()->route('pegawai.index')->with('success', 'Data Pegawai berhasil ditambahkan.');
    }

    public function edit(Pegawai $pegawai)
    {
        return view('pegawai.edit', compact('pegawai'));
    }

    public function update(Request $request, Pegawai $pegawai)
    {
        $request->validate([
            'pegawai_nip' => 'required|max:18|unique:pegawai,pegawai_nip,' . $pegawai->id,
            'pegawai_nama' => 'required|max:100',
            'pegawai_jabatan' => 'required|max:75',
            'pegawai_golongan' => 'required|max:5',
            'pegawai_unor' => 'required|max:100',
        ]);

        $pegawai->update($request->all());
        return redirect()->route('pegawai.index')->with('success', 'Data Pegawai berhasil diperbarui.');
    }



    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        return redirect()->route('pegawai.index')->with('success', 'Data Pegawai berhasil dihapus.');
    }
}