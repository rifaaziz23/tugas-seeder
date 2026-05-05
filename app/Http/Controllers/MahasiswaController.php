<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Dosen;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::with(['dosen', 'krs.mataKuliah'])->paginate(10);
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dosen = Dosen::all();
        return view('mahasiswa.form-mahasiswa', compact('dosen'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'npm' => 'required|min:2|max:10|unique:mahasiswa',
                'nama' => 'required|min:2',
                'nidn' => 'required|exists:dosen,nidn',
            ],
            [
                'npm.required' => 'NPM wajib diisi.',
                'nama.required' => 'Nama wajib diisi.',
                'nidn.required' => 'Dosen Pembimbing wajib dipilih.',
            ]
        );

        Mahasiswa::create($validated);
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $detailMahasiswa = Mahasiswa::with(['dosen', 'krs.mataKuliah'])->findOrFail($id);
        return view('mahasiswa.detail-mahasiswa', compact('detailMahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dosen = Dosen::all();
        $detailMahasiswa = Mahasiswa::with(['dosen', 'krs.mataKuliah'])->findOrFail($id);
        return view('mahasiswa.form-mahasiswa', compact('detailMahasiswa', 'dosen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $npm)
    {
        $validated = $request->validate(
            [
                'npm' => 'required|min:2|max:10|unique:mahasiswa,npm,'. $npm . ',npm',
                'nama' => 'required|min:2',
                'nidn' => 'required|exists:dosen,nidn',
            ],
            [
                'npm.required' => 'NPM wajib diisi.',
                'nama.required' => 'Nama wajib diisi.',
                'nidn.required' => 'Dosen Pembimbing wajib dipilih.',
            ]
        );

        Mahasiswa::where('npm', $npm)->update($validated);
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Mahasiswa::destroy($id);
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil dihapus.');
    }
}
