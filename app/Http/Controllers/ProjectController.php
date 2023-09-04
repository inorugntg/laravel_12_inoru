<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $data = Project::all();
        return view('admin.masterproject', compact('data'));
    }
    // Ganti $siswaList menjadi $data
    public function create()
    {
        $data = Siswa::all(); // Mengambil daftar siswa untuk ditampilkan dalam dropdown
        return view('admin.tambahproject', compact('data'));
    }

    public function edit($id)
    {
        $data = Project::find($id);
        return view('admin.editproject', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $project = Project::find($id);

        if (!$project) {
            return redirect()->route('project.index')->with('error', 'Project tidak ditemukan.');
        }

        $project->update($request->all());

        return redirect()->route('project.index')->with('success', 'Project berhasil diupdate!');
    }

    public function store(Request $request)
    {
        $request->validate([
            'project_name' => 'required',
            'project_date' => 'required|date_format:Y-m-d',
            'photo' => 'required'
        ]);

        // Ambil semua data dari form kecuali siswa_id
        $projectData = $request->except('siswa_id');

        // Buat proyek baru dengan data yang telah diambil
        Project::create($projectData);

        return redirect()->route('project.index')->with('success', 'Project Berhasil Ditambahkan!');
    }

    public function delete($id)
    {
        $project = Project::find($id);

        if (!$project) {
            return redirect()->route('project.index')->with('error', 'Project tidak ditemukan.');
        }

        $project->delete();

        return redirect()->route('project.index')->with('success', 'Project berhasil dihapus!');
    }
}
