<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use App\Models\Siswa;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\DBAL\TimestampType;

class SiswaController extends Controller
{
    public function index()
    {
        $data = Siswa::all();
        return view('admin.mastersiswa', compact('data'));
    }

    public function create()
    {
        return view('admin.tambahsiswa');
    }

    public function store(Request $request)
    {
        //custom message
        $messages = [
            'required' => ':attribute harus diisi',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attribute maksimal :max karakter',
            'mimes' => 'file :attribute harus bertipe :mimes'
        ];

        //validasi request form
        $this->validate($request, [
            'name' => 'required|min:3|max:30',
            'about' => 'required|min:50|',
            'photo' => 'required|mimes:png,jpg,jpeg'
        ], $messages);

        if ($file = $request->file('photo')) {
            $destinationPath = './storage';
            $nama_file = time() . '-' . $file->getClientOriginalName();
            $file->move($destinationPath, $nama_file);
            $input['photo'] = "$nama_file";
        }

        Siswa::create([
            'name' => $request->name,
            'about' => $request->about,
            'photo' => $nama_file
        ]);

        return redirect()->route('siswa.index')->with('message', 'Siswa Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $data = Siswa::find($id);
        return view('admin.editsiswa', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'about' => 'required',
            'photo' => 'image|mimes:png,jpg,jpeg|max:2048' 
        ]);

        $data = Siswa::find($id);

        if (!$data) {
            return redirect()->route('siswa.index')->with('error', 'Siswa tidak ditemukan.');
        }

        $data->name = $request->name;
        $data->about = $request->about;

        if ($request->hasFile('photo')) {
            $destinationPath = './storage';
            $nama_file = time() . '-' . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move($destinationPath, $nama_file);

            if ($data->photo && file_exists($data->photo)) {
                unlink($data->photo);
            }

            $data->photo = $nama_file;
        }
        $data->save();

        return redirect()->route('siswa.index')->with('message', 'Siswa berhasil diupdate!');
    }

    public function delete($id)
    {
        $data = Siswa::find($id);
        if (!$data) {
            return redirect()->route('siswa.index')->with('error', 'Siswa tidak ditemukan.');
        }
        $photoPath = './storage/' . $data->photo;
        if (file_exists($photoPath)) {
            unlink($photoPath); // Delete the photo file from the file system
        }
        $data->delete();
        return redirect()->route('siswa.index')->with('message', 'Siswa berhasil dihapus!');
    }
}
