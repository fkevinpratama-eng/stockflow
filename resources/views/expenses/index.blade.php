<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Pengeluaran - StockFlow</title>

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
            margin: 6px 0 0;

            color: var(--muted);

            font-size: 14px;
        }


        /* =====================================================
           BUTTON
        ===================================================== */

        .add-btn {
            background: var(--orange);

            border: none;

            color: #ffffff;

            padding: 11px 17px;

            border-radius: 9px;

            text-decoration: none;

            font-size: 14px;

            font-weight: 600;

            display: inline-flex;

            align-items: center;

            gap: 7px;

            transition: .2s ease;
        }


        .add-btn:hover {
            background: var(--orange-dark);

            color: #ffffff;
        }


        /* =====================================================
           CARD
        ===================================================== */

        .card-box {
            background: #ffffff;

            border: 1px solid var(--border);

            border-radius: 14px;

            overflow: hidden;
        }


        .toolbar {
            padding: 18px 20px;

            border-bottom: 1px solid var(--border);

            display: flex;

            justify-content: space-between;

            align-items: center;

            gap: 15px;
        }


        /* =====================================================
           SEARCH
        ===================================================== */

        .search-form {
            display: flex;

            gap: 8px;

            width: 100%;

            max-width: 500px;
        }


        .search-input {
            border: 1px solid #dee2e6;

            border-radius: 8px;

            padding: 10px 13px;

            font-size: 13px;

            width: 100%;

            outline: none;
        }


        .search-input:focus {
            border-color: var(--orange);

            box-shadow:
                0 0 0 3px rgba(255, 102, 0, .1);
        }


        .search-btn {
            border: none;

            background: var(--orange);

            color: #ffffff;

            border-radius: 8px;

            padding: 0 15px;

            transition: .2s ease;
        }


        .search-btn:hover {
            background: var(--orange-dark);
        }


        .reset-btn {
            border: 1px solid #dee2e6;

            background: #ffffff;

            color: #495057;

            border-radius: 8px;

            padding: 0 13px;

            text-decoration: none;

            display: flex;

            align-items: center;

            transition: .2s ease;
        }


        .reset-btn:hover {
            background: var(--orange-light);

            border-color: var(--orange);

            color: var(--orange);
        }


        /* =====================================================
           ALERT
        ===================================================== */

        .alert-success {
            border: none;

            border-radius: 10px;

            font-size: 14px;
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

            color: #6c757d;

            font-size: 11px;

            font-weight: 700;

            text-transform: uppercase;

            padding: 14px 20px !important;

            border-bottom: 1px solid var(--border) !important;

            white-space: nowrap;
        }


        tbody td {
            padding: 15px 20px !important;

            font-size: 13px;

            vertical-align: middle;

            white-space: nowrap;

            border-bottom: 1px solid #f0f0f0;
        }


        tbody tr:hover {
            background: #fffaf7;
        }


        /* =====================================================
           DATA
        ===================================================== */

        .expense-number {
            color: var(--orange);

            background: var(--orange-light);

            padding: 6px 9px;

            border-radius: 7px;

            font-weight: 700;

            font-size: 12px;
        }


        .category-badge {
            background: var(--orange-light);

            color: var(--orange);

            padding: 5px 9px;

            border-radius: 7px;

            font-size: 11px;

            font-weight: 600;
        }


        .payment-badge {
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
           ACTION
        ===================================================== */

        .action-btn {
            width: 34px;
            height: 34px;

            border: 1px solid #e1e5e8;

            background: #ffffff;

            border-radius: 8px;

            display: inline-flex;

            align-items: center;
            justify-content: center;

            color: #495057;

            text-decoration: none;

            transition: .2s ease;

            cursor: pointer;
        }


        .action-btn:hover {
            background: var(--orange-light);

            border-color: var(--orange);

            color: var(--orange);
        }


        .delete-btn {
            color: #dc3545;
        }


        .delete-btn:hover {
            color: #dc3545;

            background: #fff5f5;

            border-color: #f1b0b7;
        }


        /* =====================================================
           EMPTY STATE
        ===================================================== */

        .empty-state {
            text-align: center;

            padding: 60px 20px;

            color: var(--muted);
        }


        .empty-state i {
            font-size: 42px;

            color: #adb5bd;

            display: block;

            margin-bottom: 12px;
        }


        /* =====================================================
           PAGINATION
        ===================================================== */

        .pagination {
            margin: 0;
        }


        .pagination .page-link {
            color: var(--orange);
        }


        .pagination .page-link:hover {
            background: var(--orange-light);

            color: var(--orange-dark);
        }


        .pagination .active .page-link {
            background: var(--orange);

            border-color: var(--orange);

            color: #ffffff;
        }


        .pagination-wrapper {
            padding: 18px 20px;

            border-top: 1px solid var(--border);
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


            .add-btn {
                width: 100%;

                justify-content: center;
            }


            .toolbar {
                flex-direction: column;

                align-items: stretch;
            }


            .search-form {
                max-width: none;
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
                class="sidebar-link active"
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
                Pengeluaran
            </h1>

            <p class="page-subtitle">
                Kelola dan pantau seluruh pengeluaran bisnis.
            </p>

        </div>


        <a
            href="{{ route('expenses.create') }}"
            class="add-btn"
        >

            <i class="bi bi-plus-lg"></i>

            Tambah Pengeluaran

        </a>

    </div>


    <!-- SUCCESS -->

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


    <!-- CARD -->

    <div class="card-box">


        <!-- TOOLBAR -->

        <div class="toolbar">

            <form
                action="{{ route('expenses.index') }}"
                method="GET"
                class="search-form"
            >


                <input
                    type="text"
                    name="search"
                    class="search-input"
                    placeholder="Cari nomor, kategori, atau deskripsi..."
                    value="{{ $search }}"
                >


                <button
                    type="submit"
                    class="search-btn"
                    title="Cari"
                >

                    <i class="bi bi-search"></i>

                </button>


                @if($search)

                    <a
                        href="{{ route('expenses.index') }}"
                        class="reset-btn"
                        title="Reset"
                    >

                        <i class="bi bi-x-lg"></i>

                    </a>

                @endif


            </form>

        </div>


        <!-- TABLE -->

        <div class="table-wrap">


            <table class="table table-hover align-middle">


                <thead>

                    <tr>

                        <th>
                            No. Pengeluaran
                        </th>

                        <th>
                            Tanggal
                        </th>

                        <th>
                            Kategori
                        </th>

                        <th>
                            Deskripsi
                        </th>

                        <th>
                            Metode
                        </th>

                        <th>
                            Input Oleh
                        </th>

                        <th class="text-end">
                            Jumlah
                        </th>

                        <th class="text-center">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody>


                    @forelse($expenses as $expense)


                        <tr>


                            <!-- EXPENSE NUMBER -->

                            <td>

                                <span class="expense-number">

                                    {{ $expense->expense_number }}

                                </span>

                            </td>


                            <!-- DATE -->

                            <td>

                                {{ $expense->expense_date->format('d/m/Y') }}

                            </td>


                            <!-- CATEGORY -->

                            <td>

                                <span class="category-badge">

                                    {{ $expense->category }}

                                </span>

                            </td>


                            <!-- DESCRIPTION -->

                            <td>

                                {{ $expense->description }}

                            </td>


                            <!-- PAYMENT -->

                            <td>

                                <span class="payment-badge">

                                    {{ $expense->payment_method }}

                                </span>

                            </td>


                            <!-- USER -->

                            <td>

                                {{ $expense->user->name ?? '-' }}

                            </td>


                            <!-- AMOUNT -->

                            <td class="text-end amount">

                                Rp {{ number_format($expense->amount, 0, ',', '.') }}

                            </td>


                            <!-- ACTION -->

                            <td class="text-center">

                                <div class="d-flex justify-content-center gap-1">


                                    <!-- DETAIL -->

                                    <a
                                        href="{{ route('expenses.show', $expense) }}"
                                        class="action-btn"
                                        title="Detail"
                                    >

                                        <i class="bi bi-eye"></i>

                                    </a>


                                    <!-- DELETE -->

                                    <form
                                        action="{{ route('expenses.destroy', $expense) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus pengeluaran ini?')"
                                    >

                                        @csrf

                                        @method('DELETE')


                                        <button
                                            type="submit"
                                            class="action-btn delete-btn"
                                            title="Hapus"
                                        >

                                            <i class="bi bi-trash"></i>

                                        </button>

                                    </form>


                                </div>

                            </td>


                        </tr>


                    @empty


                        <tr>

                            <td colspan="8">


                                <div class="empty-state">

                                    <i class="bi bi-wallet2"></i>


                                    <div class="fw-semibold mb-1">

                                        Belum ada data pengeluaran.

                                    </div>


                                    <small>

                                        Klik "Tambah Pengeluaran" untuk mencatat pengeluaran baru.

                                    </small>

                                </div>


                            </td>

                        </tr>


                    @endforelse


                </tbody>


            </table>


        </div>


        <!-- PAGINATION -->

        @if($expenses->hasPages())

            <div class="pagination-wrapper">

                {{ $expenses->links() }}

            </div>

        @endif


    </div>


</main>


<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
></script>


</body>

</html>