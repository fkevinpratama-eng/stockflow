<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Pengeluaran - StockFlow</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --orange: #ff6600;
            --orange-dark: #e85d00;
            --bg: #f7f8fa;
            --border: #e5e7eb;
            --muted: #6c757d;
        }

        body {
            margin: 0;
            background: var(--bg);
            color: #212529;
            font-family: Arial, Helvetica, sans-serif;
        }

        .topbar {
            height: 64px;
            background: #fff;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 28px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--orange);
            font-size: 21px;
            font-weight: 700;
        }

        .brand-icon {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background: var(--orange);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .user-area {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #fff1e8;
            color: var(--orange);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
        }

        .user-info {
            line-height: 1.2;
        }

        .user-name {
            font-size: 14px;
            font-weight: 600;
        }

        .user-role {
            font-size: 12px;
            color: var(--muted);
            text-transform: capitalize;
        }

        .logout-btn {
            border: none;
            background: transparent;
            color: #6c757d;
            font-size: 18px;
        }

        .logout-btn:hover {
            color: #dc3545;
        }

        .main-content {
            max-width: 1000px;
            margin: auto;
            padding: 30px;
        }

        .page-header {
            margin-bottom: 22px;
        }

        .back-link {
            color: var(--muted);
            text-decoration: none;
            font-size: 13px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-bottom: 13px;
        }

        .back-link:hover {
            color: var(--orange);
        }

        .page-title {
            margin: 0;
            font-size: 28px;
            font-weight: 700;
        }

        .page-subtitle {
            color: var(--muted);
            font-size: 14px;
            margin: 6px 0 0;
        }

        .form-card {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 25px;
        }

        .section-title {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .form-label {
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 7px;
        }

        .form-control,
        .form-select {
            min-height: 44px;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            font-size: 13px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--orange);
            box-shadow: 0 0 0 3px rgba(255, 102, 0, .1);
        }

        textarea.form-control {
            min-height: 100px;
            resize: vertical;
        }

        .input-group-text {
            border-color: #dee2e6;
            background: #f8f9fa;
            font-size: 13px;
            color: #495057;
        }

        .invalid-feedback {
            font-size: 12px;
        }

        .form-actions {
            border-top: 1px solid var(--border);
            margin-top: 25px;
            padding-top: 20px;
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .btn-cancel {
            border: 1px solid #dee2e6;
            background: white;
            color: #495057;
            padding: 10px 17px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
        }

        .btn-cancel:hover {
            background: #f8f9fa;
            color: #212529;
        }

        .btn-save {
            border: none;
            background: var(--orange);
            color: white;
            padding: 10px 18px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 7px;
        }

        .btn-save:hover {
            background: var(--orange-dark);
        }

        .required {
            color: #dc3545;
        }

        .alert {
            border-radius: 10px;
            font-size: 13px;
        }

        .info-box {
            background: #fff8f3;
            border: 1px solid #ffe2d0;
            border-radius: 9px;
            padding: 12px 14px;
            color: #7a4525;
            font-size: 12px;
            margin-bottom: 22px;
        }

        @media (max-width: 768px) {

            .topbar {
                padding: 0 15px;
            }

            .user-info {
                display: none;
            }

            .main-content {
                padding: 20px 15px;
            }

            .page-title {
                font-size: 23px;
            }

            .form-card {
                padding: 18px;
            }

            .form-actions {
                flex-direction: column-reverse;
            }

            .btn-cancel,
            .btn-save {
                width: 100%;
                justify-content: center;
                text-align: center;
            }
        }
    </style>
</head>

<body>

    <!-- TOPBAR -->
    <div class="topbar">

        <div class="brand">
            <div class="brand-icon">
                <i class="bi bi-box-seam"></i>
            </div>

            StockFlow
        </div>

        <div class="user-area">

            <div class="avatar">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>

            <div class="user-info">

                <div class="user-name">
                    {{ auth()->user()->name }}
                </div>

                <div class="user-role">
                    {{ auth()->user()->role }}
                </div>

            </div>

            <form action="{{ route('logout') }}" method="POST">

                @csrf

                <button
                    type="submit"
                    class="logout-btn"
                    title="Logout"
                >
                    <i class="bi bi-box-arrow-right"></i>
                </button>

            </form>

        </div>

    </div>


    <!-- CONTENT -->
    <main class="main-content">

        <div class="page-header">

            <a
                href="{{ route('expenses.index') }}"
                class="back-link"
            >
                <i class="bi bi-arrow-left"></i>
                Kembali ke Pengeluaran
            </a>

            <h1 class="page-title">
                Tambah Pengeluaran
            </h1>

            <p class="page-subtitle">
                Catat pengeluaran bisnis baru ke dalam sistem.
            </p>

        </div>


        <!-- VALIDATION ERROR -->
        @if($errors->any())

            <div class="alert alert-danger">

                <div class="fw-semibold mb-1">
                    Terdapat kesalahan:
                </div>

                <ul class="mb-0 ps-3">

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        <div class="form-card">

            <div class="section-title">
                Informasi Pengeluaran
            </div>

            <div class="info-box">
                <i class="bi bi-info-circle me-1"></i>

                Pastikan informasi pengeluaran yang dimasukkan sudah benar
                sebelum menyimpan transaksi.
            </div>


            <form
                action="{{ route('expenses.store') }}"
                method="POST"
                id="expenseForm"
            >

                @csrf


                <div class="row g-3">

                    <!-- NOMOR -->
                    <div class="col-md-6">

                        <label class="form-label">
                            Nomor Pengeluaran
                            <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            name="expense_number"
                            class="form-control @error('expense_number') is-invalid @enderror"
                            placeholder="Contoh: EXP-0001"
                            value="{{ old('expense_number') }}"
                            required
                        >

                        @error('expense_number')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <!-- TANGGAL -->
                    <div class="col-md-6">

                        <label class="form-label">
                            Tanggal Pengeluaran
                            <span class="required">*</span>
                        </label>

                        <input
                            type="date"
                            name="expense_date"
                            class="form-control @error('expense_date') is-invalid @enderror"
                            value="{{ old('expense_date', date('Y-m-d')) }}"
                            required
                        >

                        @error('expense_date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <!-- KATEGORI -->
                    <div class="col-md-6">

                        <label class="form-label">
                            Kategori Pengeluaran
                            <span class="required">*</span>
                        </label>

                        <select
                            name="category"
                            class="form-select @error('category') is-invalid @enderror"
                            required
                        >

                            <option value="">
                                Pilih kategori
                            </option>

                            <option
                                value="Operasional"
                                {{ old('category') == 'Operasional' ? 'selected' : '' }}
                            >
                                Operasional
                            </option>

                            <option
                                value="Transportasi"
                                {{ old('category') == 'Transportasi' ? 'selected' : '' }}
                            >
                                Transportasi
                            </option>

                            <option
                                value="Listrik & Internet"
                                {{ old('category') == 'Listrik & Internet' ? 'selected' : '' }}
                            >
                                Listrik & Internet
                            </option>

                            <option
                                value="Gaji & Upah"
                                {{ old('category') == 'Gaji & Upah' ? 'selected' : '' }}
                            >
                                Gaji & Upah
                            </option>

                            <option
                                value="Sewa"
                                {{ old('category') == 'Sewa' ? 'selected' : '' }}
                            >
                                Sewa
                            </option>

                            <option
                                value="Perawatan"
                                {{ old('category') == 'Perawatan' ? 'selected' : '' }}
                            >
                                Perawatan
                            </option>

                            <option
                                value="Lainnya"
                                {{ old('category') == 'Lainnya' ? 'selected' : '' }}
                            >
                                Lainnya
                            </option>

                        </select>

                        @error('category')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <!-- METODE -->
                    <div class="col-md-6">

                        <label class="form-label">
                            Metode Pembayaran
                            <span class="required">*</span>
                        </label>

                        <select
                            name="payment_method"
                            class="form-select @error('payment_method') is-invalid @enderror"
                            required
                        >

                            <option value="">
                                Pilih metode pembayaran
                            </option>

                            <option
                                value="cash"
                                {{ old('payment_method') == 'cash' ? 'selected' : '' }}
                            >
                                Cash
                            </option>

                            <option
                                value="transfer"
                                {{ old('payment_method') == 'transfer' ? 'selected' : '' }}
                            >
                                Transfer
                            </option>

                            <option
                                value="qris"
                                {{ old('payment_method') == 'qris' ? 'selected' : '' }}
                            >
                                QRIS
                            </option>

                            <option
                                value="card"
                                {{ old('payment_method') == 'card' ? 'selected' : '' }}
                            >
                                Kartu
                            </option>

                        </select>

                        @error('payment_method')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <!-- DESKRIPSI -->
                    <div class="col-12">

                        <label class="form-label">
                            Deskripsi
                            <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            name="description"
                            class="form-control @error('description') is-invalid @enderror"
                            placeholder="Contoh: Pembelian alat tulis kantor"
                            value="{{ old('description') }}"
                            required
                        >

                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <!-- NOMINAL -->
                    <div class="col-md-6">

                        <label class="form-label">
                            Jumlah Pengeluaran
                            <span class="required">*</span>
                        </label>

                        <div class="input-group">

                            <span class="input-group-text">
                                Rp
                            </span>

                            <input
                                type="number"
                                name="amount"
                                class="form-control @error('amount') is-invalid @enderror"
                                placeholder="0"
                                min="0"
                                step="0.01"
                                value="{{ old('amount') }}"
                                required
                            >

                        </div>

                        @error('amount')
                            <div class="text-danger mt-1" style="font-size: 12px;">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <!-- CATATAN -->
                    <div class="col-12">

                        <label class="form-label">
                            Catatan
                            <span class="text-muted fw-normal">
                                (Opsional)
                            </span>
                        </label>

                        <textarea
                            name="notes"
                            class="form-control @error('notes') is-invalid @enderror"
                            placeholder="Tambahkan catatan jika diperlukan..."
                        >{{ old('notes') }}</textarea>

                        @error('notes')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                </div>


                <!-- ACTION -->
                <div class="form-actions">

                    <a
                        href="{{ route('expenses.index') }}"
                        class="btn-cancel"
                    >
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="btn-save"
                        id="saveButton"
                    >
                        <i class="bi bi-check-lg"></i>
                        Simpan Pengeluaran
                    </button>

                </div>

            </form>

        </div>

    </main>


    <script>

        const form = document.getElementById('expenseForm');
        const button = document.getElementById('saveButton');

        form.addEventListener('submit', function () {

            button.disabled = true;

            button.innerHTML = `
                <span
                    class="spinner-border spinner-border-sm"
                    aria-hidden="true"
                ></span>
                Menyimpan...
            `;

        });

    </script>

</body>
</html>