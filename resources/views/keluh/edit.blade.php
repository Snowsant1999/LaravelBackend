@extends('layout.app')

@section('body')
    <div class="mb-3">
        <center>
            <h1>UBAH KELUHAN</h1>
        </center>
    </div>
    <form action="{{ route('update', $siswa->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                {{ $error }}
            </div>
        @endforeach  
    @endif
        <div class="row mb-3">
            <label for="nama">Nama : </label>
            <input type="text" name="nama" placeholder="Nama" class="form-control" value="{{ $siswa->nama }}">
        </div>
        <div class="row mb-3">
            <label for="mapel">Mapel : </label>
            <input type="text" name="mapel" placeholder="Mata Pelajaran" class="form-control" value="{{ $siswa->mapel }}">
        </div>
        <div class="row mb-3">
            <label for="keluhan">Keluhan : </label>
            <textarea name="keluhan" class="form-control" placeholder="Masukkan Keluhan Anda Di sini" cols="30" rows="10">{{ $siswa->keluhan }}</textarea>
        </div>
        <div class="row mb-3">
            <label for="file">Bukti : </label>
            <input type="file" name="file" class="form-control" value="{{ $siswa->file }}">
        </div>
        <div class="row mb-3">
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>
    </form>
@endsection