<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Dashboard - StockFlow</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        rel="stylesheet">

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

            font-family:
                Arial,
                Helvetica,
                sans-serif;
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


        /* LOGO */

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


        /* MENU */

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


        /* SIDEBAR USER */

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

            max-width: 1800px;
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
        }


        .page-subtitle {
            margin: 5px 0 0;

            color: var(--muted);

            font-size: 14px;
        }


        .quick-sale-btn {
            background: var(--orange);

            color: #ffffff;

            border: none;

            padding: 11px 17px;

            border-radius: 9px;

            font-size: 14px;

            font-weight: 600;

            text-decoration: none;

            display: inline-flex;

            align-items: center;

            gap: 7px;

            transition: .2s ease;
        }


        .quick-sale-btn:hover {
            background: var(--orange-dark);

            color: #ffffff;
        }


        /* =====================================================
           STATISTICS
        ===================================================== */

        .stat-card {
            height: 100%;

            padding: 20px;

            background: #ffffff;

            border: 1px solid var(--border);

            border-radius: 14px;

            transition: .2s ease;
        }


        .stat-card:hover {
            transform: translateY(-2px);

            box-shadow:
                0 8px 25px rgba(0, 0, 0, .05);
        }


        .stat-top {
            display: flex;

            align-items: center;

            justify-content: space-between;
        }


        .stat-label {
            margin-top: 0;

            color: var(--muted);

            font-size: 13px;
        }


        .stat-value {
            margin-top: 4px;

            font-size: 25px;

            font-weight: 700;
        }


        .stat-icon {
            width: 46px;
            height: 46px;

            border-radius: 12px;

            background: var(--orange-light);

            color: var(--orange);

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 21px;
        }


        /* =====================================================
           SECTION CARD
        ===================================================== */

        .section-card {
            background: #ffffff;

            border: 1px solid var(--border);

            border-radius: 14px;

            overflow: hidden;
        }


        .section-header {
            padding: 18px 20px;

            border-bottom: 1px solid #edf0f2;

            display: flex;

            align-items: center;

            justify-content: space-between;
        }


        .section-title {
            margin: 0;

            font-size: 16px;

            font-weight: 700;
        }


        .section-link {
            color: var(--orange);

            text-decoration: none;

            font-size: 13px;

            font-weight: 600;
        }


        .section-link:hover {
            color: var(--orange-dark);
        }


        /* =====================================================
           CHART
        ===================================================== */

        .chart-area {
            height: 330px;

            padding: 20px;
        }


        .chart-wrapper {
            position: relative;

            height: 270px;
        }


        /* =====================================================
           LOW STOCK
        ===================================================== */

        .alert-item {
            padding: 15px 20px;

            border-bottom: 1px solid #f0f1f2;

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 10px;
        }


        .alert-item:last-child {
            border-bottom: none;
        }


        .product-info {
            display: flex;

            align-items: center;

            gap: 12px;

            min-width: 0;
        }


        .product-icon {
            width: 38px;
            height: 38px;

            flex-shrink: 0;

            border-radius: 9px;

            background: var(--orange-light);

            color: var(--orange);

            display: flex;

            align-items: center;

            justify-content: center;
        }


        .product-name {
            font-size: 14px;

            font-weight: 600;

            white-space: nowrap;

            overflow: hidden;

            text-overflow: ellipsis;
        }


        .product-sku {
            margin-top: 2px;

            color: var(--muted);

            font-size: 12px;
        }


        .stock-badge {
            flex-shrink: 0;

            background: #fff0f0;

            color: #dc3545;

            padding: 5px 9px;

            border-radius: 7px;

            font-size: 12px;

            font-weight: 600;
        }


        .empty-state {
            padding: 45px 20px;

            text-align: center;

            color: var(--muted);
        }


        .empty-icon {
            margin-bottom: 10px;

            color: #adb5bd;

            font-size: 35px;
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
            background: #fafafa !important;

            color: #6c757d;

            font-size: 12px;

            font-weight: 600;

            text-transform: uppercase;

            white-space: nowrap;

            padding: 13px 20px !important;

            border-bottom: 1px solid #edf0f2 !important;
        }


        tbody td {
            padding: 14px 20px !important;

            font-size: 13px;

            vertical-align: middle;

            white-space: nowrap;
        }


        .invoice {
            color: var(--orange);

            font-weight: 700;
        }


        .payment-badge {
            background: #f1f3f5;

            color: #495057;

            border-radius: 6px;

            padding: 5px 8px;

            font-size: 11px;

            text-transform: uppercase;

            font-weight: 600;
        }


        .total {
            font-weight: 700;
        }


        .bottom-grid {
            margin-top: 24px;
        }


        /* =====================================================
           ANIMATION
        ===================================================== */

        .fade-in {
            animation: fadeIn .4s ease;
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

            .sidebar {
                width: 220px;
            }


            .main-content {
                margin-left: 220px;

                padding: 20px;
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


            .page-header {
                align-items: flex-start;

                flex-direction: column;
            }


            .page-title {
                font-size: 23px;
            }


            .quick-sale-btn {
                width: 100%;

                justify-content: center;
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
            class="sidebar-link active"
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
                Dashboard
            </h1>

            <p class="page-subtitle">
                Ringkasan aktivitas bisnis StockFlow hari ini.
            </p>

        </div>


        <a
            href="{{ route('sales.create') }}"
            class="quick-sale-btn"
        >

            <i class="bi bi-cart-plus"></i>

            Penjualan Baru

        </a>

    </div>


    <!-- =====================================================
         STATISTICS
    ====================================================== -->

    <div class="row g-3">


        <!-- TOTAL PRODUK -->

        <div class="col-12 col-sm-6 col-xl-3">

            <div class="stat-card">

                <div class="stat-top">

                    <div>

                        <div class="stat-label">
                            Total Produk
                        </div>

                        <div class="stat-value">

                            {{ number_format(
                                $totalProducts,
                                0,
                                ',',
                                '.'
                            ) }}

                        </div>

                    </div>


                    <div class="stat-icon">

                        <i class="bi bi-box-seam"></i>

                    </div>

                </div>

            </div>

        </div>


        <!-- TOTAL KATEGORI -->

        <div class="col-12 col-sm-6 col-xl-3">

            <div class="stat-card">

                <div class="stat-top">

                    <div>

                        <div class="stat-label">
                            Total Kategori
                        </div>

                        <div class="stat-value">

                            {{ number_format(
                                $totalCategories,
                                0,
                                ',',
                                '.'
                            ) }}

                        </div>

                    </div>


                    <div class="stat-icon">

                        <i class="bi bi-tags"></i>

                    </div>

                </div>

            </div>

        </div>


        <!-- TOTAL STOK -->

        <div class="col-12 col-sm-6 col-xl-3">

            <div class="stat-card">

                <div class="stat-top">

                    <div>

                        <div class="stat-label">
                            Total Stok
                        </div>

                        <div class="stat-value">

                            {{ number_format(
                                $totalStock,
                                0,
                                ',',
                                '.'
                            ) }}

                        </div>

                    </div>


                    <div class="stat-icon">

                        <i class="bi bi-stack"></i>

                    </div>

                </div>

            </div>

        </div>


        <!-- PENJUALAN HARI INI -->

        <div class="col-12 col-sm-6 col-xl-3">

            <div class="stat-card">

                <div class="stat-top">

                    <div>

                        <div class="stat-label">
                            Penjualan Hari Ini
                        </div>

                        <div class="stat-value">

                            {{ number_format(
                                $todaySales,
                                0,
                                ',',
                                '.'
                            ) }}

                        </div>

                    </div>


                    <div class="stat-icon">

                        <i class="bi bi-cart-check"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- =====================================================
         REVENUE
    ====================================================== -->

    <div class="row g-3 mt-1">

        <div class="col-12">

            <div class="stat-card">

                <div class="stat-top">

                    <div>

                        <div class="stat-label">
                            Pendapatan Hari Ini
                        </div>

                        <div class="stat-value">

                            Rp {{ number_format(
                                $todayRevenue,
                                0,
                                ',',
                                '.'
                            ) }}

                        </div>

                    </div>


                    <div class="stat-icon">

                        <i class="bi bi-cash-stack"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- =====================================================
         CHART + LOW STOCK
    ====================================================== -->

    <div class="row g-3 bottom-grid">


        <!-- CHART -->

        <div class="col-12 col-xl-8">

            <div class="section-card">

                <div class="section-header">

                    <h2 class="section-title">
                        Penjualan 7 Hari Terakhir
                    </h2>

                    <span class="section-link">
                        Ringkasan
                    </span>

                </div>


                <div class="chart-area">

                    <div class="chart-wrapper">

                        <canvas id="salesChart"></canvas>

                    </div>

                </div>

            </div>

        </div>


        <!-- LOW STOCK -->

        <div class="col-12 col-xl-4">

            <div class="section-card">

                <div class="section-header">

                    <h2 class="section-title">
                        Stok Menipis
                    </h2>


                    <a
                        href="{{ route('products.index') }}"
                        class="section-link"
                    >
                        Lihat Semua
                    </a>

                </div>


                @forelse($lowStockProducts as $product)

                    <div class="alert-item">

                        <div class="product-info">

                            <div class="product-icon">

                                <i class="bi bi-box"></i>

                            </div>


                            <div>

                                <div class="product-name">

                                    {{ $product->name }}

                                </div>


                                <div class="product-sku">

                                    {{ $product->sku }}

                                </div>

                            </div>

                        </div>


                        <span class="stock-badge">

                            {{ $product->stock }}
                            {{ $product->unit }}

                        </span>

                    </div>


                @empty

                    <div class="empty-state">

                        <div class="empty-icon">

                            <i class="bi bi-check-circle"></i>

                        </div>


                        <div>
                            Tidak ada stok yang menipis.
                        </div>

                    </div>

                @endforelse

            </div>

        </div>

    </div>


    <!-- =====================================================
         RECENT SALES
    ====================================================== -->

    <div class="row g-3 bottom-grid">

        <div class="col-12">

            <div class="section-card">

                <div class="section-header">

                    <h2 class="section-title">
                        Transaksi Penjualan Terbaru
                    </h2>


                    <a
                        href="{{ route('sales.index') }}"
                        class="section-link"
                    >
                        Lihat Semua
                    </a>

                </div>


                <div class="table-wrap">

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

                                <th class="text-end">
                                    Total
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @forelse($recentSales as $sale)

                                <tr>

                                    <td>

                                        <span class="invoice">

                                            {{ $sale->invoice_number }}

                                        </span>

                                    </td>


                                    <td>

                                        {{ $sale->sale_date
                                            ->format('d/m/Y H:i') }}

                                    </td>


                                    <td>

                                        {{ $sale->user->name ?? '-' }}

                                    </td>


                                    <td>

                                        <span class="payment-badge">

                                            {{ $sale->payment_method }}

                                        </span>

                                    </td>


                                    <td class="text-end total">

                                        Rp {{ number_format(
                                            $sale->total_amount,
                                            0,
                                            ',',
                                            '.'
                                        ) }}

                                    </td>

                                </tr>


                            @empty

                                <tr>

                                    <td
                                        colspan="5"
                                        class="text-center py-5 text-muted"
                                    >

                                        Belum ada transaksi penjualan.

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>


</main>


<!-- =========================================================
     CHART JS
========================================================= -->

<script
    src="https://cdn.jsdelivr.net/npm/chart.js@4.4.7/dist/chart.umd.min.js">
</script>


<script>

    const chartData = {!! json_encode(

        $salesChart->map(function ($sale) {

            return [

                'date' => \Carbon\Carbon::parse(
                    $sale->date
                )->format('d/m'),

                'total' => (float) $sale->total,

            ];

        })->values()

    ) !!};


    const labels = chartData.map(
        item => item.date
    );


    const totals = chartData.map(
        item => item.total
    );


    const ctx = document.getElementById(
        'salesChart'
    );


    new Chart(ctx, {

        type: 'line',


        data: {

            labels: labels,


            datasets: [{

                label: 'Penjualan',

                data: totals,

                borderWidth: 2,

                tension: 0.35,

                fill: true,

                pointRadius: 4,

                pointHoverRadius: 6

            }]

        },


        options: {

            responsive: true,

            maintainAspectRatio: false,


            plugins: {

                legend: {
                    display: false
                },


                tooltip: {

                    callbacks: {

                        label: function(context) {

                            return ' Rp ' +

                                new Intl.NumberFormat(
                                    'id-ID'
                                ).format(
                                    context.raw
                                );

                        }

                    }

                }

            },


            scales: {

                y: {

                    beginAtZero: true,


                    ticks: {

                        callback: function(value) {

                            return 'Rp ' +

                                new Intl.NumberFormat(
                                    'id-ID'
                                ).format(
                                    value
                                );

                        }

                    },


                    grid: {
                        drawBorder: false
                    }

                },


                x: {

                    grid: {
                        display: false
                    }

                }

            }

        }

    });

</script>


</body>

</html>