@extends('layout.app')

@section('body')
    <div class="mb-3">
        <center>
            <h1>UBAH KELUHAN</h1>
        </center>
    </div>
        <div class="row mb-3">
            <label for="nama">Nama : </label>
            <input type="text" name="nama" placeholder="Nama" class="form-control" value="{{ $siswa->nama }}" readonly>
        </div>
        <div class="row mb-3">
            <label for="mapel">Mapel : </label>
            <input type="text" name="mapel" placeholder="Mata Pelajaran" class="form-control" value="{{ $siswa->mapel }}" readonly>
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
            <label for="updated_at">Diubah : </label>
            <input type="text" name="updated_at" class="form-control" value="{{ $siswa->updated_at }}" readonly>
        </div>
        <div class="row mb-3">
            <label for="created_at">Dibuat : </label>
            <input type="text" name="created_at" class="form-control" value="{{ $siswa->created_at }}" readonly>
        </div>
        <div class="row mb-3">
            <label for="balasan">Balasan : </label>
            <textarea name="balasan" class="form-control" placeholder="Balasan akan ada disini" cols="30" rows="10" readonly>{{ $siswa->balasan }}</textarea>
        </div>
        <div class="row mb-3">
            <button onclick="history.back()" class="btn btn-primary">Kembali</button>
        </div>
@endsection