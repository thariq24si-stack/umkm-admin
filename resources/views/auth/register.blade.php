<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register - Dark Glass</title>
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

        .btn-register {
            background-color: #202020;
            color: #fff;
        }

        .btn-register:hover {
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
    </style>
</head>

<body>
    <div class="glass-card w-full max-w-md p-8 mx-4 sm:mx-0 text-center">
        <h2 class="text-3xl text-white font-bold mb-6">Register</h2>

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

        <form action="{{ route('register') }}" method="POST" class="text-left">
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
            <div class="mb-4">
                <label for="password" class="block text-white text-sm mb-1">Password</label>
                <input id="password" name="password" type="password" required
                    class="input-field w-full px-4 py-2 rounded">
                @error('password')
                <span class="text-red-400 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-6">
                <label for="password-confirm" class="block text-white text-sm mb-1">Konfirmasi Password</label>
                <input id="password-confirm" name="password_confirmation" type="password" required
                    class="input-field w-full px-4 py-2 rounded">
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn-register w-full py-2 rounded font-semibold">Register</button>
        </form>
    </div>
</body>

</html>
