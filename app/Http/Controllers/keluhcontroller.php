<?php

namespace App\Http\Controllers;

use App\Models\keluhan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class keluhcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function siswa()
    {
        $siswa = keluhan::where('user_id', auth()->id())->get();

        return view('keluh.siswa', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('keluh.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'mapel' => 'required',
            'keluhan' => 'required',
            'file' => 'mimes:pdf,png,jpg,jpeg|max:2048',
        ],[
            'file.mimes' => 'Format yang di dukung pdf,png,jpg,jpeg',
            'file.max' => 'Maksimal Ukuran file 2MB',
        ]);

        $input = $request->all();

            if ($file = $request->file('file')) {
                $post = $file->getClientOriginalName();
                $lokasi = public_path('images');
                $file->move($lokasi, $post);
                $input['file'] = $post;
            }

        $input['user_id'] = auth()->id();
        
        keluhan::create($input);


        return redirect()->route('indexsiswa')->with('success', 'Keluhan Telah Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $siswa = keluhan::Find($id);

        return view('keluh.show', compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $siswa = keluhan::find($id);

        return view('keluh.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $siswa = keluhan::find($id);

        $request->validate([
            'file' => 'mimes:pdf,png,jpg,jpeg|max:2048',
        ],[
            'file.mimes' => 'Format yang di dukung pdf,png,jpg,jpeg',
            'file.max' => 'Maksimal Ukuran file 2MB',
        ]);

        $input = $request->all();

            if ($file = $request->file('file')) {
                $post = $file->getClientOriginalName();
                $lokasi = public_path('images');
                $file->move($lokasi, $post);
                $input['file'] = $post;
            }

        $siswa->update($input);

        return redirect()->route('indexsiswa')->with('success', 'Keluhan Telah Diubah');
    }

    public function destroy(string $id)
    {
        $siswa = keluhan::find($id);

        $siswa->delete();

        return back()->with('success', 'Keluhan Telah Dihapus');
    }

    public function balasan(string $id)
    {
        $siswa = keluhan::find($id);

        return view('keluh.balasan', compact('siswa'));
    }

    public function guru()
    {
        $siswa = keluhan::orderBy('nama', 'asc')->get();

        return view('guru.halguru', compact('siswa'));
    }

    public function balas(string $id)
    {
        $siswa = keluhan::find($id);

        return view('guru.balas', compact('siswa'));
    }

    public function balasput(Request $request, string $id)
    {
        $siswa = keluhan::find($id);

        $request->validate([
            'balasan' => 'required',
        ]);

        $input = $request->all();

        $siswa->update($input);

        return redirect()->route('indexguru')->with('success', 'Balasan Telah Ditambahkan');
    }
}
