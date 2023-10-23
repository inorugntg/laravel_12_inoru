<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Siswa;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin'])->except('index','show');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswas = Siswa::all('id', 'name');
        return view('admin.masterproject', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    public function add($id)
    {
        $siswa = Siswa::find($id);  // Find Siswa based on the provided ID
        return view('admin.tambahproject', compact('siswa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'project_name.required' => 'The project name field is required.',
            'project_name.min' => 'The project name must be at least :min characters.',
            'project_name.max' => 'The project name may not be greater than :max characters.',
            'project_date.required' => 'The project date field is required.',
            'project_date.date' => 'The project date must be a valid date.',
            'photo.required' => 'The photo field is required.',
            'photo.mimes' => 'The photo must be a file of type: :values.',
        ];

        $this->validate($request, [
            'project_name' => 'required|min:5|max:20',
            'project_date' => 'required|date',
            'photo' => 'required|mimes:png,jpg,jpeg'
        ], $messages);

        if ($file = $request->file('photo')) {
            $destinationPath = './storage';
            $nama_file = time() . '-' . $file->getClientOriginalName();
            $file->move($destinationPath, $nama_file);
            $input['photo'] = "$nama_file";
        }

        Project::create([
            'siswa_id' => $request->siswa_id,
            'project_name' => $request->project_name,
            'project_date' => $request->project_date,
            'photo'        => $nama_file
        ]);
        return redirect()->route('project.index')->with('message', 'Project Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Siswa::find($id)->project()->get();
        // return $data; 
        return view('admin.showproject', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $project = Project::find($id); // Fetch the project by its ID
        $siswa = $project->siswa; // Get the associated siswa for the project

        return view('admin.editproject', compact('siswa', 'project')); // Pass project data to the view
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $messages = [
            'project_name.required' => 'The project name field is required.',
            'project_name.min' => 'The project name must be at least :min characters.',
            'project_name.max' => 'The project name may not be greater than :max characters.',
            'project_date.required' => 'The project date field is required.',
            'project_date.date' => 'The project date must be a valid date.',
            'photo.required' => 'The photo field is required.',
            'photo.mimes' => 'The photo must be a file of type: :values.',
        ];

        $this->validate($request, [
            'project_name' => 'required|string|min:5|max:255', // Adjusted validation rule for project_name
            'project_date' => 'required|date',
            'photo' => 'nullable|mimes:png,jpg,jpeg|max:2048', // Allowing nullable photo update
        ], $messages);

        $data = Project::find($id);

        if (!$data) {
            return redirect()->route('project.index')->with('error', 'Project tidak ditemukan.');
        }

        $data->siswa_id = $request->siswa_id;
        $data->project_name = $request->project_name;
        $data->project_date = $request->project_date;

        if ($request->hasFile('photo')) {
            $destinationPath = './storage';
            $nama_file = time() . '-' . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move($destinationPath, $nama_file);
            $oldPhotoPath = './storage/' . $data->photo;
            if ($data->photo && file_exists($oldPhotoPath)) {
                unlink($oldPhotoPath);
            }
            $data->photo = $nama_file;
        }
        $data->save();

        return redirect()->route('project.index')->with('message', 'Project berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $project = Project::find($id);

        if (!$project) {
            return redirect()->route('project.index')->with('error', 'Project not found.');
        }

        $photoPath = public_path('storage/' . $project->photo);

        // Delete the photo file from the filesystem
        if (file_exists($photoPath)) {
            unlink($photoPath);
        }

        $project->delete();

        return redirect()->route('project.index')->with('message', 'Project successfully deleted!');
    }
}
