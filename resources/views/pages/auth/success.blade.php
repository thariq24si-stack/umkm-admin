<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Terima Kasih</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #1e1e1e, #3a3a3a);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .thankyou-container {
            max-width: 700px;
            width: 100%;
            padding: 40px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.37);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            text-align: center;
        }

        .thankyou-container h2 {
            color: #ffffff;
            font-weight: bold;
        }

        .thankyou-container p {
            color: #ffffff;
            font-weight: 500;
        }

        .btn-primary {
            background-color: #202020;
            border: none;
        }

        .btn-primary:hover {
            background-color: #343434;
        }
    </style>
</head>
<body>

    <div class="thankyou-container">
        <h2>Terima Kasih, <strong>{{ $email }}</strong> 🎉</h2>
        <p class="lead">Anda sudah berhasil login.</p>

        <a href="{{ url('/auth') }}" class="btn btn-primary mt-4">Kembali ke Login</a>
        <a href="{{ url('/auth') }}" class="btn btn-primary mt-4">Halaman Admin</a>

    </div>

</body>
</html>
