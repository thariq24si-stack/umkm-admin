<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Edit Produk - Dashboard Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link type="text/css" href="{{ asset('assets-admin/css/volt.css') }}" rel="stylesheet">
    <style>
        .preview-container {
            background: #f8f9fa;
            border: 2px dashed #dee2e6;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
        }
        .img-preview {
            width: 100%;
            max-height: 280px;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
    </style>
</head>

<body>
    <div class="position-fixed top-0 start-50 translate-middle-x mt-3 z-3" style="width: 90%; max-width: 600px;">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
    </div>

    <nav id="sidebarMenu" class="sidebar d-lg-block bg-black text-white collapse" data-simplebar>
        <div class="sidebar-inner px-4 pt-3">
            <ul class="nav flex-column pt-3 pt-md-0">
                <li class="nav-item mb-4">
                    <a href="/" class="nav-link d-flex align-items-center justify-content-center">
                        <img src="{{ asset('assets-admin/img/produk/logo-umkm.png') }}" alt="Logo" style="width: 150px; height: auto;">
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <span class="sidebar-text">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item active">
                    <a href="{{ route('produk.index') }}" class="nav-link">
                        <span class="sidebar-text">Produk</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <main class="content">
        <div class="py-4">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('produk.index') }}">Produk</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Produk</li>
                </ol>
            </nav>
            <div class="d-flex justify-content-between w-100 flex-wrap">
                <div>
                    <h1 class="h4">Edit Produk: {{ $dataProduk->nama_produk }}</h1>
                    <p class="mb-0">Perbarui informasi detail produk di bawah ini.</p>
                </div>
                <div>
                    <a href="{{ route('produk.index') }}" class="btn btn-outline-gray-600">
                        <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                        Kembali
                    </a>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow mb-4">
            <div class="card-body p-4">
                <form action="{{ route('produk.update', $dataProduk->produk_id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="preview-container">
                                <label class="form-label fw-bold mb-3">Foto Produk</label>
                                
                                @php
                                    $urlFoto = null;
                                    if ($dataProduk->gambar) {
                                        $urlFoto = str_contains($dataProduk->gambar, 'assets-admin') 
                                                   ? asset($dataProduk->gambar) 
                                                   : asset('storage/' . $dataProduk->gambar);
                                    }
                                @endphp

                                <img src="{{ $urlFoto ?? 'https://ui-avatars.com/api/?name='.urlencode($dataProduk->nama_produk).'&size=300' }}" 
                                     id="previewImg" class="img-preview mb-3" alt="Preview">
                                
                                <div class="text-start">
                                    <label for="gambar" class="form-label small fw-bold">Unggah Foto Baru</label>
                                    <input type="file" id="gambar" name="gambar" class="form-control form-control-sm" onchange="previewFile(this)">
                                    <small class="text-muted d-block mt-1">Saran: Rasio 1:1, Maks 2MB</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label for="nama_produk" class="form-label fw-bold">Nama Produk</label>
                                    <input type="text" id="nama_produk" name="nama_produk" class="form-control"
                                        value="{{ old('nama_produk', $dataProduk->nama_produk) }}" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="harga" class="form-label fw-bold">Harga (Rp)</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-gray-200">Rp</span>
                                        <input type="number" id="harga" name="harga" class="form-control"
                                            value="{{ old('harga', $dataProduk->harga) }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="stok" class="form-label fw-bold">Stok Tersedia</label>
                                    <input type="number" id="stok" name="stok" class="form-control"
                                        value="{{ old('stok', $dataProduk->stok) }}">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="kategori" class="form-label fw-bold">Kategori</label>
                                    <input type="text" id="kategori" name="kategori" class="form-control"
                                        value="{{ old('kategori', $dataProduk->kategori) }}" placeholder="Contoh: Kerajinan">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="status" class="form-label fw-bold">Status Produk</label>
                                    <select id="status" name="status" class="form-select">
                                        <option value="Tersedia" {{ $dataProduk->status == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                                        <option value="Habis" {{ $dataProduk->status == 'Habis' ? 'selected' : '' }}>Habis</option>
                                    </select>
                                </div>

                                <div class="col-12 mb-4">
                                    <label for="deskripsi" class="form-label fw-bold">Deskripsi</label>
                                    <textarea id="deskripsi" name="deskripsi" class="form-control" rows="5">{{ old('deskripsi', $dataProduk->deskripsi) }}</textarea>
                                </div>

                                <div class="col-12 d-flex justify-content-end border-top pt-3">
                                    <button type="submit" class="btn btn-info text-white me-2">
                                        Simpan Perubahan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <footer class="bg-white rounded shadow p-4 mb-4 mt-4 text-center">
            <p class="mb-0 text-gray-700">© {{ date('Y') }} Dashboard UMKM</p>
        </footer>
    </main>

    <script src="{{ asset('assets-admin/vendor/@popperjs/core/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets-admin/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script>
        // Fungsi untuk Preview Gambar secara Real-time
        function previewFile(input) {
            var file = input.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function() {
                    document.getElementById("previewImg").src = reader.result;
                }
                reader.readAsDataURL(file);
            }
        }

        // Auto-close alert
        setTimeout(() => {
            const alert = document.querySelector('.alert');
            if (alert) new bootstrap.Alert(alert).close();
        }, 3000);
    </script>
</body>
</html>