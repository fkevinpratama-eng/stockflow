<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Riwayat Penjualan - StockFlow</title>

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

            border-color: var(--orange);

            color: #ffffff;

            font-weight: 600;

            border-radius: 9px;

            padding: 10px 17px;
        }


        .btn-orange:hover {
            background: var(--orange-dark);

            border-color: var(--orange-dark);

            color: #ffffff;
        }


        .btn-light-custom {
            background: #ffffff;

            border: 1px solid var(--border);

            color: #666666;

            border-radius: 9px;
        }


        .btn-light-custom:hover {
            background: var(--orange-light);

            border-color: var(--orange);

            color: var(--orange);
        }


        /* =====================================================
           CARD
        ===================================================== */

        .card-custom {
            background: #ffffff;

            border: 1px solid var(--border);

            border-radius: 14px;

            overflow: hidden;

            box-shadow: 0 4px 15px rgba(0, 0, 0, .03);
        }


        .search-box {
            padding: 20px;

            border-bottom: 1px solid var(--border);
        }


        .form-control {
            min-height: 44px;

            border-radius: 9px;
        }


        .form-control:focus {
            border-color: var(--orange);

            box-shadow:
                0 0 0 .2rem rgba(255, 102, 0, .12);
        }


        /* =====================================================
           TABLE
        ===================================================== */

        .table {
            margin-bottom: 0;
        }


        .table > :not(caption) > * > * {
            padding: 15px 12px;

            vertical-align: middle;
        }


        .table thead th {
            background: #fff7f2;

            color: #6c757d;

            font-size: 12px;

            font-weight: 700;

            white-space: nowrap;

            border-bottom: 1px solid var(--border);
        }


        .table tbody td {
            border-color: #f0f0f0;

            font-size: 14px;
        }


        .table tbody tr:hover {
            background: #fffaf7;
        }


        /* =====================================================
           DATA
        ===================================================== */

        .invoice {
            display: inline-block;

            color: var(--orange);

            background: var(--orange-light);

            padding: 6px 9px;

            border-radius: 7px;

            font-weight: 700;

            font-size: 12px;
        }


        .amount {
            font-weight: 700;

            color: var(--orange);

            white-space: nowrap;
        }


        .payment-badge {
            display: inline-block;

            background: var(--orange-light);

            color: var(--orange);

            font-size: 12px;

            font-weight: 600;

            padding: 6px 9px;

            border-radius: 20px;
        }


        .role-badge {
            display: inline-block;

            background: #f1f3f5;

            color: #495057;

            font-size: 11px;

            padding: 4px 8px;

            border-radius: 20px;

            margin-top: 4px;
        }


        /* =====================================================
           EMPTY STATE
        ===================================================== */

        .empty-state {
            padding: 70px 20px;

            text-align: center;

            color: #6c757d;
        }


        .empty-state i {
            font-size: 48px;

            color: #ced4da;
        }


        /* =====================================================
           PAGINATION
        ===================================================== */

        .pagination-wrapper {
            padding: 18px 20px;

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
                class="sidebar-link active"
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


    <!-- HEADER -->

    <div class="page-header">

        <div>

            <h1 class="page-title">
                Riwayat Penjualan
            </h1>

            <div class="page-subtitle">
                Lihat seluruh transaksi penjualan StockFlow.
            </div>

        </div>


        <a
            href="{{ route('sales.create') }}"
            class="btn btn-orange"
        >

            <i class="bi bi-plus-lg me-1"></i>

            Penjualan Baru

        </a>

    </div>


    <!-- SUCCESS -->

    @if (session('success'))

        <div
            class="alert alert-success alert-dismissible fade show mb-4"
            role="alert"
        >

            <i class="bi bi-check-circle me-1"></i>

            {{ session('success') }}


            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
            ></button>

        </div>

    @endif


    <!-- CARD -->

    <div class="card-custom">


        <!-- SEARCH -->

        <div class="search-box">

            <form
                action="{{ route('sales.index') }}"
                method="GET"
            >

                <div class="row g-2">


                    <div class="col-md-9">

                        <div class="input-group">

                            <span class="input-group-text bg-white">

                                <i class="bi bi-search"></i>

                            </span>


                            <input
                                type="text"
                                name="search"
                                class="form-control border-start-0"
                                placeholder="Cari invoice atau nama kasir..."
                                value="{{ $search }}"
                            >

                        </div>

                    </div>


                    <div class="col-md-3 d-flex gap-2">

                        <button
                            type="submit"
                            class="btn btn-orange flex-fill"
                        >

                            <i class="bi bi-search me-1"></i>

                            Cari

                        </button>


                        @if ($search)

                            <a
                                href="{{ route('sales.index') }}"
                                class="btn btn-light-custom"
                                title="Reset"
                            >

                                <i class="bi bi-x-lg"></i>

                            </a>

                        @endif

                    </div>

                </div>

            </form>

        </div>


        <!-- TABLE -->

        <div class="table-responsive">

            <table class="table align-middle">


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
                            Pembayaran
                        </th>

                        <th>
                            Total
                        </th>

                        <th class="text-center">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody>


                    @forelse ($sales as $sale)


                        <tr>


                            <!-- INVOICE -->

                            <td>

                                <div class="invoice">

                                    {{ $sale->invoice_number }}

                                </div>

                            </td>


                            <!-- DATE -->

                            <td>

                                <div>

                                    {{ $sale->sale_date->format('d/m/Y') }}

                                </div>


                                <small class="text-muted">

                                    {{ $sale->sale_date->format('H:i') }}

                                </small>

                            </td>


                            <!-- CASHIER -->

                            <td>

                                <div class="fw-semibold">

                                    {{ $sale->user->name }}

                                </div>


                                <span class="role-badge text-capitalize">

                                    {{ $sale->user->role }}

                                </span>

                            </td>


                            <!-- PAYMENT -->

                            <td>

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

                            </td>


                            <!-- TOTAL -->

                            <td>

                                <span class="amount">

                                    Rp {{ number_format($sale->total_amount, 0, ',', '.') }}

                                </span>

                            </td>


                            <!-- ACTION -->

                            <td class="text-center">

                                <a
                                    href="{{ route('sales.show', $sale) }}"
                                    class="btn btn-sm btn-light-custom"
                                    title="Detail"
                                >

                                    <i class="bi bi-eye"></i>

                                </a>

                            </td>


                        </tr>


                    @empty


                        <tr>

                            <td colspan="6">


                                <div class="empty-state">


                                    <i class="bi bi-receipt d-block mb-3"></i>


                                    <div class="fw-semibold mb-1">

                                        Belum ada transaksi penjualan

                                    </div>


                                    <small>

                                        Transaksi yang berhasil diproses akan muncul di sini.

                                    </small>


                                </div>


                            </td>

                        </tr>


                    @endforelse


                </tbody>


            </table>

        </div>


        <!-- PAGINATION -->

        @if ($sales->hasPages())

            <div class="pagination-wrapper">

                {{ $sales->links() }}

            </div>

        @endif


    </div>


</main>


<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
></script>


</body>

</html>