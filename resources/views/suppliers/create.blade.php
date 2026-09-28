<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Supplier - StockFlow</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #f6f7f9;
            font-family: Arial, sans-serif;
        }

        .topbar {
            height: 65px;
            background: #fff;
            border-bottom: 1px solid #e9e9e9;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
        }

        .brand {
            font-size: 22px;
            font-weight: 700;
            color: #ff6600;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-avatar {
            width: 38px;
            height: 38px;
            background: #fff0e6;
            color: #ff6600;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
        }

        .content {
            padding: 30px;
            max-width: 1000px;
            margin: auto;
        }

        .page-title {
            font-weight: 700;
            color: #222;
        }

        .subtitle {
            color: #777;
            font-size: 14px;
        }

        .card-custom {
            background: #fff;
            border: none;
            border-radius: 14px;
            box-shadow: 0 4px 18px rgba(0, 0, 0, .05);
        }

        .card-header-custom {
            padding: 22px 25px;
            border-bottom: 1px solid #eee;
            font-weight: 600;
            font-size: 17px;
        }

        .card-body-custom {
            padding: 25px;
        }

        .form-label {
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .form-control {
            border-radius: 9px;
            padding: 11px 13px;
            border: 1px solid #ddd;
        }

        .form-control:focus {
            border-color: #ff6600;
            box-shadow: 0 0 0 .2rem rgba(255, 102, 0, .12);
        }

        .btn-orange {
            background: #ff6600;
            color: #fff;
            border: none;
            border-radius: 9px;
            padding: 11px 20px;
            font-weight: 600;
        }

        .btn-orange:hover {
            background: #e85b00;
            color: #fff;
        }

        .btn-secondary-custom {
            background: #f1f1f1;
            color: #555;
            border: none;
            border-radius: 9px;
            padding: 11px 20px;
            font-weight: 600;
        }

        .btn-secondary-custom:hover {
            background: #e5e5e5;
            color: #333;
        }

        .required {
            color: #dc3545;
        }

        .alert {
            border-radius: 10px;
        }
    </style>
</head>

<body>

    <!-- TOPBAR -->
    <div class="topbar">

        <div class="brand">
            <i class="bi bi-box-seam me-2"></i>
            StockFlow
        </div>

        <div class="user-info">

            <div class="text-end">
                <div class="fw-semibold">
                    {{ auth()->user()->name }}
                </div>

                <small class="text-muted text-capitalize">
                    {{ auth()->user()->role }}
                </small>
            </div>

            <div class="user-avatar">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button
                    type="submit"
                    class="btn btn-outline-danger btn-sm"
                >
                    <i class="bi bi-box-arrow-right"></i>
                </button>
            </form>

        </div>

    </div>


    <!-- CONTENT -->
    <div class="content">

        <div class="mb-4">

            <h3 class="page-title mb-1">
                Tambah Supplier
            </h3>

            <div class="subtitle">
                Tambahkan supplier baru ke dalam sistem StockFlow.
            </div>

        </div>


        <!-- VALIDATION ERROR -->
        @if ($errors->any())

            <div class="alert alert-danger">

                <div class="fw-semibold mb-2">
                    <i class="bi bi-exclamation-circle me-1"></i>
                    Terdapat kesalahan pada input:
                </div>

                <ul class="mb-0">

                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>

            </div>

        @endif


        <!-- FORM -->
        <div class="card-custom">

            <div class="card-header-custom">
                <i class="bi bi-truck me-2 text-warning"></i>
                Informasi Supplier
            </div>

            <div class="card-body-custom">

                <form
                    action="{{ route('suppliers.store') }}"
                    method="POST"
                >

                    @csrf

                    <div class="row g-4">

                        <!-- KODE -->
                        <div class="col-md-6">

                            <label class="form-label">
                                Kode Supplier <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                name="code"
                                class="form-control"
                                value="{{ old('code') }}"
                                placeholder="Contoh: SUP-001"
                                required
                            >

                            <small class="text-muted">
                                Kode unik untuk supplier.
                            </small>

                        </div>


                        <!-- NAMA -->
                        <div class="col-md-6">

                            <label class="form-label">
                                Nama Supplier <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                value="{{ old('name') }}"
                                placeholder="Contoh: PT Maju Bersama"
                                required
                            >

                        </div>


                        <!-- TELEPON -->
                        <div class="col-md-6">

                            <label class="form-label">
                                Nomor Telepon
                            </label>

                            <input
                                type="text"
                                name="phone"
                                class="form-control"
                                value="{{ old('phone') }}"
                                placeholder="Contoh: 081234567890"
                            >

                        </div>


                        <!-- EMAIL -->
                        <div class="col-md-6">

                            <label class="form-label">
                                Email
                            </label>

                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                value="{{ old('email') }}"
                                placeholder="supplier@email.com"
                            >

                        </div>


                        <!-- CONTACT PERSON -->
                        <div class="col-md-6">

                            <label class="form-label">
                                Contact Person
                            </label>

                            <input
                                type="text"
                                name="contact_person"
                                class="form-control"
                                value="{{ old('contact_person') }}"
                                placeholder="Nama orang yang dapat dihubungi"
                            >

                        </div>


                        <!-- ALAMAT -->
                        <div class="col-12">

                            <label class="form-label">
                                Alamat
                            </label>

                            <textarea
                                name="address"
                                class="form-control"
                                rows="4"
                                placeholder="Masukkan alamat lengkap supplier..."
                            >{{ old('address') }}</textarea>

                        </div>

                    </div>


                    <hr class="my-4">


                    <div class="d-flex justify-content-end gap-2">

                        <a
                            href="{{ route('suppliers.index') }}"
                            class="btn btn-secondary-custom"
                        >
                            <i class="bi bi-arrow-left me-1"></i>
                            Kembali
                        </a>

                        <button
                            type="submit"
                            class="btn btn-orange"
                        >
                            <i class="bi bi-check-lg me-1"></i>
                            Simpan Supplier
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</body>
</html>