@extends('layout.app')

@section('body')
    <div class="mb-3">
        <center>
            <h1>TAMBAH KELUHAN</h1>
        </center>
    </div>
    <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                {{ $error }}
            </div>
        @endforeach  
    @endif
    <div class="row mb-3">
        <label for="nama">Nama : </label>
        <input type="text" name="nama" placeholder="Nama" class="form-control" value="{{ old('nama')}}" required>
    </div>
    <div class="row mb-3">
        <label for="mapel">Mapel : </label>
        <input type="text" name="mapel" placeholder="Mata Pelajaran" class="form-control" value="{{ old('mapel')}}" required>
    </div>
    <div class="row mb-3">
        <label for="keluhan">Keluhan : </label>
        <textarea name="keluhan" class="form-control" placeholder="Masukkan Keluhan Anda Di sini" cols="30" rows="10" required>{{ old('keluhan') }}</textarea>
    </div>
    <div class="row mb-3">
        <label for="file">Bukti (Optional) : </label>
        <input type="file" name="file" placeholder="File" class="form-control">
    </div>
    <div class="mb-3 d-flex btn btn-group">
        <button class="btn btn-primary" type="submit">Submit</button>
        <button onclick="history.back()" class="btn btn-secondary">Kembali</button>
    </div>
    </form>
@endsection