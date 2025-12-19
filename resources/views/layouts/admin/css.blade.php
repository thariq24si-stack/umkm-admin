<link type="text/css" href="{{asset('assets-admin/css/volt.css') }}" rel="stylesheet">

<style>
    /* 1. Background Konten Tetap Putih Terang */
    main.content {
        background-color: #ffffff !important; 
        min-height: 100vh;
        position: relative;
        overflow-x: hidden;
    }

    /* 2. Gradasi Kuning di Bawah (Matching Sidebar) */
    main.content::after {
        content: "";
        position: fixed; 
        bottom: 0; 
        left: 0;
        width: 100%;
        height: 250px; 
        /* Gradasi halus warna emas ke transparan */
        background: linear-gradient(to top, rgba(212, 160, 23, 0.15) 0%, rgba(212, 160, 23, 0.02) 50%, transparent 100%);
        pointer-events: none; 
        z-index: 0;
    }

    /* 3. Menyamakan Shadow Box Tabel dengan Box Atas */
    /* Volt template biasanya pakai shadow halus 0 .5rem 1rem rgba(0,0,0,.15) */
    .card {
        background-color: #ffffff !important;
        border: 1px solid rgba(0, 0, 0, 0.05) !important; /* Border tipis agar tegas */
        border-radius: 0.5rem !important;
        /* Shadow disamakan dengan elemen search/input di atas */
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1), 0 1px 2px rgba(0, 0, 0, 0.06) !important;
        position: relative;
        z-index: 1;
    }

 
    .d-flex.justify-content-between .btn-success,
    .d-flex.justify-content-between .btn-primary {
        background: linear-gradient(135deg, #d4a017 0%, #b8860b 100%) !important;
        border: none !important;
        box-shadow: 0 4px 10px rgba(212, 160, 23, 0.2) !important;
        color: white !important;
    }

    .d-flex.justify-content-between .btn-success:hover {
        transform: translateY(-1px);
        box-shadow: 0 6px 15px rgba(212, 160, 23, 0.3) !important;
    }

    /* 5. Header Section agar teks judul tidak tertutup */
    .py-4 {
        position: relative;
        z-index: 2;
    }

    /* Menghilangkan garis default footer agar bersih */
    footer {
        border-top: none !important;
        background: transparent !important;
    }
</style>