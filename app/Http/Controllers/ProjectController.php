<?php

namespace App\Http\Controllers;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $data = Project::all();
        return view('admin.masterproject',compact('data'));
    }

    public function create()
    {
        
    }

    public function edit($id){
        $data = Project::find($id);
        return $data;
    }

    public function update(Request $request, $id)
    {
        Project::find($id)->update($request->all());
    }

    public function store(Request $request)
    {
       Project::create($request->all());
       
    }

    public function delete($id)
    {
        Project::find($id)->delete();
    }
   
}