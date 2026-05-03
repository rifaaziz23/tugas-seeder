@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-around align-items-center mt-4">
            <h1 class="text-center">Data Mahasiswa</h1>
            <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">Tambah Mahasiswa</a>
        </div>
        @session('success')
            <div class="alert alert-success ">
                {{ session('success') }}
            </div>
        @endsession
        <div class="container-fluid d-flex flex-column-reverse align-items-center mt-4">
            <table border="1" class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NPM</th>
                        <th>Nama</th>
                        <th>Dosen Pembimbing</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mahasiswa as $mhs)
                        <tr>
                            <td>{{ $mahasiswa->firstItem() + $loop->index }}</td>
                            <td>{{ $mhs->npm }}</td>
                            <td>{{ $mhs->nama }}</td>
                            <td>{{ $mhs->dosen->nama ?? 'Tidak Ada' }}</td>

                            <td>
                                <a href="{{ route('mahasiswa.edit', ['id' => $mhs->npm]) }}"
                                    class="btn btn-sm btn-warning">Edit</a>
                                <a href="{{ route('mahasiswa.show', ['id' => $mhs->npm]) }}"
                                    class="btn btn-sm btn-info">Detail</a>
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                {{ $mahasiswa->links() }}
        </div>
    </div>
@endsection
