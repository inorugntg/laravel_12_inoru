<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class ProjectController extends Controller
{
    public function index()
    {
        return view('project');
    }

    public function project()
    {
        return view('admin.masterproject');
    }
    public function create()
    {
        return view('admin.tambahproject');
    }

    public function store(Request $request)
    {
        // Validasi data dari form
        $request->validate([
            'project' => 'required|string|max:255',
            'client' => 'required|integer|min:5',
            'users' => 'required|string|max:255',
        ]);
        // Simpan data ke dalam database
        Project::create([
            'project' => $request->project,
            'client' => $request->client,
            'users' => $request->users,
        ]);
        
        // Redirect ke halaman master siswa atau halaman lainnya setelah berhasil disimpan
        return redirect()->route('masterproject')->with('success', 'Data project berhasil ditambahkan.');
    }
}