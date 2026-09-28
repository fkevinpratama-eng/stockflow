<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Laporan Pembelian - StockFlow</title>

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
           MAIN
        ===================================================== */

        .main-content {
            margin-left: 245px;

            min-height: 100vh;

            padding: 30px;

            max-width: 1700px;
        }


        .page-header {
            display: flex;

            justify-content: space-between;

            align-items: center;

            gap: 20px;

            margin-bottom: 25px;
        }


        .page-title {
            font-size: 28px;

            font-weight: 700;

            margin: 0;

            color: #222222;
        }


        .page-subtitle {
            margin: 6px 0 0;

            color: var(--muted);

            font-size: 14px;
        }


        /* =====================================================
           BUTTON
        ===================================================== */

        .btn-orange {
            background: var(--orange);

            border: none;

            color: #ffffff;

            padding: 10px 17px;

            border-radius: 9px;

            font-size: 13px;

            font-weight: 600;

            transition: .2s ease;
        }


        .btn-orange:hover {
            background: var(--orange-dark);

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

            margin-bottom: 22px;
        }


        .filter-title {
            font-size: 15px;

            font-weight: 700;

            margin-bottom: 15px;
        }


        .form-label {
            font-size: 12px;

            font-weight: 600;

            margin-bottom: 7px;
        }


        .form-control {
            height: 43px;

            border-radius: 9px;

            border: 1px solid #dddddd;

            font-size: 13px;
        }


        .form-control:focus {
            border-color: var(--orange);

            box-shadow:
                0 0 0 3px rgba(255, 102, 0, .10);
        }


        /* =====================================================
           SUMMARY
        ===================================================== */

        .summary-grid {
            display: grid;

            grid-template-columns: repeat(3, 1fr);

            gap: 18px;

            margin-bottom: 22px;
        }


        .summary-card {
            background: #ffffff;

            border: 1px solid var(--border);

            border-radius: 14px;

            padding: 21px;

            transition: .2s ease;
        }


        .summary-card:hover {
            border-color: #ffd3b8;

            transform: translateY(-2px);
        }


        .summary-label {
            font-size: 13px;

            color: #888888;

            margin-bottom: 8px;
        }


        .summary-value {
            font-size: 24px;

            font-weight: 700;

            color: #222222;
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


        /* =====================================================
           TABLE
        ===================================================== */

        .table-card {
            background: #ffffff;

            border: 1px solid var(--border);

            border-radius: 14px;

            overflow: hidden;
        }


        .table-header {
            padding: 20px 22px;

            border-bottom: 1px solid var(--border);

            display: flex;

            justify-content: space-between;

            align-items: center;
        }


        .table-title {
            font-size: 16px;

            font-weight: 700;

            margin: 0;
        }


        .period {
            margin-top: 5px;

            font-size: 12px;

            color: var(--muted);
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
            background: #fff7f2;

            color: var(--muted);

            font-size: 11px;

            font-weight: 700;

            text-transform: uppercase;

            letter-spacing: .3px;

            padding: 14px 16px;

            border-bottom: 1px solid var(--border);

            white-space: nowrap;
        }


        td {
            padding: 15px 16px;

            border-bottom: 1px solid #f0f0f0;

            font-size: 13px;

            vertical-align: middle;
        }


        tbody tr:hover {
            background: #fffaf7;
        }


        .invoice {
            display: inline-block;

            color: var(--orange);

            background: var(--orange-light);

            padding: 6px 9px;

            border-radius: 7px;

            font-weight: 700;

            font-size: 12px;
        }


        .supplier-name {
            font-weight: 600;
        }


        .supplier-code {
            font-size: 11px;

            color: #999999;

            margin-top: 2px;
        }


        .badge-items {
            display: inline-block;

            background: var(--orange-light);

            color: #d95400;

            padding: 6px 9px;

            border-radius: 7px;

            font-size: 11px;

            font-weight: 600;
        }


        .amount {
            font-weight: 700;

            color: #222222;
        }


        /* =====================================================
           DETAIL BUTTON
        ===================================================== */

        .btn-detail {
            width: 35px;
            height: 35px;

            border-radius: 8px;

            border: 1px solid #eeeeee;

            background: #ffffff;

            color: #555555;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            text-decoration: none;

            transition: .2s ease;
        }


        .btn-detail:hover {
            background: var(--orange-light);

            color: var(--orange);

            border-color: #ffd4bc;
        }


        /* =====================================================
           EMPTY
        ===================================================== */

        .empty-state {
            text-align: center;

            padding: 60px 20px;

            color: #999999;
        }


        .empty-state i {
            font-size: 42px;

            color: #cccccc;

            margin-bottom: 12px;

            display: block;
        }


        .empty-state h5 {
            color: #555555;

            font-weight: 600;

            margin-bottom: 6px;
        }


        .empty-state p {
            margin: 0;

            font-size: 13px;
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

        @media (max-width: 900px) {

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

                max-width: none;
            }


            .page-title {
                font-size: 23px;
            }


            .btn-orange {
                width: 100%;
            }


            .filter-card {
                padding: 16px;
            }


            .table-header {
                align-items: flex-start;

                flex-direction: column;

                gap: 5px;
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
            .btn-orange,
            .btn-detail {
                display: none !important;
            }


            .main-content {
                margin-left: 0;

                max-width: none;

                padding: 0;
            }


            .page-header {
                margin-bottom: 20px;
            }


            .table-card {
                border: none;
            }


            .table-header {
                padding-left: 0;

                padding-right: 0;
            }


            table {
                min-width: 0;
            }


            .summary-card:hover {
                transform: none;
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
                class="sidebar-link"
            >

                <i class="bi bi-bar-chart-fill"></i>

                <span>
                    Penjualan
                </span>

            </a>


            <a
                href="{{ route('reports.purchases') }}"
                class="sidebar-link active"
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
                Laporan Pembelian
            </h1>

            <p class="page-subtitle">
                Pantau seluruh transaksi pembelian berdasarkan periode.
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
            action="{{ route('reports.purchases') }}"
            method="GET"
        >

            <div class="row g-3 align-items-end">


                <div class="col-12 col-md-4">

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


                <div class="col-12 col-md-4">

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


                <div class="col-12 col-md-4">

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


        <!-- TOTAL TRANSAKSI -->

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


        <!-- TOTAL ITEM -->

        <div class="summary-card">

            <div class="summary-icon">

                <i class="bi bi-box-seam"></i>

            </div>


            <div class="summary-label">
                Total Item Dibeli
            </div>


            <div class="summary-value">

                {{ number_format($totalItems, 0, ',', '.') }}

            </div>

        </div>


        <!-- TOTAL PEMBELIAN -->

        <div class="summary-card">

            <div class="summary-icon">

                <i class="bi bi-cash-stack"></i>

            </div>


            <div class="summary-label">
                Total Pembelian
            </div>


            <div class="summary-value">

                Rp {{ number_format($totalPurchases, 0, ',', '.') }}

            </div>

        </div>


    </div>


    <!-- TABLE -->

    <div class="table-card">


        <!-- TABLE HEADER -->

        <div class="table-header">

            <div>

                <h3 class="table-title">
                    Detail Pembelian
                </h3>


                <div class="period">

                    Periode:

                    {{ \Carbon\Carbon::parse($startDate)->format('d/m/Y') }}

                    -

                    {{ \Carbon\Carbon::parse($endDate)->format('d/m/Y') }}

                </div>

            </div>

        </div>


        <!-- TABLE -->

        <div class="table-responsive">


            @if($purchases->count() > 0)


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
                                Supplier
                            </th>

                            <th>
                                Total Item
                            </th>

                            <th>
                                Total Pembelian
                            </th>

                            <th>
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>


                        @foreach($purchases as $purchase)


                            <tr>


                                <td>

                                    {{ $loop->iteration }}

                                </td>


                                <td>

                                    <span class="invoice">

                                        {{ $purchase->invoice_number }}

                                    </span>

                                </td>


                                <td>

                                    {{ $purchase->purchase_date->format('d/m/Y') }}

                                </td>


                                <td>

                                    <div class="supplier-name">

                                        {{ $purchase->supplier->name }}

                                    </div>


                                    <div class="supplier-code">

                                        {{ $purchase->supplier->code }}

                                    </div>

                                </td>


                                <td>

                                    <span class="badge-items">

                                        {{ number_format($purchase->items->sum('quantity'), 0, ',', '.') }}

                                        item

                                    </span>

                                </td>


                                <td>

                                    <div class="amount">

                                        Rp
                                        {{ number_format($purchase->total_amount, 0, ',', '.') }}

                                    </div>

                                </td>


                                <td>

                                    <a
                                        href="{{ route('purchases.show', $purchase) }}"
                                        class="btn-detail"
                                        title="Lihat Detail"
                                    >

                                        <i class="bi bi-eye"></i>

                                    </a>

                                </td>


                            </tr>


                        @endforeach


                    </tbody>


                </table>


            @else


                <div class="empty-state">


                    <i class="bi bi-receipt"></i>


                    <h5>
                        Belum Ada Data Pembelian
                    </h5>


                    <p>
                        Tidak ada transaksi pembelian pada periode yang dipilih.
                    </p>


                </div>


            @endif


        </div>


    </div>


</main>


</body>

</html>