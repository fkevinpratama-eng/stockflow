<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail Penjualan - {{ $sale->invoice_number }} - StockFlow</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        rel="stylesheet"
    >

    <style>
        :root {
            --orange: #ff6600;
            --orange-dark: #e85b00;
            --light-orange: #fff3eb;
            --border: #e9ecef;
        }

        body {
            background: #f7f8fa;
            font-family: Arial, sans-serif;
            color: #212529;
        }

        .topbar {
            height: 64px;
            background: #ffffff;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 28px;
        }

        .brand {
            font-size: 22px;
            font-weight: 700;
            color: var(--orange);
        }

        .user-area {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: var(--light-orange);
            color: var(--orange);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
        }

        .page-wrapper {
            padding: 28px;
            max-width: 1200px;
            margin: auto;
        }

        .page-title {
            font-size: 26px;
            font-weight: 700;
        }

        .page-subtitle {
            color: #6c757d;
            font-size: 14px;
        }

        .card-custom {
            background: #ffffff;
            border: 1px solid var(--border);
            border-radius: 14px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, .03);
        }

        .card-header-custom {
            padding: 18px 20px;
            border-bottom: 1px solid var(--border);
            font-weight: 700;
        }

        .card-body-custom {
            padding: 20px;
        }

        .btn-orange {
            background: var(--orange);
            border-color: var(--orange);
            color: #ffffff;
            font-weight: 600;
            border-radius: 9px;
        }

        .btn-orange:hover {
            background: var(--orange-dark);
            border-color: var(--orange-dark);
            color: #ffffff;
        }

        .btn-light-custom {
            background: #ffffff;
            border: 1px solid var(--border);
            border-radius: 9px;
        }

        .btn-light-custom:hover {
            background: #f8f9fa;
        }

        .invoice-box {
            background: var(--light-orange);
            border-radius: 12px;
            padding: 20px;
        }

        .invoice-label {
            font-size: 12px;
            color: #6c757d;
            margin-bottom: 4px;
        }

        .invoice-number {
            font-size: 22px;
            font-weight: 700;
            color: var(--orange);
        }

        .info-label {
            color: #6c757d;
            font-size: 13px;
            margin-bottom: 3px;
        }

        .info-value {
            font-weight: 600;
        }

        .table {
            margin-bottom: 0;
        }

        .table > :not(caption) > * > * {
            padding: 14px 12px;
            vertical-align: middle;
        }

        .table thead th {
            background: #fafafa;
            color: #6c757d;
            font-size: 13px;
            white-space: nowrap;
        }

        .product-name {
            font-weight: 600;
        }

        .summary-box {
            background: #fafafa;
            border-radius: 12px;
            padding: 18px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
        }

        .summary-row:last-child {
            margin-bottom: 0;
        }

        .summary-total {
            border-top: 1px solid var(--border);
            padding-top: 14px;
            margin-top: 14px;
            font-size: 20px;
            font-weight: 700;
        }

        .orange-text {
            color: var(--orange);
        }

        .payment-badge {
            background: var(--light-orange);
            color: var(--orange);
            font-weight: 600;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 12px;
        }

        .notes-box {
            background: #fafafa;
            border-radius: 10px;
            padding: 15px;
            color: #495057;
        }

        @media print {

            body {
                background: #ffffff;
            }

            .topbar,
            .page-actions,
            .no-print {
                display: none !important;
            }

            .page-wrapper {
                padding: 0;
                max-width: none;
            }

            .card-custom {
                border: none;
                box-shadow: none;
            }

            .card-header-custom {
                border-bottom: 1px solid #ddd;
            }

            .invoice-box {
                background: #f5f5f5 !important;
                print-color-adjust: exact;
                -webkit-print-color-adjust: exact;
            }

            .summary-box {
                background: #f5f5f5 !important;
                print-color-adjust: exact;
                -webkit-print-color-adjust: exact;
            }

            .payment-badge {
                background: #eeeeee !important;
                color: #000000 !important;
                print-color-adjust: exact;
                -webkit-print-color-adjust: exact;
            }
        }

        @media (max-width: 768px) {

            .topbar {
                padding: 0 15px;
            }

            .page-wrapper {
                padding: 18px 12px;
            }

            .user-name {
                display: none;
            }

            .page-title {
                font-size: 22px;
            }
        }
    </style>
</head>

<body>

    <!-- TOPBAR -->
    <div class="topbar">

        <div class="brand">
            <i class="bi bi-box-seam me-1"></i>
            StockFlow
        </div>

        <div class="user-area">

            <div class="text-end user-name">

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

            <form
                action="{{ route('logout') }}"
                method="POST"
            >

                @csrf

                <button
                    type="submit"
                    class="btn btn-sm btn-light-custom"
                    title="Logout"
                >
                    <i class="bi bi-box-arrow-right"></i>
                </button>

            </form>

        </div>

    </div>


    <!-- CONTENT -->
    <div class="page-wrapper">

        <!-- PAGE HEADER -->
        <div class="page-actions d-flex justify-content-between align-items-center mb-4">

            <div>

                <h1 class="page-title mb-1">
                    Detail Penjualan
                </h1>

                <div class="page-subtitle">
                    Informasi lengkap transaksi penjualan.
                </div>

            </div>

            <div class="d-flex gap-2">

                <a
                    href="{{ route('sales.index') }}"
                    class="btn btn-light-custom"
                >
                    <i class="bi bi-arrow-left me-1"></i>
                    Kembali
                </a>

                <button
                    type="button"
                    class="btn btn-orange"
                    onclick="window.print()"
                >
                    <i class="bi bi-printer me-1"></i>
                    Cetak Struk
                </button>

            </div>

        </div>


        <!-- INVOICE -->
        <div class="card-custom mb-4">

            <div class="card-body-custom">

                <div class="invoice-box">

                    <div class="row g-4 align-items-center">

                        <div class="col-md-6">

                            <div class="invoice-label">
                                Nomor Invoice
                            </div>

                            <div class="invoice-number">
                                {{ $sale->invoice_number }}
                            </div>

                        </div>


                        <div class="col-md-3">

                            <div class="invoice-label">
                                Tanggal
                            </div>

                            <div class="fw-semibold">
                                {{ $sale->sale_date->format('d/m/Y') }}
                            </div>

                        </div>


                        <div class="col-md-3">

                            <div class="invoice-label">
                                Waktu
                            </div>

                            <div class="fw-semibold">
                                {{ $sale->sale_date->format('H:i') }}
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        <!-- INFO -->
        <div class="card-custom mb-4">

            <div class="card-header-custom">
                <i class="bi bi-info-circle me-2"></i>
                Informasi Transaksi
            </div>

            <div class="card-body-custom">

                <div class="row g-4">

                    <div class="col-md-4">

                        <div class="info-label">
                            Kasir
                        </div>

                        <div class="info-value">
                            {{ $sale->user->name }}
                        </div>

                    </div>


                    <div class="col-md-4">

                        <div class="info-label">
                            Metode Pembayaran
                        </div>

                        <div>

                            <span class="payment-badge">

                                @switch($sale->payment_method)

                                    @case('cash')
                                        Cash
                                        @break

                                    @case('transfer')
                                        Transfer
                                        @break

                                    @case('qris')
                                        QRIS
                                        @break

                                    @case('card')
                                        Kartu
                                        @break

                                    @default
                                        {{ ucfirst($sale->payment_method) }}

                                @endswitch

                            </span>

                        </div>

                    </div>


                    <div class="col-md-4">

                        <div class="info-label">
                            Waktu Transaksi
                        </div>

                        <div class="info-value">
                            {{ $sale->sale_date->format('d F Y, H:i:s') }}
                        </div>

                    </div>

                </div>

            </div>

        </div>


        <!-- ITEMS -->
        <div class="card-custom mb-4">

            <div class="card-header-custom">

                <i class="bi bi-cart3 me-2"></i>

                Produk yang Dibeli

            </div>


            <div class="table-responsive">

                <table class="table align-middle">

                    <thead>

                        <tr>

                            <th width="50">
                                #
                            </th>

                            <th>
                                Produk
                            </th>

                            <th class="text-center">
                                Qty
                            </th>

                            <th class="text-end">
                                Harga
                            </th>

                            <th class="text-end">
                                Subtotal
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @foreach ($sale->items as $index => $item)

                            <tr>

                                <td>
                                    {{ $index + 1 }}
                                </td>

                                <td>

                                    <div class="product-name">
                                        {{ $item->product->name }}
                                    </div>

                                    <small class="text-muted">
                                        SKU: {{ $item->product->sku }}
                                    </small>

                                </td>

                                <td class="text-center">

                                    {{ $item->quantity }}
                                    {{ $item->product->unit }}

                                </td>

                                <td class="text-end">

                                    Rp {{ number_format($item->selling_price, 0, ',', '.') }}

                                </td>

                                <td class="text-end fw-semibold">

                                    Rp {{ number_format($item->subtotal, 0, ',', '.') }}

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>


        <!-- BOTTOM -->
        <div class="row g-4">

            <!-- NOTES -->
            <div class="col-lg-7">

                @if ($sale->notes)

                    <div class="card-custom">

                        <div class="card-header-custom">

                            <i class="bi bi-chat-left-text me-2"></i>

                            Catatan

                        </div>

                        <div class="card-body-custom">

                            <div class="notes-box">
                                {{ $sale->notes }}
                            </div>

                        </div>

                    </div>

                @endif

            </div>


            <!-- SUMMARY -->
            <div class="col-lg-5">

                <div class="card-custom">

                    <div class="card-header-custom">

                        <i class="bi bi-calculator me-2"></i>

                        Ringkasan Pembayaran

                    </div>


                    <div class="card-body-custom">

                        <div class="summary-box">

                            <div class="summary-row">

                                <span class="text-muted">
                                    Subtotal
                                </span>

                                <strong>
                                    Rp {{ number_format($sale->subtotal, 0, ',', '.') }}
                                </strong>

                            </div>


                            <div class="summary-row">

                                <span class="text-muted">
                                    Diskon
                                </span>

                                <strong>
                                    Rp {{ number_format($sale->discount, 0, ',', '.') }}
                                </strong>

                            </div>


                            <div class="summary-row summary-total">

                                <span>
                                    Total
                                </span>

                                <span class="orange-text">

                                    Rp {{ number_format($sale->total_amount, 0, ',', '.') }}

                                </span>

                            </div>


                            <div class="summary-row mt-3">

                                <span class="text-muted">
                                    Dibayar
                                </span>

                                <strong>
                                    Rp {{ number_format($sale->paid_amount, 0, ',', '.') }}
                                </strong>

                            </div>


                            <div class="summary-row">

                                <span class="text-muted">
                                    Kembalian
                                </span>

                                <strong class="text-success">

                                    Rp {{ number_format($sale->change_amount, 0, ',', '.') }}

                                </strong>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        <!-- PRINT FOOTER -->
        <div class="d-none d-print-block text-center mt-4">

            <strong>
                StockFlow
            </strong>

            <div class="small text-muted">
                Sistem Manajemen Stok & Penjualan
            </div>

            <div class="small text-muted mt-2">
                Terima kasih atas transaksi Anda.
            </div>

        </div>

    </div>

</body>
</html>