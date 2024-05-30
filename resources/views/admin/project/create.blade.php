@extends('admin.admin-layout')

@section('content')
<h2>Create Project</h2>

<form method="POST" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" required>
        @error('title')
        <div class="invalid-feedback">
            ({{ $message }})
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="file" name="image" class="form-control" id="image" required>
    </div>
    <div class="mb-3">  
        <label for="description" class="form-label">Description</label>
        <input type="text" name="description" class="form-control" id="description" required>
    </div>
    <div class="mb-3">
        <label for="">Project types</label>
        <select name="project_type[]" multiple class="form-control">
            @foreach ($projectTypes as $project_type)
            <option value="{{ $project_type->id }}">{{ $project_type->type }}</option>
            @endforeach
        </select>
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Cancel</a>
</form>

@if ($errors->any())
<br>
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection
