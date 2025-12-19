<footer class="bg-white rounded shadow p-4 mb-4 mt-4">
    <div class="row align-items-center">
        <div class="col-12 col-md-6 mb-3 mb-md-0 d-flex align-items-center justify-content-center justify-content-md-start">
            <img src="{{ asset('assets-admin/img/logo-umkm.png') }}" alt="Logo" style="height: 35px; width: auto;" class="me-3">
            <div class="border-start ps-3">
                <p class="mb-0 fw-semibold text-gray-700">
                    {{-- &copy; 2023 - {{ date('Y') }}  --}}
                    <span class="text-primary">2025 © UMKM KAMI</span>
                </p>
                {{-- <small class="text-muted">Developed by {{ config('app.name', 'Thariq') }}</small> --}}
            </div>
        </div>

        <div class="col-12 col-md-6 text-center text-md-end">
            <ul class="list-inline mb-0">
                <li class="list-inline-item me-3">
                    <span class="badge bg-gray-100 text-gray-800 px-3 py-2">
                        <i class="fas fa-shield-alt me-1"></i> UMKM KAMI
                    </span>
                </li>
                <li class="list-inline-item">
                    <span class="small text-muted italic">Versi 2.0.1</span>
                </li>
            </ul>
        </div>
    </div>
</footer>

<a href="https://wa.me/6281290068741?text=Halo%20Admin,%20saya%20ingin%20bertanya%20tentang%20layanan%20ini."
   class="float-whatsapp" target="_blank" title="Hubungi Admin">
    <img src="{{ asset('assets-admin/img/WhatsApp.png') }}" alt="WA">
</a>

<style>
    /* WhatsApp Button Styling */
    .float-whatsapp {
        position: fixed;
        width: 55px;
        height: 55px;
        bottom: 30px;
        right: 30px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        border-radius: 50%;
        z-index: 1050;
        transition: all 0.3s ease;
        background-color: #25d366;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .float-whatsapp:hover {
        transform: scale(1.1) rotate(5deg);
        background-color: #20ba5a;
    }

    .float-whatsapp img {
        width: 60%;
        height: auto;
    }

    /* Footer Logo adjustment */
    footer img {
        filter: grayscale(20%);
        transition: filter 0.3s;
    }
    
    footer img:hover {
        filter: grayscale(0%);
    }
</style>