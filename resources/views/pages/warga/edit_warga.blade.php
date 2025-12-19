<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Edit Warga - CRUD Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link type="text/css" href="{{ asset('assets-admin/css/volt.css') }}" rel="stylesheet">
    <style>
        .form-section-title {
            border-bottom: 2px solid #f0f2f5;
            padding-bottom: 10px;
            margin-bottom: 20px;
            font-weight: bold;
            color: #262b40;
        }
        .file-list-card {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 15px;
        }
    </style>
</head>

<body>
    {{-- Alert Notifications --}}
    <div class="position-fixed top-0 start-50 translate-middle-x mt-3 z-3" style="width: 90%; max-width: 600px;">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    {{-- Sidebar --}}
    <nav id="sidebarMenu" class="sidebar d-lg-block bg-black text-white collapse" data-simplebar>
        <div class="sidebar-inner px-4 pt-3">
            <ul class="nav flex-column pt-3 pt-md-0">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link d-flex align-items-center">
                        <span class="sidebar-text">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item active">
                    <a href="{{ route('warga.index') }}" class="nav-link">
                        <span class="sidebar-text">Data Warga</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <main class="content">
        <div class="py-4">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}">
                            <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Warga</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Warga</li>
                </ol>
            </nav>
            <div class="d-flex justify-content-between w-100 flex-wrap">
                <div class="mb-3 mb-lg-0">
                    <h1 class="h4">Edit Data Warga</h1>
                    <p class="mb-0">Ubah informasi detail warga: <strong>{{ $dataWarga->first_name }} {{ $dataWarga->last_name }}</strong></p>
                </div>
                <div>
                    <a href="{{ route('data') }}" class="btn btn-outline-gray-600">Kembali</a>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow mb-4">
            <div class="card-body p-4">
                <form action="{{ route('warga.update', $dataWarga->warga_id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row g-4">
                        {{-- KOLOM KIRI: BIODATA --}}
                        <div class="col-md-7">
                            <h5 class="form-section-title">Informasi Pribadi</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="first_name" class="form-label fw-bold">First Name</label>
                                    <input type="text" id="first_name" name="first_name" class="form-control"
                                        value="{{ old('first_name', $dataWarga->first_name) }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="last_name" class="form-label fw-bold">Last Name</label>
                                    <input type="text" id="last_name" name="last_name" class="form-control"
                                        value="{{ old('last_name', $dataWarga->last_name) }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="birthday" class="form-label fw-bold">Birthday</label>
                                    <input type="date" id="birthday" name="birthday" class="form-control"
                                        value="{{ old('birthday', $dataWarga->birthday) }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="gender" class="form-label fw-bold">Gender</label>
                                    <select id="gender" name="gender" class="form-select">
                                        <option value="">-- Pilih --</option>
                                        <option value="Female" {{ $dataWarga->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                        <option value="Male" {{ $dataWarga->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                        <option value="Other" {{ $dataWarga->gender == 'Other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label fw-bold">Email Address</label>
                                    <input type="email" id="email" name="email" class="form-control"
                                        value="{{ old('email', $dataWarga->email) }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label fw-bold">Phone Number</label>
                                    <input type="text" id="phone" name="phone" class="form-control"
                                        value="{{ old('phone', $dataWarga->phone) }}">
                                </div>
                            </div>
                        </div>

                        {{-- KOLOM KANAN: FILES --}}
                        <div class="col-md-5 border-start ps-md-4">
                            <h5 class="form-section-title">Dokumen & Lampiran</h5>
                            
                            <div class="mb-4">
                                <label for="files" class="form-label fw-bold">Upload Dokumen Baru</label>
                                <input type="file" name="files[]" class="form-control" multiple>
                                <small class="text-muted">Bisa pilih lebih dari 1 file.</small>
                            </div>

                            @if($dataWarga->files && count($dataWarga->files) > 0)
                            <div class="file-list-card">
                                <label class="form-label fw-bold mb-2">File Terlampir:</label>
                                <ul class="list-group list-group-flush border-0">
                                    @foreach($dataWarga->files as $file)
                                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent px-0 py-2">
                                            <div class="d-flex align-items-center">
                                                <svg class="icon icon-xs me-2 text-primary" fill="currentColor" viewBox="0 0 20 20"><path d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z"></path></svg>
                                                <a href="{{ asset('storage/'.$file->filename) }}" target="_blank" class="small text-truncate" style="max-width: 150px;">{{ $file->filename }}</a>
                                            </div>
                                            <button type="button" class="btn btn-sm btn-link text-danger p-0" onclick="confirmDelete('{{ $file->id }}')">Hapus</button>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            @else
                                <div class="text-center py-4 bg-light rounded">
                                    <p class="text-muted small mb-0">Belum ada dokumen terunggah.</p>
                                </div>
                            @endif
                        </div>

                        {{-- BUTTONS --}}
                        <div class="col-12 text-end border-top pt-4">
                            <a href="{{ route('data') }}" class="btn btn-link text-gray-600 me-2">Batal</a>
                            <button type="submit" class="btn btn-info px-4">Simpan Perubahan</button>
                        </div>
                    </div>
                </form>

                {{-- Hidden Forms for Deleting Files --}}
                @foreach($dataWarga->files as $file)
                    <form id="delete-file-{{ $file->id }}" action="{{ route('warga.file.destroy', $file->id) }}" method="POST" style="display:none;">
                        @csrf
                        @method('DELETE')
                    </form>
                @endforeach
            </div>
        </div>

        <footer class="bg-white rounded shadow p-4 mb-4 mt-4 text-center">
             <p class="mb-0">© 2025 Dashboard Thariq</p>
        </footer>
    </main>

    <script src="{{ asset('assets-admin/vendor/@popperjs/core/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets-admin/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets-admin/js/volt.js') }}"></script>

    <script>
        // Sweet alert replacement or standard confirmation
        function confirmDelete(id) {
            if (confirm('Apakah Anda yakin ingin menghapus file ini?')) {
                document.getElementById('delete-file-' + id).submit();
            }
        }

        // Auto-close alerts
        setTimeout(() => {
            const alert = document.querySelector('.alert');
            if (alert) {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            }
        }, 3000);
    </script>
</body>
</html>