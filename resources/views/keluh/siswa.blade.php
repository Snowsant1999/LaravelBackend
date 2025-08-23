@extends('layout.app')

@section('body')
    <div class="mb-3 justify-content-between align-item-center d-flex">
        <h1>Halaman Siswa</h1>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn btn-danger" type="submit">Logout</button>
        </form>
    </div>
    <div class="mb-3 justify-content-between align-item-center d-flex">
        <h2>Selamat datang {{ Auth::user()->name }}</h2>
        <a href="{{ route('create') }}" class="btn btn-primary">Tambah Keluhan</a>
    </div>
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
    <table class="table table-hover text-break table-layout-fixed">
        <thead class="table-primary sticky-top text-center align-middle">
            <th>Nama</th>
            <th>Mata pelajaran</th>
            <th>Keluhan</th>
            <th>Bukti</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            @if ($siswa->count() > 0)
                @foreach ($siswa as $sw)
                <tr class="text-center align-middle">
                    <td class="max-width: 150px">{{ $sw->nama }}</td>
                    <td class="max-width: 100px">{{ $sw->mapel }}</td>
                    <td class="text-truncate" style="max-width: 100px;">{{ $sw->keluhan }}</td>
                    <td class="text-truncate" style="Max-width: 100px;">{{ $sw->file }}</td>
                    <td>
                        <div class="btn btn-group">
                            <a href="{{ route('edit', $sw->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ route('show', $sw->id) }}" class="btn btn-secondary">Show</a>
                            <form action="{{ route('destroy', $sw->id) }}" method="POST" class="btn btn-danger" onsubmit="return confirm('Hapus?')">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" type="submit">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            @else
            <tr>
            <td class="align-center">
                Tidak Ada Keluhan
            </td>
            </tr>
            @endif
        </tbody>
    </table>
    </div>
@endsection