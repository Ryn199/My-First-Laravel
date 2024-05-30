@extends('admin.admin-layout')

@section('content')
<h2>Edit Project Type</h2>



<form method="POST" action="{{ route('admin.project-types.update', $pt->id) }}">
    @csrf
    @method('patch')
    <div class="mb-3">
        <label for="type" class="form-label">Type Name</label>
        <input type="text" name="type" class="form-control" id="type" value="{{ $pt->type }}" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" name="description" id="description" rows="5">{{ $pt->description }}</textarea>
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="{{ route('admin.project-types.index') }}" class="btn btn-secondary">Cancel</a>
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
