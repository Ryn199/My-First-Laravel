@extends('admin.admin-layout')

@section('content')
<h2>Edit Project</h2>

<form method="POST" action="{{ route('admin.projects.update', $project->id) }}" enctype="multipart/form-data">
    @csrf
    @method('patch')
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title', $project->title) }}" required>
        @error('title')
        <div class="invalid-feedback">
            ({{ $message }})
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="file" name="image" class="form-control" id="image">
        <img src="{{ asset('storage/' . $project->image) }}" width="100" onerror="this.src='https://placehold.co/400'">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <input type="text" name="description" class="form-control" id="description" value="{{ old('description', $project->description) }}" required>
    </div>
    <div class="mb-3">
        <label for="">Project types</label>
        <select name="project_type[]" multiple class="form-control">
            @foreach ($projectTypes as $projectType)
                <option value="{{ $projectType->id }}" @if (in_array($projectType->id, $project_types_selected)) selected @endif>{{ $projectType->type }}</option>
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
