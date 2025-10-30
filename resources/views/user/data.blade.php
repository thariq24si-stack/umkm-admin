<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Data Produk - Dashboard UMKM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link type="text/css" href="{{ asset('assets-admin/css/volt.css') }}" rel="stylesheet">
</head>

<body>
    <nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
        <div class="sidebar-inner px-4 pt-3">
            <ul class="nav flex-column pt-3 pt-md-0">
                <li class="nav-item active">
                    <a href="{{ route('home') }}" class="nav-link">
                        <span class="sidebar-icon">
                            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                                <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                            </svg>
                        </span>
                        <span class="sidebar-text">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item active">
                    <a href="{{ route('produk.index') }}" class="nav-link">
                        <span class="sidebar-icon">
                            <svg class="icon icon-xs me-2" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 3h18v4H3V3zm0 6h18v12H3V9zm9 4a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </span>
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
                    <li class="breadcrumb-item">
                        <a href="#">
                            <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4h2v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Produk</a></li>
                </ol>
            </nav>

            <div class="d-flex justify-content-between w-100 flex-wrap">
                <div class="mb-3 mb-lg-0">
                    <h1 class="h4">Data Produk</h1>
                    <p class="mb-0">Daftar seluruh produk UMKM</p>
                </div>
                <div>
                    <a href="{{ route('user.create') }}" class="btn btn-success text-white">
                        Tambah user
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 mb-4">
                <div class="card border-0 shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-centered table-nowrap mb-0 rounded">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Nama User</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($dataUser as $user)
                                        <tr>
                                            <td>{{ $user->name}}</td>
                                              <td>{{ $user->email}}</td>
                                           
                                            <td>
                                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-info btn-sm">Edit</a>
                                                <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            @if($dataUser->isEmpty())
                                <p class="text-center mt-3 text-muted">Belum ada data produk.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="bg-white rounded shadow p-5 mb-4 mt-4 text-center">
            <p class="mb-0">© {{ date('Y') }} Dashboard UMKM</p>
        </footer>
    </main>

    <script src="{{ asset('assets-admin/vendor/@popperjs/core/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets-admin/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets-admin/js/volt.js') }}"></script>
</body>
</html>
