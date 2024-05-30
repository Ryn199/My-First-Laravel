{{-- @extends('admin.admin-layout')

@section('content')
<h2>Form Login</h2>

@if (!empty(session('error')))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
    
@endif
    <form action="{{ route('login.proses') }} " method="post">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">password anda aman</div>
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>

            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Password</label>
            <input type="password" class="form-control" id="pasword">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection --}}


@extends('admin.admin-layout')

@section('content')
<h2>Form Login</h2>

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<form action="{{ route('login.proses') }}" method="post">
    @csrf
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Password Anda aman</div>
        @error('email')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">

    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
