<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login - Dark Glass</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: linear-gradient(135deg, #1e1e1e, #3a3a3a);
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.37);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        .btn-login {
            background-color: #202020;
            color: #fff;
        }

        .btn-login:hover {
            background-color: #343434;
        }

        .input-field {
            background: rgba(255, 255, 255, 0.1);
            border: none;
            color: #fff;
        }

        .input-field::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .input-field:focus {
            outline: none;
            background: rgba(255, 255, 255, 0.15);
            border: 1px solid #555;
        }

        .image-section {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
    </style>
</head>

<body>
    <div class="glass-card w-full max-w-5xl mx-4 sm:mx-0 overflow-hidden">
        <div class="grid grid-cols-1 lg:grid-cols-2">

            <div class="image-section hidden lg:flex flex-col items-center justify-center p-8">
                <img src="{{ asset('assets-admin/img/village.jpg') }}" class="w-100 h-100 object-contain mb-6">
                <h3 class="text-white text-2xl font-bold text-center mb-2">Desa A</h3>
                <p class="text-gray-300 text-center">Menuju Desa Maju 2030</p>
                <p class="text-gray-400 text-sm text-center mt-4">Sistem Pengelolaan UMKM Desa</p>
            </div>


            <div class="p-8 lg:p-10">
                <h2 class="text-3xl text-white font-bold mb-4">Login Form Admin</h2>
                <p class="text-sm text-gray-300 mb-6">Halaman untuk login Admin pengelola UMKM yang ada di desa A, dengan misi untuk di 2030 desa menjadi lebih maju.</p>

                <!-- Session Message -->
                @if (session('status'))
                    <div class="mb-4 text-green-400 text-sm">
                        {{ session('status') }}
                    </div>
                @endif

                <!-- Errors -->
                @if($errors->any())
                    <div class="mb-4 text-red-400 text-sm">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('auth.login') }}" method="POST">
                    @csrf

                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="block text-white text-sm mb-1">Email</label>
                        <input id="email" name="email" type="email" required autofocus value="{{ old('email') }}"
                            class="input-field w-full px-4 py-2 rounded">
                        @error('email')
                        <span class="text-red-400 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-6">
                        <label for="password" class="block text-white text-sm mb-1">Password</label>
                        <input id="password" name="password" type="password" required
                            class="input-field w-full px-4 py-2 rounded">
                        @error('password')
                        <span class="text-red-400 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn-login w-full py-2 rounded font-semibold">Login</button>
                </form>
            </div>

        </div>
    </div>
</body>

</html>
