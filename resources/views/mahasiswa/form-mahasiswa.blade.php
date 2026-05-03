@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">{{ isset($detailMahasiswa) ? 'Edit' : 'Tambah' }} Mahasiswa</h1>
        <div class="d-flex justify-content-center align-items-center mt-4">
            <form
                action="{{ isset($detailMahasiswa) ? route('mahasiswa.update', $detailMahasiswa->npm) : route('mahasiswa.store') }}"
                method="POST" class="w-50">
                @csrf
                @if (isset($detailMahasiswa))
                    @method('PUT')
                @endif
                <div class="mb-3">
                    <label for="npm" class="form-label">NPM</label>
                    <input type="text" name="npm" id="npm" class="form-control"
                        value="{{ old('npm', isset($detailMahasiswa) ? $detailMahasiswa->npm : '') }}">
                    @error('npm')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control"
                        value="{{ old('nama', isset($detailMahasiswa) ? $detailMahasiswa->nama : '') }}">
                    @error('nama')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nidn" class="form-label">Dosen Pembimbing</label>
                    <select name="nidn" id="nidn" class="form-select">
                        <option value="">Pilih Dosen</option>
                        @foreach ($dosen as $d)
                            <option value="{{ $d->nidn }}"
                                {{ old('nidn', isset($detailMahasiswa) ? $detailMahasiswa->dosen->nidn : '') == $d->nidn ? 'selected' : '' }}>
                                {{ $d->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('nidn')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
