<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Produk - StockFlow</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #f6f7f9;
            font-family: Arial, sans-serif;
        }

        .topbar {
            height: 65px;
            background: #ffffff;
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
            max-width: 1100px;
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
            box-shadow: 0 4px 18px rgba(0, 0, 0, 0.05);
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

        .form-control,
        .form-select {
            border-radius: 9px;
            padding: 11px 13px;
            border: 1px solid #ddd;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #ff6600;
            box-shadow: 0 0 0 0.2rem rgba(255, 102, 0, 0.12);
        }

        .btn-orange {
            background: #ff6600;
            color: white;
            border: none;
            border-radius: 9px;
            padding: 11px 20px;
            font-weight: 600;
        }

        .btn-orange:hover {
            background: #e85b00;
            color: white;
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
            background: #e6e6e6;
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
            <i class="bi bi-box-seam me-2"></i>StockFlow
        </div>

        <div class="user-info">
            <div class="text-end">
                <div class="fw-semibold">{{ auth()->user()->name }}</div>
                <small class="text-muted text-capitalize">
                    {{ auth()->user()->role }}
                </small>
            </div>

            <div class="user-avatar">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button type="submit" class="btn btn-outline-danger btn-sm">
                    <i class="bi bi-box-arrow-right"></i>
                </button>
            </form>
        </div>
    </div>

    <!-- CONTENT -->
    <div class="content">

        <div class="mb-4">
            <h3 class="page-title mb-1">
                Tambah Produk
            </h3>

            <div class="subtitle">
                Tambahkan produk baru ke dalam inventory StockFlow.
            </div>
        </div>

        <!-- ERROR VALIDATION -->
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
                <i class="bi bi-box-seam me-2 text-warning"></i>
                Informasi Produk
            </div>

            <div class="card-body-custom">

                <form action="{{ route('products.store') }}" method="POST">
                    @csrf

                    <div class="row g-4">

                        <!-- SKU -->
                        <div class="col-md-6">
                            <label class="form-label">
                                SKU <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                name="sku"
                                class="form-control"
                                value="{{ old('sku') }}"
                                placeholder="Contoh: SKU-001"
                                required
                            >

                            <small class="text-muted">
                                Kode unik untuk mengidentifikasi produk.
                            </small>
                        </div>

                        <!-- NAMA -->
                        <div class="col-md-6">
                            <label class="form-label">
                                Nama Produk <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                value="{{ old('name') }}"
                                placeholder="Contoh: Air Mineral 600ml"
                                required
                            >
                        </div>

                        <!-- KATEGORI -->
                        <div class="col-md-6">
                            <label class="form-label">
                                Kategori
                            </label>

                            <select name="category_id" class="form-select">
                                <option value="">
                                    -- Pilih Kategori --
                                </option>

                                @foreach ($categories as $category)
                                    <option
                                        value="{{ $category->id }}"
                                        {{ old('category_id') == $category->id ? 'selected' : '' }}
                                    >
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- UNIT -->
                        <div class="col-md-6">
                            <label class="form-label">
                                Satuan <span class="required">*</span>
                            </label>

                            <select name="unit" class="form-select" required>
                                <option value="">-- Pilih Satuan --</option>

                                <option value="pcs" {{ old('unit') == 'pcs' ? 'selected' : '' }}>
                                    Pcs
                                </option>

                                <option value="box" {{ old('unit') == 'box' ? 'selected' : '' }}>
                                    Box
                                </option>

                                <option value="pack" {{ old('unit') == 'pack' ? 'selected' : '' }}>
                                    Pack
                                </option>

                                <option value="kg" {{ old('unit') == 'kg' ? 'selected' : '' }}>
                                    Kg
                                </option>

                                <option value="liter" {{ old('unit') == 'liter' ? 'selected' : '' }}>
                                    Liter
                                </option>

                                <option value="meter" {{ old('unit') == 'meter' ? 'selected' : '' }}>
                                    Meter
                                </option>
                            </select>
                        </div>

                        <!-- HARGA BELI -->
                        <div class="col-md-6">
                            <label class="form-label">
                                Harga Beli <span class="required">*</span>
                            </label>

                            <div class="input-group">
                                <span class="input-group-text">Rp</span>

                                <input
                                    type="number"
                                    name="purchase_price"
                                    class="form-control"
                                    value="{{ old('purchase_price', 0) }}"
                                    min="0"
                                    step="0.01"
                                    required
                                >
                            </div>
                        </div>

                        <!-- HARGA JUAL -->
                        <div class="col-md-6">
                            <label class="form-label">
                                Harga Jual <span class="required">*</span>
                            </label>

                            <div class="input-group">
                                <span class="input-group-text">Rp</span>

                                <input
                                    type="number"
                                    name="selling_price"
                                    class="form-control"
                                    value="{{ old('selling_price', 0) }}"
                                    min="0"
                                    step="0.01"
                                    required
                                >
                            </div>
                        </div>

                        <!-- STOCK -->
                        <div class="col-md-6">
                            <label class="form-label">
                                Stok Awal <span class="required">*</span>
                            </label>

                            <input
                                type="number"
                                name="stock"
                                class="form-control"
                                value="{{ old('stock', 0) }}"
                                min="0"
                                required
                            >

                            <small class="text-muted">
                                Jumlah stok produk saat pertama ditambahkan.
                            </small>
                        </div>

                        <!-- MINIMUM STOCK -->
                        <div class="col-md-6">
                            <label class="form-label">
                                Minimum Stok <span class="required">*</span>
                            </label>

                            <input
                                type="number"
                                name="minimum_stock"
                                class="form-control"
                                value="{{ old('minimum_stock', 5) }}"
                                min="0"
                                required
                            >

                            <small class="text-muted">
                                Batas stok untuk memberikan peringatan stok rendah.
                            </small>
                        </div>

                    </div>

                    <hr class="my-4">

                    <!-- BUTTON -->
                    <div class="d-flex justify-content-end gap-2">

                        <a
                            href="{{ route('products.index') }}"
                            class="btn btn-secondary-custom"
                        >
                            <i class="bi bi-arrow-left me-1"></i>
                            Kembali
                        </a>

                        <button type="submit" class="btn btn-orange">
                            <i class="bi bi-check-lg me-1"></i>
                            Simpan Produk
                        </button>

                    </div>

                </form>

            </div>
        </div>

    </div>

</body>
</html>