@extends('layouts.admin.app')
@section('content')
    <div class="py-4">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item">
                    <a href="#">
                        <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="#">User</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah User</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Tambah user</h1>
                <p class="mb-0">Form untuk menambahkan data user baru.</p>
            </div>
            {{--  <div>
                <a href="{{ route('user.index') }}" class="btn btn-primary"><i class="far fa-question-circle me-1"></i>
                    Kembali</a>
            </div>  --}}
        </div>
    </div>

    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-0 shadow components-section">
                <div class="card-body">
                    <form action="{{ route('user.store') }}" method="POST">
                        @csrf
                        <div class="row mb-4">
                            <div class="col-lg-4 col-sm-6">
                                <!-- First Name -->
                                <div class="mb-3">
                                    <label for="name" class="form-label">name</label>
                                    <input type="text" id="name" name="name"class="form-control"
                                        value="{{ old('name') }}" required>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <!-- Email -->
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" id="email" name="email" class="form-control"
                                            value="{{ old('email') }} "required>
                                    </div>

                                    <!-- Phone -->
                                    <div class="mb-3">
                                        <label for="password" class="form-label">password</label>
                                        <input type="text" id="password" name="password"class="form-control">
                                    </div>

                                    <!-- Buttons -->
                                    <div class="d-flex">
                                        <button type="submit" class="btn btn-primary">Simpan
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="m10.6 16.2l7.05-7.05l-1.4-1.4l-5.65 5.65l-2.85-2.85l-1.4 1.4zM3 21V3h18v18zm2-2h14V5H5zm0 0V5z" />
                                            </svg>
                                        </button>

                                        <a href="{{ route('user.index') }}" class="btn btn-outline-secondary ms-2">Batal
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M5 19h14V5H5zm-2 2V3h18v18zm5.4-4l3.6-3.6l3.6 3.6l1.4-1.4l-3.6-3.6L17 8.4L15.6 7L12 10.6L8.4 7L7 8.4l3.6 3.6L7 15.6zM5 19V5z" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <a href="{{ route('user.index') }}" class="btn btn-primary"><i
                                        class="far fa-question-circle me-1"></i>
                                    Kembali
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="m21.5 18l-9-6l9-6zm-10 0l-9-6l9-6zm-2-3.75v-4.5L6.1 12zm10 0v-4.5L16.1 12z" />
                                    </svg>
                                </a>
                            </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
