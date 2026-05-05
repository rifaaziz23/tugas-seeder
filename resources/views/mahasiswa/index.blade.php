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
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal"
                                    data-delete-url="{{ route('mahasiswa.delete', ['id' => $mhs->npm]) }}"
                                    data-nama="{{ $mhs->nama }}">Hapus</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                {{ $mahasiswa->links() }}
        </div>
    </div>

    <!-- Modal Konfirmasi Hapus -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-header bg-danger text-white border-0">
                    <h5 class="modal-title" id="deleteModalLabel">
                        <i class="fas fa-trash-alt me-2"></i>Konfirmasi Penghapusan
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body py-4">
                    <p class="mb-0">
                        <strong>Apakah Anda yakin ingin menghapus data mahasiswa:</strong>
                    </p>
                    <p class="text-danger mt-2 mb-0">
                        <strong id="mahasiswaNama"></strong>
                    </p>
                    <p class="text-muted small mt-3 mb-0">
                        <i class="fas fa-info-circle me-2"></i>Tindakan ini tidak dapat dibatalkan!
                    </p>
                </div>
                <div class="modal-footer border-0 bg-light">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-2"></i>Batal
                    </button>
                    <a id="confirmDeleteBtn" href="#" class="btn btn-danger">
                        <i class="fas fa-trash-alt me-2"></i>Ya, Hapus Data
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        const deleteModal = document.getElementById('deleteModal');
        deleteModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const deleteUrl = button.getAttribute('data-delete-url');
            const namaMahasiswa = button.getAttribute('data-nama');

            document.getElementById('mahasiswaNama').textContent = namaMahasiswa;
            document.getElementById('confirmDeleteBtn').href = deleteUrl;
        });
    </script>
@endsection
