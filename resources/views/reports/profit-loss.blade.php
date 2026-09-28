<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Laporan Laba / Rugi - StockFlow</title>

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

        /* =========================
           SIDEBAR
        ========================= */

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

        /* =========================
           MAIN
        ========================= */

        .main-content {
            margin-left: 245px;
            min-height: 100vh;
            padding: 30px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 25px;
        }

        .page-title {
            font-size: 27px;
            font-weight: 700;
            margin: 0;
        }

        .page-subtitle {
            margin: 5px 0 0;
            color: #888888;
            font-size: 14px;
        }

        .btn-orange {
            background: var(--orange);
            border: none;
            color: #ffffff;
            padding: 10px 17px;
            border-radius: 9px;
            font-weight: 600;
        }

        .btn-orange:hover {
            background: var(--orange-dark);
            color: #ffffff;
        }

        /* =========================
           FILTER
        ========================= */

        .filter-card {
            background: #ffffff;
            border: 1px solid #eeeeee;
            border-radius: 14px;
            padding: 20px;
            margin-bottom: 22px;
        }

        .filter-title {
            font-size: 15px;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .form-label {
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 7px;
        }

        .form-control {
            height: 43px;
            border-radius: 9px;
            border: 1px solid #dddddd;
        }

        .form-control:focus {
            border-color: var(--orange);
            box-shadow: 0 0 0 3px rgba(255, 102, 0, 0.10);
        }

        /* =========================
           SUMMARY
        ========================= */

        .summary-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 18px;
            margin-bottom: 22px;
        }

        .summary-card {
            background: #ffffff;
            border: 1px solid #eeeeee;
            border-radius: 14px;
            padding: 21px;
        }

        .summary-icon {
            width: 43px;
            height: 43px;
            border-radius: 10px;
            background: var(--orange-light);
            color: var(--orange);
            display: flex;
            align-items: center;
            justify-content: center;
            float: right;
            font-size: 20px;
        }

        .summary-label {
            font-size: 13px;
            color: #888888;
            margin-bottom: 8px;
        }

        .summary-value {
            font-size: 24px;
            font-weight: 700;
        }

        /* =========================
           PROFIT
        ========================= */

        .profit-card {
            background: #ffffff;
            border: 1px solid #eeeeee;
            border-radius: 14px;
            padding: 25px;
            margin-bottom: 22px;
        }

        .profit-title {
            font-size: 17px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .profit-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 14px 0;
            border-bottom: 1px solid #eeeeee;
            font-size: 14px;
        }

        .profit-row:last-child {
            border-bottom: none;
        }

        .profit-row strong {
            font-size: 15px;
        }

        .profit-total {
            margin-top: 5px;
            padding-top: 20px;
            border-top: 2px solid #eeeeee;
            font-size: 17px;
            font-weight: 700;
        }

        .profit-total .amount {
            font-size: 23px;
            color: var(--orange);
        }

        /* =========================
           TABLE
        ========================= */

        .table-card {
            background: #ffffff;
            border: 1px solid #eeeeee;
            border-radius: 14px;
            overflow: hidden;
        }

        .table-header {
            padding: 20px 22px;
            border-bottom: 1px solid #eeeeee;
        }

        .table-title {
            font-size: 16px;
            font-weight: 700;
            margin: 0;
        }

        .period {
            font-size: 13px;
            color: #777777;
            margin-top: 4px;
        }

        .table-responsive {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 850px;
        }

        th {
            background: #fafafa;
            color: #777777;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: .3px;
            padding: 14px 16px;
            border-bottom: 1px solid #eeeeee;
            white-space: nowrap;
        }

        td {
            padding: 15px 16px;
            border-bottom: 1px solid #f0f0f0;
            font-size: 14px;
            vertical-align: middle;
        }

        tbody tr:hover {
            background: #fffaf7;
        }

        .invoice {
            font-weight: 700;
        }

        .amount {
            font-weight: 600;
        }

        .empty-state {
            text-align: center;
            padding: 55px 20px;
            color: #999999;
        }

        .empty-state i {
            font-size: 42px;
            color: #cccccc;
            display: block;
            margin-bottom: 12px;
        }

        .empty-state h5 {
            color: #555555;
            font-weight: 600;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 800px) {

            .summary-grid {
                grid-template-columns: 1fr;
            }

            .page-header {
                align-items: flex-start;
                flex-direction: column;
            }

        }

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
            }

        }

        @media (max-width: 600px) {

            .profit-card {
                padding: 20px;
            }

            .profit-row {
                gap: 15px;
            }

            .profit-row span:last-child,
            .profit-row strong {
                text-align: right;
            }

        }

        /* =========================
           PRINT
        ========================= */

        @media print {

            .sidebar,
            .filter-card,
            .btn-orange {
                display: none !important;
            }

            body {
                background: #ffffff;
            }

            .main-content {
                margin-left: 0;
                padding: 0;
            }

            .table-card,
            .profit-card,
            .summary-card {
                border: none;
            }

        }

    </style>

</head>

<body>

    <!-- SIDEBAR -->

    <aside class="sidebar">

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


        <nav class="sidebar-menu">

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
                    class="sidebar-link"
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
                    class="sidebar-link active"
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


    <!-- MAIN -->

    <main class="main-content">

        <!-- HEADER -->

        <div class="page-header">

            <div>

                <h1 class="page-title">
                    Laporan Laba / Rugi
                </h1>

                <p class="page-subtitle">
                    Analisis pendapatan, HPP, pengeluaran, dan hasil usaha.
                </p>

            </div>


            <button
                type="button"
                class="btn btn-orange"
                onclick="window.print()"
            >

                <i class="bi bi-printer me-1"></i>

                Cetak Laporan

            </button>

        </div>


        <!-- FILTER -->

        <div class="filter-card">

            <div class="filter-title">

                <i class="bi bi-funnel me-1"></i>

                Filter Periode

            </div>


            <form
                action="{{ route('reports.profit-loss') }}"
                method="GET"
            >

                <div class="row g-3 align-items-end">

                    <div class="col-md-4">

                        <label class="form-label">
                            Tanggal Mulai
                        </label>

                        <input
                            type="date"
                            name="start_date"
                            class="form-control"
                            value="{{ $startDate }}"
                        >

                    </div>


                    <div class="col-md-4">

                        <label class="form-label">
                            Tanggal Akhir
                        </label>

                        <input
                            type="date"
                            name="end_date"
                            class="form-control"
                            value="{{ $endDate }}"
                        >

                    </div>


                    <div class="col-md-4">

                        <button
                            type="submit"
                            class="btn btn-orange w-100"
                        >

                            <i class="bi bi-search me-1"></i>

                            Tampilkan Laporan

                        </button>

                    </div>

                </div>

            </form>

        </div>


        <!-- SUMMARY -->

        <div class="summary-grid">

            <div class="summary-card">

                <div class="summary-icon">

                    <i class="bi bi-receipt"></i>

                </div>


                <div class="summary-label">
                    Total Transaksi
                </div>


                <div class="summary-value">

                    {{ number_format($totalTransactions, 0, ',', '.') }}

                </div>

            </div>


            <div class="summary-card">

                <div class="summary-icon">

                    <i class="bi bi-cash-stack"></i>

                </div>


                <div class="summary-label">
                    Pendapatan Penjualan
                </div>


                <div class="summary-value">

                    Rp
                    {{ number_format($totalSales, 0, ',', '.') }}

                </div>

            </div>

        </div>


        <!-- PROFIT CALCULATION -->

        <div class="profit-card">

            <div class="profit-title">
                Ringkasan Laba / Rugi
            </div>


            <div class="profit-row">

                <span>
                    Pendapatan Penjualan
                </span>

                <strong>
                    Rp {{ number_format($totalSales, 0, ',', '.') }}
                </strong>

            </div>


            <div class="profit-row">

                <span>
                    Harga Pokok Penjualan (HPP)
                </span>

                <strong>
                    Rp {{ number_format($totalHpp, 0, ',', '.') }}
                </strong>

            </div>


            <div class="profit-row">

                <span>
                    Laba Kotor
                </span>

                <strong>
                    Rp {{ number_format($grossProfit, 0, ',', '.') }}
                </strong>

            </div>


            <div class="profit-row">

                <span>
                    Pengeluaran Operasional
                </span>

                <strong>
                    Rp {{ number_format($totalExpenses, 0, ',', '.') }}
                </strong>

            </div>


            <div class="profit-row profit-total">

                <span>
                    Laba Bersih
                </span>

                <span class="amount">
                    Rp {{ number_format($netProfit, 0, ',', '.') }}
                </span>

            </div>

        </div>


        <!-- SALES DETAIL -->

        <div class="table-card">

            <div class="table-header">

                <h3 class="table-title">
                    Detail Penjualan
                </h3>


                <div class="period">

                    Periode:

                    {{ \Carbon\Carbon::parse($startDate)->format('d/m/Y') }}

                    -

                    {{ \Carbon\Carbon::parse($endDate)->format('d/m/Y') }}

                </div>

            </div>


            <div class="table-responsive">

                @if($sales->count() > 0)

                    <table>

                        <thead>

                            <tr>

                                <th>
                                    No
                                </th>

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
                                    HPP
                                </th>

                                <th>
                                    Penjualan
                                </th>

                                <th>
                                    Laba Kotor
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @foreach($sales as $sale)

                                @php

                                    $saleHpp = $sale->items->sum(
                                        function ($item) {
                                            return $item->quantity *
                                                $item->purchase_price;
                                        }
                                    );

                                    $saleGrossProfit =
                                        $sale->total_amount -
                                        $saleHpp;

                                @endphp


                                <tr>

                                    <td>
                                        {{ $loop->iteration }}
                                    </td>


                                    <td>

                                        <div class="invoice">

                                            {{ $sale->invoice_number }}

                                        </div>

                                    </td>


                                    <td>

                                        {{ $sale->sale_date->format('d/m/Y H:i') }}

                                    </td>


                                    <td>

                                        {{ $sale->user->name }}

                                    </td>


                                    <td>

                                        <div class="amount">

                                            Rp
                                            {{ number_format($saleHpp, 0, ',', '.') }}

                                        </div>

                                    </td>


                                    <td>

                                        <div class="amount">

                                            Rp
                                            {{ number_format($sale->total_amount, 0, ',', '.') }}

                                        </div>

                                    </td>


                                    <td>

                                        <div class="amount">

                                            Rp
                                            {{ number_format($saleGrossProfit, 0, ',', '.') }}

                                        </div>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                @else

                    <div class="empty-state">

                        <i class="bi bi-bar-chart"></i>

                        <h5>
                            Belum Ada Data Penjualan
                        </h5>

                        <p>
                            Tidak ada transaksi penjualan pada periode yang dipilih.
                        </p>

                    </div>

                @endif

            </div>

        </div>

    </main>

</body>

</html>