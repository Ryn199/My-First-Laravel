<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Models\Project;
use Exception;
use Illuminate\Http\Request;

class ApiProjectController extends Controller
{

    protected $default_response = [
        'success' => false,
        'message' => '',
        'data' => []
    ];


    public function __construct($default_response = null)
    {
        if ($default_response) {
            $this->default_response = $default_response;
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $response = $this->default_response;

        try {
            $data = $request->validated();

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $path = $file->storeAs('project-images', $file->hashName(), 'public');
            }
            // dd($path);

            $project = new Project();
            $project->title = $data['title'];
            $project->description = $data['description'];
            $project->image = $path ?? null;
            $project->save();

            $project->project_types()->sync($request->project_type);

            $response['success'] = true;
            $response['data'] = $project;
        } catch (Exception $e) {
            $response['message'] = $e->getMessage();
        }
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
