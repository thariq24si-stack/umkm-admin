<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login | Sistem Informasi Desa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-color: #1a1a1a; /* Hitam solid elegant */
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }

        .main-card {
            background: #242424; /* Warna kartu lebih terang dari bg */
            border-radius: 12px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
            border: 1px solid #333;
            display: flex;
            overflow: hidden;
            max-width: 950px;
            width: 100%;
        }

        /* Aksen Kuning Elegan (Bukan Kuning Terang) */
        .bg-accent-yellow {
            background: #d4a017; /* Kuning emas tua / harvest gold */
        }

        .text-accent-yellow {
            color: #d4a017;
        }

        .btn-primary-custom {
            background-color: #d4a017;
            color: #1a1a1a;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary-custom:hover {
            background-color: #b88a12;
            transform: translateY(-1px);
        }

        .input-dark {
            background: #2d2d2d;
            border: 1px solid #444;
            color: #eeeeee;
        }

        .input-dark:focus {
            border-color: #d4a017;
            outline: none;
            box-shadow: 0 0 0 2px rgba(212, 160, 23, 0.2);
        }

        /* Overlay gambar agar teks terbaca */
        .image-overlay {
            background: linear-gradient(to bottom, rgba(26, 26, 26, 0.2), rgba(26, 26, 26, 0.9));
        }

        .img-profile-frame {
            width: 180px;
            height: 180px;
            border-radius: 50%; /* Bulat Sempurna */
            border: 4px solid #d4a017;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <div class="main-card mx-4 lg:mx-0 flex-col lg:flex-row">
        
        <div class="lg:w-1/2 relative min-h-[300px] lg:min-h-[550px] flex items-center justify-center overflow-hidden">
            <img src="{{ asset('assets-admin/img/villagee.jpg') }}" class="absolute inset-0 w-full h-full object-cover" alt="Village">
            <div class="absolute inset-0 image-overlay"></div>

            <div class="relative z-10 text-center px-8">
                <img src="{{ asset('assets-admin/img/brand/light.svg') }}" class="h-10 mx-auto mb-6" alt="Logo">
                
                <img src="{{ asset('assets-admin/img/villagee.jpg') }}" class="img-profile-frame mx-auto mb-6 shadow-xl" alt="Village Circular">
                
                <h3 class="text-white text-3xl font-bold tracking-tight">Desa A</h3>
                <p class="text-accent-yellow font-medium mt-1 uppercase tracking-widest text-sm">Visi Desa Maju 2030</p>
                <p class="text-gray-300 text-sm mt-4 leading-relaxed max-w-xs mx-auto">
                    Pusat pengelolaan data UMKM terpadu untuk kesejahteraan ekonomi warga.
                </p>
            </div>
        </div>

        <div class="lg:w-1/2 p-8 lg:p-14 flex flex-col justify-center border-t lg:border-t-0 lg:border-l border-gray-800">
            <div class="mb-10">
                <h2 class="text-white text-2xl font-semibold">Selamat Datang</h2>
                <p class="text-gray-400 text-sm mt-2">Silakan masukkan akun admin Anda untuk mengelola sistem.</p>
            </div>

            @if($errors->any())
                <div class="mb-6 p-4 bg-red-900/20 border-l-4 border-red-500 text-red-400 text-xs">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('auth.login') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label class="block text-gray-300 text-xs font-semibold uppercase tracking-wider mb-2">Alamat Email</label>
                    <input type="email" name="email" required autofocus
                        class="input-dark w-full px-4 py-3 rounded-lg text-sm" 
                        placeholder="nama@email.com">
                </div>

                <div>
                    <div class="flex justify-between items-center mb-2">
                        <label class="text-gray-300 text-xs font-semibold uppercase tracking-wider">Kata Sandi</label>
                        <a href="#" class="text-accent-yellow text-xs hover:text-white transition">Lupa?</a>
                    </div>
                    <input type="password" name="password" required
                        class="input-dark w-full px-4 py-3 rounded-lg text-sm" 
                        placeholder="••••••••">
                </div>

                <div class="flex items-center">
                    <input type="checkbox" id="remember" class="rounded bg-gray-700 border-gray-600 text-accent-yellow focus:ring-accent-yellow">
                    <label for="remember" class="ml-2 text-xs text-gray-400">Ingat saya di perangkat ini</label>
                </div>

                <button type="submit" class="btn-primary-custom w-full py-3.5 rounded-lg text-sm shadow-lg">
                    MASUK KE DASHBOARD
                </button>
            </form>

            <div class="mt-12 pt-6 border-t border-gray-800 text-center">
                <p class="text-gray-500 text-[10px] uppercase tracking-[0.2em]">
                    &copy; 2025 SISTEM ADMIN UMKM 
                </p>
            </div>
        </div>

    </div>
</body>

</html>