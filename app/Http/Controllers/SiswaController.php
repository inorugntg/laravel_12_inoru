<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use Symfony\Component\CssSelector\Node\FunctionNode;

class SiswaController extends Controller
{
    public function index()
    {
        $data = Siswa::all();
        return view('admin.mastersiswa',compact('data'));
    }

    public function create()
    {
        return view('admin.tambahsiswa');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'about' => 'required',
            'photo' => 'required'
        ]);
        // Produk::create($request->all());
        $data = new Siswa();
        $data->name = Str::upper($request->name);
        $data->about = $request->about;
        $data->photo = $request->photo;
        $data->save();
        return redirect()->route('admin.mastersiswa')->with('success', 'Produk Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $data = Siswa::find($id);
        return view('admin.editsiswa',compact('data'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'about' => 'required',
            'photo' => 'required'
        ]);

        $data = Siswa::find($id);

        if (!$data) {
            return redirect()->route('admin.mastersiswa')->with('error', 'Siswa tidak ditemukan.');
        }

        $data->name = Str::upper($request->name);
        $data->about = $request->about;
        $data->photo = $request->photo;
        $data->save();

        return redirect()->route('admin.mastersiswa')->with('success', 'Siswa berhasil diupdate!');
    }

    public function delete(Request $request,$id)
    {
        Siswa::find($id)->delete();
    }
}