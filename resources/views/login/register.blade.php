@extends('layout.app')

@section('body')
    <div class="mb-3">
        <center>
            <h1>REGISTER AKUN</h1>
        </center>
    </div>
    <form action="{{ route('registpost') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row mb-3">
        <label for="name">Nama : </label>
        <input type="text" name="name" class="form-control" placeholder="Nama" required>
    </div>
    <div class="row mb-3">
        <label for="email">Email : </label>
        <input type="email" name="email" class="form-control" placeholder="Email" required>
    </div>
    <div class="row mb-3">
        <label for="password">Password : </label>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
    </div>
    <div class="row mb-3">
        <label for="role">Role : </label>
        <select name="role" class="form-control">
            <option value="Siswa">Siswa</option>
            <option value="Guru">Guru</option>
        </select>
    </div>
    <div class="row mb-3">
        <button class="btn btn-primary" type="submit">Submit</button>
    </div>
    </form>
@endsection