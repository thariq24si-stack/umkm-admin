@extends('layouts.admin.app')
@section('content')
<div class="py-4">
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item">
                <a href="{{ route('home') }}">
                    <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Developer Profile</li>
        </ol>
    </nav>
</div>

<div class="row justify-content-center">
    <div class="col-12 col-xl-8">
        <div class="card border-0 shadow-lg p-3">
      <div class="card-header border-0 d-flex flex-column align-items-center justify-content-center">
    <div class="mb-3">
        <div class="profile-img-container">
            <img src="{{ asset('assets-admin/img/team/profile-picture-3.jpg') }}" 
                 class="shadow-lg border border-4 border-white" 
                 alt="Foto Thariq">
        </div>
    </div>
    <div class="text-center">
        <h2 class="h3 fw-extrabold mb-1">Thariq</h2>
        <p class="text-gray-600 fw-bold mb-0">NIM: 1234567890</p>
        <span class="badge bg-secondary text-dark px-3 mt-2">Program Studi Sistem Informasi</span>
    </div>
</div>
            
            <div class="card-body">
                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <h5 class="h6 text-uppercase text-muted fw-bold mb-4">Connect With Me</h5>
                        
                        <div class="d-flex justify-content-center gap-3">
                            <a href="https://linkedin.com/in/usernameanda" target="_blank" class="btn btn-icon-only btn-pill btn-outline-info" title="LinkedIn">
                                <i class="fab fa-linkedin-in"></i>
                            </a>

                            <a href="https://github.com/usernameanda" target="_blank" class="btn btn-icon-only btn-pill btn-outline-dark" title="GitHub">
                                <i class="fab fa-github"></i>
                            </a>

                            <a href="https://instagram.com/usernameanda" target="_blank" class="btn btn-icon-only btn-pill btn-outline-danger" title="Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>

                            <a href="https://wa.me/6281290068741" target="_blank" class="btn btn-icon-only btn-pill btn-outline-success" title="WhatsApp">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <hr class="my-4">

                <div class="row px-md-4">
                    <div class="col-12">
                        <h5 class="h6 fw-bold mb-3">Tentang Pengembang</h5>
                        <p class="text-gray-700 lh-lg">
                            Halo! Saya <strong>Thariq</strong>, pengembang dibalik Sistem Informasi Terpadu ini. 
                            Saya berfokus pada pengembangan aplikasi web yang efisien dan user-friendly untuk membantu 
                            digitalisasi data di tingkat UMKM maupun lingkungan warga.
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="card-footer border-0 text-center bg-white pb-4">
                <a href="{{ route('home') }}" class="btn btn-gray-800 d-inline-flex align-items-center">
                    <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali ke Dashboard
                </a>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<style>
    .profile-img-container {
        width: 160px; 
        height: 160px; 
        overflow: hidden;
        border-radius: 50%; 
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .profile-img-container img {
        width: 100%;
        height: 100%;
        object-fit: cover; 
        object-position: center;
        border-radius: 50%;
    }

    .profile-img-container img:hover {
        transform: scale(1.05);
        transition: transform 0.3s ease;
    }

    .btn-pill {
        border-radius: 50% !important;
        width: 45px;
        height: 45px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }
    .btn-pill {
        border-radius: 50rem !important;
        width: 45px;
        height: 45px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s ease-in-out;
    }
    .btn-pill:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 10px rgba(0,0,0,0.15);
    }
    .avatar-xl img {
        transition: transform 0.5s ease;
    }
    .avatar-xl img:hover {
        transform: scale(1.05);
    }
</style>
@endsection