<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <title>Mahasiswa</title>
</head>

<body>
    <div class="d-flex justify-content-around align-items-center mt-4">
        <h1 class="text-center">Data Mahasiswa</h1>
        <button class="btn btn-primary">Tambah Mahasiswa</button>
    </div>
    <div class="container-fluid d-flex flex-column-reverse align-items-center mt-4">

        <table border="1" class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NPM</th>
                    <th>Nama</th>
                    <th>Dosen Pembimbing</th>
                    <th>Mata Kuliah</th>
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
                            @if ($mhs->krs->isEmpty())
                                Tidak Ada Mata Kuliah
                            @else
                                <ul>
                                    @foreach ($mhs->krs as $krs)
                                        <li>{{ $krs->mataKuliah->nama_matakuliah ?? 'Mata Kuliah Tidak Ditemukan' }}
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                    </tr>
                @endforeach
            </tbody>
            {{ $mahasiswa->links() }}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
</body>

</html>
