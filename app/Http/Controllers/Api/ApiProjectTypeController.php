<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectType;
use App\Http\Requests\UpdateProjectType;
use App\Models\ProjectType;
use Exception;
use Illuminate\Http\Request;

class ApiProjectTypeController extends Controller
{

    protected $default_response = [
        'success' => false,
        'message' => '',
        'data' => []
    ];


    public function __construct($default_response = null) {
        if($default_response){
            $this->default_response = $default_response;    

        }

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = $this->default_response;

        try{
            $project_types = ProjectType::all();
            $response['success'] = true;
            // $response['message'] = 'Project types retrieved successfully';
            $response['data'] = ['project_types'=>$project_types];
        }catch(Exception $e){
            $response['message'] = $e->getMessage();
        }
        return response()->json($response);
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
    public function store(StoreProjectType $request)
    {
        $response = $this->default_response;

        try{
            $data = $request->validated();

            $project_type = new ProjectType();
            $project_type->type = $data['type'];
            $project_type->description = $data['description'];
            $project_type->save();

            $response['success'] = true;
            $response['message'] = 'Project type created successfully';
            $response['data'] = $project_type;

        }catch(Exception $e){
            $response['success'] = false;
            $response['message'] = $e->getMessage();
        }
        return response()->json($response);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        
        $response = $this->default_response;
        
        try{
            $project_type = ProjectType::find($id);
            
            $response['success'] = true;
            $response['data'] = [
                '$project_type'=>$project_type
            ];
        }catch(Exception $e){
            $response['message'] = $e->getMessage();
        }
        return response()->json($response);
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
    public function update(UpdateProjectType $request, string $id)
    {
        
        $response = $this->default_response;
        
        $project_type = ProjectType::find($id);
        
        try{

            if(!$project_type){
                throw new Exception('Project type not found');
            }

            $data = $request->validated();

            //update
            $project_type->type = $data['type'];
            $project_type->description = $data['description'];
            $project_type->save();

            $response['success'] = true;
            $response['data'] = [
                '$project_type'=>$project_type
            ];
        }catch(Exception $e){
            $response['message'] = $e->getMessage();
        }
        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $response = $this->default_response;
        
        
        try{
            $project_type = ProjectType::find($id);

            if(!$project_type){
                throw new Exception('Project type not found');
            }

            $project_type->delete();


            $response['success'] = true;
            $response['message'] = 'deleted suces';
            $response['data'] = [
                '$project_type'=>$project_type
            ];
        }catch(Exception $e){
            $response['message'] = $e->getMessage();
        }
        return response()->json($response);
    }
}
