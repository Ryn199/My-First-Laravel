<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Project;
//import facade Validator
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        //get all projects
        $projects = Project::latest()->paginate(5);

        //return collection of posts as a resource
        return new PostResource(true, 'List Data Projects', $projects);
    }

    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'title'     => 'required',
            'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // //upload image
        // $image = $request->file('image');
        // $image->storeAs('public/project-images', $image->hashName());

        $file = $request->file('image');
        $path = $file->storeAs('project-images', $file->hashName(), 'public');


        //create post
        $post = Project::create([
            'title'     => $request->title,
            'image'     =>  $path,
            'description'   => $request->description,
        ]);

        //return response
        return new PostResource(true, 'Data Project Berhasil Ditambahkan!', $post);
    }

}