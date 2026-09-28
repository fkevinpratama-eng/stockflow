<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Supplier - StockFlow</title>

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


        .btn-light-custom {
            background: #f1f1f1;

            color: #555555;

            border: none;

            border-radius: 9px;

            padding: 10px 18px;

            font-weight: 600;
        }


        .btn-light-custom:hover {
            background: #e5e5e5;

            color: #333333;
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


        .content-card-body {
            padding: 24px;
        }


        .filter-card {
            background: #ffffff;

            border: 1px solid var(--border);

            border-radius: 14px;

            padding: 20px;
        }


        /* =====================================================
           FORM
        ===================================================== */

        .form-control {
            height: 44px;

            border-radius: 9px;

            padding: 10px 13px;

            border: 1px solid #dddddd;
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


        .table thead th {
            background: #fff7f2;

            border-bottom: none;

            padding: 15px;

            font-size: 13px;

            color: #555555;

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
           SUPPLIER
        ===================================================== */

        .supplier-code {
            display: inline-block;

            font-weight: 700;

            color: var(--orange);

            background: var(--orange-light);

            padding: 6px 9px;

            border-radius: 7px;

            font-size: 12px;
        }


        .supplier-name {
            font-weight: 600;

            color: #222222;
        }


        .contact {
            color: #555555;

            font-size: 14px;
        }


        .address {
            color: #777777;

            font-size: 13px;

            max-width: 250px;
        }


        /* =====================================================
           ACTION
        ===================================================== */

        .btn-action {
            width: 35px;
            height: 35px;

            border-radius: 8px;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            border: none;

            padding: 0;
        }


        .btn-edit {
            background: var(--orange-light);

            color: var(--orange);
        }


        .btn-edit:hover {
            background: #ffe0cc;

            color: var(--orange-dark);
        }


        .btn-delete {
            background: #fff0f0;

            color: #dc3545;
        }


        .btn-delete:hover {
            background: #ffe0e0;

            color: #bb2d3b;
        }


        /* =====================================================
           EMPTY STATE
        ===================================================== */

        .empty-state {
            padding: 65px 20px;

            text-align: center;
        }


        .empty-icon {
            font-size: 45px;

            color: var(--orange);

            margin-bottom: 15px;
        }


        /* =====================================================
           ALERT
        ===================================================== */

        .alert {
            border-radius: 10px;
        }


        /* =====================================================
           PAGINATION
        ===================================================== */

        .pagination {
            margin-bottom: 0;
        }


        .pagination .page-link {
            color: var(--orange);
        }


        .pagination .page-link:hover {
            color: var(--orange-dark);

            background: var(--orange-light);
        }


        .pagination .active .page-link {
            background: var(--orange);

            border-color: var(--orange);

            color: #ffffff;
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


            .btn-orange {
                width: 100%;
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
                class="sidebar-link active"
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

            <h2 class="page-title">
                Supplier
            </h2>

            <div class="page-subtitle">
                Kelola data supplier yang bekerja sama dengan bisnis.
            </div>

        </div>


        <a
            href="{{ route('suppliers.create') }}"
            class="btn btn-orange"
        >

            <i class="bi bi-plus-lg me-1"></i>

            Tambah Supplier

        </a>

    </div>


    <!-- ALERT SUCCESS -->

    @if (session('success'))

        <div class="alert alert-success">

            <i class="bi bi-check-circle me-1"></i>

            {{ session('success') }}

        </div>

    @endif


    <!-- ALERT ERROR -->

    @if (session('error'))

        <div class="alert alert-danger">

            <i class="bi bi-exclamation-circle me-1"></i>

            {{ session('error') }}

        </div>

    @endif


    <!-- SEARCH -->

    <div class="filter-card mb-4">

        <form
            action="{{ route('suppliers.index') }}"
            method="GET"
        >

            <div class="row g-2">


                <div class="col-md-9">

                    <input
                        type="text"
                        name="search"
                        class="form-control"
                        value="{{ $search }}"
                        placeholder="Cari kode, nama supplier, telepon, atau kontak..."
                    >

                </div>


                <div class="col-md-3 d-flex gap-2">

                    <button
                        type="submit"
                        class="btn btn-orange flex-fill"
                        style="height: 44px;"
                    >

                        <i class="bi bi-search me-1"></i>

                        Cari

                    </button>


                    <a
                        href="{{ route('suppliers.index') }}"
                        class="btn btn-light-custom"
                        style="height: 44px;"
                    >

                        Reset

                    </a>

                </div>

            </div>

        </form>

    </div>


    <!-- TABLE -->

    <div class="content-card">


        @if ($suppliers->count() > 0)


            <div class="table-responsive">

                <table class="table align-middle">


                    <thead>

                        <tr>

                            <th width="50">
                                #
                            </th>

                            <th>
                                Kode
                            </th>

                            <th>
                                Supplier
                            </th>

                            <th>
                                Kontak
                            </th>

                            <th>
                                Email
                            </th>

                            <th>
                                Contact Person
                            </th>

                            <th>
                                Alamat
                            </th>

                            <th width="100">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>


                        @foreach ($suppliers as $supplier)


                            <tr>


                                <!-- NUMBER -->

                                <td class="text-muted">

                                    {{ $suppliers->firstItem() + $loop->index }}

                                </td>


                                <!-- CODE -->

                                <td>

                                    <span class="supplier-code">

                                        {{ $supplier->code }}

                                    </span>

                                </td>


                                <!-- NAME -->

                                <td>

                                    <div class="supplier-name">

                                        {{ $supplier->name }}

                                    </div>

                                </td>


                                <!-- PHONE -->

                                <td>

                                    <div class="contact">

                                        @if ($supplier->phone)

                                            <i class="bi bi-telephone me-1"></i>

                                            {{ $supplier->phone }}

                                        @else

                                            <span class="text-muted">
                                                -
                                            </span>

                                        @endif

                                    </div>

                                </td>


                                <!-- EMAIL -->

                                <td>

                                    @if ($supplier->email)

                                        <span class="contact">

                                            {{ $supplier->email }}

                                        </span>

                                    @else

                                        <span class="text-muted">
                                            -
                                        </span>

                                    @endif

                                </td>


                                <!-- CONTACT PERSON -->

                                <td>

                                    @if ($supplier->contact_person)

                                        <span class="contact">

                                            {{ $supplier->contact_person }}

                                        </span>

                                    @else

                                        <span class="text-muted">
                                            -
                                        </span>

                                    @endif

                                </td>


                                <!-- ADDRESS -->

                                <td>

                                    <div class="address">

                                        {{ $supplier->address ?: '-' }}

                                    </div>

                                </td>


                                <!-- ACTION -->

                                <td>

                                    <div class="d-flex gap-1">


                                        <!-- EDIT -->

                                        <a
                                            href="{{ route('suppliers.edit', $supplier) }}"
                                            class="btn-action btn-edit"
                                            title="Edit"
                                        >

                                            <i class="bi bi-pencil"></i>

                                        </a>


                                        <!-- DELETE -->

                                        <form
                                            action="{{ route('suppliers.destroy', $supplier) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus supplier ini?')"
                                        >

                                            @csrf

                                            @method('DELETE')


                                            <button
                                                type="submit"
                                                class="btn-action btn-delete"
                                                title="Hapus"
                                            >

                                                <i class="bi bi-trash"></i>

                                            </button>

                                        </form>


                                    </div>

                                </td>


                            </tr>


                        @endforeach


                    </tbody>


                </table>

            </div>


            <!-- PAGINATION -->

            @if ($suppliers->hasPages())

                <div class="p-3 border-top">

                    {{ $suppliers->links() }}

                </div>

            @endif


        @else


            <!-- EMPTY STATE -->

            <div class="empty-state">


                <div class="empty-icon">

                    <i class="bi bi-truck"></i>

                </div>


                <h5>

                    Belum Ada Supplier

                </h5>


                <p class="text-muted mb-4">

                    Belum ada data supplier yang tersimpan.

                </p>


                <a
                    href="{{ route('suppliers.create') }}"
                    class="btn btn-orange"
                >

                    <i class="bi bi-plus-lg me-1"></i>

                    Tambah Supplier

                </a>


            </div>


        @endif


    </div>


</main>


</body>

</html>