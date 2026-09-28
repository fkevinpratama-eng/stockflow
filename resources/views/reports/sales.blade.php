<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Laporan Penjualan - StockFlow</title>

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
            --orange-dark: #e85d00;
            --orange-light: #fff1e8;
            --bg: #f7f8fa;
            --text: #212529;
            --muted: #6c757d;
            --border: #eceff2;
        }


        * {
            box-sizing: border-box;
        }


        body {
            margin: 0;
            background: var(--bg);
            color: var(--text);
            font-family: Arial, Helvetica, sans-serif;
        }


        /* =====================================================
           SIDEBAR
        ===================================================== */

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;

            width: 245px;
            height: 100vh;

            background: #ffffff;

            border-right: 1px solid #e5e7eb;

            display: flex;
            flex-direction: column;

            z-index: 2000;
        }


        .sidebar-brand {
            height: 75px;

            display: flex;
            align-items: center;

            gap: 12px;

            padding: 0 20px;

            border-bottom: 1px solid #eeeeee;
        }


        .brand-icon {
            width: 40px;
            height: 40px;

            flex-shrink: 0;

            border-radius: 11px;

            background: var(--orange);

            color: #ffffff;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 19px;
        }


        .brand-name {
            font-size: 18px;
            font-weight: 700;
            color: #222222;
        }


        .brand-subtitle {
            margin-top: 2px;

            font-size: 11px;

            color: #999999;
        }


        .sidebar-menu {
            flex: 1;

            overflow-y: auto;

            padding: 18px 12px;
        }


        .sidebar-link {
            display: flex;
            align-items: center;

            gap: 12px;

            width: 100%;
            height: 44px;

            padding: 0 13px;

            margin-bottom: 4px;

            border-radius: 10px;

            text-decoration: none;

            color: #666666;

            font-size: 14px;

            font-weight: 500;

            transition: all .2s ease;
        }


        .sidebar-link i {
            width: 20px;

            text-align: center;

            font-size: 16px;
        }


        .sidebar-link:hover {
            background: var(--orange-light);

            color: var(--orange);
        }


        .sidebar-link.active {
            background: var(--orange);

            color: #ffffff;

            font-weight: 600;
        }


        .sidebar-section {
            margin-top: 25px;
        }


        .sidebar-title {
            padding: 0 12px;

            margin-bottom: 8px;

            font-size: 10px;

            font-weight: 700;

            letter-spacing: 1px;

            color: #999999;
        }


        /* =====================================================
           SIDEBAR USER
        ===================================================== */

        .sidebar-user {
            min-height: 72px;

            padding: 14px;

            border-top: 1px solid #eeeeee;

            display: flex;
            align-items: center;

            gap: 10px;
        }


        .sidebar-avatar {
            width: 38px;
            height: 38px;

            flex-shrink: 0;

            border-radius: 50%;

            background: var(--orange-light);

            color: var(--orange);

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 14px;

            font-weight: 700;
        }


        .sidebar-user-info {
            flex: 1;

            min-width: 0;
        }


        .sidebar-user-name {
            font-size: 13px;

            font-weight: 600;

            white-space: nowrap;

            overflow: hidden;

            text-overflow: ellipsis;
        }


        .sidebar-user-role {
            margin-top: 2px;

            font-size: 11px;

            color: #999999;

            text-transform: capitalize;
        }


        .sidebar-logout {
            width: 34px;
            height: 34px;

            border: none;

            border-radius: 8px;

            background: var(--orange-light);

            color: var(--orange);

            display: flex;
            align-items: center;
            justify-content: center;

            cursor: pointer;

            transition: .2s ease;
        }


        .sidebar-logout:hover {
            background: var(--orange);

            color: #ffffff;
        }


        /* =====================================================
           MAIN CONTENT
        ===================================================== */

        .main-content {
            margin-left: 245px;

            min-height: 100vh;

            padding: 30px;

            max-width: 1700px;
        }


        .page-header {
            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 20px;

            margin-bottom: 24px;
        }


        .page-title {
            margin: 0;

            font-size: 28px;

            font-weight: 700;

            color: #222222;
        }


        .page-subtitle {
            margin: 6px 0 0;

            color: var(--muted);

            font-size: 14px;
        }


        /* =====================================================
           PRINT BUTTON
        ===================================================== */

        .print-btn {
            border: 1px solid var(--orange);

            background: #ffffff;

            color: var(--orange);

            border-radius: 8px;

            padding: 10px 15px;

            font-size: 13px;

            font-weight: 600;

            transition: .2s ease;
        }


        .print-btn:hover {
            background: var(--orange);

            color: #ffffff;
        }


        /* =====================================================
           FILTER
        ===================================================== */

        .filter-card {
            background: #ffffff;

            border: 1px solid var(--border);

            border-radius: 14px;

            padding: 20px;

            margin-bottom: 20px;
        }


        .form-label {
            font-size: 12px;

            font-weight: 600;

            margin-bottom: 6px;
        }


        .form-control {
            min-height: 42px;

            border-radius: 8px;

            font-size: 13px;
        }


        .form-control:focus {
            border-color: var(--orange);

            box-shadow:
                0 0 0 3px rgba(255, 102, 0, .1);
        }


        .filter-btn {
            min-height: 42px;

            border: none;

            border-radius: 8px;

            background: var(--orange);

            color: #ffffff;

            padding: 0 18px;

            font-size: 13px;

            font-weight: 600;

            transition: .2s ease;
        }


        .filter-btn:hover {
            background: var(--orange-dark);
        }


        .reset-btn {
            min-height: 42px;

            border: 1px solid #dee2e6;

            border-radius: 8px;

            background: #ffffff;

            color: #495057;

            padding: 0 15px;

            text-decoration: none;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            font-size: 13px;

            transition: .2s ease;
        }


        .reset-btn:hover {
            background: var(--orange-light);

            border-color: var(--orange);

            color: var(--orange);
        }


        /* =====================================================
           STAT CARD
        ===================================================== */

        .stat-card {
            background: #ffffff;

            border: 1px solid var(--border);

            border-radius: 14px;

            padding: 20px;

            height: 100%;

            transition: .2s ease;
        }


        .stat-card:hover {
            border-color: #ffd3b8;

            transform: translateY(-2px);
        }


        .stat-label {
            color: var(--muted);

            font-size: 12px;
        }


        .stat-value {
            font-size: 24px;

            font-weight: 700;

            margin-top: 5px;

            color: #222222;
        }


        .stat-icon {
            width: 43px;
            height: 43px;

            border-radius: 10px;

            background: var(--orange-light);

            color: var(--orange);

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 20px;
        }


        /* =====================================================
           REPORT CARD
        ===================================================== */

        .report-card {
            margin-top: 20px;

            background: #ffffff;

            border: 1px solid var(--border);

            border-radius: 14px;

            overflow: hidden;
        }


        .report-header {
            padding: 18px 20px;

            border-bottom: 1px solid var(--border);

            display: flex;

            justify-content: space-between;

            align-items: center;

            gap: 15px;
        }


        .report-title {
            margin: 0;

            font-size: 16px;

            font-weight: 700;
        }


        .period {
            color: var(--muted);

            font-size: 12px;
        }


        /* =====================================================
           TABLE
        ===================================================== */

        .table-wrap {
            overflow-x: auto;
        }


        table {
            margin: 0 !important;
        }


        thead th {
            background: #fff7f2 !important;

            color: var(--muted);

            font-size: 11px;

            font-weight: 700;

            text-transform: uppercase;

            padding: 14px 20px !important;

            white-space: nowrap;

            border-bottom: 1px solid var(--border) !important;
        }


        tbody td {
            padding: 14px 20px !important;

            font-size: 13px;

            vertical-align: middle;

            white-space: nowrap;

            border-bottom: 1px solid #f0f0f0;
        }


        tbody tr:hover {
            background: #fffaf7;
        }


        .invoice {
            color: var(--orange);

            background: var(--orange-light);

            padding: 6px 9px;

            border-radius: 7px;

            font-weight: 700;

            font-size: 12px;
        }


        .payment {
            display: inline-block;

            background: #f1f3f5;

            color: #495057;

            padding: 5px 8px;

            border-radius: 6px;

            font-size: 10px;

            font-weight: 700;

            text-transform: uppercase;
        }


        .amount {
            font-weight: 700;

            color: #222222;
        }


        /* =====================================================
           EMPTY
        ===================================================== */

        .empty {
            padding: 60px 20px;

            text-align: center;

            color: var(--muted);
        }


        .empty i {
            font-size: 40px;

            color: #adb5bd;

            display: block;

            margin-bottom: 10px;
        }


        /* =====================================================
           ANIMATION
        ===================================================== */

        .fade-in {
            animation: fadeIn .35s ease;
        }


        @keyframes fadeIn {

            from {
                opacity: 0;

                transform: translateY(8px);
            }

            to {
                opacity: 1;

                transform: translateY(0);
            }

        }


        /* =====================================================
           MOBILE
        ===================================================== */

        @media (max-width: 700px) {

            .sidebar {
                width: 70px;
            }


            .sidebar-brand {
                justify-content: center;

                padding: 0;
            }


            .brand-name,
            .brand-subtitle,
            .sidebar-link span,
            .sidebar-title,
            .sidebar-user-info {
                display: none;
            }


            .sidebar-link {
                justify-content: center;

                padding: 0;
            }


            .sidebar-link i {
                width: auto;

                font-size: 18px;
            }


            .sidebar-user {
                justify-content: center;

                padding: 12px 5px;
            }


            .sidebar-logout {
                display: none;
            }


            .main-content {
                margin-left: 70px;

                padding: 20px 15px;

                max-width: none;
            }


            .page-header {
                align-items: flex-start;

                flex-direction: column;
            }


            .page-title {
                font-size: 23px;
            }


            .print-btn {
                width: 100%;
            }


            .report-header {
                align-items: flex-start;

                flex-direction: column;
            }


            .stat-value {
                font-size: 21px;
            }

        }


        /* =====================================================
           PRINT
        ===================================================== */

        @media print {

            body {
                background: #ffffff;
            }


            .sidebar,
            .filter-card,
            .print-btn {
                display: none !important;
            }


            .main-content {
                margin-left: 0;

                max-width: none;

                padding: 0;
            }


            .report-card,
            .stat-card {
                border: none;
            }


            .stat-card:hover {
                transform: none;
            }


            .page-header {
                margin-bottom: 20px;
            }

        }

    </style>

</head>


<body>


<!-- =========================================================
     SIDEBAR
========================================================= -->

<aside class="sidebar">


    <!-- BRAND -->

    <div class="sidebar-brand">

        <div class="brand-icon">

            <i class="bi bi-box-seam-fill"></i>

        </div>


        <div>

            <div class="brand-name">
                StockFlow
            </div>

            <div class="brand-subtitle">
                Inventory System
            </div>

        </div>

    </div>


    <!-- MENU -->

    <nav class="sidebar-menu">


        <!-- DASHBOARD -->

        <a
            href="{{ route('dashboard') }}"
            class="sidebar-link"
        >

            <i class="bi bi-grid-1x2-fill"></i>

            <span>
                Dashboard
            </span>

        </a>


        <!-- MASTER DATA -->

        <div class="sidebar-section">

            <div class="sidebar-title">
                MASTER DATA
            </div>


            <a
                href="{{ route('categories.index') }}"
                class="sidebar-link"
            >

                <i class="bi bi-tags-fill"></i>

                <span>
                    Kategori
                </span>

            </a>


            <a
                href="{{ route('products.index') }}"
                class="sidebar-link"
            >

                <i class="bi bi-box-seam-fill"></i>

                <span>
                    Produk
                </span>

            </a>


            <a
                href="{{ route('suppliers.index') }}"
                class="sidebar-link"
            >

                <i class="bi bi-truck"></i>

                <span>
                    Supplier
                </span>

            </a>

        </div>


        <!-- TRANSAKSI -->

        <div class="sidebar-section">

            <div class="sidebar-title">
                TRANSAKSI
            </div>


            <a
                href="{{ route('purchases.index') }}"
                class="sidebar-link"
            >

                <i class="bi bi-cart-plus-fill"></i>

                <span>
                    Pembelian
                </span>

            </a>


            <a
                href="{{ route('sales.index') }}"
                class="sidebar-link"
            >

                <i class="bi bi-cart-check-fill"></i>

                <span>
                    Penjualan
                </span>

            </a>


            <a
                href="{{ route('expenses.index') }}"
                class="sidebar-link"
            >

                <i class="bi bi-wallet2"></i>

                <span>
                    Pengeluaran
                </span>

            </a>

        </div>


        <!-- LAPORAN -->

        <div class="sidebar-section">

            <div class="sidebar-title">
                LAPORAN
            </div>


            <a
                href="{{ route('reports.sales') }}"
                class="sidebar-link active"
            >

                <i class="bi bi-bar-chart-fill"></i>

                <span>
                    Penjualan
                </span>

            </a>


            <a
                href="{{ route('reports.purchases') }}"
                class="sidebar-link"
            >

                <i class="bi bi-receipt"></i>

                <span>
                    Pembelian
                </span>

            </a>


            <a
                href="{{ route('reports.stock') }}"
                class="sidebar-link"
            >

                <i class="bi bi-boxes"></i>

                <span>
                    Stok
                </span>

            </a>


            <a
                href="{{ route('reports.expenses') }}"
                class="sidebar-link"
            >

                <i class="bi bi-cash-stack"></i>

                <span>
                    Pengeluaran
                </span>

            </a>


            <a
                href="{{ route('reports.profit-loss') }}"
                class="sidebar-link"
            >

                <i class="bi bi-graph-up-arrow"></i>

                <span>
                    Laba / Rugi
                </span>

            </a>

        </div>

    </nav>


    <!-- USER -->

    <div class="sidebar-user">

        <div class="sidebar-avatar">

            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

        </div>


        <div class="sidebar-user-info">

            <div class="sidebar-user-name">

                {{ auth()->user()->name }}

            </div>


            <div class="sidebar-user-role">

                {{ auth()->user()->role }}

            </div>

        </div>


        <form
            action="{{ route('logout') }}"
            method="POST"
        >

            @csrf

            <button
                type="submit"
                class="sidebar-logout"
                title="Logout"
            >

                <i class="bi bi-box-arrow-right"></i>

            </button>

        </form>

    </div>

</aside>


<!-- =========================================================
     MAIN CONTENT
========================================================= -->

<main class="main-content fade-in">


    <!-- HEADER -->

    <div class="page-header">

        <div>

            <h1 class="page-title">
                Laporan Penjualan
            </h1>

            <p class="page-subtitle">
                Analisis transaksi penjualan berdasarkan periode.
            </p>

        </div>


        <button
            type="button"
            class="print-btn"
            onclick="window.print()"
        >

            <i class="bi bi-printer me-1"></i>

            Cetak Laporan

        </button>

    </div>


    <!-- FILTER -->

    <div class="filter-card">

        <form
            action="{{ route('reports.sales') }}"
            method="GET"
        >

            <div class="row g-3 align-items-end">


                <div class="col-12 col-md-4">

                    <label class="form-label">
                        Dari Tanggal
                    </label>

                    <input
                        type="date"
                        name="start_date"
                        class="form-control"
                        value="{{ $startDate }}"
                        required
                    >

                </div>


                <div class="col-12 col-md-4">

                    <label class="form-label">
                        Sampai Tanggal
                    </label>

                    <input
                        type="date"
                        name="end_date"
                        class="form-control"
                        value="{{ $endDate }}"
                        required
                    >

                </div>


                <div class="col-12 col-md-2">

                    <button
                        type="submit"
                        class="filter-btn w-100"
                    >

                        <i class="bi bi-filter me-1"></i>

                        Terapkan

                    </button>

                </div>


                <div class="col-12 col-md-2">

                    <a
                        href="{{ route('reports.sales') }}"
                        class="reset-btn w-100"
                    >

                        <i class="bi bi-arrow-counterclockwise me-1"></i>

                        Reset

                    </a>

                </div>


            </div>

        </form>

    </div>


    <!-- SUMMARY -->

    <div class="row g-3">


        <!-- TOTAL TRANSAKSI -->

        <div class="col-12 col-md-6 col-xl-3">

            <div class="stat-card">

                <div class="d-flex justify-content-between">

                    <div>

                        <div class="stat-label">
                            Total Transaksi
                        </div>

                        <div class="stat-value">
                            {{ number_format($totalTransactions, 0, ',', '.') }}
                        </div>

                    </div>


                    <div class="stat-icon">

                        <i class="bi bi-receipt"></i>

                    </div>

                </div>

            </div>

        </div>


        <!-- TOTAL PENJUALAN -->

        <div class="col-12 col-md-6 col-xl-3">

            <div class="stat-card">

                <div class="d-flex justify-content-between">

                    <div>

                        <div class="stat-label">
                            Total Penjualan
                        </div>

                        <div class="stat-value">
                            Rp {{ number_format($totalSales, 0, ',', '.') }}
                        </div>

                    </div>


                    <div class="stat-icon">

                        <i class="bi bi-cash-stack"></i>

                    </div>

                </div>

            </div>

        </div>


        <!-- TOTAL DISKON -->

        <div class="col-12 col-md-6 col-xl-3">

            <div class="stat-card">

                <div class="d-flex justify-content-between">

                    <div>

                        <div class="stat-label">
                            Total Diskon
                        </div>

                        <div class="stat-value">
                            Rp {{ number_format($totalDiscount, 0, ',', '.') }}
                        </div>

                    </div>


                    <div class="stat-icon">

                        <i class="bi bi-percent"></i>

                    </div>

                </div>

            </div>

        </div>


        <!-- TOTAL PEMBAYARAN -->

        <div class="col-12 col-md-6 col-xl-3">

            <div class="stat-card">

                <div class="d-flex justify-content-between">

                    <div>

                        <div class="stat-label">
                            Total Pembayaran
                        </div>

                        <div class="stat-value">
                            Rp {{ number_format($totalPaid, 0, ',', '.') }}
                        </div>

                    </div>


                    <div class="stat-icon">

                        <i class="bi bi-wallet2"></i>

                    </div>

                </div>

            </div>

        </div>


    </div>


    <!-- REPORT TABLE -->

    <div class="report-card">


        <!-- REPORT HEADER -->

        <div class="report-header">

            <h2 class="report-title">
                Detail Penjualan
            </h2>


            <span class="period">

                {{ \Carbon\Carbon::parse($startDate)->format('d/m/Y') }}

                -

                {{ \Carbon\Carbon::parse($endDate)->format('d/m/Y') }}

            </span>

        </div>


        <!-- TABLE -->

        <div class="table-wrap">

            <table class="table table-hover align-middle">


                <thead>

                    <tr>

                        <th>
                            Invoice
                        </th>

                        <th>
                            Tanggal
                        </th>

                        <th>
                            Kasir
                        </th>

                        <th>
                            Metode
                        </th>

                        <th class="text-end">
                            Subtotal
                        </th>

                        <th class="text-end">
                            Diskon
                        </th>

                        <th class="text-end">
                            Total
                        </th>

                    </tr>

                </thead>


                <tbody>


                    @forelse($sales as $sale)


                        <tr>


                            <td>

                                <span class="invoice">

                                    {{ $sale->invoice_number }}

                                </span>

                            </td>


                            <td>

                                {{ $sale->sale_date->format('d/m/Y H:i') }}

                            </td>


                            <td>

                                {{ $sale->user->name ?? '-' }}

                            </td>


                            <td>

                                <span class="payment">

                                    {{ $sale->payment_method }}

                                </span>

                            </td>


                            <td class="text-end">

                                Rp
                                {{ number_format($sale->subtotal, 0, ',', '.') }}

                            </td>


                            <td class="text-end">

                                Rp
                                {{ number_format($sale->discount, 0, ',', '.') }}

                            </td>


                            <td class="text-end amount">

                                Rp
                                {{ number_format($sale->total_amount, 0, ',', '.') }}

                            </td>


                        </tr>


                    @empty


                        <tr>

                            <td colspan="7">


                                <div class="empty">

                                    <i class="bi bi-receipt"></i>

                                    <div class="fw-semibold mb-1">

                                        Tidak ada transaksi pada periode yang dipilih.

                                    </div>

                                    <small>

                                        Coba pilih periode tanggal yang berbeda.

                                    </small>

                                </div>


                            </td>

                        </tr>


                    @endforelse


                </tbody>


            </table>

        </div>


    </div>


</main>


</body>

</html>