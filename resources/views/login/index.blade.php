@extends('layout.app')

@section('body')
    <div class="mb-3"><center><h1>
        LOGIN PAGE
    </h1></center>
    </div>
    <form action="{{ route('loginpost') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endforeach
        @endif
        @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        <div class="row mb-3">
            <label for="email">Email : </label>
            <input type="email" name="email" class="form-control" placeholder="Email"
            value="{{ old('email') }}" required>
        </div>
        <div class="row mb-3">
            <label for="password">Password : </label>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>
        <div class="d-flex btn btn-group">
            <button class="btn btn-primary" type="submit">Login</button>
            <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
        </div>
    </form>
@endsection