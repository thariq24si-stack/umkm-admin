<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Edit Produk</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Volt CSS -->
    <link type="text/css" href="{{ asset('assets-admin/css/volt.css') }}" rel="stylesheet">
</head>

<body>
    <h1 class="text-center mt-4">Edit Produk</h1>

    <div class="position-fixed top-0 start-50 translate-middle-x mt-3 z-3" style="width: 90%; max-width: 600px;">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
    </div>

    <nav id="sidebarMenu" class="sidebar d-lg-block bg-black text-white collapse" data-simplebar>
        <div class="sidebar-inner px-4 pt-3">
            <ul class="nav flex-column pt-3 pt-md-0">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link d-flex align-items-center">
                        <span class="sidebar-text">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item active">
                    <a href="{{ route('produk.index') }}" class="nav-link">
                        <span class="sidebar-text">Produk</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <span class="sidebar-text">Pelanggan</span>
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
                            <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Produk</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Produk</li>
                </ol>
            </nav>

            <div class="d-flex justify-content-between w-100 flex-wrap mb-3">
                <div>
                    <h1 class="h4">Edit Produk</h1>
                    <p class="mb-0">Form untuk mengubah data produk.</p>
                </div>
                <div>
                    <a href="{{ route('produk.index') }}" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 mb-4">
                <div class="card border-0 shadow components-section">
                    <div class="card-body">
                        <form action="{{ route('produk.update', $dataProduk->produk_id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row mb-4">
                                <div class="col-lg-4 col-sm-6">
                                    <div class="mb-3">
                                        <label for="umkm_id" class="form-label">UMKM ID</label>
                                        <input type="number" id="umkm_id" name="umkm_id" class="form-control"
                                            value="{{ old('umkm_id', $dataProduk->umkm_id) }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="nama_produk" class="form-label">Nama Produk</label>
                                        <input type="text" id="nama_produk" name="nama_produk" class="form-control"
                                            value="{{ old('nama_produk', $dataProduk->nama_produk) }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="kategori" class="form-label">Kategori</label>
                                        <input type="text" id="kategori" name="kategori" class="form-control"
                                            value="{{ old('kategori', $dataProduk->kategori) }}">
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-6">
                                    <div class="mb-3">
                                        <label for="harga" class="form-label">Harga</label>
                                        <input type="number" id="harga" name="harga" class="form-control"
                                            value="{{ old('harga', $dataProduk->harga) }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="stok" class="form-label">Stok</label>
                                        <input type="number" id="stok" name="stok" class="form-control"
                                            value="{{ old('stok', $dataProduk->stok) }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="foto" class="form-label">Foto Produk</label>
                                        <input type="file" id="foto" name="foto" class="form-control">
                                        @if($dataProduk->foto)
                                            <div class="mt-2">
                                                <p class="mb-1">Foto Saat Ini:</p>
                                                <img src="{{ asset('storage/'.$dataProduk->foto) }}" width="120" class="rounded shadow-sm">
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="mb-3">
                                        <label for="deskripsi" class="form-label">Deskripsi</label>
                                        <textarea id="deskripsi" name="deskripsi" class="form-control" rows="6">{{ old('deskripsi', $dataProduk->deskripsi) }}</textarea>
                                    </div>

                                    <div class="">
                                        <button type="submit" class="btn btn-info">Simpan Perubahan</button>
                                        <a href="{{ route('produk.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <footer class="bg-white rounded shadow p-5 mb-4 mt-4">
            <div class="text-center">
                <p class="mb-0 text-gray-700">© {{ date('Y') }} <a href="https://themesberg.com" target="_blank" class="text-primary">thariq</a></p>
            </div>
        </footer>
    </main>

    <!-- Core JS -->
    <script src="{{ asset('assets-admin/vendor/@popperjs/core/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets-admin/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <script>
        setTimeout(() => {
            const alert = document.querySelector('.alert');
            if (alert) new bootstrap.Alert(alert).close();
        }, 3000);
    </script>

    <script src="{{ asset('assets-admin/js/volt.js') }}"></script>
</body>
</html>
