<?php

namespace App\Http\Controllers;

// use Dotenv\Validator;

use App\Models\ProjectType;
use Exception;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjectTypeController extends Controller
{
    public function index()
    {
        $project_types = ProjectType::all();
        return view('admin.project-type.index', compact('project_types'));
    }
    public function create()
    {
        return view('admin.project-type.create');
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'type' => 'string|max:255|required',
                'description' => 'nullable',
            ]);

            //insert to database
            // ProjectType::create($request->validate());
            $project_type = new ProjectType();
            $project_type->type = $request->type;
            $project_type->description = $request->description;
            $project_type->save();

            return redirect()->route('admin.project-types.index');

        } catch (Exception $e) {
            return back()->withErrors($e->getMessage())->withInput();
        }
    }

    public function destroy($id)
    {
        $project_type = ProjectType::find($id);

        if(empty($project_type))
        {
            return redirect()-> route('admin.project-types.index')->with('error', 'Project Type not found');
        }

        $project_type->delete();
        return redirect()-> route('admin.project-types.index')->with('success', 'Project Type id' . $id . ' succsess');
    }

    public function edit($id)
    {
        // dd($id);
        //logika get data
        $pt = ProjectType::find($id);
        
        if(empty($pt))
        {
            // abort(404);
            return redirect()-> route('admin.project-types.index')->with('error', 'Project Type not found');
        }
        
        //logika nampilin data kirim ke view
        return view('admin.project-type.edit', compact('pt'));
    }
    
    public function update($id, Request $request)
    {
        // dd(($id), $request->all());
        $pt = ProjectType::find($id);

        if(empty($pt))
        {
            abort(404);
            // return redirect()-> route('admin.project-types.index')->with('error', 'Project Type not found');
        }

        //logika get data
        $pt->type = $request->type;
        $pt->description = $request->description;
        $pt->save();

        return redirect()-> route('admin.project-types.index')->with('success', 'Project Type id' . $id . ' succsessfuly updated');


    }
}
