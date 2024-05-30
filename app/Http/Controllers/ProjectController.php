<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProjectController extends Controller
{
    public function index()
    {

        $projects = Project::with(['project_types'])->get();

        return view('admin.project.index', [
            'projects' => $projects
        ]);
    }

    public function create()
    {
        $projectTypes = ProjectType::all();
        return view('admin.project.create', compact('projectTypes'));
    }
    
    public function store(Request $request)
    {

        $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'image' => ['nullable', 'image'],
            'project_type' => ['required']
        ]);


        if($request->hasFile('image')){
            $file = $request->file('image');
            $path = $file->storeAs('project-images', $file->hashName(), 'public');
        }
        // dd($path);

        $project = new Project();
        $project->title = $request->title;
        $project->description = $request->description;
        $project->image = $path ?? null;
        $project->save();

        $project->project_types()->sync($request->project_type);

        return redirect()->route('admin.projects.index')->with('success', 'Project created succsessfully');
    }

    public function edit($id)
    {
        {
        // dd($id);
        //logika get data

        $project = Project::with([
            'project_types'
        ])->find($id);
        
        if(empty($project))
        {
            // abort(404);
            return redirect()-> route('admin.projects.index')->with('error', 'Project not found');
        }
        
        $projectTypes = ProjectType::all();

        $project_types_selected = [];
        foreach ($project->project_types as $pt) {
            $project_types_selected[] = $pt->id;
        }
        
        //logika nampilin data kirim ke view
        return view('admin.project.edit', compact('project', 'projectTypes', 'project_types_selected'));
    }
    }


    public function update($id, Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'image' => ['nullable', 'image'],
            'project_type' => ['required']
        ]);
    
        $project = Project::find($id);
    
        if (empty($project)) {
            return redirect()->route('admin.projects.index')->with('error', 'Project not found');
        }
    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->storeAs('project-images', $file->hashName(), 'public');
            $project->image = $path;
        }
    
        $project->title = $request->title;
        $project->description = $request->description;
        $project->save();
    
        $project->project_types()->sync($request->project_type);
    
        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully');
    }

    public function destroy($id)
    {
        $project = Project::find($id);
    
        if (empty($project)) {
            return redirect()->route('admin.projects.index')->with('error', 'Project not found');
        }
    
        // Hapus gambar dari server
        if ($project->image && Storage::disk('public')->exists($project->image)) {
            Storage::disk('public')->delete($project->image);
        }
    
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Project id ' . $id . ' successfully deleted');
    }
    
    
    

}

