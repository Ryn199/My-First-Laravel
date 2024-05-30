@extends('admin.admin-layout')

@push('style')
    <style>
        p {
            color: red;
        }
    </style>
@endpush

@section('content')
    <p>project-types Index</p>
    <a class="btn btn-primary" href="{{route('admin.project-types.create')}}">Add</a>
    @if (!empty(session('error')))
        <p class="text-danger">{{session('error')}}</p>

    @elseif(!empty(session('success')))
        <p class="text-success">{{session('success')}}</p>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Type</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($project_types as $pt)
                <tr>
                    <td>{{ $loop->iteration  }}</td>
                    <td>{{ $pt->type  }}</td>
                    <td>{{ $pt->description  }}</td>
                    <td>
                        <a href="{{route('admin.project-types.edit', $pt->id) }}" class="badge bg-primary text-decoration-none">Edit</a>
                        <form method="POST" action="{{ route('admin.project-types.destroy', ['id' => $pt->id]) }}">
                            @csrf
                            @method('delete')
                            <button class="badge bg-danger border-0" onclick="">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection