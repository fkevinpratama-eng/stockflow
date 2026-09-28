<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Pembelian - StockFlow</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
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
        }


        .page-header {
            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 20px;

            margin-bottom: 25px;
        }


        .page-title {
            margin: 0;

            font-size: 28px;

            font-weight: 700;

            color: #222222;
        }


        .page-subtitle {
            margin-top: 5px;

            color: var(--muted);

            font-size: 14px;
        }


        /* =====================================================
           BUTTON
        ===================================================== */

        .btn-orange {
            background: var(--orange);

            color: #ffffff;

            border: none;

            border-radius: 9px;

            padding: 10px 18px;

            font-weight: 600;

            transition: .2s ease;
        }


        .btn-orange:hover {
            background: var(--orange-dark);

            color: #ffffff;
        }


        /* =====================================================
           CARD
        ===================================================== */

        .content-card {
            background: #ffffff;

            border: 1px solid var(--border);

            border-radius: 14px;

            overflow: hidden;
        }


        .search-box {
            padding: 20px;

            border-bottom: 1px solid var(--border);
        }


        /* =====================================================
           SEARCH
        ===================================================== */

        .search-input {
            height: 44px;

            border-radius: 0 9px 9px 0;

            border: 1px solid #dddddd;
        }


        .search-input:focus {
            border-color: var(--orange);

            box-shadow:
                0 0 0 .2rem rgba(255, 102, 0, .12);
        }


        .search-icon {
            height: 44px;

            border: 1px solid #dddddd;

            border-right: none;

            border-radius: 9px 0 0 9px;
        }


        /* =====================================================
           TABLE
        ===================================================== */

        .table-wrapper {
            overflow-x: auto;
        }


        .table {
            margin-bottom: 0;
        }


        .table thead th {
            background: #fff7f2;

            border-bottom: none;

            padding: 15px;

            font-size: 12px;

            color: #666666;

            font-weight: 700;

            white-space: nowrap;
        }


        .table tbody td {
            padding: 15px;

            vertical-align: middle;

            border-bottom: 1px solid #f0f0f0;

            font-size: 14px;
        }


        .table tbody tr:hover {
            background: #fffaf7;
        }


        /* =====================================================
           DATA STYLE
        ===================================================== */

        .invoice-number {
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

            color: #222222;
        }


        .amount {
            font-weight: 700;

            color: #222222;
        }


        .date-text {
            color: #666666;
        }


        /* =====================================================
           ACTION
        ===================================================== */

        .action-btn {
            width: 35px;
            height: 35px;

            border-radius: 8px;

            border: 1px solid #e5e5e5;

            background: #ffffff;

            display: inline-flex;

            align-items: center;
            justify-content: center;

            text-decoration: none;

            color: #666666;

            transition: .2s ease;
        }


        .action-btn:hover {
            border-color: var(--orange);

            color: var(--orange);

            background: var(--orange-light);
        }


        /* =====================================================
           EMPTY STATE
        ===================================================== */

        .empty-state {
            text-align: center;

            padding: 70px 20px;

            color: #888888;
        }


        .empty-icon {
            width: 70px;
            height: 70px;

            background: var(--orange-light);

            color: var(--orange);

            border-radius: 18px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin: 0 auto 18px;

            font-size: 30px;
        }


        /* =====================================================
           PAGINATION
        ===================================================== */

        .pagination-wrapper {
            padding: 20px;

            border-top: 1px solid var(--border);
        }


        .pagination {
            margin-bottom: 0;
        }


        .page-link {
            color: var(--orange);
        }


        .page-link:hover {
            color: var(--orange-dark);

            background: var(--orange-light);
        }


        .page-item.active .page-link {
            background: var(--orange);

            border-color: var(--orange);

            color: #ffffff;
        }


        /* =====================================================
           ALERT
        ===================================================== */

        .alert {
            border-radius: 10px;

            border: none;
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
            }


            .page-header {
                align-items: flex-start;

                flex-direction: column;
            }


            .page-title {
                font-size: 23px;
            }


            .page-header .btn-orange {
                width: 100%;
            }


            .search-box {
                padding: 15px;
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
                class="sidebar-link active"
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


    <!-- ALERT SUCCESS -->

    @if(session('success'))

        <div
            class="alert alert-success alert-dismissible fade show mb-4"
            role="alert"
        >

            <i class="bi bi-check-circle me-2"></i>

            {{ session('success') }}


            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
            ></button>

        </div>

    @endif


    <!-- HEADER -->

    <div class="page-header">

        <div>

            <h1 class="page-title">
                Pembelian
            </h1>

            <div class="page-subtitle">
                Kelola transaksi pembelian dan stok masuk.
            </div>

        </div>


        <a
            href="{{ route('purchases.create') }}"
            class="btn btn-orange"
        >

            <i class="bi bi-plus-lg me-2"></i>

            Tambah Pembelian

        </a>

    </div>


    <!-- MAIN CARD -->

    <div class="content-card">


        <!-- SEARCH -->

        <div class="search-box">

            <form
                action="{{ route('purchases.index') }}"
                method="GET"
            >

                <div class="row g-2">


                    <div class="col-md-8">

                        <div class="input-group">

                            <span class="input-group-text search-icon bg-white">

                                <i class="bi bi-search text-muted"></i>

                            </span>


                            <input
                                type="text"
                                name="search"
                                class="form-control search-input"
                                value="{{ $search }}"
                                placeholder="Cari invoice atau supplier..."
                            >

                        </div>

                    </div>


                    <div class="col-md-4">

                        <button
                            type="submit"
                            class="btn btn-orange w-100"
                            style="height: 44px;"
                        >

                            <i class="bi bi-search me-1"></i>

                            Cari Pembelian

                        </button>

                    </div>

                </div>

            </form>

        </div>


        <!-- TABLE -->

        <div class="table-wrapper">


            @if($purchases->count())


                <table class="table">


                    <thead>

                        <tr>

                            <th width="60">
                                #
                            </th>

                            <th>
                                Invoice
                            </th>

                            <th>
                                Supplier
                            </th>

                            <th>
                                Tanggal
                            </th>

                            <th>
                                Total
                            </th>

                            <th width="90">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>


                        @foreach($purchases as $purchase)


                            <tr>


                                <!-- NUMBER -->

                                <td class="text-muted">

                                    {{ $purchases->firstItem() + $loop->index }}

                                </td>


                                <!-- INVOICE -->

                                <td>

                                    <span class="invoice-number">

                                        {{ $purchase->invoice_number }}

                                    </span>

                                </td>


                                <!-- SUPPLIER -->

                                <td>

                                    <div class="supplier-name">

                                        {{ $purchase->supplier->name }}

                                    </div>


                                    <small class="text-muted">

                                        {{ $purchase->supplier->code }}

                                    </small>

                                </td>


                                <!-- DATE -->

                                <td>

                                    <span class="date-text">

                                        {{ $purchase->purchase_date->format('d M Y') }}

                                    </span>

                                </td>


                                <!-- TOTAL -->

                                <td>

                                    <span class="amount">

                                        Rp {{ number_format($purchase->total_amount, 0, ',', '.') }}

                                    </span>

                                </td>


                                <!-- ACTION -->

                                <td>

                                    <a
                                        href="{{ route('purchases.show', $purchase) }}"
                                        class="action-btn"
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


                <!-- EMPTY STATE -->

                <div class="empty-state">


                    <div class="empty-icon">

                        <i class="bi bi-cart-x"></i>

                    </div>


                    <h5 class="fw-bold">

                        Belum Ada Pembelian

                    </h5>


                    <p class="mb-4">

                        Belum ada transaksi pembelian yang tersimpan.

                    </p>


                    <a
                        href="{{ route('purchases.create') }}"
                        class="btn btn-orange"
                    >

                        <i class="bi bi-plus-lg me-2"></i>

                        Tambah Pembelian

                    </a>


                </div>


            @endif


        </div>


        <!-- PAGINATION -->

        @if($purchases->hasPages())

            <div class="pagination-wrapper">

                {{ $purchases->links() }}

            </div>

        @endif


    </div>


</main>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>