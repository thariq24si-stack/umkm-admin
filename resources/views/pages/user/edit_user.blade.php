<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Edit User - Dashboard Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link type="text/css" href="{{ asset('assets-admin/css/volt.css') }}" rel="stylesheet">
    <style>
        .preview-container {
            background: #f8f9fa;
            border: 2px dashed #dee2e6;
            border-radius: 15px;
            padding: 25px;
            text-align: center;
        }
        .img-preview-user {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            border: 4px solid #fff;
        }
    </style>
</head>

<body>
    {{-- Alert Notifications --}}
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

    {{-- Sidebar --}}
    <nav id="sidebarMenu" class="sidebar d-lg-block bg-black text-white collapse" data-simplebar>
        <div class="sidebar-inner px-4 pt-3">
            <ul class="nav flex-column pt-3 pt-md-0">
                <li class="nav-item mb-4 text-center">
                    <a href="/" class="nav-link">
                         <img src="{{ asset('assets-admin/img/produk/logo-umkm.png') }}" alt="Logo" style="width: 120px; height: auto;">
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <span class="sidebar-text">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('produk.index') }}" class="nav-link">
                        <span class="sidebar-text">Produk</span>
                    </a>
                </li>
                <li class="nav-item active">
                    <a href="#" class="nav-link">
                        <span class="sidebar-text">User Settings</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <main class="content">
        {{-- Breadcrumb --}}
        <div class="py-4">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}">
                            <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">User</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Profil</li>
                </ol>
            </nav>
            <div class="d-flex justify-content-between w-100 flex-wrap mb-3">
                <div>
                    <h1 class="h4">Edit Profil User</h1>
                    <p class="mb-0">Perbarui informasi akun dan foto profil kamu.</p>
                </div>
                <div>
                    <a href="{{ route('produk.index') }}" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>

        {{-- Main Card --}}
        <div class="card border-0 shadow mb-4">
            <div class="card-body p-4">
                <form action="{{ route('user.update', $dataUser->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row g-4">
                        {{-- KOLOM KIRI: FOTO PROFIL --}}
                        <div class="col-md-4">
                            <div class="preview-container h-100 d-flex flex-column align-items-center justify-content-center">
                                <label class="form-label fw-bold mb-3">Foto Profil Saat Ini</label>
                                
                                @php
                                    $pathFoto = $dataUser->profile_picture 
                                                ? asset('uploads/' . $dataUser->profile_picture) 
                                                : 'https://ui-avatars.com/api/?name='.urlencode($dataUser->name).'&background=4A5073&color=fff&size=150';
                                @endphp

                                <img src="{{ $pathFoto }}" id="userPreview" class="img-preview-user mb-3 shadow" alt="Foto Profil">
                                
                                <div class="w-100 text-start">
                                    <label for="profile_picture" class="form-label small fw-bold">Unggah Foto Baru</label>
                                    <input type="file" id="profile_picture" name="profile_picture" class="form-control form-control-sm" onchange="previewUserImage(this)">
                                    <small class="text-muted d-block mt-1">Gunakan foto wajah yang jelas (Maks 2MB)</small>
                                </div>
                            </div>
                        </div>

                        {{-- KOLOM KANAN: FORM DATA --}}
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label for="name" class="form-label fw-bold">Nama Lengkap</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20"><path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"></path></svg></span>
                                        <input type="text" id="name" name="name" class="form-control"
                                            value="{{ old('name', $dataUser->name) }}" required placeholder="Masukkan nama user">
                                    </div>
                                </div>

                                <div class="col-12 mb-4">
                                    <label for="password" class="form-label fw-bold">Password (Kosongkan jika tidak diganti)</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path></svg></span>
                                        <input type="password" id="password" name="password" class="form-control" 
                                            placeholder="Masukkan password baru">
                                    </div>
                                    <small class="text-info mt-1 d-block">Biarkan kosong jika tetap ingin menggunakan password lama.</small>
                                </div>

                                <div class="col-12 d-flex justify-content-end border-top pt-4 mt-2">
                                    <a href="{{ route('produk.index') }}" class="btn btn-outline-gray-500 me-2">Batal</a>
                                    <button type="submit" class="btn btn-info text-white shadow-sm px-4">
                                        Simpan Perubahan User
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <footer class="bg-white rounded shadow p-4 mb-4 mt-4 text-center">
            <p class="mb-0 text-gray-700">© {{ date('Y') }} <span class="text-primary fw-bold">Thariq Dashboard</span></p>
        </footer>
    </main>

    {{-- Scripts --}}
    <script src="{{ asset('assets-admin/vendor/@popperjs/core/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets-admin/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets-admin/js/volt.js') }}"></script>

    <script>
        // Preview Foto User
        function previewUserImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('userPreview').src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
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