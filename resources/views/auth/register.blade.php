<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Register - StockFlow</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: Arial, Helvetica, sans-serif;
            background: #f7f7f7;
        }

        .auth-wrapper {
            min-height: 100vh;
            display: flex;
        }

        .auth-left {
            width: 50%;
            background: linear-gradient(
                135deg,
                #ff6600,
                #ff8533
            );

            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 50px;
        }

        .brand-content {
            max-width: 480px;
        }

        .brand-icon {
            width: 70px;
            height: 70px;
            border-radius: 18px;
            background: rgba(255,255,255,.2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 34px;
            margin-bottom: 25px;
        }

        .brand-content h1 {
            font-size: 48px;
            font-weight: 800;
            margin-bottom: 15px;
        }

        .brand-content p {
            font-size: 18px;
            line-height: 1.7;
            opacity: .9;
        }

        .auth-right {
            width: 50%;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px;
        }

        .register-card {
            width: 100%;
            max-width: 430px;
        }

        .register-card h2 {
            font-weight: 700;
            color: #222;
            margin-bottom: 8px;
        }

        .subtitle {
            color: #777;
            margin-bottom: 30px;
        }

        .form-label {
            font-weight: 600;
            color: #333;
        }

        .form-control {
            height: 48px;
            border-radius: 10px;
            border: 1px solid #ddd;
        }

        .form-control:focus {
            border-color: #ff6600;
            box-shadow: 0 0 0 .2rem rgba(255,102,0,.12);
        }

        .btn-register {
            height: 48px;
            background: #ff6600;
            border: none;
            border-radius: 10px;
            color: white;
            font-weight: 600;
        }

        .btn-register:hover {
            background: #e85c00;
            color: white;
        }

        .login-link {
            color: #ff6600;
            text-decoration: none;
            font-weight: 600;
        }

        .login-link:hover {
            color: #d94f00;
        }

        .alert {
            border-radius: 10px;
        }

        @media (max-width: 768px) {
            .auth-left {
                display: none;
            }

            .auth-right {
                width: 100%;
            }
        }
    </style>
</head>

<body>

<div class="auth-wrapper">

    <div class="auth-left">

        <div class="brand-content">

            <div class="brand-icon">
                <i class="bi bi-box-seam"></i>
            </div>

            <h1>StockFlow</h1>

            <p>
                Kelola stok, produk, penjualan, pembelian,
                dan aktivitas bisnis dalam satu sistem.
            </p>

        </div>

    </div>


    <div class="auth-right">

        <div class="register-card">

            <h2>Buat Akun</h2>

            <div class="subtitle">
                Daftar untuk mulai menggunakan StockFlow.
            </div>


            @if($errors->any())

                <div class="alert alert-danger">

                    <ul class="mb-0 ps-3">

                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>

                </div>

            @endif


            <form
                action="{{ route('register') }}"
                method="POST"
            >

                @csrf


                <div class="mb-3">

                    <label
                        for="name"
                        class="form-label"
                    >
                        Nama
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="form-control"
                        value="{{ old('name') }}"
                        placeholder="Masukkan nama"
                        required
                        autofocus
                    >

                </div>


                <div class="mb-3">

                    <label
                        for="email"
                        class="form-label"
                    >
                        Email
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-control"
                        value="{{ old('email') }}"
                        placeholder="nama@email.com"
                        required
                    >

                </div>


                <div class="mb-3">

                    <label
                        for="password"
                        class="form-label"
                    >
                        Password
                    </label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-control"
                        placeholder="Minimal 8 karakter"
                        required
                    >

                </div>


                <div class="mb-4">

                    <label
                        for="password_confirmation"
                        class="form-label"
                    >
                        Konfirmasi Password
                    </label>

                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        class="form-control"
                        placeholder="Ulangi password"
                        required
                    >

                </div>


                <button
                    type="submit"
                    class="btn btn-register w-100"
                >
                    <i class="bi bi-person-plus me-2"></i>
                    Buat Akun
                </button>

            </form>


            <div class="text-center mt-4">

                Sudah punya akun?

                <a
                    href="{{ route('login') }}"
                    class="login-link"
                >
                    Login
                </a>

            </div>

        </div>

    </div>

</div>

</body>
</html>