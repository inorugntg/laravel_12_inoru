<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
class SiswaController extends Controller
{
    public function index()
    {
        // $siswa = Siswa::all();
        return view('admin.mastersiswa');
        // , compact('siswa')
    }
    
    public function create()
    {
        return view('admin.tambahsiswa');
    }

    public function store(Request $request)
    {
        // Validasi data dari form
        $request->validate([
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'no_telpon' => 'required|integer|max:255',
        ]);

        // Simpan data ke dalam database
        Siswa::create([
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'email' => $request->email,
            'no_telpon' => $request->no_telpon,
        ]);

        // Redirect ke halaman master siswa atau halaman lainnya setelah berhasil disimpan
        return redirect()->route('mastersiswa')->with('success', 'Data siswa berhasil ditambahkan.');
    }
}