@extends('layout.app')

@section('body')
    <div class="mb-3">
        <center>
            <h1>TAMBAH BALASAN</h1>
        </center>
    </div>
    <form action="{{ route('balasput', $siswa->id) }}" method="POST" enctype="multipart/form-data">
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
        <input type="text" name="nama" placeholder="Nama" class="form-control" readonly value="{{ $siswa->nama }}">
    </div>
    <div class="row mb-3">
        <label for="mapel">Mapel : </label>
        <input type="text" name="mapel" placeholder="Mata Pelajaran" class="form-control" readonly value="{{ $siswa->mapel }}">
    </div>
    <div class="row mb-3">
        <label for="keluhan">Keluhan : </label>
        <textarea name="keluhan" class="form-control" placeholder="Masukkan Keluhan Anda Di sini" cols="30" rows="10" readonly>{{ $siswa->keluhan }}</textarea>
    </div>
    <div class="row mb-3">
        <label for="file">Bukti : </label>
        <input type="text" name="file" placeholder="file" class="form-control" value="{{ $siswa->file }}" readonly>
    </div>
    <div class="mb-3">
        <a href="/images/{{ $siswa->file }}" download>
            <button class="btn btn-secondary">Download file</button>
        </a>
    </div>
    <div class="row mb-3">
        <label for="balasan">Balasan : </label>
        <textarea name="balasan" class="form-control" placeholder="Masukkan balasan" cols="30" rows="10" required>{{ $siswa->balasan }}</textarea>
    </div>
    <div class="mb-3 d-flex btn btn-group">
        <button class="btn btn-primary" type="submit">Submit</button>
        <a href="{{ route('indexguru') }}" class="btn btn-secondary">Kembali</a>
    </div>
    </form>
@endsection